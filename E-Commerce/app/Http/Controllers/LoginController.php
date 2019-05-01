<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
class LoginController extends Controller
{
    public function register(Request $req){
    	$data=array();
    	$data['name']=$req->name;
    	$data['password']=$req->password;
    	$data['email']=$req->email;
    	$data['type']=$req->type;
    	$customer_id=DB::table('reg')
    	->insertGetId($data);
		session()->put('customer_id', $customer_id);
    	$req->session()->put('name', $req->name);
    	return redirect()->route('check_out');
	}
	public function logout(Request $req){
    	//$req->session()->flush();
        Session::flush();
    	return redirect()->route('login');
    }	
}

