@extends('admin.layouts.app')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
		<h3>Slider table</h3>
			
			<table  class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th>Id</th>
						<th>Product Picture</th>	
						<th> Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($sliders as $sli)
				<tbody>
                <tr>
                  <td align="center">{{$sli ->slider_id}}</td>
				  <td align="center"><img src="{{asset($sli->slider_image)}}" style="height:300px;width:300px"alt=" no image"/></td>
				  <td align="center"> 
				  	@if($sli->slider_publication==1)
				  		<a class="btn btn-success btn-sm" href="{{route('admin.sliderunactive',$sli ->slider_id)}}">Active
				  	@else
				  		<a class="btn btn-danger btn-sm" href="{{route('admin.slideractive',$sli->slider_id)}}">Unactive</a>
				  	@endif
				  </td>
				  <td align="center">
					<a href="{{route('admin.productedit',$sli -> id )}}"><font color="blue">Edit</a> |
					<a href="{{route('admin.productdelete',$sli ->id )}}"><font color="red">Delete</a>
				  </td>
                </tr>
				</tbody>
			@endforeach
			</table>
		</div>
	</div>
</div>
@endsection