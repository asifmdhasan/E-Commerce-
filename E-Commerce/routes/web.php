<?php
Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/admin.addsellinfo','AdminController@addsellinfo')->name('admin.addsellinfo');
Route::post('/admin.addsellinfo','AdminController@sellinfo');
Route::get('/admin.selltable','AdminController@selltable')->name('admin.selltable');

Route::get('/admin.addreport','AdminController@addreport')->name('admin.addreport');
Route::post('/admin.addreport','AdminController@createreport');
Route::get('/admin.reporttable','AdminController@reporttable')->name('admin.reporttable');

Route::get('/admin.transfer', 'AdminController@transfer')->name('admin.transfer');
Route::post('/admin.transfer','AdminController@transfermoney');
Route::get('/admin.customeracc','AdminController@customeracc')->name('admin.customeracc');
Route::post('/admin.customeracc','AdminController@customeraccount');

				//=================================================
				//						Category
				//=================================================

Route::get('/admin.category','AdminController@category')->name('admin.category');
Route::post('/admin.category','AdminController@addcategory');
Route::get('/admin.categorytable','AdminController@categorytable')->name('admin.categorytable');
Route::get('/admin.{catid}.categoryedit','AdminController@categoryedit')->name('admin.categoryedit');
Route::post('/admin.{catid}.categoryedit','AdminController@categoryupdate');
Route::get('/admin.{catid}.categorydelete','AdminController@categorydelete')->name('admin.categorydelete');
Route::post('/admin.{catid}.categorydelete','AdminController@categorydestroy');

Route::get('/admin.{catid}.unactive','AdminController@unactive')->name('admin.unactive');
Route::get('/admin.{catid}.active', 'AdminController@active')->name('admin.active');


				//=================================================
				//						Product
				//=================================================

Route::get('/admin.productentry','AdminController@productentry')->name('admin.productentry');
Route::post('/admin.productentry','AdminController@productadd');
Route::get('/admin.producttable','AdminController@producttable')->name('admin.producttable');
Route::get('/admin.{id}.productedit','AdminController@productedit')->name('admin.productedit');
Route::post('/admin.{id}.productedit','AdminController@productupdate');
Route::get('/admin.{id}.productdelete','AdminController@productdelete')->name('admin.productdelete');
Route::post('/admin.{id}.productdelete','AdminController@productdestroy');
Route::get('/admin.{id}.prounactive','AdminController@prounactive')->name('admin.prounactive');
Route::get('/admin.{id}.proactive','AdminController@proactive')->name('admin.proactive');

				//=================================================
				//						Brand
				//=================================================

Route::get('/admin.brandadd','AdminController@brandadd')->name('admin.brandadd');
Route::post('/admin.brandadd','AdminController@addbrand');
Route::get('/admin.brandtable','AdminController@brandtable')->name('admin.brandtable');
Route::get('/admin.{manufacture_id}.brandedit','AdminController@brandedit')->name('admin.brandedit');
Route::post('/admin.{manufacture_id}.brandedit','AdminController@brandupdate');
Route::get('/admin.{manufacture_id}.branddelete','AdminController@branddelete')->name('admin.branddelete');
Route::post('/admin.{manufacture_id}.branddelete','AdminController@branddestroy');
Route::get('/admin.{manufacture_id}.brandunactive','AdminController@brandunactive')->name('admin.brandunactive');
Route::get('/admin.{manufacture_id}.brandactive','AdminController@brandactive')->name('admin.brandactive');
				
				//=================================================
				//						Slider
				//=================================================

Route::get('/admin.slideradd','SliderController@slideradd')->name('admin.slideradd');
Route::post('/admin.slideradd','SliderController@addslider');
Route::get('/admin.slidertable','SliderController@slidertable')->name('admin.slidertable');
Route::get('/admin.{slider_id}.sliderunactive','SliderController@sliderunactive')->name('admin.sliderunactive');
Route::get('/admin.{slider_id}.slideractive','SliderController@slideractive')->name('admin.slideractive');

				//=================================================
				//						Order
				//=================================================

Route::get('/manage_order', 'AdminController@manage_order')->name('manage_order');
Route::get('/manage_order_table', 'AdminController@manage_order_table')->name('manage_order_table');
Route::get('/view_order.{order_id}','AdminController@view_order')->name('view_order');

				//=================================================
				//						User
				//=================================================

Route::get('/', 'UserController@index')->name('home');
Route::get('/category_by_products.{catid}', 'UserController@category_by_products');
Route::get('/brand_by_products.{manufacture_id}', 'UserController@brand_by_products');
Route::get('/view_product.{id}', 'UserController@view_product');
Route::post('/add-to-cart', 'UserController@add_to_cart');
Route::get('/show_cart', 'UserController@show_cart')->name('show_cart');
Route::get('/cart_delete.{rowId}', 'UserController@cart_delete')->name('cart_delete');
Route::post('/update-cart', 'UserController@update_cart');
Route::get('/check_out', 'UserController@check_out')->name('check_out');
Route::post('/save_shipping', 'UserController@save_shipping');
Route::get('/payment', 'UserController@payment')->name('payment');
Route::post('/order_place', 'UserController@order_place');
//Route::get('/thanks', 'UserController@thanks')->name('payment');


				//=================================================
				//						Login Reg
				//=================================================

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login_check', 'UserController@check');
Route::post('/reg', 'LoginController@register');
Route::get('/logout', 'LoginController@logout')->name('logout');


				//=================================================
				//						Ajax
				//=================================================

Route::post('/search', 'AdminController@search');