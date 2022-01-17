<div class="content">
  <div class="container-fluid">
    <div>
      <h1 style="display:inline-block;">
        Product
      </h1>
      <h3 class="box-title" style="display:inline-block;">View</h3>
    </div>   
    <div class="col-md-12">
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 300px;">Attributes</th>
              <th>Values</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td>Category</td>
            <td><?php echo get_name_by_id('category',$record->category_id);?></td>
          </tr>

          <tr>
            <td>Product Name</td>
            <td><?php echo $record->product_name;?></td>
          </tr>
          <tr>
            <td>Product Slug</td>
            <td><?php echo $record->product_slug;?></td>
          </tr>

          <tr>
            <td>Product Details</td>
            <td><?php echo $record->product_detail;?></td>
          </tr>
          
          <tr>
            <td>Product File</td>
             <?php if(!empty($record->product_detail_file)): ?>
                <td><a href="<?php echo base_url('uploads/product/').$record->product_detail_file;?>"><?php echo $record->product_detail_file;?></a></td>
                <?php else: ?>
                <td>NOT UPLOADED</td>
                <?php endif; ?>
          </tr>
          
         
    
          <tr>
            <td>Product Image</td>
            <td><img style="max-width:400px" src="<?php echo !empty($record->product_image)?base_url('uploads/product/').$record->product_image:base_url('assets/img/placeholder.png')?>"></td>
          </tr>

          <?php $countries = records_all('product_country',array('product_id'=>$record->product_id)); ?>
          <tr>
            <td>Product avaliable countries</td>
            <td>

              <?php if(!empty($countries)): foreach($countries as $con):?>
                <b style="font-size:15px;"><?php echo get_name_by_id("country",$con->country_id); ?></b><br>
              <?php endforeach; endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
