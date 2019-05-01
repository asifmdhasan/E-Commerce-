@extends('admin.layouts.app')
@section('main-content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Add Product
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
						<label for="Product No">Product Name</label>
						<input type="text" name="productname" class="form-control" placeholder="Product Name"value="{{old('productname')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Brand Id</label>
						<select name="manufacture_id" class="form-control">
							<option>Select Brand</option>
							<?php
								$brand=DB::table('manufactures')
								->where('manu_publicationstatus',1)
								->get();
								foreach ($brand as $ban) {?>

							<option value="{{ $ban->manufacture_id}}">{{ $ban->manufacture_name}}</option>
						<?php } ?>
						<select>
					</div>
					<div class="form-group">
						<label for="Product Price">Catgory Id</label>
						<select name="catid" class="form-control">
							<option>Select Catgory</option>
							@foreach($categories as $cat)
							<option value="{{$cat->catid}}">{{$cat->catname}}</option>
							@endforeach
						<select>
					</div>
					<div class="form-group">
						<label for="Product Price">Price</label>
						<input type="text" name="price" class="form-control" placeholder="Price"value="{{old('price')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Quantity</label>
						<input type="number" name="quantity" class="form-control" placeholder="Quantity"value="{{old('quantity')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Short Description</label>
						<textarea name="shortdescription" class="form-control" placeholder="Short Description"value="{{old('shortdescription')}}"></textarea>
					</div>
					<div class="form-group">
						<label for="Product Price">Long Description</label>
						<textarea name="longdescription" class="form-control" placeholder="Long Description"value="{{old('longdescription')}}"></textarea>
					</div>
					<div class="form-group">
						<label>Add Picture</label>
						<input type="file" name="myfile">
					</div>
					<div class="form-group">
						<label for="Product Catgory">Publication Status</label>
						<select name="publicationstatus"class="form-control"value="{{old('publicationstatus')}}">
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
            </form>
          </div>
          @foreach($errors->all() as $message)
           <font color="red"> {{$message}} <br/>
           @endforeach
          </div>
        </div>
      </div>
    </section>
  @endsection