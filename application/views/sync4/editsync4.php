<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i>Edit Sync4
      </h1>
    </section>

    <section class="content">
        <div class="row">
           <div class="col-md-4">
           		<div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Sync4 Details</h3>
                    </div><!-- /.box-header -->

                     <form id="addSampleSet" action="<?php echo base_url() ?>index.php/updatesync4_b" method="post" role="form" enctype='multipart/form-data'>
                     <input type="hidden" name="sid" value="<?=$sample[0]['id']?>" id="sid">
                     	 <div class="box-body">
                     	  <div class="row">
                     	 	
								          <div class="col-md-12">
	                                <div class="form-group">
	                                    <label for="fname">Name</label>
	                                    <input type="text" class="form-control required" id="sname" name="sname" maxlength="256" value="<?=$sample[0]['name']?>">
	                                </div>
	                            </div>

	                            <div class="col-md-12">                                
	                                <div class="form-group">
	                                    <label for="fname">Description</label>
	                                    <textarea class="form-control required" id="sdescription" name="sdescription"><?=$sample[0]['description']?></textarea>
	                                </div>
	                            </div>

	                            <div class="col-md-12">                                
	                                <div class="form-group">
	                                    <label for="fname">Free</label>
	                                    <input type="checkbox" class="" id="sfree" name="sfree" <?php echo $sample[0]['is_free']=='yes'?'checked':'';?>>
	                                </div>
	                            </div>

	                            <div class="col-md-12">                                
	                                <div class="form-group">
	                                    <label for="fname">Price</label>
	                                    <input type="Number" class="form-control required" id="sprice" name="sprice" value="<?=$sample[0]['price']?>" <?php echo $sample[0]['is_free']=='yes'?'disabled':'';?>>
	                                </div>
	                            </div>
                              <?php 
                               $thumimage_url = $sample[0]['thumb'] == ""? base_url()."assets/thumbimages/no_img.png":base_url().'assets/thumbimages/'.$sample[0]['thumb'];
                              ?>
                              <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="thumb">Collection Image</label>
                                        <input type="file" class="" id="thumb" name="thumbimg" style="display: inline;"  accept="image/*">
                                        <img src="<?=$thumimage_url?>" id="thubpreview" style="width: 100px;">
                                    </div>
                                </div>
                     	 </div>
                     	 <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>

                     </form>

                </div>

           </div> 


        </div>


          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header">
                  <h3 class="box-title">Update Sync4 Music Files</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Listen</th>
                      <th>Actions</th>
                      
                    </tr>
                    <?php
                      for($i=1;$i<=4;$i++)
                      {
                    ?>
                    <tr>
                      <td><?=$i?></td>
                      <td>
                        <?php
                          if($sample[0]['music_'.$i] == null || $sample[0]['music_'.$i] == "" || !file_exists(FCPATH.'assets/sync4-musicfiles/'.$sample[0]['music_'.$i]))
                          {
                            echo "No Music File";
                          }
                          else{
                            ?>
                              <audio controls="">
                                <source src="<?=base_url()?>assets/sync4-musicfiles/<?=$sample[0]['music_'.$i]?>" type="audio/ogg">
                              </audio>
                            <?php
                          }
                        ?>
                      </td>
                      
                      <td> 
                        <span class="btn btn-sm btn-success edit-music-file" alt="edit sample" data-music-no="<?=$i?>"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-sample-btn" alt="delete sample"><i class="fa fa-trash"></i></span>
                      </td>
                    </tr>
                    
                    <?php
                      }
                    ?>
                  </table>
                  <form action="<?=base_url()?>index.php/sync4-upload-music" role="form" enctype='multipart/form-data' id='sync4-upload-form' method="post" style="display: none;">
                    <input type="hidden" name="sync4-id" id="sync4-id" value="<?=$sample[0]['id']?>">
                    <input type="hidden" name="sync4-music-no" id="sync4-music-no">
                    <input type="file" name="sync4-music-file" id="sync4-music-file" accept="audio/*">
                  </form>
              </div>
            </div>
          </div>


    <script src="<?php echo base_url(); ?>assets/js/addSample.js" type="text/javascript"></script>
  </section>
</div>

<script type="text/javascript">
  $(".edit-music-file").click(function(){
      //alert($(this).data("music-no"));
      $("#sync4-upload-form").closest('form').get(0).reset();
      $("#sync4-music-no").val($(this).data("music-no"));
      $("#sync4-music-file").trigger('click');
  });

  $("#sync4-music-file").change(function(){
    if(!this.files[0]){
      //alert("file no selected");
      return;
    }
    //alert("file selected");
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = musicFileLoaded;
    reader.readAsDataURL(this.files[0]);
  });

  function musicFileLoaded(e)
  {
    $("#sync4-upload-form").submit();
  }
</script>
