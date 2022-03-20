<?php
  $i = 1;
  $j = 1;
  $k = 0;
  $total_price = 0;
  // print "<pre>";
  // print_r($getInvoiceInfo);
  // return ;

?>


<!DOCTYPE html>
 <html>
	<head>
		<meta charset="utf-8"> 
		<title>INVOICE :: ASIA BAZAR</title> 

	    <style type="text/css">
             body{padding: 0; margin: 0;background-color: transparent; font-family: sans-serif !important; font-size: 13px; color: #333333;}
	         .invoice_area {padding: 0px 12px 15px 12px; width: 565px; height: 643px; margin:0 auto; background-color: #fcfcfc; }



	         .header {width:100%; float: left; margin-bottom: 10px;}
	         .logo {width:40%;float: left;}
	         .logo img{width:100px; display:block; padding-top: 10px}

           
	         .company_info {width:60%;float: left;}
             .info{ padding: 0px 0px 0px 0px; text-align: center; float:left;}
             .info h4{font-weight: 600px; font-size: 20px; padding-top: 10px; margin: 4px 0px; }
             .info p{margin: 7px 0px; font-size: 12px }


             .invoice_info{ float: left; margin-top: 8px;width: 100%;}
             .invoice_info p{ margin: 8px 0px;}
             .invoice_info .left{width:100%; float:left; text-align:left; border-top:2px solid #ebebeb;}





	         .custommer_box { width:100%; float: left;  margin-top: 5px; padding-top: 6px; border-top: 2px solid #ebebeb; font-size:12px; }
	         .custommer_box strong{ font-size:13px;}
	         .custommer_info{ width:32%; float: left; margin-right: 40px;} 
	         .shipping_address{ width:50%; float: left;}
	         .customer_details td{ padding: 2px 10px 2px 0px;}
	         .shipping_details td{padding: 2px 10px 2px 0px;}



	         .ordered_items {width: 100%; float: left; border-bottom: 2px dotted #ccc;}
	         .order_table th{ text-align:center; font-size: 12px; padding: 5px 12px; background-color: #ebebeb;}
	         .order_table, .order_table td{ border-collapse:  collapse;}
             

             .order_table td{ text-align:center; font-size: 12px; padding: 4px 10px; border-bottom: 1px solid #ebebeb;}


	         .text-left{ text-align: left !important}
	         .text-right{ text-align: right !important}
	         .footer td{ background-color: #ebebeb; padding: 4px 10px; font-weight: bold}

	         .company_copy {text-align: center; font-size: 12px; float: left; width: 100%;  padding: 5px 0px}
	         .company_copy p{margin: 5px 0px}


           .logo2 {width:38%;float: left;}
           .logo2 img{width:55px;  padding: 10px 20px 0px 0px;float: right;}
           .company_info2 {width:62%;float: left; }
           .info2{ padding: 0px 0px 0px 0px; text-align: left; float:left;}
           .info2 h4{font-weight: 600px; font-size: 17px; padding-top: 10px; margin: 4px 0px; }
           .info2 p{margin: 5px 0px 3px 0px; font-size: 11px }


           .customer_sign, .receiver_sign{ width:150px; margin-top:24px; padding-top:4px; border-top: 1px solid #ccc;}

           .header2 {width:100%;float:left; border-bottom: 2px solid #ebebeb; }
           .receipt {width:100%;float:left;}
           .receipt p{margin:15px 0px; text-align: left; font-size: 13px}


           .sign{width:100%; float:left;}

           .receiver_sign{ float:left;}
           .customer_sign{ float:right;}

	      

	    </style>
	</head>


	    <body>
	         <div class="invoice_area"> 
	             <div class="header"> 
                     <div class="logo"> 
                        <img src="{{URL::to('/')}}/public/images/eshopLogo/eshop_logo.png">
                    </div>

                    <div class="company_info"> 
                       <div class="info"> 
	                        <h4> ASIA BAZAR LTD. </h4>
	                        <strong><u>www.asiabazar.com</u></strong>                   
                       </div>

                       
                    </div>
		         </div>

		         <div class="custommer_box"> 
                     <div class="custommer_info"> 
                     @if(isset($getInvoiceInfo))
                     @foreach($getInvoiceInfo as $viewInvoiceInfo)
                     @if($i==1)
                      <strong><u>Customer Details :</u> </strong>
                      <table class="customer_details"> 
                         <tr> 
                              <td > Name </td>  <td>: </td>
                              <td> {{$viewInvoiceInfo ->user_name }}</td>
                         </tr>

                         <tr> 
                              <td> Email </td> <td>: </td> 
                              <td> {{$viewInvoiceInfo ->email }}</td>
                         </tr>

                         <tr> 
                              <td> Cell No</td>  <td>: </td>
                              <td>{{$viewInvoiceInfo ->mobile_no }}</td>
                         </tr>
                      </table>
                      
                     </div> 
                     <div class="shipping_address">
                     	 <strong><u>Shipping Details :</u> </strong>
                         <table class="shipping_details"> 
                           <tr> 
                                <td width="38%"> Shipping Contact </td>  <td>:</td>
                                <td> {{$viewInvoiceInfo ->shipping_mobile_no }}</td>
                           </tr> 
                           <tr > 
	                              <td> Address </td> <td>:</td>
	                              <td> {{$viewInvoiceInfo ->address }}</td>
	                         </tr>

	                         <tr> 
	                              <td> Shipping City </td>  <td>:</td>
	                              <td>  {{$viewInvoiceInfo ->city_name_lng1 }}</td>
	                         </tr>

	                       
                      </table>
                     </div>
		         </div>

		        

		         <div class="ordered_items"> 
			               <div class="invoice_info"> 
	                      <div class="left"> <p> Invoice Number : {{$viewInvoiceInfo ->invoice_no }}  &nbsp; &nbsp; &nbsp; Invoice Date : {{$viewInvoiceInfo ->payment_date }} </p> </div>
	                   </div>
                @endif
                <?php $i++ ?>
            @endforeach
                     <table class="order_table">
                          <tr> 
                             <th> Items Name</th> 
                             <th> Quantity </th> 
                             <th> Color & Size </th> 
                             <th> Unite Price (Tk) </th> 
                             <th> Discount (Tk)</th> 
                             <th> VAT (Tk) </th> 
                             <th> Total Price (Tk)</th> 
                          </tr>
            @foreach($getInvoiceInfo as $orderDetails)
                          <tr> 
                              <td class="text-left"> {{$orderDetails ->product_name_lng1 }}</td>
                              <td>{{$orderDetails ->quantity }}</td>
                              <td> {{$orderDetails ->color_name_lng1 }}/{{$orderDetails ->size_title_lng1 }}</td>
                              <td>{{$orderDetails ->price }}</td>
                              <td>{{$orderDetails ->order_details_wise_discount }}</td>
                              <td>0.00</td>
                              <td>{{$orderDetails ->price - $orderDetails ->order_details_wise_discount }}</td>
                          </tr>
              <?php 
                $k=$k+1; 
                $total_price = $total_price + ($orderDetails ->price - $orderDetails ->order_details_wise_discount); 
              ?>
                        
            @endforeach

            @foreach($getInvoiceInfo as $footerInformation)
            @if($j==1)
            <?php 
              $total_price = $total_price + $footerInformation ->shipping_cost ;
            ?>
                          <tr> 
                              <td colspan="6" class="text-right"> Shippment Cost </td>
                              <td  colspan="1">  &nbsp; {{$footerInformation ->shipping_cost }} </td>
                          </tr>

                          <tr class="footer"> 
                              <td colspan="6" class="text-left"> TOTAL PRICE  </td>
                              <td  colspan="1">  &nbsp; {{$total_price}}</td>
                          </tr>
                      </table>
                        <div class="sign" style="padding-bottom:10px; padding-top:15px"> 
                           <div class="receiver_sign text-left"><strong>Receiver's Signature</div>
                           .<div class="text-right customer_sign text-right"><strong>Customer's Signature</div>
                        </div>
		         </div>

		         <div class="company_copy"> 
                    <div class="header2">
                        <div class="logo2"> 
                          <img src="{{URL::to('/')}}/public/images/eshopLogo/eshop_logo.png">
                        </div>

                        <div class="company_info2"> 
                           <div class="info2"> 
                              <h4> ASIA BAZAR LTD. </h4>
                           </div> 
                        </div>
                    </div>



                       <div class="receipt">
                            <p><strong><b>Invoice no :</b> </strong> <u>&nbsp;&nbsp; {{$footerInformation ->invoice_no }} &nbsp;&nbsp;</u>    <strong> &nbsp;&nbsp; <b>Mobile Number:</b></strong> &nbsp; <u>&nbsp; {{$footerInformation ->mobile_no }} &nbsp;&nbsp; </u> <strong>&nbsp;&nbsp;&nbsp;  Total Product:  </strong> &nbsp; <u>{{$k}} P/s. &nbsp;&nbsp;</u>  </p> 
                            <p> <strong><b> Total bill :</b> </strong>&nbsp;&nbsp;&nbsp;  {{$total_price}} &nbsp;&nbsp;&nbsp;  <strong> <b>In Words : </b></strong>&nbsp; <u>{{ Helper::convert_number($total_price)}}</u>&nbsp;&nbsp;  </p>
                            <p> <strong><b> Total Paid :</b> </strong>&nbsp;&nbsp;&nbsp;  {{$footerInformation -> paid }} &nbsp;&nbsp;&nbsp; <strong> <b>Due :</b> </strong>&nbsp;&nbsp;&nbsp;  {{$total_price - $footerInformation -> paid }} &nbsp;&nbsp;&nbsp;
                            
                            
                            <div class="sign"> 
                               <div class="receiver_sign text-left"><strong>Receiver's Signature</div>
                               .<div class="text-right customer_sign text-right"><strong>Customer's Signature</div>
                            </div>
                       </div>
                       <?php $j++ ?>
                       @endif
                       @endforeach
                       @endif
		         </div>
	         </div>	
	    </body>
</html>
	