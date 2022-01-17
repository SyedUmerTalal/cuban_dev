<script>
	$(document).ready(function (){
		$("form").on("change","#product_name",function() {   
			var str = $(this).val();
			str = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
			$('#product_slug').val(str);
		});
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
			<h3 class="box-title" style="display:inline-block;">Add</h3>
		</div>    
		<div class="col-md-6">
			<form role="form" action="<?php echo base_url('add_data/').$table?>" method="post" enctype="multipart/form-data">       
				<div class="box-body">

					<?php if(!empty($coloums)): foreach($coloums as $fields):?>


						<?php if($fields->type == "int" && ($fields->max_length == 11) && strpos($fields->name,('sub_category_id')) !== FALSE):?>
						
						<?php elseif(($fields->type == "int") && ($fields->name == "category_id") && (strpos($fields->name,"category_id") !== FALSE)):?>

						<?php if($fields->max_length == 11) :?>
							<div class="form-group">
								<label>Category: </label>
								<select class="form-control" id="category_id" name="category_id" required>
									<option value="null">Please Select</option>
									<?php $category= records_all('category');?>
									<?php if(!empty($category)): foreach($category as $cat): ?>
										<option value="<?php echo $cat->category_id;?>"><?php echo get_name_by_id('category',$cat->category_id);?></option>
									<?php endforeach; endif; ?>
								</select>         
							</div> 

							<div class="form-group">
								<label>Sub category: </label>
								<select class="form-control" id="sub_category_id" name="sub_category_id" >
									<option value="null">Please Select</option>
								</select>         
							</div> 

							<?php else: ?>
								<div class="form-group">
									<label>Category 2: </label>
									<select class="form-control" id="category_id" name="category_id" required>
										<option value="null">Please Select</option>
										<?php $category= records_all('category');?>
										<?php if(!empty($category)): foreach($category as $cat): ?>
											<option value="<?php echo $cat->category_id;?>"><?php echo get_name_by_id('category',$cat->category_id);?></option>
										<?php endforeach; endif; ?>
									</select>         
								</div>
							<?php endif; ?>


							<?php elseif($fields->type == "varchar" && ($fields->max_length == 300) && strpos(str_replace("_"," ", $fields->name),"image") !== FALSE):?>

							<div class="form-group">
								<label><?php echo str_replace("_"," ", $fields->name); ?></label>
								<div class="input-group-btn">
									<div class="image-upload">                      
										<img class="imgpath" src="<?php echo base_url('assets/img/placeholder.png')?>">
										<div class="file-btn">
											<input type="text" class="imageselect btn" id="<?php echo $fields->name; ?>"  data-toggle="modal" data-target="#exampleModal" name="<?php echo $fields->name; ?>" readonly>
											<label for="<?php echo $fields->name; ?>" class="btn btn-info">Upload</label>
										</div>
									</div>
								</div>
							</div>

							<?php elseif($fields->type == "varchar" && ($fields->max_length == 302) && strpos(str_replace("_"," ", $fields->name),"image") !== FALSE):?>

							<div class="form-group">
								<label><?php echo str_replace("_"," ", $fields->name); ?></label>
								<div class="input-group-btn">
									<div class="image-upload">                      
										<img class="imgpath" src="<?php echo base_url('assets/img/placeholder.png')?>">
										<div class="file-btn">
											<input type="text" class="imageselect btn" id="<?php echo $fields->name; ?>"  data-toggle="modal" data-target="#exampleModal" name="<?php echo $fields->name; ?>" readonly>
											<label for="<?php echo $fields->name; ?>" class="btn btn-info">Upload</label>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label>Upload Images</label>
								<div class="input-group-btn">
									<?php if(!empty($images)): foreach($images as $img):?>
										<div class="multi-image-upload">   
											<i class="fa fa-times" aria-hidden="true"></i>                        
											<img src="<?php echo !empty($comments_images_img)?base_url('uploads/comments_images/').$img->comments_images_img:base_url('assets/admin/img/placeholder.png')?>">
											<div class="file-btn">
												<input type="text" id="comments_images_img" name="comments_images_img[]" value="<?php echo !empty($img->comments_images_img)?$img->comments_images_img:''?>" hidden>
											</div>
										</div>
									<?php endforeach; endif;?>                  
									<div class="multi-image-upload">                      
										<img src="<?php echo base_url('assets/img/placeholder.png')?>">
										<div class="file-btn">
											<input type="file" id="comments_images_img" name="comments_images_img[]">
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
        									<option value="null">Please Select</option>
        									<?php $table_records= records_all($tablelor);?>
        									<?php if(!empty($table_records)): foreach($table_records as $cat): ?>
        										<option value="<?php echo $cat->$field;?>"><?php echo get_name_by_id($tablelor,$cat->$field);?></option>
        									<?php endforeach; endif; ?>
        								</select>         
        							</div>
        					
 					
							<?php elseif($fields->type == "double"):?>
								<div class="form-group">
									<label><?php echo str_replace("_"," ", $fields->name); ?></label>
									<input type="name" class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
								</div> 



								<?php elseif($fields->type == "int"):?>
									<div class="form-group">
										<label><?php echo str_replace("_"," ", $fields->name); ?></label>
										<input type="name" class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
									</div> 

										<?php elseif($fields->type == "timestamp"):?>
											<div class="form-group">
												<label><?php echo str_replace("_"," ", $fields->name); ?></label>
												<input type="date" class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
											</div> 

											<?php elseif($fields->type == "date"):?>
												<div class="form-group">
													<label><?php echo str_replace("_"," ", $fields->name); ?></label>
													<input type="date" class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
												</div> 


												<?php elseif($fields->type == "varchar"):?>
													<div class="form-group">
														<label><?php echo str_replace("_"," ", $fields->name); ?></label>
														<input type="name" class="form-control" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" >
													</div> 
													<?php elseif($fields->type == "text"):?>
														<div class="form-group">
															<label><?php echo str_replace("_"," ", $fields->name); ?></label>
															<textarea class="editor form-control" rows="3" id="<?php echo $fields->name; ?>" name="<?php echo $fields->name; ?>" required></textarea>
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
