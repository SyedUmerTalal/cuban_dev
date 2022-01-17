</div>
<div class="wrap-content">
   <div class="b-title-page b-title-page_w_bg">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <h1 class="b-title-page__title shuffle">Dashboard</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
<?php if(!empty($records)): foreach($records as $record): ?>


    <table background="" bgcolor="#e4e4e4" width="100%" style="padding:20px 0 20px 0" cellspacing="0" border="0" align="center" cellpadding="0">
      <tbody>
        <tr>
          <td><table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-radius: 5px; font-family: Arial, Helvetica, sans-serif">
            <tbody>
              <tr>
                <td style="padding-top:20px; text-align:center;"><img src="<?php echo site_url('uploads/settings/').$header_logo ;?>"></td>
              </tr>
              <tr>
                <td style="margin-top:100px;"></td>
              </tr>
              <tr>
                <td valign="top" style="color:#404041;line-height:16px;padding:25px 20px 0px 20px"><p> </p>
                  <h3 align="center" style="margin-top: -12px;background-color: #FFF;clear: both;width:100%px;margin-right: auto;margin-left: auto;padding-left: 15px;padding-right: 15px; font-family: arial,sans-serif;">
                   <span style="color:#46b560; font-size:25px;">New Order Query</span> </h3>
                 </section>
                 <p style="text-align:center;">Hi <strong><?php echo (isset($record->customer_fname)?$record->customer_fname:'').' '.(isset($record->customer_lname)?$record->customer_lname:'');?></strong>! Your order details are as follows:</p></td>
               </tr>
               <tr>
                <td valign="top" style="color:#404041;font-size:12px;line-height:16px;padding:25px 20px 0px 20px"><p> <span></span></p>
                  <h2 style="color: #848484; font-family: arial,sans-serif; font-weight: 200;">Order # <?php echo (isset($record->orders_no)?$record->orders_no:'');?></h2>
                  <?php $date = date_create((isset($record->orders_created_date)? $record->orders_created_date: ""))?>
                  <h2 style="color: #848484; font-family: arial,sans-serif; font-weight: 200;">Date : <?php echo date_format($date,"d M, Y");?></h2>
                  <h2 style="color: #848484; font-family: arial,sans-serif; font-weight: 200;">Payment Status : <?php echo (isset($record->orders_type)?$record->orders_type:'');?></h2>
                  <p></p>
                  <p></p></td>
                </tr>
                <tr>
                  <td style="color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-radius:5px;border:solid 1px #e5e5e5">
                  </tr>
                  <tr>
                    <td style="color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px; "><table width="100%" border="0" cellpadding="0" cellspacing="0" style="" >
                      <tbody>
                        <tr>
                          <td width="100%" colspan="5" align="left" valign="top" style="color:#404041;font-size:12px;line-height:16px;padding:5px 5px 15px 5px;border-bottom:dashed 1px #e5e5e5; font-family:Arial, Helvetica, sans-serif">
                           <h3>Order Details</h3> 
                           <?php $orders = get_list('order_items',array('orders_no'=>$record->orders_no));?>
                           <?php foreach($orders as $order):?>
                            <strong>Product Name :</strong> <?php echo (isset($order->product_name)?$order->product_name:'');?><br>
                            <strong>Product Qty :</strong> <?php echo (isset($order->product_qty)?$order->product_qty:'');?><br>

                            <?php !empty($records)? $varients = unserialize($order->variant):'';?>

                              <?php if($varients): foreach($varients[0] as $key => $val):?>
                                <p><?php echo $key;?>: <?php echo get_name_by_id('variant',$val);?></p>
                              <?php endforeach; endif;?>


                            <strong>Product Specifications :</strong><br>           
                            <strong> Product Price :</strong> <?php echo (isset($order->product_price)?$order->product_price:'');?><br><br>
                            <strong> Total Price :</strong> <?php echo (isset($order->order_items_total_amt)?$order->order_items_total_amt:'');?><br><br>
                          <?php endforeach;?>             
                        </tr>
                        <tr>
                          <td width="100%" colspan="5" align="left" valign="top" style="color:#404041;font-size:12px;line-height:16px;padding:5px 5px 15px 5px;border-bottom:dashed 1px #e5e5e5; font-family:Arial, Helvetica, sans-serif">
                           <h3>Payment Details</h3>
                           <strong> Order Total Amount :</strong> <?php echo (isset($record->orders_sub_total_amt)?$record->orders_sub_total_amt:'');?><br>
                           <strong> Discount Amount :</strong> <?php echo (isset($record->orders_diss_amt)?$record->orders_diss_amt:'');?><br>
                           <strong> Total To Pay :</strong> <?php echo (isset($record->orders_total_amt)?$record->orders_total_amt:'');?><br>
                         </td>
                       </tr>
                       <tr>
                        <td width="100%" colspan="5" align="left" valign="top" style="color:#404041;font-size:12px;line-height:16px;padding:5px 5px 15px 5px;border-bottom:dashed 1px #e5e5e5; font-family:Arial, Helvetica, sans-serif">
                         <h3>Customer Details</h3>
                         <strong> Name :</strong> <?php echo (isset($record->customer_fname)?$record->customer_fname:'').' '.(isset($record->customer_lname)?$record->customer_lname:'');?><br>
                         <strong> Email :</strong> <?php echo (isset($record->customer_email)?$record->customer_email:'');?><br>
                         <strong> Phone :</strong> <?php echo (isset($record->customer_phone)?$record->customer_phone:'');?><br>
                       </td>
                     </tr>
                     <tr>
                      <td width="100%" colspan="5" align="left" valign="top" style="color:#404041;font-size:12px;line-height:16px;padding:5px 5px 15px 5px;border-bottom:dashed 1px #e5e5e5; font-family:Arial, Helvetica, sans-serif">
                       <h3>Billing Address</h3>
                       <?php echo (isset($record->billing_street)?$record->billing_street:'').', '.(isset($record->billing_city)?$record->billing_city:'').', '.(isset($record->billing_zip)?$record->billing_zip:'').'
                       , '.(isset($record->billing_state)?$record->billing_state:'').', '.(isset($record->billing_country)?$record->billing_country:'');?><br>
                     </td>
                   </tr>
                   <tr>
                    <td width="100%" colspan="5" align="left" valign="top" style="color:#404041;font-size:12px;line-height:16px;padding:5px 5px 15px 5px;border-bottom:dashed 1px #e5e5e5; font-family:Arial, Helvetica, sans-serif">
                     <h3>Shipping Address</h3>
                     <?php echo (isset($record->shipping_street)?$record->shipping_street:'').', '.(isset($record->shipping_city)?$record->shipping_city:'').', 
                     '.(isset($record->shipping_zip)?$record->shipping_zip:'').', '.(isset($record->shipping_state)?$record->shipping_state:'').', '.(isset($record->shipping_country)?$record->shipping_country:'');?><br>
                   </td>
                 </tr>
               </tbody>
             </table></td>
           </tr>      
           <tr>
            <td></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>

<?php endforeach; endif;?>    
</div>
</div>

</div>
