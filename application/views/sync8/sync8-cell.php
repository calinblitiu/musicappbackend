<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Edit Sample
        <small>Add, Edit, Delete</small>
        <div id="music-player-div"></div>
        
      </h1>
    </section>
    
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <?php 
                   $thumimage_url = $sample['thumb'] == ""? base_url()."assets/thumbimages/no_img.png":base_url().'assets/thumbimages/'.$sample['thumb'];
                 ?>
                 <img src="<?=$thumimage_url?>" style="width: 100px;float: left;margin-right: 10px;">
                    <h3 class="box-title"><?=$sample['name']?></h3><p><?=$sample['description']?></p>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Drum</th>
                      <th>Bass</th>
                      <th>Piano</th>
                      <th>Rhodes</th>
                      <th>Organ</th>
                      <th>Synth</th>
                      <th>Guitar</th>               
                      
                    </tr>
                    <?php for($i = 1; $i<=8; $i++)
                    {
                      //var_dump($sample['key_item_'.$i]);
                      ?>
                      <tr data-item-id="<?=$sample['key_item_'.$i][0]['id']?>" data-key-no="<?=$i?>">
                      <th><?=$i?></th>
                      <th><?=$sample['key_item_'.$i][0]['name']?></th>
                      <th data-key="1">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_1']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="2">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_2']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="3">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_3']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="4">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_4']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="5">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_5']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="6">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_6']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="7">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['player_7']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                     
                      
                    </tr>
                      <?php
                    }
                    ?>

                  </table>
                  
                  <form action="<?=base_url()?>index.php/sync8-upload-music" role="form" enctype='multipart/form-data' id='sync8-upload-form' method="post" style="display: none;">
                    <input type="hidden" name="sync8-cell-id" id="sync8-cell-id" value="">
                    <input type="hidden" name="sync8-music-no" id="sync8-music-no">
                    <input type="hidden" name="sync8-id" value="<?=$sample['id']?>">
                    <input type="file" name="sync8-music-file" id="sync8-music-file" accept="audio/*">
                  </form>

                </div>
              </div>
            </div>
        </div>

    </section>
</div>

<div id="editmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?=base_url()?>index.php/editmusicfile" method="post" enctype='multipart/form-data' class="form-inline" id='music-upload-form'>
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Music File</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="sample-no" value="<?=$sample['id']?>">
            <input type="hidden" name="item-no" id='music-item-no'>
            <input type="hidden" name="field-name" id="music-field-name">
            <input type="hidden" name="key-no" id="music-key-no">      
            <div class="form-group add-music-form-group">
             <label class="add-music-label" >Drum  : </label>
             <input type="file" name="player_1" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-1 hide">Uploaded</span>
            </div>
            
            <div class="form-group add-music-form-group">
              <label class="add-music-label" >Bass  : </label>
             <input type="file" name="player_2" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-2 hide">Uploaded</span>
            </div>
            <div class="form-group add-music-form-group">
              <label class="add-music-label" >Piano : </label>
             <input type="file" name="player_3" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-3 hide">Uploaded</span>
            </div>
            <div class="form-group add-music-form-group">
              <label class="add-music-label" >Rhodes:</label>
             <input type="file" name="player_4" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-4 hide">Uploaded</span>
            </div>
            <div class="form-group add-music-form-group">
              <label class="add-music-label" >Organ:</label>
             <input type="file" name="player_5" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-5 hide">Uploaded</span>
            </div>
            <div class="form-group add-music-form-group">
              <label class="add-music-label" >Synth:</label>
             <input type="file" name="player_6" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-6 hide">Uploaded</span>
            </div>
            <div class="form-group add-music-form-group">
              <label class="add-music-label" >Guitar:</label>
             <input type="file" name="player_7" class="form-control"  accept="audio/*">
             <span class="uploaded-span uploaded-7 hide">Uploaded</span>
            </div>

           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" >Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div id="deletemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?=base_url()?>index.php/deletemusicfile" method="post" enctype='multipart/form-data'>
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Music File</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="sample-no" id="del-sample-no" value="<?=$sample['id']?>">
            <input type="hidden" name="item-no" id='del-music-item-no'>
            <input type="hidden" name="field-name" id="del-music-field-name">     

            <h3>
              <img src="<?=base_url()?>assets/images/loading.gif" style="width: 100%" class="del-items-loading">
              <div class="hide del-items-div">
                <p class="del-item"><span class="del-music-title">Drum</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-1" data-player="1"><i class="fa fa-trash"></i></span></p>
                <p class="del-item"><span class="del-music-title">Buss</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-2" data-player="2"><i class="fa fa-trash"></i></span></p>
                <p class="del-item"><span class="del-music-title">Piano</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-3" data-player="3"><i class="fa fa-trash"></i></span></p>
                <p class="del-item"><span class="del-music-title">Rhodes</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-4" data-player="4"><i class="fa fa-trash"></i></span></p>
                <p class="del-item"><span class="del-music-title">Organ</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-5" data-player="5"><i class="fa fa-trash"></i></span></p>
                <p class="del-item"><span class="del-music-title">Synth</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-6" data-player="6"><i class="fa fa-trash"></i></span></p>
                <p class="del-item"><span class="del-music-title">Guitar</span><span class="btn btn-sm btn-danger remove-music-one-file remove-music-one-file-7" data-player="7"><i class="fa fa-trash"></i></span>  </p>
              </div>
            </h3>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" >Delete All</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div id="listen-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Listen Music</h4>
          </div>
          <div class="modal-body listen-modal-body">
            <img src="<?=base_url()?>assets/images/loading.gif" style="width: 100%">
          
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-default listen-close-btn" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>
  </div>
</div>


<script type="text/javascript">
var baseURL = '<?=base_url()?>';
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/audiojs/audio.min.js" charset="utf-8"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/editItems.js" charset="utf-8"></script> -->

<script type="text/javascript">
  $('.listen-music-btn').each(function(){
    var me = $(this);
    var music_url = me.data('music-url');
    if (music_url=="") {
      me.removeClass('btn-success');
      me.addClass('btn-default');
      me.attr('disabled',true);
      me.siblings('.remove-music-btn').attr('disabled',true);
    }
  });

  $(".edit-music-btn").click(function(){
    $("#sync8-upload-form").closest('form').get(0).reset();
    


    var me = $(this);
    var p_th = me.parent();
    var pp_tr = me.parent().parent();
    var cell_id = pp_tr.attr('data-item-id');
    var cell_item_no = p_th.attr('data-key');
    $("#sync8-cell-id").val(cell_id);
    $("#sync8-music-no").val(cell_item_no);

    $("#sync8-music-file").trigger('click');
  });

  $("#sync8-music-file").change(function(){
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
    $("#sync8-upload-form").submit();
  }


</script>

<style type="text/css">
  .add-music-form-group{
    display: inherit!important;

  }
  .add-music-label{
    width: 10%;
  }
  .del-music-title{
    width: 30%;
  }
  .del-item{
    width: 50%;
  }
  .remove-music-one-file{
    float: right;
  }
</style>
