<div class="content">
  <div class="container-fluid">
    <div>
      <h1 style="display:inline-block;">
        Product Attributes
      </h1>
      <h3 class="box-title" style="display:inline-block;">List</h3>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('master/add');?>">Add New</a>
    <hr style="border-top: 1px solid #504444;">
    <div class="col-md-12">  
      <div class="box-body"> 
       <table id="table_id" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Category</th>
            <th>Product Name</th>
            <th>Product File</th>
            <th>Product Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(!empty($records)):
            $x = 1;
            foreach($records as $record):
              ?>
              <tr>
                <td><?php echo $x++;?></td> 
                <td><?php echo get_name_by_id("category",$record->category_id);?></td>
                <td><?php echo $record->product_name;?></td>
                <?php if(!empty($record->product_detail_file)): ?>
                <td><a download href="<?php echo base_url('uploads/product/').$record->product_detail_file;?>"><?php echo $record->product_detail_file;?></a></td>
                <?php else: ?>
                <td>NOT UPLOADED</td>
                <?php endif; ?>
                <td><img style="max-width:150px; max-height:150px;" src="<?php echo ($record->product_image ? ''.base_url().'uploads/product/'.$record->product_image.'':'')?>" class="img-responsive"></td>
                <td>
                  <a href="<?php echo site_url('master/view/'.$record->product_id.'');?>"><span class="view_icon"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                  <a href="<?php echo site_url('master/edit/'.$record->product_id.'');?>"><span class="edit_icon"><i class="fas fa-pencil-alt"></i></span></a>
                  <a href="<?php echo site_url('master/delete/'.$record->product_id.'');?>"><span class="delete_icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                </td>
             </tr> 
           <?php endforeach; endif;?>  
         </tbody>
       </table>
     </div>
     <div class="box-footer">
      <a href="<?php echo base_url('admin')?>" class="btn btn-danger">Dashboard</a>
    </div>    
  </div>
</div>
</div>
