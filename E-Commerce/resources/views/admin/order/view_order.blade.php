@extends('admin.layouts.app')
@section('main-content')
	<div id="wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Customer Details
                        </div>
                        <div class="panel-body">
                          	<table class="table">
							  <thead>
								  <tr>
									  <th>Customer Name</th>
									  <th>Email</th>                                       
								  </tr>
							  </thead>   
							  <tbody>
								<tr>@foreach($order_by_id as $finishing)
							  	@endforeach
 									<td>{{$finishing->name}}</td>
 									<td>{{$finishing->email}}</td>                   
								</tr>                                
							  </tbody>
						 </table>	
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shiping Details
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
							  <thead>
								  <tr>

									  <th>Name</th>
									  <th>Address</th>
									  <th>Mobile</th> 
									   <th>City</th>           
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach($order_by_id as $finishing)
							  	@endforeach
  									<td>{{$finishing->first_name}}</td>
  									<td>{{$finishing->address}}</td>
  									<td>{{$finishing->phone}}</td>
  									<td>{{$finishing->city}}</td>
								     
								</tr>                          
							  </tbody>
						 </table> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Order Details
                        </div>
                        <div class="panel-body">  
						<table class="table table-striped ">
						  <thead>
							  <tr>
								  <th>Order Id</th>
								  <th>Product name</th>
								  <th>Product price</th>
								  <th>Product sales quantity</th>
								  <th>Product sub total</th>
							  </tr>
						  </thead> 
						  <tbody>
						  	
							  	@foreach($order_by_id as $finishing)
							<tr>
								<td>{{$finishing->order_id}}</td>
								<td>{{$finishing->productname}}</td>
								<td>{{$finishing->price}}</td>
								<td>{{$finishing->product_sales_quantity}}</td>	
								
								<td>{{$finishing->price * $finishing->product_sales_quantity}}</td>
							</tr>
							@endforeach
						  </tbody>
                          <tfoot>
                          	<tr>
                          	<td colspan="4">Total with vat: </td>
                          	<td>{{$finishing->order_total}}</td>
                          	</tr>
                          </tfoot> 
					  </table> 	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection