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
            <form method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box-body">
					<div class="form-group">
						<label for="Product No">Catgory No</label>
						<input type="text" name="catid" class="form-control" value="{{$categories['catid']}}">
					</div>
					<div class="form-group">
						<label for="Product Name">Catgory Name</label>
						<input type="text"name="catname"class="form-control"value="{{$categories['catname'].old('catname')}}">
					</div>
					<div class="form-group">
						<label for="Product Price">Catgory Description</label>
						<input type="text" name="catdescription" class="form-control" value="{{$categories['catdescription'].old('catdescription')}}">
						</div>
					<div class="form-group">
						<label for="Product Catgory">Publication Status</label>
						<select name="catpublicationstatus"class="form-control"value="{{$categories['catpublicationstatus']}}">
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
            </form>
			<div>
         @foreach($errors->all() as $message)
           <font color="red"> {{$message}} <br/>
           @endforeach
			</div>
          </div>
          </div>
        </div>
      </div>
    </section>
  @endsection