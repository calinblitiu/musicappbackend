<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i>Edit Sample Set
      </h1>
    </section>

    <section class="content">
        <div class="row">
           <div class="col-md-8">
           		<div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Sample Details</h3>
                    </div><!-- /.box-header -->

                     <form role="form" id="addSampleSet" action="<?php echo base_url() ?>updatesampleset_b" method="post" role="form">
                     <input type="hidden" name="sid" value="<?=$sample[0]['id']?>">
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
	                                    <input type="Number" class="form-control required" id="sprice" name="sprice" value="<?=$sample[0]['price']?>">
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
	</section>
</div>

<script src="<?php echo base_url(); ?>assets/js/addSample.js" type="text/javascript"></script>
