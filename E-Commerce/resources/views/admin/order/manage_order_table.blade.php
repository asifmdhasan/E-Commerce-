@extends('admin.layouts.app')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
		<h3>Order table</h3>
			
			<table  class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th>Order Id</th>
						<th>Customer Name</th>
						<th>Order Total</th>
						<th> Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($order_info as $order)
				<tbody>
                <tr>
				  <td align="center">{{$order ->order_id}}</td>
				  <td align="center">{{$order -> name }}</td>
				  <td align="center">{{$order ->order_total }}</td>
				  <td align="center">
					<a href="{{route('view_order',$order -> order_id )}}"><font color="blue">View Specific</a>
				  </td>
                </tr>
				</tbody>
			@endforeach
			</table>
		</div>
	</div>
</div>
@endsection