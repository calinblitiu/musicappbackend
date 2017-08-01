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
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
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
                    <?php for($i = 1; $i<=18; $i++)
                    {
                      ?>
                      <tr>
                      <th><?=$i?></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-center">
                        <a class="btn btn-sm btn-info" href=""><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid=""><i class="fa fa-trash"></i></a>
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