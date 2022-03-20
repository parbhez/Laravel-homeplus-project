@extends('backend.app')
@section('content')
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
		   <div class="qcv-wrapper">
		      <div class="row">
		         <div class="col-md-5 col-sm-6 col-xs-12">
		            <div class="" style="width:100%; margin-bottom: 40px">
		               <div class="tab-content">
		                  <div role="tabpanel" class="tab-pane active" id="image1">  <img src="assets/images/t1.jpg" class="img-responsive" alt="main image"> </div>
		                  <div role="tabpanel" class="tab-pane " id="image2">  <img class="img-responsive" src="assets/images/t2.jpg" alt="main image1"> </div>
		                  <div role="tabpanel" class="tab-pane " id="image3">  <img class="img-responsive" src="assets/images/t3.jpg" alt="main image2"> </div>
		                  <div role="tabpanel" class="tab-pane " id="image4">  <img class="img-responsive" src="assets/images/t1.jpg" alt="main image2"> </div>
		               </div>
		               <br> 
		               <div class="slider_area" style="padding: 0px 10px">
		                  <div id="normal-imglist2" class="util-carousel normal-imglist" role="tablist" >
		                     <div class="item">
		                        <a role="presentation" href="#image1" aria-controls="#image1" role="tab" data-toggle="tab"><img src="assets/images/t1.jpg" /></a>
		                     </div>
		                     <div class="item">
		                        <a role="presentation" href="#image2" aria-controls="#image2" role="tab" data-toggle="tab"><img src="assets/images/t2.jpg" alt="" /></a>
		                     </div>
		                     <div class="item">
		                        <a role="presentation" href="#image3" aria-controls="#image3" role="tab" data-toggle="tab"><img src="assets/images/t3.jpg" alt="" /></a>
		                     </div>
		                     <div class="item">
		                        <a role="presentation" href="#image4" aria-controls="#image4" role="tab" data-toggle="tab"><img src="assets/images/t1.jpg" alt="" /></a>
		                     </div>
		                  </div>
		               </div>
		            </div>
		         </div>
		         <div class="col-md-7 col-sm-6 col-xs-12">
		            <div class="description">
		               <div class="qcv-desc">
		                  <!-- Nav tabs -->
		                  <ul class="nav nav-tabs custom_tab de_padding" role="tablist">
		                     <li role="presentation" class="active"><a href="#pan1" aria-controls="pan1" role="tab" data-toggle="tab">Features</a></li>
		                     <li role="presentation"><a href="#pan2" aria-controls="pan2" role="tab" data-toggle="tab">Specification</a></li>
		                     <li role="presentation"><a href="#pan3" aria-controls="pan3" role="tab" data-toggle="tab">Support</a></li>
		                     <li role="presentation"><a href="#pan4" aria-controls="pan4" role="tab" data-toggle="tab">Comments</a></li>
		                  </ul>
		                  <!-- Tab panes -->
		                  <div class="tab-content " style="margin: 20px 0px">
		                     <div role="tabpanel" class="tab-pane active" id="pan1">
		                        <strong> Features: </strong>
		                        <p>  test   </p>
		                     </div>
		                     <div role="tabpanel" class="tab-pane" id="pan2">
		                        <strong> Specification </strong>
		                        <p>  test5   </p>
		                        <p>  test4   </p>
		                        <p>  test3   </p>
		                     </div>
		                     <div role="tabpanel" class="tab-pane" id="pan3">
		                        <strong> Support </strong>
		                        <p>  test  </p>
		                     </div>
		                     <div role="tabpanel" class="tab-pane" id="pan4">
		                        <strong> Comments </strong>
		                        <p>  
		                           <span class="rating" data-status="1" style="color:green;font-size:18px"><i class="fa fa-star-o"></i> </span>
		                           <span class="rating" data-status="2" style="color:green;font-size:18px"><i class="fa fa-star-o"></i></span>
		                           <span class="rating" data-status="3" style="color:green;font-size:18px"><i class="fa fa-star-o"></i></span>
		                           <span class="rating" data-status="4" style="color:green;font-size:18px"><i class="fa fa-star-o"></i></span>
		                           <span class="rating" data-status="5" style="color:green;font-size:18px"><i class="fa fa-star-o"></i></span>
		                           <span class="ratingAddStatus"></span>
		                        </p>
		                     </div>
		                  </div>
		               </div>
		               <div class="price-box">
		                  <span class="price">Tk 300</span>
		               </div>
		            </div>
		         </div>
		      </div>
		   </div>
		</div>
  </div>


<!-- / Start Modal Carousel JS-->
<script src="{{ asset('public/frontend/assets/js/jquery.utilcarousel.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.utilcarousel.function.js') }}"></script>
<!-- / End Modal Carousel JS-->
@endsection