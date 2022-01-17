
  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
<section class="about">
  <div class="container">
    <div class="row">
      <?php $this->load->view('front/customer/side-nav'); ?>
      <div class="col-sm-10">
        <table id="example1" class="table">
          <thead>
            <tr>
              <th width="20%">Attributes</th>
              <th>Values</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td><b>First Name</b></td> 
              <td><?php echo $customerData->customer_first_name?></td>
            </tr> 

            <tr>
              <td><b>Last Name</b></td> 
              <td><?php echo $customerData->customer_last_name?></td>
            </tr>  

            <tr>
              <td><b>Email</b></td> 
              <td><?php echo $customerData->customer_email?></td>
            </tr> 

            <tr>
              <td><b>Date of birth</b></td> 
              <td><?php echo $customerData->date_of_birth?></td>
            </tr> 

            <tr>
              <td><b>Phone Number</b></td> 
              <td><?php echo $customerData->customer_phone_number?></td>
            </tr> 

            <tr>
              <td><b>Address</b></td> 
              <td><?php echo $customerData->customer_address?></td>
            </tr> 


          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>






