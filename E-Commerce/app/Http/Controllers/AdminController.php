<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Manufacture;
use App\Order;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\CreateProductRequest;



class AdminController extends Controller
{
    public function index(Request $req){
        $this->admin_check();
    	return view('admin.index');
    }
    public function admin_check(){
        //$users = DB::table('reg')
           // ->where('name', $req->name)
            //->where('password', $req->password)
            //->first();  
        //if($users){
        $customer_id=session()->get('customer_id');
        if($customer_id){
            return;
        }else{
            return redirect()->route('login')->send();
        }
    }

	
	
	public function category(Request $req){
    	return view('admin.category.category');
    }
	public function addcategory(CreateCategoryRequest $req){
    	$categories = new Category;
    	$categories->catid = $req->catid;
    	$categories->catname = $req->catname;
    	$categories->catdescription = $req->catdescription;
    	$categories->catpublicationstatus = $req->catpublicationstatus;
    	$categories->save();
    	return redirect()->route('admin.categorytable');
    }
	public function categorytable(Request $req){
		//$cat=DB::table('categories')->paginate(5);
    	$cat = Category::all();
    	return view('admin.category.categorytable')->with('categories', $cat);
		//return view('admin.category.categorytable',['categories'=>$cat]);	
    }
	//==================================================
	//			update & delete category
	//==================================================
	
	public function categoryedit($catid){
    	$cat = Category::find($catid);
    	return view('admin.category.categoryedit')->with('categories', $cat);
    }
	public function categoryupdate(CreateCategoryRequest $req,$cat){
		$categories							= Category::find($cat);
    	$categories->catid 					= $req->catid;
    	$categories->catname 				= $req->catname;
    	$categories->catdescription 		= $req->catdescription;
    	$categories->catpublicationstatus 	= $req->catpublicationstatus;
		$categories->save();	
		return redirect()->route('admin.categorytable');
		
    }
	public function categorydelete($catid){
    	$cat = Category::find($catid);
    	return view('admin.category.categorydelete')->with('categories', $cat);
    }
	public function categorydestroy($catid){
    	$cat = Category::destroy($catid);
    	return redirect()->route('admin.categorytable');
    }
	
	public function unactive($catid){
		DB::table('categories')
		->where('catid',$catid)
		->update(['catpublicationstatus'=>0]);
		return redirect()->route('admin.categorytable');
    }

	public function active($catid){
		DB::table('categories')
		->where('catid',$catid)
		->update(['catpublicationstatus'=>1]);
		return redirect()->route('admin.categorytable');
    }
	
	//==================================================
	//		Product add show  update & delete category
	//==================================================
	
	public function productentry(Request $req){
		$cat = Category::where ('catpublicationstatus',1)->get();
    	return view('admin.product.productentry')->with('categories', $cat);
    }
	
	public function productadd(CreateProductRequest $req){
        $product_pic=Product::where('id',$req->id)->first();
        //$product_pic->myfile;
        if($picinfo=$req->file('myfile')){
            $pic_name=$picinfo->getClientOriginalName();
            $path="upload/";
            $url=$path.$pic_name;
            $picinfo->move($path,$pic_name);
        }
        else{
            echo "bal";
        }

    	$products = new Product;
    	$products->id = $req->id;
    	$products->manufacture_id = $req->manufacture_id;
    	$products->productname = $req->productname;
    	$products->catid = $req->catid;
    	$products->price = $req->price;
    	$products->quantity = $req->quantity;
    	$products->shortdescription = $req->shortdescription;
    	$products->longdescription = $req->longdescription;
		//$file = $req->file('myfile');
		//if($req->hasFile('myfile')){
		//	$url='upload/';
    	//	$file->move('upload', $file->getClientOriginalName());
    	//}else{
    	//	echo "error";
    	//}
		//$products->myfile = $url.$file->getClientOriginalName();;
        $products->myfile=$url;
    	$products->publicationstatus = $req->publicationstatus;
    	$products->save();
		return redirect()->route('admin.producttable');
    }
	
	public function producttable(Request $req){
		//$pro = Product::all();
		$data=DB::table('products')
    	->join('categories','categories.catid','=','products.catid')
    	->leftjoin('manufactures','manufactures.manufacture_id', '=','products.manufacture_id')
    	->get();
    	//->toArray();
    	//echo "<pre>";
    	//print_r($pro);
    	//echo "</pre>";

    	return view('admin.product.producttable', compact('data'));
    }
    public function productedit($proid){
    	    	$pro = Product::find($proid);
    	return view('admin.product.productedit')->with('products', $pro);
    }
    public function productupdate(CreateProductRequest $req,$pro){
        $product_pic=Product::where('id',$req->id)->first();
        $product_pic->myfile;
        if($picinfo=$req->file('myfile')){
            if(file_exists($product_pic->myfile)){
                unlink($product_pic->myfile);
            }
            $pic_name=$picinfo->getClientOriginalName();
            $path="upload/";
            $url=$path.$pic_name;
            $picinfo->move($path,$pic_name);
        }
        else{
            $url=$product_pic->myfile;
        }
        $products = Product::find($pro);
        $products->id = $req->id;
        $products->productname = $req->productname;
        $products->catid = $req->catid;
        $products->price = $req->price;
        $products->quantity = $req->quantity;
        $products->shortdescription = $req->shortdescription;
        $products->longdescription = $req->longdescription;
        $products->publicationstatus = $req->publicationstatus;
        $products->myfile=$url;
        $products->save();
        return redirect()->route('admin.producttable');


    }

    public function prounactive($id){
		DB::table('products')
		->where('id',$id)
		->update(['publicationstatus'=>0]);
		return redirect()->route('admin.producttable');
    }

	public function proactive($id){
		DB::table('products')
		->where('id',$id)
		->update(['publicationstatus'=>1]);
		return redirect()->route('admin.producttable');
    }

    public function productdelete($id){
    	$pro = Product::find($id);
    	return view('admin.product.productdelete')->with('products', $pro);
    }
	public function productdestroy($id){
    	$pro = Product::destroy($id);
    	return redirect()->route('admin.producttable');
    }

	
	//==================================================
	//		Brand add show  update & delete category
	//==================================================
	
	public function brandadd(Request $req){
    	return view('admin.brand.brandadd');
    }
    	public function addbrand(CreateBrandRequest $req){
    	$manufactures = new Manufacture;
    	$manufactures->manufacture_id = $req->manufacture_id;
    	$manufactures->manufacture_name = $req->manufacture_name;
    	$manufactures->manufacture_description = $req->manufacture_description;
    	$manufactures->manu_publicationstatus = $req->manu_publicationstatus;
    	$manufactures->save();
    	return redirect()->route('admin.brandtable');
    }
	public function brandtable(Request $req){
    	$brand = Manufacture::all();
    	return view('admin.brand.brandtable')->with('manufactures', $brand);
    }

    public function brandunactive($manufacture_id){
		DB::table('manufactures')
		->where('manufacture_id',$manufacture_id)
		->update(['manu_publicationstatus'=>0]);
		return redirect()->route('admin.brandtable');
    }

	public function brandactive($manufacture_id){
		DB::table('manufactures')
		->where('manufacture_id',$manufacture_id)
		->update(['manu_publicationstatus'=>1]);
		return redirect()->route('admin.brandtable');
    }


	public function brandedit($manufacture_id){
    	$brand = Manufacture::find($manufacture_id);
    	return view('admin.brand.brandedit')->with('manufactures', $brand);
    }
	public function brandupdate(CreateBrandRequest $req,$manufacture_id){
		$manufactures							= Manufacture::find($manufacture_id);
    	$manufactures->manufacture_id 					= $req->manufacture_id;
    	$manufactures->manufacture_name 				= $req->manufacture_name;
    	$manufactures->manufacture_description 		= $req->manufacture_description;
    	$manufactures->manu_publicationstatus 	= $req->manu_publicationstatus;
		$manufactures->save();	
		return redirect()->route('admin.brandtable');
    }
    public function branddelete($manufacture_id){
    	$brand = Manufacture::find($manufacture_id);
    	return view('admin.brand.branddelete')->with('manufactures', $brand);
    }
	public function branddestroy($manufacture_id){
    	$brand = Manufacture::destroy($manufacture_id);
    	return redirect()->route('admin.brandtable');
    }

    //==================================================
    //                  Order Control
    //==================================================


    public function manage_order_table(Request $req){
        $order_info=DB::table('orders')
        ->join('reg','orders.customer_id','=','reg.customer_id')
        ->select('orders.*','reg.name')
        ->get();
        return view('admin.order.manage_order_table', compact('order_info'));
    }

    public function view_order($order_id){
        //$orders = Order::find($order_id);
        //return view('admin.order.view_order')->with('orders', $orders);

        $order_by_id=DB::table('orders')
        ->join('reg','reg.customer_id','=','orders.customer_id')
        ->join('orders_details','orders_details.order_id','=','orders.order_id')
        ->join('shipping','shipping.ship_id','=','orders.ship_id')
        ->select('orders.*','reg.*','orders_details.*','shipping.*')
        ->get();
        //echo "<pre>";
       // print_r($order_by_id);
        //echo "</pre>";

        return view('admin.order.view_order', compact('order_by_id'));
        //return view('admin.order.view_order')->with('orders', $order_by_id);

    }

        public function search(Request $req){
            if($req->search){
                $searchs=DB::table('reg')
                ->where('name','like','%'.$req->search.'%')
                 ->orWhere('email','like','%'.$req->search.'%')
                 ->get();
                 if($searchs){
                    foreach ($searchs as $key => $search) {
                        echo '<tr><td>'.$search->name.'<td/><td>'.$search->email.'</td></tr>';
                    }
                 }
                // return view('home.index')->with('reg' $searchs);
            }
        }
}
