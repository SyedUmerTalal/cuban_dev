  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 p-0">
          <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d429373.53060235316!2d-97.308801!3d32.779511!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e6e122dc807ad%3A0xa4af8bf8dd69acbd!2sFort%20Worth%2C%20TX!5e0!3m2!1sen!2sus!4v1583435095181!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="col-md-6 contact  p-4">
          <h2 class="clr-1"><?php echo $contactData->heading_page;?></h2>
          <form action="<?php echo base_url('contact/form_validation');?>" method="post">
            <div class="form-row">
             <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Name">
                <?php echo form_error('name','<div class="text-danger">','</div>');?>
             </div>
             <div class="col">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <?php echo form_error('email','<div class="text-danger">','</div>');?>
             </div>            
            </div>
            <div class="form-group py-2">
               <textarea class="form-control" name="message" placeholder="Message" rows="3"></textarea>
               <?php echo form_error('message','<div class="text-danger">','</div>');?>
            </div>
            <button type="submit" class="white"><?php echo $contactData->form_button_text;?></button>
          </form>
          <div class="pt-3">
            <p><?php echo $contactData->phone_text;?></p>
            <p><?php echo $contactData->email_text;?></p>
            <p><?php echo $contactData->address_text;?></p>
            <p><?php echo $contactData->timings_text;?></p>
          </div>
        </div>
      </div>
    </div>