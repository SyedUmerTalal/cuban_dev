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
            <div class="col-md-8">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb  ">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>"><?php echo $policyData->previous_page_text;?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $policyData->next_page_text;?></li>
            </ol>
          </nav>
          </div>
          </div>
      <div class="row">
        <div class="col-12 contact align-self-center">
          <h2 class="clr-1"><?php echo $policyData->main_heading;?></h2>
          <p>
            <?php echo $policyData->main_text;?>
          </p>
          <h4 class=""><?php echo $policyData->sub_heading_one;?></h4>
          <p>
            <?php echo $policyData->sub_heading_one_text;?>
          </p>
          <h4 class=""><?php echo $policyData->sub_heading_two;?></h4>
          <p>
           <?php echo $policyData->sub_heading_two_text;?>
          </p>
          <h4 class=""><?php echo $policyData->sub_heading_three;?></h4>
          <p>
           <?php echo $policyData->sub_heading_three_text;?>
          </p>
        </div>
      </div>
    </div>