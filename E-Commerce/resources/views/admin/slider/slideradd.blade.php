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
						<label>Add Picture</label>
						<input type="file" name="slider_image" required="">
					</div>
					<div class="form-group">
						<label for="Product Catgory">Publication Status</label>
						<select name="slider_publication"class="form-control" required="">
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Add</button>
				</div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </section>
  @endsection