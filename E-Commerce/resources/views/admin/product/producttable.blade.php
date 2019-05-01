@extends('admin.layouts.app')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
		<h3>Data table</h3>
			
			<table  class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th>Id</th>
						<th> Name</th>
						<th>Product Picture</th>
						<th>Category Name</th>

						<th>Brand Name</th>
						<th> Price</th>
						<th> Quantity</th>
						<th>Short Description</th>
						<th>Long Description</th>
						
						<th> Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($data as $pro)
				<tbody>
                <tr>
				  <td align="center">{{$pro ->id}}</td>
				  <td align="center">{{$pro -> productname }}</td>
				  <td align="center"><img src="{{asset($pro->myfile)}}" style="height:50px;width:50px"alt=" no image"/></td>
				  <td align="center">{{$pro ->catname }}</td>
				  <td align="center">{{$pro ->  manufacture_name }}</td>	
				  <td align="center">{{$pro  ->price }}</td>
				  <td align="center">{{$pro  ->quantity }}</td>
				  <td align="center">{{$pro ->  shortdescription }}</td>
				  <td align="center">{{$pro ->  longdescription }}</td>
				  
				  <td align="center"> 
				  	@if($pro->publicationstatus==1)
				  		<a class="btn btn-success btn-sm" href="{{route('admin.prounactive',$pro ->id)}}">Active
				  	@else
				  		<a class="btn btn-danger btn-sm" href="{{route('admin.proactive',$pro->id)}}">Unactive</a>
				  	@endif
				  </td>
				  <td align="center">
					<a href="{{route('admin.productedit',$pro -> id )}}"><font color="blue">Edit</a> |
					<a href="{{route('admin.productdelete',$pro ->id )}}"><font color="red">Delete</a>
				  </td>
                </tr>
				</tbody>
			@endforeach
			</table>
		</div>
	</div>
</div>
@endsection