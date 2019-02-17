<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Product;
use App\Product_detail;
use App\Product_image;
use App\Category;
use App\Color;
use App\Size;
use Illuminate\Support\Facades\Auth;
class ProductDetailController extends Controller
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
        return view('admin.product.productDetail',compact('categories','colors','sizes'));
    }
     public function prodeList($prod_id){
    	$product_detail = product_detail::where('product_id',$prod_id)->get();
        foreach ($product_detail as $key => $value) {
            $size = Size::where('id',$value->size_id)->first();

            $value->sizename = $size['size'];

            $color = Color::where('id',$value->color_id)->first();

            $value->colorname = $color['color'];
        }
       
        return DataTables()->of($product_detail)
        ->addColumn('action',function(product_detail $product_detail){
            return '
            <a class="btn btn-warning edit-prodetail-btn" data-id="'.$product_detail->id.'">Edit</a>
            <button class="btn btn-danger del-prod-btn" data-id="'.$product_detail->id.'">Delete</button>';  
        })
        ->editColumn('size_id', function(product_detail $product_detail) {
                return 
           $product_detail->sizename;  
            })
        ->editColumn('color_id', function(product_detail $product_detail) {
                return 
           $product_detail->colorname;  
            })
        ->rawColumns(['action'])->toJson();
        
    }
     public function create()
    {
    	
        return view('admin.product.addprod');
    }
    public function store(Request $request)
    {
        // dd($request->toArray());
       
        // $loopColor = $request->color_id;
        // $loopSize = $request->size_id;       
        // dd($loopColor);
        $old = Product_detail::where('product_id',$request->product_id)->where('size_id',$request->size_id)->where('color_id',$request->color_id)->first();
       
        // $product = Product::where('id',$request->product_id)->first();     
           $i=time();
        if(isset($old->id)){
                 $old->quantity +=$request->quantity;
                 $old->save();
                 $prode = new Product_detail;
                 $prode->product_id = $old->product_id;
                        $prode->quantity = $old->quantity;
                        $prode->product_code = $old->product_code;
                        $prode->size_id = $old->size_id;
                        $prode->color_id =  $old->color_id;
            }else{
                        $prode = new Product_detail;
                        $prode->product_id = $request->product_id;
                        $prode->quantity = $request->quantity;
                        $prode->product_code = 'Z00'.substr($i, -4);
                        $prode->size_id = $request->size_id;
                        $prode->color_id =  $request->color_id;
                        $prode->save();
            }
       


    }
    public function destroy($id)
    {
        $del = product_detail::find($id);
        $del->delete();
     return response()->json(['data'=>'removed'],200);
    }
    public function edit($id){
        $productdetail = product_detail::find($id);
       
    return response()->json(['productdetail'=>$productdetail],200);
    }
    public function update(Request $request, $id){

        $product_detail = product_detail::find($id);


                $product_detail->product_id;           
                $product_detail->color_id;
                $product_detail->size_id;
                // $product_detail->price = $request->price; 
                $product_detail->quantity = $request->quantity; 
                // dd($product_detail->toArray()); 
                
		        
                $product_detail->save();
          
       
       return response()->json(['data' =>$product_detail],200);
    }
}
