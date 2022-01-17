  <script>
    $(document).ready(function (){
      $("form").on("change","#product_name",function() {   
        var str = $(this).val();
        str = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
        $('#product_slug').val(str);
      });
    });
  </script>
  <div class="content">
    <div class="container-fluid">
      <div>
        <h1 style="display:inline-block;">
          Product
        </h1>
        <h3 class="box-title" style="display:inline-block;">Edit</h3>
      </div>     
      <form role="form" action="<?php echo site_url('master/edit/'.$record->product_id.'');?>" method="post" enctype="multipart/form-data">
        <div class="col-md-6">

          <div class="box-body"> 

            <div class="form-group">
              <label>Category</label>
              <select class="form-control" id="category_id" name="category_id" required>
                <?php if(!empty($category)): foreach($category as $cat):?>
                  <option <?php echo ($cat->category_id == $record->category_id)? 'selected':'' ?> value="<?php echo $cat->category_id;?>"><?php echo get_name_by_id('category',$cat->category_id);?></option>
                <?php endforeach; endif;?>
              </select>         
            </div>

            <div class="form-group">
              <label>Product name</label>
              <input type="name" class="form-control" id="product_name" name="product_name" value="<?php echo $record->product_name?>" required>
            </div>

            <div class="form-group">
              <label>Product slug</label>
              <input type="name" class="form-control" id="product_slug" name="product_slug" value="<?php echo $record->product_slug?>" required>
            </div>

            <div class="form-group">
              <label>Product short descripition </label>
              <textarea class="editor form-control" rows="3" id="product_detail" name="product_detail" required><?php echo !empty($record->product_detail)?$record->product_detail:''?></textarea>
            </div>

            <div class="form-group">
              <label>Product Main Image</label>
              <div class="input-group-btn">
                <div class="image-upload">                      
                  <img src="<?php echo !empty($record->product_image)?base_url('uploads/product/').$record->product_image:base_url('assets/img/placeholder.png')?>">
                  <div class="file-btn">
                    <input type="file" id="product_image" name="product_image">
                    <input type="text" id="product_image" name="product_image" value="<?php echo !empty($record->product_image)?$record->product_image:''?>" hidden>
                    <label class="btn btn-info">Upload</label>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="form-group">
						<label>Product Descripition File</label>
						
						<div class="input-group-btn">
							<div class="image-upload">                      
								<h4>Only PDF TXT XLXS AND DOCX FILE ALLOWED</h4>
								<h6>Current File (<?php echo !empty($record->product_detail_file)?$record->product_detail_file:'Not Uploaded'?>)</h6>
								<div class="file-btn">
									<input type="file" id="product_detail_file" name="product_detail_file">
									<input type="text" id="product_detail_file" name="product_detail_file" value="<?php echo !empty($record->product_detail_file)?$record->product_detail_file:''?>" hidden>
									<label class="btn btn-info">Upload</label>
								</div>
							</div>
						</div>
					</div>

          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url('admin')?>" class="btn btn-danger">Dashboard</a>
          </div> 
        </div> 
        <?php $countries_avaliable = records_all('product_country',array('product_id'=>$record->product_id));?>
        <div class="col-md-6"> 

          <h2 style="display:inline-block;">
            Please select countries 
          </h2>
          <?php if(!empty($countries)): foreach($countries as $con): ?>
            <div style="font-size: 18px;" class="">
              <label for="<?php echo $con->country_id; ?>">
                <input 
                <?php
                if(!empty($countries_avaliable))
                {
                 echo (check_for_value($countries_avaliable,$con->country_id) == "yes")?'checked':'';
               }
               ?> 
               type="checkbox" id="<?php echo $con->country_id; ?>" name="countries[]" value="<?php echo $con->country_id; ?>"> <?php echo $con->country_name; ?>
             </label>
           </div>
         <?php endforeach; endif; ?>
         <?php 

         function check_for_value($array,$search_key)
         {
          foreach ($array as $value) 
          {
            if($value->country_id == $search_key)
            {
              return "yes";
              break;
            }
          }
        }
        ?>


      </form>  
    </div>
  </div>
</div> 
