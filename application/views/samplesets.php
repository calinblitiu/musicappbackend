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
                    <h3 class="box-title"><?=$sample['name']?></h3><p><?=$sample['description']?></p>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>C</th>
                      <th>Db</th>
                      <th>D</th>
                      <th>Eb</th>
                      <th>E</th>
                      <th>F</th>
                      <th>Gb</th>
                      <th>G</th>
                      <th>Ab</th>
                      <th>A</th>
                      <th>Bb</th>
                      <th>B</th>
                      
                    </tr>
                    <?php for($i = 1; $i<=18; $i++)
                    {
                      ?>
                      <tr data-item-id="<?=$sample['key_item_'.$i][0]['id']?>">
                      <th><?=$i?></th>
                      <th data-key="C">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['C']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="Db">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['Db']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="D">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['D']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="Eb">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['Eb']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="E">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['E']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="F">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['F']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="Gb">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['Gb']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="G">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['G']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="Ab">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['Ab']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="A">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['A']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="Bb">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['Bb']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      <th data-key="B">
                        <span class="btn btn-sm btn-success listen-music-btn" data-music-url="<?=$sample['key_item_'.$i][0]['B']?>"><i class="fa fa-headphones"></i></span>
                        <span class="btn btn-sm btn-info edit-music-btn"><i class="fa fa-pencil"></i></span>
                        <span class="btn btn-sm btn-danger remove-music-btn"><i class="fa fa-trash"></i></span>
                      </th>
                      
                    </tr>
                      <?php
                    }
                    ?>

                  </table>
                </div>
              </div>
            </div>
        </div>

    </section>
</div>

<div id="editmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?=base_url()?>editmusicfile" method="post" enctype='multipart/form-data'>
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
            <input type="file" name="musicfile" required accept="audio/*">
           
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
    <form action="<?=base_url()?>deletemusicfile" method="post" enctype='multipart/form-data'>
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Music File</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="sample-no" value="<?=$sample['id']?>">
            <input type="hidden" name="item-no" id='del-music-item-no'>
            <input type="hidden" name="field-name" id="del-music-field-name">           
            <h2>Confirm Delete</h2>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" >Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
    </form>
  </div>
</div>


<script type="text/javascript">
var baseURL = '<?=base_url()?>';
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/audiojs/audio.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/editItems.js" charset="utf-8"></script>