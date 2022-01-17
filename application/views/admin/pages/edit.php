<?php if(!empty($records)): foreach($records as $record): ?>
  <script>
    $(document).ready(function (){
      $("form").on("change","#category_name",function() {   
        var str = $(this).val();
        str = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
        $('#category_slug').val(str);
      });
    });
  </script>
  <div class="content">
    <div class="container-fluid">
      <div>
        <h1 style="display:inline-block;">
          <?php echo ucwords(str_replace("_"," ", $table)); ?>
        </h1>
        <h3 class="box-title" style="display:inline-block;">Edit</h3>
      </div>     
      <div class="col-md-6">
        <?php $tableid = $table."_id"?>
        <form role="form" action="<?php echo site_url('update_data/'.$table.'/'.$record->$tableid.'');?>" method="post" enctype="multipart/form-data">       
          <div class="box-body"> 

           <?php if(!empty($coloums)): foreach($coloums as $fields):?>


         
            
            <?php if(($fields->type == "int") && ($fields->name == "category_id") && (strpos($fields->name,"category_id") !== FALSE)):?>

            <?php if($fields->max_length == 11) :?>
              <?php $editvalue = $fields->name; ?>
              <div class="form-group">
                <label>Category: </label>
                <select class="form-control" id="category_id" name="category_id" required>
                  <option value="<?php echo $record->$editvalue; ?>"><?php echo get_name_by_id('category',$record->$editvalue); ?></option>
                  <?php $category= records_all('category');?>
                  <?php if(!empty($category)): foreach($category as $cat): ?>
                    <option value="<?php echo $cat->category_id;?>"><?php echo get_name_by_id('category',$cat->category_id);?></option>
                  <?php endforeach; endif; ?>
                </select>         
              </div> 


              <?php else: ?>
                <?php $editvalue = $fields->name; ?>
                <div class="form-group">
                  <label>Category : </label>
                  <select class="form-control" id="category_id" name="category_id" required>
                    <option value="<?php echo $record->$editvalue; ?>"><?php echo get_name_by_id('category',$record->$editvalue); ?></option>
                    <?php $category= records_all('category');?>
                    <?php if(!empty($category)): foreach($category as $cat): ?>
                      <option value="<?php echo $cat->category_id;?>"><?php echo get_name_by_id('category',$cat->category_id);?></option>
                    <?php endforeach; endif; ?>
                  </select>         
                </div>
              <?php endif; ?>

               <?php elseif(($fields->type == "int") && ($fields->name == "sub_category_id") && (strpos($fields->name,"sub_category_id") !== FALSE)):?>
               <?php $editvalue = $fields->name; ?>

              <div class="form-group">
                <label>Sub category: </label>
                <select class="form-control" id="sub_category_id" name="sub_category_id" >
                  <option value="<?php echo $record->$editvalue; ?>"><?php echo get_name_by_id('sub_category',$record->$editvalue); ?></option>
                </select>         
              </div> 



              <?php elseif($fields->type == "varchar" && ($fields->max_length == 300) && strpos(str_replace("_"," ", $fields->name),"image") !== FALSE):?>
              <?php $editvalue = $fields->name; ?>

              <div class="form-group">
                <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                <div class="input-group-btn">
                  <div class="image-upload">                      
                    <img class="imgpath" src="<?php echo !empty($record->$editvalue)?base_url('uploads/'.$table.'/').$record->$editvalue:base_url('assets/img/placeholder.png')?>">
                    <div class="file-btn">
                      <input type="text" class="imageselect btn" value="<?php echo $record->$editvalue;?>" id="<?php echo $fields->name; ?>" data-toggle="modal" data-target="#exampleModal" name="<?php echo $fields->name; ?>" value="" readonly>
                      <label for="<?php echo $fields->name; ?>" class="btn btn-info">Upload</label>
                    </div>
                  </div>
                </div>
              </div>

              <?php elseif($fields->type == "varchar" && ($fields->max_length == 302) && strpos(str_replace("_"," ", $fields->name),"image") !== FALSE):?>


              <?php $editvalue = $fields->name; ?>
              <div class="form-group">
                <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                <div class="input-group-btn">
                  <div class="image-upload">                      
                    <img class="imgpath" src="<?php echo !empty($record->$editvalue)?base_url('uploads/product/').$record->$editvalue:base_url('assets/img/placeholder.png')?>">
                    <div class="file-btn">
                      <input type="text" class="imageselect btn" value="<?php echo $record->product_image;?>" id="<?php echo $fields->name; ?>" data-toggle="modal" data-target="#exampleModal" name="product_image" value="" readonly>
                      <label for="<?php echo $fields->name; ?>" class="btn btn-info">Upload</label>
                    </div>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label>Upload Images</label>
                <div class="input-group-btn">
                  <?php $images = records_all('product_img',array('product_id'=>$record->product_id)); ?>
                  <?php if(!empty($images)): foreach($images as $img):?>
                    <div class="multi-image-upload">   
                      <i class="fa fa-times" aria-hidden="true"></i>                        
                      <img src="<?php echo !empty($img->product_img_image)?base_url('uploads/product_img/').$img->product_img_image:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="text" id="product_img_image" name="product_img_image[]" value="<?php echo !empty($img->product_img_image)?$img->product_img_image:''?>" hidden>
                      </div>
                    </div>
                  <?php endforeach; endif;?>                  
                  <div class="multi-image-upload">                      
                    <img src="<?php echo base_url('assets/img/placeholder.png')?>">
                    <div class="file-btn">
                      <input type="file" id="product_img_image" name="product_img_image[]">
                      <label class="btn btn-info">Upload</label>
                    </div>
                  </div>
                </div>
              </div> 
              
  
              <?php elseif($fields->type == "int" && ($fields->max_length == 11) && strpos($fields->name,('id')) !== FALSE):?>
            	    <?php $tablelor = str_replace("_id","", $fields->name); $field = $fields->name; ?>
            	    
					<div class="form-group">
						<label><?php echo str_replace("_"," ",  str_replace("_id"," ", $fields->name)); ?> </label>
						<select class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" required>
							<option value="<?php echo $record->$field; ?>"><?php echo get_name_by_id($tablelor,$record->$field); ?></option>
							<?php $table_records= records_all($tablelor);?>
							<?php if(!empty($table_records)): foreach($table_records as $cat): ?>
								<option value="<?php echo $cat->$field;?>"><?php echo get_name_by_id($tablelor,$cat->$field);?></option>
							<?php endforeach; endif; ?>
						</select>         
					</div>

              <?php elseif($fields->type == "double"):?>
                <?php $editvalue = $fields->name; ?>
                <div class="form-group">
                  <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                  <input type="name" class="form-control" value="<?php echo $record->$editvalue; ?>" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
                </div> 



                <?php elseif($fields->type == "int"):?>
                  <?php $editvalue = $fields->name; ?>
                  <div class="form-group">
                    <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                    <input type="name" class="form-control" id="<?php echo $fields->name; ?>" value="<?php echo $record->$editvalue; ?>" name="<?php echo $fields->name; ?>" >
                  </div> 

                  <?php elseif($fields->type == "timestamp"):?>
                    <?php $editvalue = $fields->name; ?>
                    <div class="form-group">
                      <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                      <input type="date" class="form-control" value="<?php echo $record->$editvalue; ?>" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
                    </div> 

                    <?php elseif($fields->type == "date"):?>
                      <?php $editvalue = $fields->name; ?>
                      <div class="form-group">
                        <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                        <input type="date" class="form-control" value="<?php echo $record->$editvalue; ?>" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
                      </div> 

                      <?php elseif(($fields->type == "varchar") && ($fields->max_length >= 500)):?>
                        <div class="form-group">
                            <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                            <textarea class="form-control"  rows="3" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" required><?php echo $record->$editvalue; ?></textarea>
                          </div>
                      <?php elseif($fields->type == "varchar"):?>
                        <div class="form-group">
                          <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                          <?php $editvalue = $fields->name; ?>
                          <input type="name" value="<?php echo $record->$editvalue; ?>" class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
                        </div> 
                        <?php elseif($fields->type == "text"):?>
                          <?php $editvalue = $fields->name; ?>
                          <div class="form-group">
                            <label><?php echo str_replace("_"," ", $fields->name); ?></label>
                            <textarea class="editor form-control"  rows="3" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" required><?php echo $record->$editvalue; ?></textarea>
                          </div>
                        <?php endif; ?>
                      <?php endforeach; endif;  ?>

                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="<?php echo base_url('admin')?>" class="btn btn-danger">Dashboard</a>
                    </div>    
                  </form>  
                </div>
              </div>
            </div> 
          <?php endforeach; endif;?> 
          <script>
            $(document).ready(function (){
              $("#category_id").on("change",function() {   
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/get_dropdown');?>",  
                  data: {
                    get_from: 'sub_category',
                    get_where: 'category',
                    id: $(this).val()
                  },      
                  dataType: "html",     
                  success: function(data){
                    $('#sub_category_id').html(data);  
                  },
                  error: function(data) {
                    console.log(data);
                  }
                });   
              });
            });
          </script>