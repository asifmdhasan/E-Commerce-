<?php
$showslider=DB::table('sliders')
->where('slider_publication',1)
->get();
?>  
<section id="slider"><!--slider-->
    <div class="container">
      <div class="row"> 
         <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach( $showslider as $v_slider )
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" align="center">
                    @foreach( $showslider as $v_slider )
                        <div class="item {{ $loop->first ? ' active' : '' }}" >
                            <img src="{{ $v_slider->slider_image }}"  >
                        </div>
                    @endforeach
                </div>
                <!-- Controls -->

                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

         </div>
     </div>
 </section>
 <!-- end slide section -->﻿
