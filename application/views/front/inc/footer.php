    <footer class="pt-5 lazy" data-bg="url(<?php echo base_url('assets/front/')?>img/footer.png)">
      <div class="container">
        <div class="row justify-content-center ">
          <div class="col-lg-9 my-3">
            <a href="<?php echo base_url('');?>"><img class="logo" src="<?php echo base_url('uploads/settings/')?>logo.png"></a> 
          </div>
          <div class="col-lg-3 pt-5 text-right">
            <ul class="text-white list-unstyled">
               <li class="mb-3"><a href="<?php echo base_url('');?>">HOME</a></li>
                <li class="mb-3"><a href="<?php echo base_url('gallery');?>">Gallery</a></li>
                <li class="mb-3"><a href="<?php echo base_url('products');?>">Products</a></li>
                <li class="mb-3"><a href="<?php echo base_url('products');?>">Natural-bold-dramatic</a></li>
                <li class="mb-3"><a href="<?php echo base_url('about');?>">ABOUT US</a></li>
                <li class="mb-3"><a href="<?php echo base_url('policy');?>">PRIVACY POLICY</a></li>
                <li class="mb-3"><a href="<?php echo base_url('terms');?>">TERMS</a></li>
                <li class="mb-3"><a href="<?php echo base_url('faq');?>">FAQ'S</a></li>

                <li class="mb-3"><a href="<?php echo base_url('contact');?>">CONTACT US</a></li>
            </ul>                                                               
          </div>
          <div class="col-xl-10 pt-5 mt-5 text-white">
            <p>© 2020 <a href="<?php echo base_url('');?>" class="fw-700">Cuban lash </a> | All Rights Reserved.</p>
          </div>
          <div class="col-xl-2 col-4 align-self-center text-white">
            <ul class="list-unstyled d-flex justify-content-between">
              <li><a href=""><span class="icon-facebook-f"></span></a></li>
              <li><a href=""><span class="icon-Icon-awesome-instagram"></span></a></li>
              <li><a href=""><span class="icon-Icon-awesome-twitter"></span></a></li>
            </ul>
          </div>
      </div>
      <button class="scrolltop wow bounce" data-wow-offset="10"  data-wow-iteration="infinite" ><span>&#8593; </span></button>
    </footer>
    <script type="text/javascript" src="<?php echo base_url('assets/front/')?>js/plugin.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/')?>js/custom.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <?php if($this->session->flashdata('msg') == 1):?>
      <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
      <?php elseif($this->session->flashdata('msg') == 2):?>
        <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php endif;?>


    <script type="text/javascript">
      $(document).ready(function(){

           $.ajax({
                url: '<?php echo base_url('ecom_process/check_cart'); ?>',
                type: 'post',
                success: function (data) {
                  
                  if(data){
                   $('.itemInCart').text(data);
                 } else if (data == 2) {
                  toastr.error('Something Went Wrong, Please Try Again Later.')
                }
              }
            });


          $(".cart_btn").click(function (event) {
            event.preventDefault();

            var proid = $(this).data('proid');
            var proqty = $(this).data('proqty');

            if(!proqty)
            {
              var proqty = $(".qty").val();
            }
   
           $.ajax({
            url: '<?php echo base_url('ecom_process/cart_insert'); ?>',
            type: 'post',
            data: {product_id:proid,product_quantity:proqty},

      success: function (data) {

      if(data){
       toastr.success('Added To Cart.');
      $('.itemInCart').text(data);
        } 
        else{
          toastr.error('Something Went Wrong, Please Try Again Later.')
        }
      }
    });
     });
      })
    </script>
    <script>

  $(".remove_from_cart").on('click',function(){    
   var id = $(this).parents('tr');
   $.ajax({
    url: '<?php echo base_url('ecom_process/updatecart')?>',
    type: 'post',
    data: {
     qty:'0',
     id:id.data('id'),
   },
   success: function(data){       
     if(data == 1){    
      id.remove();
      location.reload();
    }else if(data == 2){
      toastr.error('Something Went Wrong, Please Try Again Later.')
    }
  }
});
 });


  $("#apply-coupon").click(function(){  
    $.ajax({
     url: '<?php echo base_url("ecom_process/apply_coupon");?>',
     type: 'POST',
     data: {coupon_code:$('#couponcode').val()},
     success: function(data) {
      
      if(data == 1)
      {
       toastr.success('Coupon Code Applied');
       location.reload();
     }
     else if(data == 2)
     {
       toastr.error('Invalid Coupon Code.')
     }
   }
 });
  });


  $(".phoneValid").keydown(function(e) {
   if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
     (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
     (e.keyCode >= 35 && e.keyCode <= 40)) {
     return;
 }
 if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
   e.preventDefault();
 }
});

  $('.pro-qty').on('change',function(){
      var qty = $(".pro-qty").val();
    
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/updatecart');?>",  
      data: {
        qty:qty,
        id: $(this).parents('tr').data('id'),
      },   
      dataType: "html",     
      success: function(data){
        location.reload();
      },
      error: function(data) {
        console.log(data);
      }
    }); 
  });
  
    function ShippingChecker()
{
   $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/ship');?>",  
      data: {
        zipcode: $('#zipcode').val(),
      },      
      dataType: "html",     
      success: function(data){

        if(data == 0)
        {
          $('#placeOrder').hide();
          $('.ship').html("Not Avaliable");
        }
        else
        {
          $('#placeOrder').show();
          let grandtotal = '<?php echo round(str_replace(",","",get_grand_total()),2); ?>; ?>';
          let shiptotal = data;
          let paytotal = parseFloat(grandtotal)+parseFloat(shiptotal);
          let toshow = '<strong><?php echo $this->currency; ?> '+paytotal.toFixed(2)+'</strong>';
          $('.finalValue').html(toshow);
          $('.ship').text('<?php echo $this->currency?> '+data);
          
        }
      },
      error: function(data) {
      }
    });
}

  $("#checkShip").on("click",function() {
      ShippingChecker();      
  });
  $("#zipcode").on("change",function() { 
      ShippingChecker();      
  });

   $("#country").on("change",function() {  
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/get_states');?>",  
      data: {
        id: $(this).val()
      },      
      dataType: "html",     
      success: function(data){
        $('#state').html(data);
      },
      error: function(data) {
        console.log(data);
      }
    });   
  });
  
  
  $("#state").on("change",function() {  
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/get_cities');?>",  
      data: {
        id: $(this).val()
      },      
      dataType: "html",     
      success: function(data){
        $('#city').html(data);
      },
      error: function(data) {
        console.log(data);
      }
    });   
  });


</script>
  </body>
</html>
