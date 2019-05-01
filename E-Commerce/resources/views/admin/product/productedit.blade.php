@extends('admin.layouts.app')
@section('main-content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Edit Product
        <small>Preview</small>
      </h2>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post"enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box-body">
					<div class="form-group">
						<label for="Product No">Product No</label>
						<input type="text" name="id" class="form-control" value="{{$products['id']}}">
					</div>
					<div class="form-group">
						<label for="Product No">Product Name</label>
						<input type="text" name="productname" class="form-control" value="{{$products['productname'].old('catname')}}">
					</div>
					<div class="form-group">
						<label for="Catgory Id">Catgory Id</label>
						<input type="text" name="catid" class="form-control"value="{{$products['catid']}}">

					</div>
					<div class="form-group">
						<label for="Catgory Id">Brand Id</label>
						<input type="text" name="manufacture_id" class="form-control"value="{{$products['manufacture_id']}}">

					</div>
					<div class="form-group">
						<label for="Product Price">Price</label>
						<input type="text" name="price" class="form-control" value="{{$products['price'].old('price')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Quantity</label>
						<input type="number" name="quantity" class="form-control" value="{{$products['quantity'].old('quantity')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Short Description</label>
						<input type="text" name="shortdescription" class="form-control" value="{{$products['shortdescription'].old('shortdescription')}}" />
					</div>
					<div class="form-group">
						<label for="Product Price">Long Description</label>
						<input name="longdescription" class="form-control" value="{{$products['longdescription'].old('longdescription')}}"/>
					</div>
					<div class="form-group">
						<label>Add Picture</label>
						<input type="file" name="myfile">
					</div>
					<div class="form-group">
						<label for="Product Catgory">Publication Status</label>
						<select name="publicationstatus"class="form-control"value="{{$products['publicationstatus'].old('publicationstatus')}}">
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
            </form>
            @foreach($errors->all() as $message)
           <font color="red"> {{$message}} <br/>
           @endforeach
          </div>
          </div>
        </div>
      </div>
    </section>
  @endsection