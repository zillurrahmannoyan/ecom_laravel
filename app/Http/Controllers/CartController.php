<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart; 
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$qty = $request->qty;
    	$product_id = $request->product_id;
    	$product_info = DB::table('tbl_products')
    					->where('product_id', $product_id)
    					->first();
    	$data['qty'] = $qty;
    	$data['id']= $product_info->product_id;
    	$data['name']= $product_info->product_name;
    	$data['price']= $product_info->product_price;
    	$data['options']['image']= $product_info->product_image;

    	Cart::add($data);
    	echo "<pre>";
    	echo print_r($data);
    	echo "</pre>";
    	return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
    	$all_published_category = DB::table('tbl_category')
    							->where('publication_status', 1)
    							->get();
    	$manage_published_categorty   = view('pages.add_to_cart')
		->with('all_published_category',$all_published_category);
		return view('layout')->with('pages.add_to_cart',$manage_published_categorty);
    }

    public function delete_to_cart($rowId)
    {
    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request)
    {
    	$qty = $request->qty;
    	$rowId = $request->rowId;

		Cart::update($rowId,$qty);
    	return Redirect::to('/show-cart');
    }
}
