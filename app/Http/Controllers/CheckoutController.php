<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\support\Facades\Redirect;
session_start();
class CheckoutController extends Controller 
{
    public function login_check()
    {
    	return view('pages.login');
    }


    public function customer_registation(Request $request)
    {
    	$data = array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['password']=md5($request->password);
    	$data['mobile_number']=$request->mobile_number;

    	$customer_id = DB::table('tbl_customer')
    				 ->insertGetId($data);

    		Session::put('customer_id' , $customer_id);
    		Session::put('customer_name' , $request->customer_name);
    		return Redirect::to('/checkout');
    }

    public function checkout()
    {
  //   	$all_published_category = DB::table('tbl_category')
  //   							->where('publication_status', 1)
  //   							->get();
  //   	$manage_published_categorty   = view('pages.add_to_cart')
		// ->with('all_published_category',$all_published_category);
    	return view('pages.checkout');
    }

    public function save_shipping_detials(Request $request)
    {
    	$data=array();
    	$data['shipping_email']=$request->shipping_email;
    	$data['shipping_first_name']=$request->shipping_first_name;
    	$data['shipping_last_name']=$request->shipping_last_name;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_mobile_number']=$request->shipping_mobile_number;
    	$data['shipping_city']=$request->shipping_city;

    	// echo "<pre>";
    	// echo print_r($data);
    	// echo "</pre>";
    	$shipping_id = DB::table('tbl_shipping')
    				->insertGetId($data);
    			Session::put('shipping_id', $shipping_id);
    	return Redirect::to('/payment');
    }

    public function customer_login(Request $request)
    {
    	$customer_email = $request->customer_email;
    	$password = md5($request->password);

    	$request=DB::table('tbl_customer')
    			->where('customer_email', $customer_email)
    			->where('password', $password)
    			->first();

    			if($request)
    			{
    				Session::put('customer_id', $request->customer_id);
    				return Redirect::to('/checkout');
    			}
    			else
    			{
    				return Redirect::to('/login-check');
    			}

    			// echo "<pre>";
    			// echo print_r($request);
    			// echo "</pre>";
    }

    public function payment()
    {
  //   	$all_published_category = DB::table('tbl_category')
  //   							->where('publication_status', 1)
  //   							->get();
  //   	$manage_published_categorty   = view('pages.payment')
		// ->with('all_published_category',$all_published_category);('layout')->with
		return view('pages.payment');
    }

    public function order_place(Request $request)
    {
    	$payment_getway = $request->payment_method;
    	//$shipping_id = Session::get('shipping_id');
    	// echo $payment_getway;
    	// echo "<pre>";
    	// echo $shipping_id;
    	// echo "</pre>";
    	$pdata=array();
    	$pdata['payment_method']=$payment_getway;
    	$pdata['payment_status']='pending';
		$payment_id =DB::table('tbl_payment')
    					 		->insertGetId($pdata);

    	$odata=array();
    	$odata['customer_id']=Session::get('customer_id');
    	$odata['shipping_id']=Session::get('shipping_id');
    	$odata['payment_id']=$payment_id;
    	$odata['order_total']=Cart::total();
    	$odata['order_status']='pending';

    	$order_id = DB::table('tbl_order')
    				   ->insertGetId($odata);
    	$contents = Cart::content();
    	$oddata=array();
    	foreach ($contents as $v_content) 
    	{
    		 $odata['order_id']=$order_id;
    		 $odata['product_id']=$v_content->id;
    		 $odata['product_name']=$v_content->name;
    		 $odata['product_price']=$v_content->price;
    		 $odata['product_sales_quantity']=$v_content->qty;

    		 DB::table('tbl_order_detials')
    		 		->insert($oddata);
    	}
    	if ($payment_getway=='paypal') {
    		Cart::destroy();
    		return view('pages.paypal');
    		
    	}
    	elseif($payment_getway=='mastercard')
    	{
    		Cart::destroy();
    		return view('pages.mastercard');

    	}
    	elseif($payment_getway=='handcash')
    	{
    		Cart::destroy();
    		return view('pages.handcash');

    	}
    	elseif($payment_getway=='vishwa')
    	{
    		Cart::destroy();
    		return view('pages.vishwa');

    	}
    	elseif($payment_getway=='bkash')
    	{
    		Cart::destroy();
    		return view('pages.bkash');

    	}
    	else
    	{
    		echo "No Checked";
    	}
    }

    public function customer_logout()
    {
    	Session::flush();
    	return Redirect::to('/');
    	
    }

}
