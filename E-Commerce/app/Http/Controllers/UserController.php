<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Http\Requests;
use Cart;
class UserController extends Controller
{
    public function index(Request $req){
    	return view('home.layouts.dynamic');
    }

    public function login(Request $req){
    	return view('home.login.login');
    }

    public function check(Request $req){
    	$data=array();
		$users = DB::table('reg')
			->where('name', $req->name)
			->where('password', $req->password)
			->first();	
		if($users){
			if($users->type=='1'){
				    session()->put('customer_id', $users->customer_id);
                    $req->session()->put('name', $req->name);
                    return redirect()->route('admin.index');
                }
				else{
				session()->put('customer_id', $users->customer_id);
				$req->session()->put('name', $req->name);
				return redirect()->route('check_out');
				}
			}	
		}

    public function category_by_products($catid){
    	$category_by_products=DB::table('products')
    	->join('categories','products.catid','=','categories.catid')
    	->leftjoin('manufactures','products.manufacture_id', '=','manufactures.manufacture_id')
    	->where('products.publicationstatus',1)
    	->where('categories.catid',$catid)
    	->get();
    	return view('home.home.category_by_products', compact('category_by_products'));
    }
        public function brand_by_products($manufacture_id){
    	$brand_by_products=DB::table('products')
    	->join('categories','products.catid','=','categories.catid')
    	->leftjoin('manufactures','products.manufacture_id', '=','manufactures.manufacture_id')
    	->where('products.publicationstatus',1)
    	->where('manufactures.manufacture_id',$manufacture_id)
    	->get();
    	return view('home.home.brand_by_products', compact('brand_by_products'));
    	//->toArray();
    	//echo "<pre>";
    	//print_r($category_by_products);
    	//echo "</pre>";
    }
    public function view_product($view_product){
    	$view_product=DB::table('products')
    	->join('categories','products.catid','=','categories.catid')
    	->leftjoin('manufactures','products.manufacture_id', '=','manufactures.manufacture_id')
    	->where('products.publicationstatus',1)
    	->where('products.id',$view_product)
    	->get();
    	return view('home.home.view_product', compact('view_product'));
    }
    public function add_to_cart(Request $req){
    	$quantity=$req->quantity;
    	$product_id=$req->id;
    	$product_info=DB::table('products')
    	->where('id',$product_id)
    	->first();
		$data['qty']=$quantity; 
		$data['id']=$product_info->id;		 // ami product id ta $product_info ekhan theke nibo
		$data['name']=$product_info->productname;
		$data['price']=$product_info->price;  
		$data['options']['image']=$product_info->myfile;     //[option] diye data receive kora jay na
		Cart::add($data); 
    	return redirect()->route('show_cart');
    	//echo "<pre>";
    	//print_r($product_info);
    	//echo "</pre>";
    }
        public function show_cart(Request $req){
        	$all_category=DB::table('categories')
        	->where('catpublicationstatus',1)
        	->get();
        return view('home.home.show_cart')->with('all_category');
        //return view('home.home.view_product', compact('view_product'));
    	//return view('home.home.show_cart');
    }
	public function cart_delete(Request $req,$rowId){
	     Cart::update($rowId,0);
        return view('home.home.show_cart');

    }
	public function update_cart(Request $req){
	     $qty=$req->qty;
	     $rowId=$req->rowId;
	     Cart::update($rowId, $qty);
        return view('home.home.show_cart');
    }

    public function check_out(Request $req){
        return view('home.home.check_out');
    }
    public function save_shipping(Request $req){
        $data=array();
        $data['email']=$req->email;
        $data['first_name']=$req->first_name;
        $data['last_name']=$req->last_name;
        $data['address']=$req->address;
        $data['phone']=$req->phone;
        $data['city']=$req->city;

        $shipping=DB::table('shipping')
        	->insertGetId($data);
        session()->put('ship_id', $shipping);
        return redirect()->route('payment');
    }
        public function payment(Request $req){
        $all_payment=DB::table('categories')
        	->where('catpublicationstatus',1)
        	->get();
        return view('home.home.payment')->with('all_payment');
    }
    public function order_place(Request $req){
    	//$containts=Cart::content(); //show cart value
    	//print_r($containts);
    	//echo "$payment_gateway";
    	//$ship_id=session()->get('ship_id');

    	$payment_gateway=$req->payment_method;
    	$data=array();
    	$data['payment_method']=$req->payment_method;
    	$data['payment_status']='pending';
    	$payment_id=DB::table('payments')
    		->insertGetId($data);

    	$order_data=array();
    	
    	$order_data['ship_id']=session()->get('ship_id');
    	$order_data['customer_id']=session()->get('customer_id');
       	$order_data['payment_id']=$payment_id;
    	$order_data['order_total']=Cart::total();
    	$order_data['order_status']=1;
    	$order_id=DB::table('orders')
    		->insertGetId($order_data);

  		$containts=Cart::content();
  		$order_details=array();
  		foreach ($containts as $all_containt) {
  			
  			$order_details['order_id']=$order_id;
  			$order_details['id']=$all_containt->id;
  			$order_details['productname']=$all_containt->name;
  			$order_details['price']=$all_containt->price;
  			$order_details['product_sales_quantity']=$all_containt->qty;

  			$all_cart_value_insert_database=DB::table('orders_details')
  				->insert($order_details);
  		}
  		if($payment_gateway=='handcash'){
  			Cart::destroy();
  			return view('home.home.thanks');
  		}elseif($payment_gateway=='debit'){
  			Cart::destroy();
  			return view('home.home.thanks');
  		}else{
  			Cart::destroy();
  			return view('home.home.thanks');
  		}
    }

}