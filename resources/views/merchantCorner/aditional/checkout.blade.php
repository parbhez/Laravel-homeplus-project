 @extends('frontend.app')
  @section('content')
     
       <!-- @@@@@@@@ Start Customer CheckOut Section @@@@@@@ -->
       <div class="main-content-section marg_top">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2 class="page-title">Sign in / Register</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <!-- CREATE-NEW-ACCOUNT START -->
                  <div class="create-new-account">
                    <div class="new-account-box primari-box" id="create-new-account">
                      <h3 class="box-subheading">New Customer</h3>
                      <div class="form-content">
                         <div class="form-group">
                             <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made. </p>
                          </div>  
                        <div class="submit-button">
                          <a href="/account/register" id="SubmitCreate" class="btn main-btn">
                            <span>
                              <i class="fa fa-user submit-icon"></i>
                              Register
                            </span>                     
                          </a>
                        </div>
                      </div>
                    </div>              
                  </div>
                  <!-- CREATE-NEW-ACCOUNT END -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <!-- REGISTERED-ACCOUNT START -->
                  <div class="note form-success" id="ResetSuccess" style="display:none;">
                    We've sent you an email with a link to update your password.
                  </div>  
                  <div class="primari-box registered-account" id="RecoverPasswordForm" style="display: none;">
                    <form method="post" action="/account/recover" accept-charset="UTF-8"><input type="hidden" value="recover_customer_password" name="form_type"><input type="hidden" name="utf8" value="✓">
                    <div class="new-account-box">
                      
                      <h3 class="box-subheading">Reset your password</h3>
                      <div class="form-content">
                        <div class="form-group primary-form-group">
                          
                          <label for="RecoverEmail">Email</label>
                          <input type="email" value="" name="email" id="RecoverEmail" class="form-control input-feild" placeholder="Email" autocomplete="off" required="">
                        </div>
                        <div class="submit-button">
                          <button type="submit" id="signinCreate" class="btn main-btn">
                            <span>
                              <i class="fa fa-unlock submit-icon"></i>
                              Submit
                            </span>
                          </button> 
                        </div>
                        <button type="button" id="HideRecoverPasswordLink" class="text-link">Cancel</button>
                      </div>
                    </div>  
                    <input type="hidden" name="checkout_url" value="https://checkout.shopify.com/11511710/checkouts/83ea96e061eac1ea47192f44b4d000d8"></form>
                  </div>
                  <div class="primari-box registered-account">
                    <form method="post" action="https://bstore-8.myshopify.com/account/login" id="customer_login" accept-charset="UTF-8"><input type="hidden" value="customer_login" name="form_type"><input type="hidden" name="utf8" value="✓">
                    <div class="new-account-box">
                      
                      <h3 class="box-subheading">Already registered?</h3>
                      <div class="form-content">
                        <div class="form-group primary-form-group">
                          <label for="CustomerEmail">Email</label>
                          <input type="email" name="customer[email]" id="CustomerEmail" class="form-control input-feild" placeholder="Email" autocomplete="off" autofocus="" required="">
                        </div>
                        <div class="form-group primary-form-group">
                          
                          <label for="CustomerPassword">Password</label>
                          <input type="password" value="" name="customer[password]" id="CustomerPassword" class="form-control input-feild" placeholder="Password" required="">
                          
                        </div>
                        <div class="forget-password">
                      
                        <p><a href="#recover" id="RecoverPassword">Forgot your password?</a></p>
                      
                        </div>
                        <div class="submit-button">
                          <button type="submit" class="btn main-btn">
                            <span>
                              <i class="fa fa-lock submit-icon"></i>
                              Sign In
                            </span>
                          </button> 
                        </div>
                      </div>
                    </div>  
                    <input type="hidden" name="checkout_url" value="https://checkout.shopify.com/11511710/checkouts/83ea96e061eac1ea47192f44b4d000d8"></form>
                  </div>
                </div>
              </div>
            </div> 
        </div>
        <!-- @@@@@@@@ Start Customer CheckOut Section @@@@@@@ -->

















        <!-- @@@@@@@@ Start Customer Register Section @@@@@@@ -->
         <div class="main-content-section marg_top">
            <div class="container">

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="page-title">Register</h2>
              </div>  
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="create-new-account">
                  <div class="new-account-box primari-box">
                    <h3 class="box-subheading">Create Account</h3>
                    <div class="form-content">
                      <p>Please enter your fllowing info to create an account.</p>
                      <form method="post" action="https://bstore-8.myshopify.com/account" id="create_customer" accept-charset="UTF-8"><input type="hidden" value="create_customer" name="form_type"><input type="hidden" name="utf8" value="✓">

                        
                        <div class="form-group primary-form-group">
                            <label for="FirstName">First Name *</label>
                            <input type="text" name="customer[first_name]" id="FirstName" class="form-control input-feild" autofocus="" required="">
                        </div>
                        <div class="form-group primary-form-group">
                            <label for="LastName">Last Name *</label>
                            <input type="text" name="customer[last_name]" id="LastName" class="form-control input-feild" required="">
                        </div>
                        <div class="form-group primary-form-group">
                            <label for="Email">Email *</label>
                            <input type="email" name="customer[email]" id="Email" class="form-control input-feild" autocomplete="off" required="">
                        </div>
                        <div class="form-group primary-form-group">
                            <label for="CreatePassword">Password *</label>
                            <input type="password" name="customer[password]" id="CreatePassword" class="form-control input-feild" required="">
                        </div>
                        <div class="submit-button p-info-submit-button">
                            <a class="back-link" href="http://bstore-8.myshopify.com"><i class="fa fa-angle-left"></i> Return to Store</a>
                            <button type="submit" id="signinCreate" class="btn main-btn">
                              <span>
                                Register
                                <i class="fa fa-angle-right submit-icon"></i>
                              </span>
                            </button> 
                            <span class="required-field">* Required field</span>
                        </div>
                      </form>   
                    </div>
                  </div>              
                </div>    
              </div>
            </div>
            </div> 
        </div>
         <!-- @@@@@@@@ End Customer Register Section @@@@@@@ --> 












        <!-- @@@@@@@@@@@@@ Start Customer Order Account and Overview @@@@@@@@@  -->
         <div class="main-content-section marg_top">
            <div class="container">
            
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2 class="page-title">My <a href="#">Account</a></h2>
                  <div class="account-info-text">
                    Welcome to your <a href="#">account</a>. Here you can manage all of your personal information and orders. 
                  </div>    
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- <div class="single-account-info">
                      <ul>
                        <li><a href="/cart"><i class="fa fa-shopping-cart"></i><span>My Cart (5)</span> </a></li>
                        <li><a href="/account/addresses"><i class="fa fa-building"></i><span>View Addresses (0)</span>  </a></li>
                        <li><a href="/checkout"><i class="fa fa-truck"></i><span>Check Out</span> </a></li>
                        <li><a href="/pages/wishlist"><i class="fa fa-heart-o"></i><span>Wishlist </span></a></li>
                      </ul>
                    </div>    
                    <br>
                    <div class="second_item primari-box">
                    
                      <ul class="address">
                        <li>
                          <h3 class="page-subheading box-subheading">
                            <a href="#">Account</a> Details
                          </h3>
                        </li>
                        <li><span class="address_name"><strong>asdfsdf sasfasf</strong></span></li>
                                
                      </ul> 
                
                    </div> -->
                 <h4 class="order-history-title">Shippment Address</h4>
                <div class="create-new-account">
                  <div class="new-account-box primari-box">
                    <div class="form-content">
                      <p>Please provide the fllowing info for shippment.</p>
                      <form method="post" action="https://bstore-8.myshopify.com/account" id="create_customer" accept-charset="UTF-8"><input type="hidden" value="create_customer" name="form_type"><input type="hidden" name="utf8" value="✓">

                        <div class="form-group primary-form-group">
                            <label for="CreatePassword">Phone No.</label>
                            <input type="text" name="customer[phone]" id="CreatePassword" class="form-control input-feild" required="">
                        </div>

                        <div class="form-group primary-form-group">
                            <label for="dist_name">District Name</label>
                            <input type="text" name="customer[dist_name]" id="dist_name" class="form-control input-feild" required="">
                        </div>


                        <div class="form-group primary-form-group">
                            <label for="AreaName">Area Name </label>
                            <select name="area" class="form-control input-feild"  required="" style="max-width:271px; border-radius: 0px !important">
                                <option selected="selected" value="Dhanmondi"> Dhanmondi 32</option> 
                                <option  value="Dhanmondi">Dhanmondi 9</option> 
                                <option  value="Dhanmondi">Firmget</option> 
                                <option  value="Dhanmondi">Motijheel </option> 
                                <option  value="Dhanmondi">Tejgaon </option> 
                                <option  value="Dhanmondi">Lalmatia </option> 
                                <option  value="Dhanmondi">Mohammadpur </option> 
                                <option  value="Dhanmondi">Jatrabari </option> 
                                <option  value="Dhanmondi">Uttara </option> 
                            </select>
                           
                        </div>
                        <div class="form-group primary-form-group">
                            <label for="road">Road or Nearer Place</label>
                            <input type="road" name="customer[road]" id="road" class="form-control input-feild" autocomplete="off" required="">
                        </div>
                        <div class="form-group primary-form-group">
                            <label for="HouseNo">House No.</label>
                            <input type="number" name="customer[HouseNo]" id="HouseNo" class="form-control input-feild" required="">
                        </div>
                        <div class="submit-button p-info-submit-button">
                            <button type="submit" id="signinCreate" class="btn main-btn">
                              <span>
                                Confirm Order
                                <i class="fa fa-angle-right submit-icon"></i>
                              </span>
                            </button> 
                            <span class="required-field">* Required field</span>
                        </div>
                      </form>   
                    </div>
                  </div>              
                </div> 
                </div>  
                  

                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h4 class="order-history-title">Order History</h4>
                    <div class="customer-order-none">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <!-- cart table_block start -->
                              
                              <form action="/cart" method="post" novalidate="">
                                <div class="table-responsive">
                                  <!-- table start -->
                                  <table class="table table-bordered cart-table" id="cart-summary">
                                    <!-- table header start -->
                                    <thead>
                                      <tr>
                                        <th class="cart-product">Product</th>
                                        <th class="cart-description">Title</th>
                                        <th class="cart-avail text-center">Size & Color</th>
                                        <th class="cart-unit text-right">Price</th>
                                        <th class="cart_quantity text-center">Quantity</th>
                                        <th class="cart-delete">x</th>
                                        <th class="cart-total text-right">Total</th>
                                      </tr>
                                    </thead>
                                    <!-- table header end -->
                                    <!-- table body start -->
                                    <tbody> 
                                      <!-- single cart_item start -->
                                      
                                      <tr>
                                        <td data-label="Product" class="cart-product"> 
                                          <a href="/products/leather-man-wacth?variant=16508460097">
                                                              
                                            <img src="{{URL::to('public/frontend/assets/images/baby1.jpeg')}}" alt="leather man wacth - pink / s">

                                            


                                          </a>
                                        </td>
                                        <td class="cart-description" data-label="Product">
                                          <p class="product-name"><a href="/products/leather-man-wacth?variant=16508460097">leather man wacth</a></p>
                                        </td>
                                        <td class="cart-avail" data-label="Variant">
                                          <span>
                                            
                                              <a href="/products/leather-man-wacth?variant=16508460097">pink / s</a>
                                                                  
                                          </span>
                                        </td>
                                        <td class="cart-unit" data-label="Price">
                                          <ul class="price text-center">
                                            <li class="price">Tk 570.00</li>
                                          </ul>
                                        </td>
                                        <td class="cartpage_quantity text-center" data-label="Quantity">
                                        <div class="cart-plusminus">
                                            <div class="js-qty">
                                              <button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
                                                <span class="icon icon-minus" aria-hidden="true"></span>
                                                <span class="fallback-text">−</span>
                                              </button>
                                              <input type="text" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_16508460097">
                                              <button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
                                                <span class="icon icon-plus" aria-hidden="true"></span>
                                                <span class="fallback-text">+</span>
                                              </button>
                                            </div>
                        
                                          </div>
                                        </td>                
                                        <td class="cart-delete text-center">
                                          <span>
                                            <a href="/cart/change?line=1&amp;quantity=0" class="cart_quantity_delete" title="Remove">
                                              <i class="fa fa-trash-o"></i>
                                            </a>
                                          </span>
                                        </td>
                                        <td class="cart-total text-center" data-label="Total">
                                          <span class="price">Tk 570.00</span>
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td data-label="Product" class="cart-product"> 
                                          <a href="/products/digital-watch?variant=16508461633">
                                                              
                                            <img src="{{URL::to('public/frontend/assets/images/baby2.jpeg')}}" alt="Digital Watch - red / m">
                                          </a>
                                        </td>
                                        <td class="cart-description" data-label="Product">
                                          <p class="product-name"><a href="/products/digital-watch?variant=16508461633">Digital Watch</a></p>
                                        </td>
                                        <td class="cart-avail" data-label="Variant">
                                          <span>
                                            
                                             <a href="/products/digital-watch?variant=16508461633">red / m</a>
                                                                   
                                          </span>
                                        </td>
                                        <td class="cart-unit" data-label="Price">
                                          <ul class="price text-center">
                                            <li class="price">Tk 200.00</li>
                                          </ul>
                                        </td>
                                        <td class="cartpage_quantity text-center" data-label="Quantity">
                                          <div class="cart-plusminus">
                                            
                                              
                                                <div class="js-qty">
                                                  <button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
                                                    <span class="icon icon-minus" aria-hidden="true"></span>
                                                    <span class="fallback-text">−</span>
                                                  </button>
                                                  <input type="text" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_16508461633">
                                                  <button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
                                                    <span class="icon icon-plus" aria-hidden="true"></span>
                                                    <span class="fallback-text">+</span>
                                                  </button>
                                                </div>
                          
                          
                                          </div>
                                        </td>                
                                        <td class="cart-delete text-center">
                                          <span>
                                            <a href="/cart/change?line=2&amp;quantity=0" class="cart_quantity_delete" title="Remove">
                                              <i class="fa fa-trash-o"></i>
                                            </a>
                                          </span>
                                        </td>
                                        <td class="cart-total text-center" data-label="Total">
                                          <span class="price">Tk 200.00</span>
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td data-label="Product" class="cart-product"> 
                                          <a href="/products/baby-dress?variant=16508458497">
                                                              
                                            <img src="{{URL::to('public/frontend/assets/images/baby3.jpeg')}}">
                                          </a>
                                        </td>
                                        <td class="cart-description" data-label="Product">
                                          <p class="product-name"><a href="/products/baby-dress?variant=16508458497">baby dress</a></p>
                                        </td>
                                        <td class="cart-avail" data-label="Variant">
                                          <span>
                                            
                                              <a href="">s / pink / baby</a>
                                                                     
                                          </span>
                                        </td>
                                        <td class="cart-unit" data-label="Price">
                                          <ul class="price text-center">
                                            <li class="price">Tk 600.00</li>
                                          </ul>
                                        </td>
                                        <td class="cartpage_quantity text-center" data-label="Quantity">
                                          <div class="cart-plusminus">
                                            
                                              
                                                <div class="js-qty">
                                                  <button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="2">
                                                    <span class="icon icon-minus" aria-hidden="true"></span>
                                                    <span class="fallback-text">−</span>
                                                  </button>
                                                  <input type="text" class="js-qty__num" value="3" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_16508458497">
                                                  <button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="31">
                                                    <span class="icon icon-plus" aria-hidden="true"></span>
                                                    <span class="fallback-text">+</span>
                                                  </button>
                                                </div>
                          
                          
                                          </div>
                                        </td>                
                                        <td class="cart-delete text-center">
                                          <span>
                                            <a href="/cart/change?line=3&amp;quantity=0" class="cart_quantity_delete" title="Remove">
                                              <i class="fa fa-trash-o"></i>
                                            </a>
                                          </span>
                                        </td>
                                        <td class="cart-total text-center" data-label="Total">
                                          <span class="price">Tk 1,800.00</span>
                                        </td>
                                      </tr>
                                      
                                      <!-- single cart_item end -->
                                    </tbody>
                                    <!-- table body end -->
                                  </table>
                                  <!-- table end -->
                                  <div class="update-cart">
                                    <div class="update-box">
                                      <h2 class="text-right cart-sub-total-title"><span>Subtotal</span>Tk 2,570.00</h2>
                                         <p class="text-right"><em>Shipping Cost Tk 40.00  <br> </em></p> <hr style="margin: 7px 0px !important; border-color: #d6d4d4 !important"> 
                                       <h2 class="cart-sub-total-title"><span>Total Cost :</span>Tk 2,610.00</h2>
                                    </div>
                                  </div>
                                </div>
                              </form>  
                              
                              <!-- cart table_block end -->     
                            </div>
                         </div>
                    </div>
                        
                </div>
              </div>  
            
            </div> 
        </div> 
        <!-- @@@@@@@@@@@@@ Start Customer Order Account and Overview @@@@@@@@@  -->

      @endsection      
       
