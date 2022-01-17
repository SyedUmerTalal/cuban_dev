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
              <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>"><?php echo $faqData->previous_page_text;?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $faqData->next_page_text;?></li>
            </ol>
          </nav>
          </div>
          </div>
      <div class="row">
        <div class="col-12 contact align-self-center">
          

    <br />

    <div class="panel-group" id="accordion">
        <div class="faqHeader"><?php echo $faqData->heading_one;?></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $faqData->heading_two;?></a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse show in">
                <div class="panel-body">
                    <?php echo $faqData->heading_two_text;?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><?php echo $faqData->heading_three;?></a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_three_text;?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"><?php echo $faqData->heading_four;?></a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_four_text;?>
                </div>
            </div>
        </div>

        <div class="faqHeader"><?php echo $faqData->heading_five;?></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php echo $faqData->heading_six;?></a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo $faqData->heading_six_text;?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?php echo $faqData->heading_seven;?></a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_seven_text;?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?php echo $faqData->heading_eight;?></a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_eight_text;?>
                    <br />
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><?php echo $faqData->heading_nine;?></a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_nine_text;?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><?php echo $faqData->heading_ten;?></a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_ten_text;?> 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><?php echo $faqData->heading_eleven;?></a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_eleven_text;?>
                </div>
            </div>
        </div>

        <div class="faqHeader"><?php echo $faqData->heading_twelve;?></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><?php echo $faqData->heading_thirteen;?></a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                   <?php echo $faqData->heading_thirteen_text;?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><?php echo $faqData->heading_fourteen;?></a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo $faqData->heading_fourteen_text;?>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>