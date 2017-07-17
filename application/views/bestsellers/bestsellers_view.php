
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
	
	<!--rightsidebar here-->
	<?php //$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
	<?php $this->load->view('leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
		<div id="page-content">
			<?php //$this->load->view('heidirectory/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="disableupdate();">Add Dish</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Dish Name</th>
						<th>Restaurant Name</th>
                        <th>Price</th>
                        <th>Description</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($bestsellers_list as $tblbestsellers):
				echo "<tr>";
				echo "<td>".$tblbestsellers['restaurantname']."</td>";
				echo "<td>".$tblbestsellers['dishname']."</td>";
				echo "<td>".$tblbestsellers['price']."</td>";
				echo "<td>".$tblbestsellers['dishdescription']."</td>";
				
				echo "<td><button onclick='deletedish(".$tblbestsellers['bsid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button> <a href='#modal-regular' data-toggle='modal' onclick='updatedishmodal(".$tblbestsellers['bsid'].");' type='reset' class='btn btn-effect-ripple btn-success'><i class='fa fa-pencil'></i></a></td></tr>";
				
				endforeach;
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
	<!-- Regular Modal -->
			<div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title"><strong>Dish Profile</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="<?php echo site_url('bestsellers/upload')?>" id="form_uploadbestseller" method="post" class="form-horizontal" onsubmit="return false;" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Restaurant</label>
                                            <div class="col-md-6">
                                                <select id="restaurantid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one">
													  
														<?php
														foreach ($restaurant_list as $tblrestaurants):
														echo "<option value='".$tblrestaurants['rid']."'>".$tblrestaurants['restaurantname']."</option>";
														endforeach;
														?>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Dish Name *</label>
                                            <div class="col-md-6">
                                                <input type="text" id="dishname" name="state-normal" class="form-control" >
												<input type="text" id="bsid" style="display: none;" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Price</label>
                                            <div class="col-md-6">
												<input type="text" id="price" name="state-normal" class="form-control" placeholder="(e.g. 100.00)">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Description</label>
                                            <div class="col-md-6">
                                               <textarea id="dishdescription" name="example-textarea-input" rows="5" class="form-control" placeholder="Description.."></textarea>
                                            </div>
                                        </div>
										
										<!--<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Image</label>
                                            <div class="col-md-6">
												<input type="text" id="dishphoto" name="state-normal" class="form-control">
                                            </div>
                                        </div>-->
										
										
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-input">Dish Image</label>
                                            <div class="col-md-9">
                                                <input type="file" id="dishphoto" name="dishphoto">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-input"></label>
                                            <div class="col-md-8">
											<div class="progress progress-striped active" style="display: none;">
											<div class="progress-bar progress-bar-info" id="progress-bar-dish" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
											</div>
											<ul class="toggle-menu">
											</ul>
											</div>
                                        </div>
										
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-warning" onclick="uploaddish();" id="uploadbtn">Upload</button>
							<button type="button" class="btn btn-effect-ripple btn-success" onclick="updatedish();" id="updatebtn">Update</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savedish();" id="savebtn">Save</button>
							<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Regular Modal -->				
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


