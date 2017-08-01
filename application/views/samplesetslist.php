<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Sample Sets
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addnewsampleset"><i class="fa fa-plus"></i> Add New Sample Set</a>  
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Simple Sets List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>searchsample" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?=$search?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Free</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php for($i = 1; $i<=count($samples); $i++)
                    {
                        $sample = $samples[$i-1];
                      ?>
                      <tr>
                      <th><?=$i?></th>
                      <th><?=$sample['name']?></th>
                      <th><?=$sample['description']?></th>
                      <th><?=$sample['price']?></th>
                      <th><?=$sample['is_free']?></th>
                      <th class="text-center">
                        <a class="btn btn-sm btn-success" href="<?=base_url()?>editsampleset/<?=$sample['id']?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-sm btn-info" href="<?=base_url()?>editsamplesets/<?=$sample['id']?>"><i class="fa fa-table"></i></a>
                        <span class="btn btn-sm btn-danger remove-sample-btn" data-sample-id="<?=$sample['id']?>"><i class="fa fa-trash"></i></a>
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

<div id="deletemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?=base_url()?>deletesampleset" method="post">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Sample</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="sample-no" id="sample-id-hidden">
            <h2>Confirm Delete</h2>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sampleset.js"></script>