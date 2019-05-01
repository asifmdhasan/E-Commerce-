@extends('admin.layouts.app')
@section('main-content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Add Brand
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
            <form method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box-body">
					<div class="form-group">
						<label for="Product No">Brand Name</label>
						<input type="text" name="manufacture_name" class="form-control" placeholder="Product Name"value="{{old('manufacture_name')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Brand Description</label>
						<textarea name="manufacture_description" class="form-control" placeholder="Product Price" value="{{old('manufacture_description')}}"></textarea>
					</div>
					<div class="form-group">
						<label for="Product Catgory">Publication Status</label>
						<select name="manu_publicationstatus"class="form-control">
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
            </form>
          </div>
          @foreach($errors->all() as $message)
            {{$message}} <br/>
           @endforeach
          </div>
        </div>
      </div>
    </section>
  @endsection