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
use Carbon\Carbon;
use App\Order_detail;
use DB;
class BillController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function index()
    {
        return view('admin.bill.index');
    }
    public function getlist()
        {
           
            $order = Order::orderBy('id','desc');
            return datatables()->of($order)
            ->addColumn('action' ,function(order $order){
                return '
                <a href="'.asset('/admin/delbill/'.$order->bill_code.'').'" class="btn btn-danger">delete</a>';})
            ->editColumn('status' ,function(order $order){
                if($order->status==0){
                	 return'<td><a href="'.asset('/admin/checkbill/'.$order->bill_code.'').'" class="btn btn-primary fa fa-motorcycle"></a></td>';
                }elseif ($order->status==1) {
                	return'<td><a class="btn btn-success fa fa-check"></a></td>';
                }    
            })->rawColumns(['status', 'action'])->toJson();
                                    
        }
    public function check($id)
   	{
   		$order = Order::where('bill_code',$id)->first();
   		// dd($order->bill_code);
   		$orDetails = Order_detail::where('order_code',$id)->get();
    	$tDetails = Product_detail::all();
    	$products = Product::all();  
    	// $pDetails[];
    	foreach($orDetails as $value){
    		$pDetails[$value->product_detail_id] = $value->product_detail_id; 
    	}
    	// dd($pDetails);
    	$sizes = Size::all();
    	$colors = Color::all();

    	return view('admin.bill.checkbill',compact('orDetails','sizes','colors','pDetails','tDetails','products','order'));
	}

	 public function process($id)
   	{
   		
    	$order = Order::where('bill_code',$id)->first();
    	$order->status = 1;
    	$orDetails = Order_detail::where('order_code',$id)->get();
    	foreach ($orDetails as $key => $orDetail) {
    		$product_detail = Product_detail::where('id' , $orDetail->product_detail_id)->get();
    		foreach ($product_detail as $key => $detail) {
    			$detail->quantity = $detail->quantity-$orDetail->quantity;
    		
    		$detail->save();
    		}
    		
    	}
    	$order->save();
    	
    	return redirect()->route('bill.index');
	}
	 public function delbill($id)
   	{
   		
    	$order = Order::where('bill_code',$id)->first();
    	$order->delete();
    	
    	return redirect()->route('bill.index');
	}
	 public function statistic()
   	{
        $newOrder = count(Order::where('status',0)->get()); // 1
        $currentMonth = date('m');
        $currentDay = date('d');
        $totalOrder = count(DB::table('orders')->whereMonth('created_at', $currentMonth)->where('status',1)->get()); //2
        // dd($totalOrder);
        $totalMonth = number_format(DB::table('orders')->whereMonth('created_at', $currentMonth)->sum('total_price'));//3
        $totalDay = number_format(DB::table('orders')->whereDay('created_at', $currentDay)->sum('total_price'));//4

        // 

   		$products = Product::all();
        foreach ($products as $product) {
            $quantity = Order_detail::where('product_id',$product->id)->sum('quantity');
            $product->qtt = $quantity;

            
        }
      
      $array = collect($products)->sortBy('qtt')->reverse()->take(4)->toArray();
        
    	
  

       

    	return view('admin.statistic.index',compact('products','array','newOrder','currentMonth','currentDay','totalOrder','totalDay','totalMonth'));
	}
   
}