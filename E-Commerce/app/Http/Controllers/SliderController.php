<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slider;

class SliderController extends Controller
{
    
	public function slideradd(Request $req){
		//$cat = Category::where ('catpublicationstatus',1)->get();
    	//return view('admin.slider.slideradd')->with('categories', $cat);
    	return view('admin.slider.slideradd');
    }
	
	public function addslider(Request $req){
    	$sliders = new Slider;
		$file = $req->file('slider_image');
		if($req->hasFile('slider_image')){
			$url='slider/';
    		$file->move('slider', $file->getClientOriginalName());
    	}else{
    		echo "error";
    	}
		$sliders->slider_image = $url.$file->getClientOriginalName();
    	$sliders->slider_publication = $req->slider_publication;
    	$sliders->save();
		return redirect()->route('admin.slidertable');
    }
	
	public function slidertable(Request $req){
    	$sliders = Slider::all();
    	return view('admin.slider.slidertable')->with('sliders', $sliders);
    }

    public function sliderunactive($slider_id){
		DB::table('sliders')
		->where('slider_id',$slider_id)
		->update(['slider_publication'=>0]);
		return redirect()->route('admin.slidertable');
    }

	public function slideractive($slider_id){
		DB::table('sliders')
		->where('slider_id',$slider_id)
		->update(['slider_publication'=>1]);
		return redirect()->route('admin.slidertable');
    }


}
