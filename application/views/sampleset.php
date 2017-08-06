<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i>Edit Sample Set
      </h1>
    </section>

    <section class="content">
        <div class="row">
           <div class="col-md-4">
           		<div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Sample Details</h3>
                    </div><!-- /.box-header -->

                     <form role="form" id="addSampleSet" action="<?php echo base_url() ?>updatesampleset_b" method="post" role="form">
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
                     	 </div>
                     	 <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>

                     </form>

                </div>
           </div> 
        </div>

<?php 

$order_short = $sample[0]['order_short'];
$order_short = explode(",", $order_short);

$order_long = $sample[0]['order_long'];
$order_long = explode(",", $order_long);

?>
        <div class="">
           <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Sample Sequence(Short)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul id="short-seq" class="sortable">
                          <?php foreach($order_short as $key_no):?>
                            <li class="ui-state-default" predmet-id="<?=$key_no?>">Item <?=$key_no?></li>
                          <?php endforeach;?>
                        </ul>
                    </div>
                     <div class="box-footer">
                        <input type="button" class="btn btn-primary short-change-btn" value="Change" />
                        <input type="button" class="btn btn-default sort-seq-undo" value="Reset" />
                    </div>
                </div>
            </div>
        </div>        

        <div class="">
           <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Sample Sequence(Long)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul id="long-seq" class="sortable">
                          <?php foreach($order_long as $key_no):?>
                            <li class="ui-state-default" predmet-id="<?=$key_no?>">Item <?=$key_no?></li>
                          <?php endforeach;?>
                        </ul>
                    </div>
                     <div class="box-footer">
                        <input type="submit" class="btn btn-primary long-change-btn" value="Change" />
                        <input type="reset" class="btn btn-default sort-seq-undo" value="Reset" />
                    </div>
                </div>
            </div>
        </div>          
	</section>
</div>

<script src="<?php echo base_url(); ?>assets/js/addSample.js" type="text/javascript"></script>
<style type="text/css">
    .sortable { 
        list-style-type: none; 
        margin: 0; 
        padding: 0; 
        width: 100%;
     }
  .sortable li { 
    margin: 0 3px 3px 3px;
     padding: 0.4em; 
     padding-left: 1.5em; 
     font-size: 1.4em; 
     cursor: pointer;
     border: 1px solid #c5c5c5;
    background: #f6f6f6;
    font-weight: normal;
    color: #454545;
}
  .sortable li span { 
    position: absolute; 
    margin-left: -1.3em; 
}
</style>
