<?php

namespace App\Http\Controllers;
use DataTables;
use Validator;
use Illuminate\Http\Request;
use App\Product;
use App\Product_detail;
use App\Product_image;
use App\Category;
use App\Color;
use App\Size;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.product',compact('categories','colors','sizes'));
    }
     public function productList()
        {
           $product_images = Product_image::all();
           $categories = Category::all();
            $products = Product::orderBy('id','desc');
            return datatables()->of($products)
            // ->editColumn('sale_price', function($product) {
            //     return number_format($product->sale_price);
            // })
            ->addColumn('action' ,function(Product $product){
                return ' 
                 <a class="btn btn-info btn-add-detail" onclick = "showdetail('.$product->id.')">Add Detail</a>    
                <a class="btn btn-primary btn-edit-product" data-id="'.$product->id.'">edit</a>
                <a class="btn btn-danger btn-delete-product" data-id="'.$product->id.'">delete</a>';
            })
             ->addColumn('thumbnail', function(product $product)use ($product_images){
               foreach ($product_images as $img) {
               
                   if($img->product_id == $product->id){
                    return ' 
                 <img style="width: 100px;height: 100px;" src="'.asset(''.$img->thumbnail.'').'" alt="">';
                 
                }
                   
               }
            })
             ->editColumn('description', function(product $product)use ($categories){
               foreach ($categories as $category) {
               
                   if($category->id == $product->category_id){
                    return $category->name;
                 
                }
                   
               }
            })->rawColumns(['thumbnail', 'action','description'])->toJson();
            
          
            
        }
     public function create()
    {
    	
        return view('admin.product.addprod');
    }
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
           'code' => 'required|max:10',
          
       ]);
         if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }


        // dd($request->toArray());

        // dd($request);
        $product = new Product;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->content = $request->content;
        $product->slug = str_slug($request->name).time();
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->sale_price = $request->sale_price;
        $product->view_count = 0;
        $product->rate = 5;
        $product->admin_updated_id = Auth::User('admin')->id;
        $product->admin_created_id = Auth::User('admin')->id;

       
        
         $product->save();
         if ($request->thumbnail) {
            foreach ($request->thumbnail as  $file) {
            $file->move('upload', $file->getClientOriginalName());
            $path = "upload/" .$file->getClientOriginalName(); 
             $product_images = new Product_image;
             $product_images->product_id = $product->id;
             $product_images->thumbnail = $path;
             $product_images->save();
              }
           
              
             
             
            //  // $product_images = new Product_image;
            //  $product_images->product_id = 6;
            //  // $product_images->thumbnail = $path;
            //  $product_images->thumbnail = 'mmmm';
            //  $product_images->save();
           

               
        }
      
        // $loopColor = json_decode( stripslashes($_POST['formData']) );
        // $loopColor = json_decode(json_encode( $request->color), true );
        
    }
    public function destroy($id)
    {
        $del = Product::find($id);
        $del->delete();
     return response()->json(['data'=>'removed'],200);
    }
    public function edit($id)
    {
      
        $product = Product::find($id);
        // $id = $product->category_id;
        // $category = Category::where('id','=',$id);
        $product_detail = Product_detail::where('id','=',$product->id)->get();
        // dd($product_detail->toArray());
         $product_img = Product_image::where('product_id',$id)->get();
         $img="";
         foreach ($product_img as $key => $ig) {
            $img .='<img src="/'.$ig->thumbnail.'" alt="" style="width: 100px;height: 100px;">';
         };
        return response()->json(['data'=>$product,'product_detail' => $product_detail,'product_img'=>$product_img,'img'=>$img],200);
     }
     
     public function update(Request $request){
        $product = product::find($request->id);
        $product_images = Product_image::where('product_id',$request->id)->get()->each;
        $product_images->delete();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->content = $request->content;
        $product->slug = str_slug($request->name);
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->sale_price = $request->sale_price;
        $product->view_count = 0;
        $product->rate = 5;
        $product->admin_updated_id = Auth::User('admin')->id;
        $product->admin_created_id = Auth::User('admin')->id;
        $product->save();
       
       if ($request->thumbnailedit) {
            foreach ($request->thumbnailedit as  $file) {
            $file->move('upload', $file->getClientOriginalName());
            $path = "upload/" .$file->getClientOriginalName(); 
             $productimages = new Product_image;
             $productimages->product_id = $product->id;
             $productimages->thumbnail = $path;
             $productimages->save();
            };
        }
          return response()->json(['data' =>$product],200);
    }
}