 @extends('frontend.app')
  @section('content')
      <!-- /snippets/breadcrumb.liquid -->
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <nav class="breadcrumb" aria-label="breadcrumbs">
               <a href="../bstore-8_myshopify_default.html" title="Back to the frontpage">Home</a>
               <span aria-hidden="true"><i class="fa fa-caret-right"></i></span>
               <span>Collections</span>
            </nav>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>baby</span>
                  <a href="baby.htm" title="Browse our baby collection">More baby <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="baby/products/apple-watch.htm">
                        <img src="public/frontend/assets/images/baby1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#apple-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action='{{ URL::to("cart") }}' method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461249">s / black / men - Tk 720.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618305"></span>
                           </div>
                        </div>
                        <a href="baby/products/apple-watch.htm">Apple watch</a>
                        <div class="price-box">
                           <span class="price">Tk 720.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 750.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="baby/products/baby-watch.htm">
                        <img src="public/frontend/assets/images/baby2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#baby-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508459777">s / black / baby - Tk 200.00</option>
                                       <option value="16508459841">m / black / baby - Tk 200.00</option>
                                       <option value="16508459905">xl / black / baby - Tk 200.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617537"></span>
                           </div>
                        </div>
                        <a href="baby/products/baby-watch.htm">baby watch</a>
                        <div class="price-box">
                           <span class="price">Tk 200.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 220.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="baby/products/gary-summer-shoes.htm">
                        <img src="public/frontend/assets/images/baby3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#gary-summer-shoes"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460289">yellow / l - Tk 860.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617793"></span>
                           </div>
                        </div>
                        <a href="baby/products/gary-summer-shoes.htm">gary summer shoes</a>
                        <div class="price-box">
                           <span class="price">Tk 860.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="baby/products/leather-man-wacth.htm">
                        <img src="public/frontend/assets/images/baby4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-man-wacth"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460097">pink / s - Tk 570.00</option>
                                       <option value="16508460161">orange / s - Tk 570.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617665"></span>
                           </div>
                        </div>
                        <a href="baby/products/leather-man-wacth.htm">leather man wacth</a>
                        <div class="price-box">
                           <span class="price">Tk 570.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 600.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>Best Seller</span>
                  <a href="best-seller.htm" title="Browse our Best Seller collection">More Best Seller <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="best-seller/products/luxury-watch.htm">
                        <img src="public/frontend/assets/images/best-sale1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#luxury-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461441">white / xl - Tk 850.00</option>
                                       <option value="16508461505">red / xl - Tk 850.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618497"></span>
                           </div>
                        </div>
                        <a href="best-seller/products/luxury-watch.htm">Luxury watch</a>
                        <div class="price-box">
                           <span class="price">Tk 850.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="best-seller/products/men-shoes.htm">
                        <img src="public/frontend/assets/images/best-sale2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#men-shoes"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508459393">l / pink / men - Tk 450.00</option>
                                       <option value="16508459457">l / gray / men - Tk 450.00</option>
                                       <option value="16508459521">s / pink / men - Tk 450.00</option>
                                       <option value="16508459585">s / gray / men - Tk 450.00</option>
                                       <option value="16508459649">xl / pink / men - Tk 450.00</option>
                                       <option value="16508459713">xl / gray / men - Tk 450.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617473"></span>
                           </div>
                        </div>
                        <a href="best-seller/products/men-shoes.htm">Men shoes</a>
                        <div class="price-box">
                           <span class="price">Tk 450.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 500.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="best-seller/products/short-selve-t-shirt.htm">
                        <img src="public/frontend/assets/images/best-sale3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#short-selve-t-shirt"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461889">red / l - Tk 500.00</option>
                                       <option value="16508461953">gray / l - Tk 500.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618753"></span>
                           </div>
                        </div>
                        <a href="best-seller/products/short-selve-t-shirt.htm">Mohilader hill</a>
                        <div class="price-box">
                           <span class="price">Tk 500.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 600.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="best-seller/products/printed-summer-t-shirt.htm">
                        <img src="public/frontend/assets/images/best-sale4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#printed-summer-t-shirt"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460929">yellow / xl - Tk 350.00</option>
                                       <option value="16508460993">blue / xl - Tk 350.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618113"></span>
                           </div>
                        </div>
                        <a href="best-seller/products/printed-summer-t-shirt.htm">Printed Summer T-Shirt</a>
                        <div class="price-box">
                           <span class="price">Tk 350.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 380.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>Featured Product</span>
                  <a href="featured-product.htm" title="Browse our Featured Product collection">More Featured Product <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="featured-product/products/apple-watch.htm">
                        <img src="public/frontend/assets/images/featured1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#apple-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461249">s / black / men - Tk 720.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618305"></span>
                           </div>
                        </div>
                        <a href="featured-product/products/apple-watch.htm">Apple watch</a>
                        <div class="price-box">
                           <span class="price">Tk 720.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 750.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="featured-product/products/baby-watch.htm">
                        <img src="public/frontend/assets/images/featured2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#baby-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508459777">s / black / baby - Tk 200.00</option>
                                       <option value="16508459841">m / black / baby - Tk 200.00</option>
                                       <option value="16508459905">xl / black / baby - Tk 200.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617537"></span>
                           </div>
                        </div>
                        <a href="featured-product/products/baby-watch.htm">baby watch</a>
                        <div class="price-box">
                           <span class="price">Tk 200.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 220.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="featured-product/products/gary-summer-shoes.htm">
                        <img src="public/frontend/assets/images/featured3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#gary-summer-shoes"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460289">yellow / l - Tk 860.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617793"></span>
                           </div>
                        </div>
                        <a href="featured-product/products/gary-summer-shoes.htm">gary summer shoes</a>
                        <div class="price-box">
                           <span class="price">Tk 860.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="featured-product/products/leather-man-wacth.htm">
                        <img src="public/frontend/assets/images/featured4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-man-wacth"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460097">pink / s - Tk 570.00</option>
                                       <option value="16508460161">orange / s - Tk 570.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617665"></span>
                           </div>
                        </div>
                        <a href="featured-product/products/leather-man-wacth.htm">leather man wacth</a>
                        <div class="price-box">
                           <span class="price">Tk 570.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 600.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>men</span>
                  <a href="men.htm" title="Browse our men collection">More men <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="men/products/baby-dress.htm">
                        <img src="public/frontend/assets/images/men1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#baby-dress"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508458497">s / pink / baby - Tk 600.00</option>
                                       <option value="16508458561">s / red / baby - Tk 620.00</option>
                                       <option value="16508458625">m / pink / baby - Tk 700.00</option>
                                       <option value="16508458689">m / red / baby - Tk 730.00</option>
                                       <option value="16508458753">l / pink / baby - Tk 750.00</option>
                                       <option value="16508458817">l / red / baby - Tk 770.00</option>
                                       <option value="16508458881">xl / pink / baby - Tk 800.00</option>
                                       <option value="16508458945">xl / red / baby - Tk 800.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617345"></span>
                           </div>
                        </div>
                        <a href="men/products/baby-dress.htm">baby dress</a>
                        <div class="price-box">
                           <span class="price">Tk 600.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 850.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="men/products/digital-watch.htm">
                        <img src="public/frontend/assets/images/men2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#digital-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461633">red / m - Tk 200.00</option>
                                       <option value="16508461697">gray / m - Tk 200.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618625"></span>
                           </div>
                        </div>
                        <a href="men/products/digital-watch.htm">Digital Watch</a>
                        <div class="price-box">
                           <span class="price">Tk 200.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 250.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="men/products/high-quality-watch.htm">
                        <img src="public/frontend/assets/images/men3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#high-quality-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460353">blue / xl - Tk 940.00</option>
                                       <option value="16508460417">black / xl - Tk 940.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617857"></span>
                           </div>
                        </div>
                        <a href="men/products/high-quality-watch.htm">high quality watch</a>
                        <div class="price-box">
                           <span class="price">Tk 940.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 995.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="men/products/leather-women-bag.htm">
                        <img src="public/frontend/assets/images/men4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sold Out</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-women-bag"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460673">green / m - Tk 550.00</option>
                                       <option value="16508460737">beige / m - Tk 550.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617985"></span>
                           </div>
                        </div>
                        <a href="men/products/leather-women-bag.htm">leather women bag</a>
                        <div class="price-box">
                           <span class="price"> Tk 550.00 </span> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>New Product</span>
                  <a href="new-product.htm" title="Browse our New Product collection">More New Product <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="new-product/products/baby-dress.htm">
                        <img src="public/frontend/assets/images/new1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#baby-dress"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508458497">s / pink / baby - Tk 600.00</option>
                                       <option value="16508458561">s / red / baby - Tk 620.00</option>
                                       <option value="16508458625">m / pink / baby - Tk 700.00</option>
                                       <option value="16508458689">m / red / baby - Tk 730.00</option>
                                       <option value="16508458753">l / pink / baby - Tk 750.00</option>
                                       <option value="16508458817">l / red / baby - Tk 770.00</option>
                                       <option value="16508458881">xl / pink / baby - Tk 800.00</option>
                                       <option value="16508458945">xl / red / baby - Tk 800.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617345"></span>
                           </div>
                        </div>
                        <a href="new-product/products/baby-dress.htm">baby dress</a>
                        <div class="price-box">
                           <span class="price">Tk 600.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 850.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="new-product/products/digital-watch.htm">
                        <img src="public/frontend/assets/images/new2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#digital-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461633">red / m - Tk 200.00</option>
                                       <option value="16508461697">gray / m - Tk 200.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618625"></span>
                           </div>
                        </div>
                        <a href="new-product/products/digital-watch.htm">Digital Watch</a>
                        <div class="price-box">
                           <span class="price">Tk 200.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 250.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="new-product/products/high-quality-watch.htm">
                        <img src="public/frontend/assets/images/new3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#high-quality-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460353">blue / xl - Tk 940.00</option>
                                       <option value="16508460417">black / xl - Tk 940.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617857"></span>
                           </div>
                        </div>
                        <a href="new-product/products/high-quality-watch.htm">high quality watch</a>
                        <div class="price-box">
                           <span class="price">Tk 940.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 995.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="new-product/products/leather-man-wacth.htm">
                        <img src="public/frontend/assets/images/new4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-man-wacth"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460097">pink / s - Tk 570.00</option>
                                       <option value="16508460161">orange / s - Tk 570.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617665"></span>
                           </div>
                        </div>
                        <a href="new-product/products/leather-man-wacth.htm">leather man wacth</a>
                        <div class="price-box">
                           <span class="price">Tk 570.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 600.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>sale product</span>
                  <a href="sale-product.htm" title="Browse our sale product collection">More sale product <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="sale-product/products/baby-dress.htm">
                        <img src="public/frontend/assets/images/sale1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#baby-dress"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508458497">s / pink / baby - Tk 600.00</option>
                                       <option value="16508458561">s / red / baby - Tk 620.00</option>
                                       <option value="16508458625">m / pink / baby - Tk 700.00</option>
                                       <option value="16508458689">m / red / baby - Tk 730.00</option>
                                       <option value="16508458753">l / pink / baby - Tk 750.00</option>
                                       <option value="16508458817">l / red / baby - Tk 770.00</option>
                                       <option value="16508458881">xl / pink / baby - Tk 800.00</option>
                                       <option value="16508458945">xl / red / baby - Tk 800.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617345"></span>
                           </div>
                        </div>
                        <a href="sale-product/products/baby-dress.htm">baby dress</a>
                        <div class="price-box">
                           <span class="price">Tk 600.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 850.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="sale-product/products/baby-watch.htm">
                        <img src="public/frontend/assets/images/sale2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="collections.html#" title="Quick View" data-toggle="modal" data-target="#baby-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508459777">s / black / baby - Tk 200.00</option>
                                       <option value="16508459841">m / black / baby - Tk 200.00</option>
                                       <option value="16508459905">xl / black / baby - Tk 200.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617537"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/sale-product/products/baby-watch.htm">baby watch</a>
                        <div class="price-box">
                           <span class="price">Tk 200.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 220.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/sale-product/products/digital-watch.htm">
                        <img src="public/frontend/assets/images/sale3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#digital-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461633">red / m - Tk 200.00</option>
                                       <option value="16508461697">gray / m - Tk 200.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618625"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/sale-product/products/digital-watch.htm">Digital Watch</a>
                        <div class="price-box">
                           <span class="price">Tk 200.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 250.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/sale-product/products/gary-summer-shoes.htm">
                        <img src="public/frontend/assets/images/sale4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#gary-summer-shoes"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460289">yellow / l - Tk 860.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617793"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/sale-product/products/gary-summer-shoes.htm">gary summer shoes</a>
                        <div class="price-box">
                           <span class="price">Tk 860.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>Tranding</span>
                  <a href="http://bstore-8.myshopify.com/collections/tranding.htm" title="Browse our Tranding collection">More Tranding <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/gary-summer-shoes.htm">
                        <img src="public/frontend/assets/images/trand1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#gary-summer-shoes"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460289">yellow / l - Tk 860.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617793"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/gary-summer-shoes.htm">gary summer shoes</a>
                        <div class="price-box">
                           <span class="price">Tk 860.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/high-quality-watch.htm">
                        <img src="public/frontend/assets/images/trand2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#high-quality-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460353">blue / xl - Tk 940.00</option>
                                       <option value="16508460417">black / xl - Tk 940.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617857"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/high-quality-watch.htm">high quality watch</a>
                        <div class="price-box">
                           <span class="price">Tk 940.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 995.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/leather-man-wacth.htm">
                        <img src="public/frontend/assets/images/trand3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-man-wacth"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460097">pink / s - Tk 570.00</option>
                                       <option value="16508460161">orange / s - Tk 570.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617665"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/leather-man-wacth.htm">leather man wacth</a>
                        <div class="price-box">
                           <span class="price">Tk 570.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 600.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/printed-summer-t-shirt.htm">
                        <img src="public/frontend/assets/images/trand4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#printed-summer-t-shirt"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460929">yellow / xl - Tk 350.00</option>
                                       <option value="16508460993">blue / xl - Tk 350.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618113"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/tranding/products/printed-summer-t-shirt.htm">Printed Summer T-Shirt</a>
                        <div class="price-box">
                           <span class="price">Tk 350.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 380.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="collection-p-title">
               <h2 class="left-title">
                  <span>women</span>
                  <a href="http://bstore-8.myshopify.com/collections/women.htm" title="Browse our women collection">More women <i class="fa fa-angle-right"></i></a>
               </h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/women/products/gary-summer-shoes.htm">
                        <img src="public/frontend/assets/images/women1.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#gary-summer-shoes"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460289">yellow / l - Tk 860.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617793"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/women/products/gary-summer-shoes.htm">gary summer shoes</a>
                        <div class="price-box">
                           <span class="price">Tk 860.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/women/products/leather-man-wacth.htm">
                        <img src="public/frontend/assets/images/women2.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-man-wacth"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460097">pink / s - Tk 570.00</option>
                                       <option value="16508460161">orange / s - Tk 570.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617665"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/women/products/leather-man-wacth.htm">leather man wacth</a>
                        <div class="price-box">
                           <span class="price">Tk 570.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 600.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/women/products/leather-women-bag.htm">
                        <img src="public/frontend/assets/images/women3.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sold Out</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#leather-women-bag"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508460673">green / m - Tk 550.00</option>
                                       <option value="16508460737">beige / m - Tk 550.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364617985"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/women/products/leather-women-bag.htm">leather women bag</a>
                        <div class="price-box">
                           <span class="price"> Tk 550.00 </span> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="item">
               <div class="product-width">
                  <div class="single-product-item">
                     <div class="product-image">
                        <a href="http://bstore-8.myshopify.com/collections/women/products/luxury-watch.htm">
                        <img src="public/frontend/assets/images/women4.jpeg" alt="Apple watch">
                        </a>
                        <span class="new-mark-box">Sale</span>
                        <div class="overlay-content">
                           <ul>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Quick View" data-toggle="modal" data-target="#luxury-watch"><i class="fa fa-search"></i></a></li>
                              <li>
                                 <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                    <select name="id" style="display:none;">
                                       <option value="16508461441">white / xl - Tk 850.00</option>
                                       <option value="16508461505">red / xl - Tk 850.00</option>
                                    </select>
                                    <i class="fa fa-shopping-cart cart_icon"></i>
                                    <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                 </form>
                              </li>
                              <li><a href="http://bstore-8.myshopify.com/collections/collections.html#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                              <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/collections.html#"><i class="fa fa-heart-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-info">
                        <div class="customar-comments-box">
                           <div class="rating-box">
                              <span class="shopify-product-reviews-badge" data-id="5364618497"></span>
                           </div>
                        </div>
                        <a href="http://bstore-8.myshopify.com/collections/women/products/luxury-watch.htm">Luxury watch</a>
                        <div class="price-box">
                           <span class="price">Tk 850.00</span>
                           <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                           <span class="old-price">Tk 900.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  @endsection    