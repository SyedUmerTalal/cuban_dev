<script>
  $(document).ready(function(){
   $.ajax({
    url: '<?php echo base_url('ecom_process/check_cart'); ?>',
    type: 'post',
    success: function (data) {
      let cartdata = JSON.parse(data);
      if(cartdata.status == 1){
       $('#itemInCart').text(cartdata.total_in_cart);
     } else if (data == 2) {
      toastr.error('Something Went Wrong, Please Try Again Later.')
    }
  }
});
 });

  $("#cart_form").submit(function (event) {
   event.preventDefault();
   $.ajax({
    url: '<?php echo base_url('ecom_process/cart_insert'); ?>',
    type: 'post',
    data: $("#cart_form").serialize(),
    success: function (data) {

      let cartdata = JSON.parse(data);

      if(cartdata.status == 1){
       toastr.success('Added To Cart.');

       var cartOnClick = '<div class="col-md-3 col-5">';
       cartOnClick += '<a href="" tabindex="-1">';
       cartOnClick += '<img class="lazy loaded w-100" src="'+cartdata.imagePath+'" data-was-processed="true"></a>';
       cartOnClick += '</div>';
       cartOnClick += '<div class="col-md-9 col-7 align-self-center">';
       cartOnClick += '<h5>'+cartdata.productName+'</h5>';
       cartOnClick += '<h6 class="fw-300">'+cartdata.brand+'</h6>';
       if(cartdata.color)
       {
        cartOnClick += ' <p>Color: '+cartdata.color+'</p>';
      }
      if(cartdata.size)
      {
        cartOnClick += ' <p>Color: '+cartdata.size+'</p>';
      }
      cartOnClick += '</div>';
      cartOnClick += '</div>';

      $('#ShowCart').show();
      $('#Total').text('Your Cart is Looking Good');
      $('#itemInCart').text(cartdata.total_in_cart);
      $('#toShowItems').append(cartOnClick);
    } else if (data == 2) {
      toastr.error('Something Went Wrong, Please Try Again Later.')
    }
  }
});
 });

  $(".remove_from_cart").on('click',function(){    
   var id = $(this).parents('tr');
   alert(id);
   return false;
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
       toastr.error('Invalid Coupon Code.');
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
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/updatecart');?>",  
      data: {
        qty: $(this).val(),
        id: $(this).parents('tr').data('id'),
      },   
      dataType: "html",     
      success: function(data){
        //location.reload();
      },
      error: function(data) {
        console.log(data);
      }
    }); 
  });

  $("#country").on("change",function() {  
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
      alert();
      ShippingChecker();      
  });
  $("#zipcode").on("change",function() { 
      ShippingChecker();      
  });


  $("#city").on("change",function() { 
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/aramex_ship_cart_price');?>",  
      data: {
        country: $('#country').val(),
        city:$(this).val(),
      },      
      dataType: "html",     
      success: function(data){
        if(data == '"free-ship"')
        {
          $('.ship').text('<?php echo $this->currency?> '+'Free shipping');
        }
        else
        {
          var grandtotal = '<?php echo get_grand_total(); ?>';
          var shiptotal = data;
          var paytotal = parseFloat(grandtotal)+parseFloat(shiptotal);
          var toshow = '<strong><?php echo $this->currency; ?> '+paytotal+'</strong>';
          $('.finalValue').html(toshow);
          $('.ship').text('<?php echo $this->currency?> '+data);
        }
      },
      error: function(data) {
        alert(data);
      }
    });   
  });


</script>