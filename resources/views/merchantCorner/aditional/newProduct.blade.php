
 @extends('frontend.app')
  @section('content')
   <!-- /snippets/breadcrumb.liquid -->
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <nav class="breadcrumb" aria-label="breadcrumbs">
            <a href="../bstore-8_myshopify_default.html" title="Back to the frontpage">Home</a>
            <span aria-hidden="true"><i class="fa fa-caret-right"></i></span>
            <span>New Product</span>
         </nav>
      </div>
   </div>
   <div class="row">
      <!-- product sidebar start -->
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
         <!-- product-left-sidebar start -->
         @include('frontend._partials.categorySidebar')
         <!-- product-left-sidebar end -->
        
      </div>
      <!-- product sidebar end -->
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
         <div class="right-all-product">
            <div class="product-category-header">
               <div class="category-header-image">
                  <img src="public/frontend/assets/images/category_header.jpg" alt="bstore" />
                  <div class="category-header-text">
                     <h2>Best Store </h2>
                     <strong>You will find here all woman fashion collections.</strong>
                     <p>This category includes all the basics of your wardrobe and much more:<br /> shoes, accessories, printed t-shirts, feminine dresses, women's jeans!</p>
                  </div>
               </div>
            </div>
            <div class="product-category-title">
               <!-- product-category-title start -->
               <h1>
                  <span class="cat-name">New Product</span>
               </h1>
               <div class="collection-desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id purus et nisl elementum ornare sit amet non mi. Phasellus euismod sapien et sapien mollis auctor. Suspendisse interdum erat ut metus euismod</p>
               </div>
               <!-- product-category-title end -->
            </div>
            <div class="product-shooting-area">
               <!-- /snippets/collection-sorting.liquid -->
               <div class="product-shooting-bar">
                  <!-- shoort-by start -->
                  <div class="shoort-by">
                     <label for="SortBy">Sort by</label>
                     <div class="short-select-option">
                        <select name="SortBy" id="SortBy">
                           <option value="manual">Featured</option>
                           <option value="best-selling">Best Selling</option>
                           <option value="title-ascending">Alphabetically, A-Z</option>
                           <option value="title-descending">Alphabetically, Z-A</option>
                           <option value="price-ascending">Price, low to high</option>
                           <option value="price-descending">Price, high to low</option>
                           <option value="created-descending">Date, new to old</option>
                           <option value="created-ascending">Date, old to new</option>
                        </select>
                     </div>
                  </div>
                  <!-- shoort-by end -->
                  <div class="view-systeam">
                     <label>View:</label>
                     <button type="button" title="Grid view" class="change-view change-view--active" data-view="grid">
                     <span class="icon-fallback-text">
                     <span class="icon icon-grid-view" aria-hidden="true"></span>
                     <span class="fallback-text">Grid view</span>
                     </span>
                     </button>
                     <button type="button" title="List view" class="change-view" data-view="list">
                     <span class="icon-fallback-text">
                     <span class="icon icon-list-view" aria-hidden="true"></span>
                     <span class="fallback-text">List view</span>
                     </span>
                     </button>
                  </div>
               </div>
               <script>
                  /*============================================================================
                    Inline JS because collection liquid object is only available
                    on collection pages and not external JS files
                  ==============================================================================*/
                  Shopify.queryParams = {};
                  if (location.search.length) {
                    for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                      aKeyValue = aCouples[i].split('=');
                      if (aKeyValue.length > 1) {
                        Shopify.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                      }
                    }
                  }
                  
                  $(function() {
                    $('#SortBy')
                      .val('title-ascending')
                      .bind('change', function() {
                        Shopify.queryParams.sort_by = jQuery(this).val();
                        location.search = jQuery.param(Shopify.queryParams);
                      }
                    );
                  });
               </script>
            </div>
         </div>
         <!-- all category-product start -->
         <div class="all-category-product">
            <div class="row">
               <ul class="category-product">
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="men/products/baby-dress.htm">
                                 <img src="public/frontend/assets/images/men1.jpeg" alt="baby dress">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="men.htm#" title="Quick View" data-toggle="modal" data-target="#baby-dress"><i class="fa fa-search"></i></a></li>
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
                                       <li><a href="men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="men.htm#"><i class="fa fa-heart-o"></i></a></li>
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
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="men/products/digital-watch.htm">
                                 <img src="public/frontend/assets/images/men2.jpeg" alt="baby dress">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="men.htm#" title="Quick View" data-toggle="modal" data-target="#digital-watch"><i class="fa fa-search"></i></a></li>
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
                                       <li><a href="men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="men.htm#"><i class="fa fa-heart-o"></i></a></li>
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
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="men/products/high-quality-watch.htm">
                                 <img src="public/frontend/assets/images/men3.jpeg" alt="baby dress">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="men.htm#" title="Quick View" data-toggle="modal" data-target="#high-quality-watch"><i class="fa fa-search"></i></a></li>
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
                                       <li><a href="men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="men.htm#"><i class="fa fa-heart-o"></i></a></li>
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
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="men/products/leather-women-bag.htm">
                                 <img src="public/frontend/assets/images/men4.jpeg" alt="baby dress">
                                 </a>
                                 <span class="new-mark-box">Sold Out</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="men.htm#" title="Quick View" data-toggle="modal" data-target="#leather-women-bag"><i class="fa fa-search"></i></a></li>
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
                                       <li><a href="men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="men.htm#"><i class="fa fa-heart-o"></i></a></li>
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
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="men/products/men-shoes.htm">
                                 <img src="public/frontend/assets/images/baby1.jpeg" alt="men t-shirt">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="men.htm#" title="Quick View" data-toggle="modal" data-target="#men-shoes"><i class="fa fa-search"></i></a></li>
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
                                       <li><a href="men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="men.htm#"><i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="product-info">
                                 <div class="customar-comments-box">
                                    <div class="rating-box">
                                       <span class="shopify-product-reviews-badge" data-id="5364617473"></span>
                                    </div>
                                 </div>
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/men-shoes.htm">Men shoes</a>
                                 <div class="price-box">
                                    <span class="price">Tk 450.00</span>
                                    <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                                    <span class="old-price">Tk 500.00</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/printed-summer-t-shirt.htm">
                                 <img src="public/frontend/assets/images/baby2.jpeg" alt="men t-shirt">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Quick View" data-toggle="modal" data-target="#printed-summer-t-shirt"><i class="fa fa-search"></i></a></li>
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
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/men.htm#"><i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="product-info">
                                 <div class="customar-comments-box">
                                    <div class="rating-box">
                                       <span class="shopify-product-reviews-badge" data-id="5364618113"></span>
                                    </div>
                                 </div>
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/printed-summer-t-shirt.htm">Printed Summer T-Shirt</a>
                                 <div class="price-box">
                                    <span class="price">Tk 350.00</span>
                                    <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                                    <span class="old-price">Tk 380.00</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/winter-black-shoes.htm">
                                 <img src="public/frontend/assets/images/baby3.jpeg" alt="men t-shirt">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Quick View" data-toggle="modal" data-target="#winter-black-shoes"><i class="fa fa-search"></i></a></li>
                                       <li>
                                          <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                             <select name="id" style="display:none;">
                                                <option value="16508461057">beige / m - Tk 950.00</option>
                                                <option value="16508461121">red / m - Tk 950.00</option>
                                             </select>
                                             <i class="fa fa-shopping-cart cart_icon"></i>
                                             <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                          </form>
                                       </li>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/men.htm#"><i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="product-info">
                                 <div class="customar-comments-box">
                                    <div class="rating-box">
                                       <span class="shopify-product-reviews-badge" data-id="5364618177"></span>
                                    </div>
                                 </div>
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/winter-black-shoes.htm">winter black shoes</a>
                                 <div class="price-box">
                                    <span class="price">Tk 950.00</span>
                                    <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                                    <span class="old-price">Tk 980.00</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/women-long-heels.htm">
                                 <img src="public/frontend/assets/images/baby4.jpeg" alt="men t-shirt">
                                 </a>
                                 <span class="new-mark-box">Sale</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Quick View" data-toggle="modal" data-target="#women-long-heels"><i class="fa fa-search"></i></a></li>
                                       <li>
                                          <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                             <select name="id" style="display:none;">
                                                <option value="16508459969">gray / l - Tk 450.00</option>
                                                <option value="16508460033">white / l - Tk 450.00</option>
                                             </select>
                                             <i class="fa fa-shopping-cart cart_icon"></i>
                                             <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                          </form>
                                       </li>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/men.htm#"><i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="product-info">
                                 <div class="customar-comments-box">
                                    <div class="rating-box">
                                       <span class="shopify-product-reviews-badge" data-id="5364617601"></span>
                                    </div>
                                 </div>
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/women-long-heels.htm">men t-shirt</a>
                                 <div class="price-box">
                                    <span class="price">Tk 450.00</span>
                                    <span class="visually-hidden">translation missing: en.cart.general.regular_price</span>
                                    <span class="old-price">Tk 520.00</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="category-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                     <div class="item">
                        <div class="product-width">
                           <div class="single-product-item">
                              <div class="product-image">
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/women-short-heels.htm">
                                 <img src="public/frontend/assets/images/women1.jpeg" alt="men t-shirt">
                                 </a>
                                 <span class="new-mark-box">Sold Out</span>
                                 <div class="overlay-content">
                                    <ul>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Quick View" data-toggle="modal" data-target="#women-short-heels"><i class="fa fa-search"></i></a></li>
                                       <li>
                                          <form action="http://bstore-8.myshopify.com/cart/add" method="post" class="variants" enctype="multipart/form-data" style="padding:0px;">
                                             <select name="id" style="display:none;">
                                                <option value="16508460481">yellow / xl - Tk 380.00</option>
                                                <option value="16508460545">blue / xl - Tk 380.00</option>
                                             </select>
                                             <i class="fa fa-shopping-cart cart_icon"></i>
                                             <input title="Add to cart" class="add_cart" type="submit" name="add" value="Add" />
                                          </form>
                                       </li>
                                       <li><a href="http://bstore-8.myshopify.com/collections/men.htm#" title="Copare"><i class="fa fa-retweet"></i></a></li>
                                       <li><a class="wishlist-login" href="http://bstore-8.myshopify.com/collections/men.htm#"><i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="product-info">
                                 <div class="customar-comments-box">
                                    <div class="rating-box">
                                       <span class="shopify-product-reviews-badge" data-id="5364617921"></span>
                                    </div>
                                 </div>
                                 <a href="http://bstore-8.myshopify.com/collections/men/products/women-short-heels.htm">women short heels</a>
                                 <div class="price-box">
                                    <span class="price"> Tk 380.00 </span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- all category-product end -->
    @endsection   
