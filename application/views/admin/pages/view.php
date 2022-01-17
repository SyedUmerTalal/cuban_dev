  <div class="content">
    <div class="container-fluid">
      <div>
        <h1 style="display:inline-block;">
          <?php echo ucwords(str_replace("_"," ", $table)); ?>
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
              <?php if(!empty($fields)): foreach($fields as $row): ?>
                <?php if($row->type == "varchar" && ($row->max_length == 302) && strpos(str_replace("_"," ", $row->name),"image") !== FALSE):?>
                <td><?php echo ucwords(str_replace("_"," ", $row->name)); ?></td>
                <?php $value = $row->name;$printable = $records->$value;?>
                <td><img width="300" src="<?php echo base_url('uploads/').$table.'/'.$printable;?>" ></td>
                <?php $tablename = $table."_id"; ?>
                <?php  $multi_img = records_all('product_img',array('product_id'=>$records->$tablename)); ?>
                <tr>
                  <td>Product Images</td>
                  <td>
                    <?php if(!empty($multi_img)): foreach($multi_img as $img):?>
                      <img style="max-width:300px; padding:5px;" src="<?php echo !empty($img->product_img_image)?base_url('uploads/product_img/').$img->product_img_image:base_url('assets/img/placeholder.png')?>">
                    <?php endforeach; endif; ?>
                  </td>
                </tr> 
                 <?php elseif($row->type == "int" && ($row->max_length == 11) && strpos($row->name,$row->name) !== FALSE):?>
                <?php $value = $row->name;$printable = $records->$value;?>
                <tr>
                  <td><?php echo ucwords(str_replace("_"," ", $row->name)); ?></td>
                  <td>
                    <?php $value = $row->name;$printable = $records->$value;echo get_name_by_id(str_replace('_id','', $row->name),$printable);?>
                  </td>
                </tr>
                <?php elseif($row->type == "varchar" && ($row->max_length == 300) && strpos(str_replace("_"," ", $row->name),"image") !== FALSE):?>
                <?php $value = $row->name;$printable = $records->$value;?>
                <td><?php echo ucwords(str_replace("_"," ", $row->name)); ?></td>
                
                <?php if(!empty($printable)):?>
                  <td><img width="300" src="<?php echo base_url('uploads/').$table.'/'.$printable;?>" ></td>
                  <?php else: ?>
                  <td><img width="300" src="<?php echo base_url('assets/img/placeholder.png');?>" ></td>
                <?php endif;?>
                
                <!--<td><img width="300" src="<?php echo base_url('uploads/').$table.'/'.$printable;?>" ></td>-->
                <?php elseif($row->type == "int" && ($row->max_length == 11) && strpos($row->name,$row->name) !== FALSE):?>
                <?php $value = $row->name;$printable = $records->$value;?>
                <tr>
                  <td><?php echo ucwords(str_replace("_"," ", $row->name)); ?></td>
                  <td>
                    <?php $value = $row->name;$printable = $records->$value;echo get_name_by_id(str_replace('_id','', $row->name),$printable);?>
                  </td>
                </tr>
                <?php elseif($row->type == "int" && ($row->max_length == 12) && strpos($row->name,$row->name) !== FALSE):?>
                <?php $value = $row->name;$printable = $records->$value;?>
                <tr>
                  <td><?php echo ucwords(str_replace("_"," ", $row->name)); ?></td>
                  <td>
                    <?php $value = $row->name;$printable = $records->$value;echo get_name_by_id(str_replace('_id','', $row->name),$printable);?>
                  </td>
                </tr>
                <?php else: ?>
                  <tr>
                    <td><?php echo ucwords(str_replace("_"," ", $row->name)); ?></td>
                    <td>
                      <?php $value = $row->name;$printable = $records->$value;echo $printable;?>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>