<div class="content">
  <div class="container-fluid">
    <div>
      <h1 style="display:inline-block;">
        <?php echo ucwords(str_replace("_"," ", $table)); ?>
      </h1>
      <h3 class="box-title" style="display:inline-block;">List</h3>
    </div>
    <?php if($table == "contact_inquiry" || $table == "human_resources_inquiry"):?>
      <?php else: ?>
       <a class="btn btn-info" href="<?php echo site_url('add/').$table;?>">Add New</a>
     <?php endif; ?>
     <hr style="border-top: 1px solid #504444;">

     <div class="col-md-12">  
      <div class="box-body"> 
        <div class="table-responsive">
          <table id="table_id" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S.No</th>
                <?php if(!empty($fields)): foreach($fields as $row): ?>
                  <th><?php echo ucwords(str_replace("_"," ", $row->name)); ?></th>
                <?php endforeach; endif; ?>
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
                    <?php if(!empty($fields)): foreach($fields as $row): ?>

                      <?php if($row->type == "varchar" && strpos(str_replace("_"," ", $row->name),"image") !== FALSE):?>
                        <?php $field = $row->name; ?>
                        <?php if(!empty($record->$field)):?>
                          <td><img width="100" src="<?php echo base_url('uploads/').'/'.$table.'/'.$record->$field;?>" ></td>
                          <?php else: ?>
                            <td><img width="100" src="<?php echo base_url('assets/img/placeholder.png');?>" ></td>
                          <?php endif;?>
                          <?php elseif($row->type == "int" && strpos(str_replace("_"," ", $row->name),"id") !== FALSE):?>
                            <?php $field = $row->name; ?>
                            <td><?php echo get_name_by_id(str_replace("_id","", $row->name), $record->$field);?></td>      
                            
                            <?php else: ?>
                              <?php $field = $row->name; ?>
                              <td><?php echo $record->$field;?></td>
                            <?php endif; ?>
                          <?php endforeach; endif; ?>

                          <td>
                            <?php $tablenew = "$table"."_id";?>
                            <a href="<?php echo site_url('view/'.$table.'/').$record->$tablenew;?>"><span class="view_icon"><i class="fa fa-eye" aria-hidden="true"></i></span></a>  
                            <?php if($table == "contact_inquiry" || $table == "human_resources_inquiry"):?>

                              <?php else: ?>
                                <a href="<?php echo site_url('edit/'.$table.'/').$record->$tablenew;?>"><span class="edit_icon"><i class="fas fa-pencil-alt"></i></span></a>

                                <a href="<?php echo site_url('delete/'.$table.'/'.$record->$tablenew);?>"><span class="delete_icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                              <?php endif; ?>
                              
                            </td>
                          </tr> 
                        <?php endforeach; endif;?>  
                      </tbody> 
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <a href="<?php echo base_url('admin')?>" class="btn btn-danger">Dashboard</a>
                </div>    
              </div>
            </div>
          </div>
