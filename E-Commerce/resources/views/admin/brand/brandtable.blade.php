@extends('admin.layouts.app')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
		<h3>Brand table</h3>
			
			<table  class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th>Brand Id</th>
						<th>Brand Name</th>
						<th>Brand Description</th>
						<th>Publication Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($manufactures as $brand)
				<tbody>
                <tr>
				  <td align="center">{{$brand['manufacture_id']}}</td>
				  <td align="center">{{$brand['manufacture_name']}}</td>
				  <td align="center">{{$brand['manufacture_description']}}</td>
				  	<td align="center"> 
				  		@if($brand->manu_publicationstatus==1)
				  			<a class="btn btn-success btn-sm" href="{{route('admin.brandunactive',$brand['manufacture_id'])}}">Active</a>
				  		@else
				  			<a class="btn btn-danger btn-sm" href="{{route('admin.brandactive',$brand['manufacture_id'])}}">Unactive</a>
				  		@endif
				  </td>
				  <td align="center">
					<a href="{{route('admin.brandedit',$brand['manufacture_id'])}}"><font color="blue">Edit</a> |
					<a href="{{route('admin.branddelete',$brand['manufacture_id'])}}"><font color="red">Delete</a>
				  </td>
                </tr>
				</tbody>
			@endforeach
			</table>
		</div>
	</div>
</div>
@endsection