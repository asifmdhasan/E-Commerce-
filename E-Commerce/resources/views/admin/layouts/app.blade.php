<?php 
session_start();
if(session()->get('customer_id')!=null){?>
@include('admin.layouts.head')
	@include('admin.layouts.sidebar')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
					@section('main-content')
					@show
                </div>
            </div>
        </div>
  	@include('admin.layouts.footer')
<?php 
}else{
    return redirect()->route('login');
}
?>