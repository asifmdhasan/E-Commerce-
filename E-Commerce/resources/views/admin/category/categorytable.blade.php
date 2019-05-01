@extends('admin.layouts.app')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
		<h3>Data table</h3>
			
			<table  class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th>Category Id</th>
						<th>Category Name</th>
						<th>Category Description</th>
						<th>Publication Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($categories as $cat)
				<tbody>
                <tr>
				  <td align="center">{{$cat['catid']}}</td>
				  <td align="center">{{$cat['catname']}}</td>
				  <td align="center">{{$cat['catdescription']}}</td>
				  	<td align="center"> 
				  		@if($cat->catpublicationstatus==1)
				  			<a class="btn btn-success btn-sm" href="{{route('admin.unactive',$cat['catid'])}}">Active</a>
				  		@else
				  			<a class="btn btn-danger btn-sm" href="{{route('admin.active',$cat['catid'])}}">Unactive</a>
				  		@endif
				  </td>
				  <td align="center">
					<a href="{{route('admin.categoryedit',$cat['catid'])}}"><font color="blue">Edit</a> |
					<a href="{{route('admin.categorydelete',$cat['catid'])}}"><font color="red">Delete</a>
				  </td>
                </tr>
				</tbody>
			@endforeach
			</table>
		</div>
	</div>
</div>
@endsection