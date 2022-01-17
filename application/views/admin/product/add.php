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
			<h3 class="box-title" style="display:inline-block;">Add</h3>
		</div>    
		
		<form role="form" action="<?php echo base_url('master/add')?>" method="post" enctype="multipart/form-data">    
			<div class="col-md-6">   
				<div class="box-body">

					<div class="form-group">
						<label>Category: </label>
						<select class="form-control" id="category_id" name="category_id" required>
							<option value="null">Please Select</option>
							<?php if(!empty($category)): foreach($category as $cat): ?>
								<option value="<?php echo $cat->category_id;?>"><?php echo get_name_by_id('category',$cat->category_id);?></option>
							<?php endforeach; endif; ?>
						</select>         
					</div> 

					<div class="form-group">
						<label>Product name</label>
						<input type="name" class="form-control" id="product_name" name="product_name" >
						<input type="hidden" class="form-control" id="product_slug" name="product_slug" >
					</div> 

					<div class="form-group">
						<label>Product descripition </label>
						<textarea class="editor form-control" rows="3" id="product_detail" name="product_detail" required></textarea>
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
			<div class="col-md-6"> 
				<h2 style="display:inline-block;">
					Please select countries 
				</h2>
				<?php if(!empty($countries)): foreach($countries as $con): ?>
					<div style="font-size: 18px;" class="">
						<label for="<?php echo $con->country_id; ?>"><input type="checkbox" id="<?php echo $con->country_id; ?>" name="countries[]" value="<?php echo $con->country_id; ?>"> <?php echo $con->country_name; ?></label>
					</div>
				<?php endforeach; endif; ?>
				
			</div>
		</div>
	</form>  
</div> 