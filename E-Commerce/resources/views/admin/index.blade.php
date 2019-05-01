@extends('admin.layouts.app')
@section('main-content')


<h1 align="center"> Welcome Admin
<?php 
	$aname=Session::get('name');

	print_r($aname);
 
?>
 </h1>
 <h2 align="center">Here You Do All the Things</h2>

  @endsection
