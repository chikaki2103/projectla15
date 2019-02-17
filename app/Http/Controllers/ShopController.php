<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_detail;
use App\Category;
use App\Size;
use App\Color;
use App\Product_image;
use App\Order;
use App\Order_detail;




use Gloudemans\Shoppingcart\Facades\Cart;


use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
     public function index()
    {
        $products = Product::all();
       
        $product_detail = Product_detail::all();
        foreach($products as $product){
        	$img = Product_image::where('product_id',$product->id)->first();
        	 // dd($img['thumbnail']);
        	$product->img = $img['thumbnail'];
        }
         // dd($products);
        

        return view('shop.index',compact('products','product_detail','product_images'));
    }
     public function add2cart(Request $request, $id)
    {
    
    	$product = Product::where('id',$id)->first(); 
    	// $product = $request->all();
    	$product_detail = Product_detail::where('product_id',$id)->first();
    	$imageCart = Product_image::where('product_id',$id)->first();
    	// $product_detail = $request->all();
    	// $size = Size::where('id',$product_detail->size_id)->get();
    	// $size = $request->all();
    	
     	$cart = Cart::add(['id' => $id, 'name' => $product->name, 'qty' => $request->quantity, 'price' => $product->price, 'options' => ['size' => $request->size,'color'=>$request->color,'price_sale' => $product->sale_price,'thumbnail' => $imageCart->thumbnail,'product_detail_id'=>$product_detail->id]]);
  // dd(Cart::content());
     	// $cart_content="";
     	// foreach ($product_img as $key => $ig) {
      //       $cart_content .='<li class="header-cart-item flex-w flex-t m-b-12"><div class="header-cart-item-img delete-cart" data-id="'.$ig->rowId.'"><img src="shop_assets/images/item-cart-03.jpg" alt="IMG"></div><div class="header-cart-item-txt p-t-8"><a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">'+response.product.name+'</a><span class="header-cart-item-info">'+response.cart.qty+' x $'+response.product.price+'</span><p>'+response.cart.options.size+' x '+response.cart.options.color+'</p></div></li>';
      //    };
     	return response()->json(['product'=>$product,'cart' =>$cart],200);
    }
     public function modaladd($id)
    {
       $product = Product::where('id',$id)->first();
       $product_detail = Product_detail::where('product_id',$id); 
       $sizeall = Product_detail::where('product_id',$product->id)->select('size_id')->distinct()->get();
       $colorall = Product_detail::where('product_id',$product->id)->select('color_id')->distinct()->get();
       $size = array();
       foreach ($sizeall as $key => $value) {
       	$namesize = Size::find($value->size_id);
       	array_push($size, $namesize->size);
       }
       $color = array();
       foreach ($colorall as $key => $value) {
       	$namecolor = Color::find($value->color_id);
       	array_push($color, $namecolor->color);
       }

       $product_images = Product_image::where('product_id',$id)->get();
       
      // dd($product_images->toArray());
      
       return response()->json(['product'=>$product,'size'=>$size,'color'=>$color,'product_detail'=>$product_detail,'product_images'=>$product_images],200);
    }
     public function destroy($id)
    {
    	
        Cart::remove($id);
    }
    public function detail(Request $request,$id){
    	 $product = Product::where('id',$id)->first();
       $product_detail = Product_detail::where('product_id',$id); 
       $sizeall = Product_detail::where('product_id',$product->id)->select('size_id')->distinct()->get();
       $colorall = Product_detail::where('product_id',$product->id)->select('color_id')->distinct()->get();
       $size = array();
       
       foreach ($sizeall as $key => $value) {
       	$namesize = Size::find($value->size_id);

       	array_push($size, $namesize);
       	
       }
        // dd($size);
       $color = array();
       foreach ($colorall as $key => $value) {
       	$namecolor = Color::find($value->color_id);
       	array_push($color, $namecolor->color);
       }

       $product_images = Product_image::where('product_id',$id)->get();
       // dd($size);
    	  return view('shop.detail',compact('product','size','color','product_detail','product_images'));
    }
     
     public function getcl(Request $request)
    {
    	$idsize = $request->idsize;
    	$idproduct = $request->idproduct;
    	$cl = Product_detail::where('product_id',$idproduct)->where('size_id',$idsize)->get();
    	 $color = array();
    	foreach ($cl as $key => $clo) {
    		$namecolor = Color::where('id',$clo->color_id)->get();

    		array_push($color, $namecolor);
    	}
    	
    	// dd($cl);
    
      return response()->json(['color'=>$color],200);  
    }
     public function getquantity(Request $request)
    {
    	$idsize = $request->idsize;
    	$idproduct = $request->idproduct;
    	$idcolor = $request->idcolor;

    	$quan = Product_detail::where('product_id',$idproduct)->where('size_id',$idsize)->where('color_id',$idcolor)->first();

    	
    
      return response()->json(['quan'=>$quan],200);  
    }
    public function shopcart()
    {
    	return view('shop.viewcart');
        
    }
     public function order(Request $request)
    {
       $this->validate($request,
        [
            'name_cus' => 'required',
            'mobile_cus' => 'required',
            'adress_cus' => 'required',

        ],

        [
        'required' => ':attribute Không được để trống',      
        ],

        [
            'name_cus' => 'Tên',
            'mobile_cus' => 'Số Điện Thoại',
            'adress_cus' => 'Địa Chỉ',

        ]

    );
    	$order = new Order;
    	$order->customer_id = 1;
    	$order->name = $request->name_cus;
    	$order->mobile = $request->mobile_cus;
    	$order->adress = $request->adress_cus;
    	$order->total_price = Cart::total();
    	$order->status = 0;
    	$order->bill_code = time().substr($request->mobile_cus, -4);
    	$order->save();
    	// dd(Cart::content());
    	foreach(Cart::content() as $row) {
    	
    	
    	
    	
    		$order_detail = new Order_detail;
    		
    		$productDetail = Product_detail::where('id',$row->options->product_detail_id)->first();
    	
    		$order_detail->order_code = $order->bill_code;
    		$order_detail->product_detail_id = $row->options->product_detail_id;
    		
    		$order_detail->product_id = $row->id;
    		$order_detail->product_code = $productDetail->product_code;
    		
    		$order_detail->quantity = $row->qty;
    		$order_detail->price = $row->price;
    		
    		$order_detail->save();
    		Cart::destroy();
		}
    	
    	

    	// return view('shop.viewcart');
        return redirect()->route('realpage');
        
    }
    public function update(Request $request,$id){
    	$quantity = $request->quantity;
    	$rowId = $id;

		$cart = Cart::update($rowId,$quantity);
    $total = Cart::total();
 		return response()->json(['cart'=>$cart,'qty'=>$quantity,'rowId'=>$rowId,'total'=> $total],200);
    }

}
