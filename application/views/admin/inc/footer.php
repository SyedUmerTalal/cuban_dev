 <footer class="footer">
  <div class="container-fluid">
    <nav class="pull-left">
    </nav>
    <p class="copyright pull-right">
     <?php echo $this->settings->footer_tagline; ?>
    </p>
  </div>
</footer>

</div>
</div>
</body>

<script src="<?php echo base_url('assets/admin/');?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/');?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url('assets/admin/');?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script src="<?php echo base_url('assets/admin/');?>assets/js/demo.js"></script>

<script>
$(document).ready(function(){
    $('.editor').each(function(e) {
      CKEDITOR.replace( this.id,{
        allowedContent : true,
        filebrowserUploadUrl:"upload.php",
      });
    });
  })
</script>

<script>
  $(document).ready(function(){
    function imagePrepend(imgName){
     var image_html = '<div class="col-sm-2 setting"> <div class="asd"> <button class="selectimage cbselect" data-path="<?php echo base_url()."uploads"."/".str_replace("-","_",$this->uri->segment(2)); ?>/'+imgName+'" data-image="'+imgName+'" type="button">Select</button> <button class="deletephoto cbs" data-id="<?php echo "uploads"."/".str_replace("-","_",$this->uri->segment(2)); ?>/'+imgName+'" type="button"><b><i class="fa fa-trash" aria-hidden="true"></i></b></button> <img for="asd" src="<?php echo base_url()."uploads"."/".str_replace("-","_",$this->uri->segment(2)); ?>/'+imgName+'" class="img-responsive imgsetting"> </div> </div>';
     $('.uploaded_images_main').prepend(image_html);
   }

   var identifier;
        //CLOSING INPUT FILE PICKER
        $("body").on("click",".imageselect",function(event){
         identifier="";
         event.preventDefault(); 
         identifier = "#" + $(this).attr("id");
       });
        //SELECTING PHOTO FROM LIBRARY 
        $("body").on("click",".selectimage",function(){
         var imageName = $(this).data("image");
         var imagePath = $(this).data("path");
         $(identifier).attr('value',imageName);
         $(identifier).parent('.file-btn').siblings('.imgpath').attr("src",imagePath);
         $('#exampleModal').modal('hide');
       });
         //DELETING PHOTOS FROM DIRECTORY
         $(".deletephoto").on("click",function(){
          var this_ = $(this);
          var photolink = $(this).data("id");
          $.ajax({
            url:"<?php echo base_url("admin/photo_delete");?>",
            method:"post",
            dataType:"json",
            data: {photolink:photolink},
            success: function(data){
              if (data == 1) {
                $(this_).parent('.asd').parent('.setting').remove();
              }
            }
          });
        });


         $("#selectedimage").on("change",function(){
          var imgpath = "<?php echo $this->uri->segment(2);?>"
          var data = new FormData();
          $.each($('#selectedimage')[0].files, function(i, file) {
            data.append('image', file);
          });
          data.append('imagepath',imgpath);
          $.ajax({
            url:"<?php echo base_url("admin/photo_upload");?>",
            method:"post",
            dataType:"json",
            cache: false,
            contentType: false,
            processData: false,                
            data: data,
            success: function(data){
              if(data != 2){
                imagePrepend(data);
                toastr.success('Image Uploaded');
              }else if(data == 2){
                toastr.error('Something Went Wrong.')
              }
            }
          });
        });
       });
     </script>
     <script>
      $(document).ready( function () {
        $('#table_id').DataTable({
          "order": [[ 0, 'desc' ]]
        });

      } );

      $(document).ready(function(){
        $(".image-upload :file").on('change',function(){
          var file = this.files[0];
          var fileType = file["type"];
          var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
          if ($.inArray(fileType, ValidImageTypes) < 0) {
            alert_danger("Invalid File Format");
          }else{
            $(this).parents('.image-upload').prepend('<i class="fa fa-times" aria-hidden="true"></i>');
            $(this).parents('.file-btn').siblings('img').attr('src',URL.createObjectURL(this.files[0]));
          }
        })
        $(".image-upload").on('click','i',function(){    
          $(this).parents('.image-upload').children(':file').val('');
          $(this).parents('.image-upload').children('img').attr('src','<?php echo base_url('assets/img/placeholder.png')?>');
          $(this).remove();
        })
      })

      $(document).ready(function(){
        $("body").on('change','.multi-image-upload :file',function(){
          var file = this.files[0];
          var fileType = file["type"];
          var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
          if ($.inArray(fileType, ValidImageTypes) < 0) {
            alert_danger("Invalid File Format");
          }else{
            var temp = $(this).parents('.multi-image-upload:last').clone();  
            $(this).parents('.input-group-btn').append(temp).find('input:last').val('');
            $(this).parents('.multi-image-upload').prepend('<i class="fa fa-times" aria-hidden="true"></i>');
            $(this).parents('.file-btn').siblings('img').attr('src',URL.createObjectURL(this.files[0]));      
            $(this).siblings('label').remove();
          }
        })
        $(".multi-image-upload").on('click','i',function(){    
          $(this).parents('.multi-image-upload').remove();
        })
      })

      $(document).ready(function(){
        $('.form-group').each(function(i, obj) {
         if($(this).children('span').hasClass('help-block')){
           $(this).addClass('has-error');
         }
       });
      })
    </script>
    </html>
