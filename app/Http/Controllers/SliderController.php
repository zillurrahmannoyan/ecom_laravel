<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
	public function index()
	{
		return view('admin.add_slider');
	}
// Add Slider -------------------------------------
	public function save_slider(Request $request)
	{
		$data=array();
		$data['publacation_status']=$request->publacation_status;
		$image = $request->file('slider_image');
		if($image){
			$image_name=str_random(20);
			$extension =  $request->file('slider_image')->getClientOriginalExtension(); 
			$fileName =  $image_name.'.jpg';
			$upload_path='slider/';
			$img_url=$upload_path.$fileName;
			$success=$image->move($upload_path,$fileName);
			if($success)
			{
				$data['slider_image']=$img_url;
				DB::table('tbl_slider')->insert($data);
				Session::put('message', 'Slider added Successfully !');
				return Redirect::to('/add-slider');
    					 // echo "<pre>";
    					 // print_r($ext);
    					 // echo "</pre>";
    					 // exit();
			}
		}
		$data['slider_image']='';
		DB::table('tbl_slider')->insert($data);
		Session::put('message', 'Slider added Successfully Without Image !');
		return Redirect::to('/add-slider');
	}
// All Slider Show -------------------------------------
	public function all_slider()
	{
    	$all_slider = DB::table('tbl_slider')->get();
    	$manage_slider   = view('admin.all_slider')
    						 ->with('all_slider',$all_slider);
    	return view('admin_layout')->with('admin.all_slider',$manage_slider);

	}
// UnActive Slider -------------------------------------
	public function unactive_slider($slider_id)
    {
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publacation_status'=> 0]);
    	Session::put('message', 'Slider Unactive Successfully !!');
    	return Redirect::to('all-slider');
    }
// Active Slider -------------------------------------
    public function active_slider($slider_id)
    {
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publacation_status'=> 1]);
    	Session::put('message', 'Slider Active Successfully !!');
    	return Redirect::to('all-slider');
    }
// Delete Slider -------------------------------------
     public function delete_slider($slider_id)
    {
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
    	Session::get('message', 'Slider Delete Successfully !!');
    	return Redirect::to('/all-slider');
    }

  

}
