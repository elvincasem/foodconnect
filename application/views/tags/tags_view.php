
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
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="disableupdatetype();">Add Tag</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Restaurant Name</th>
						<th>Type</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($restaurant_list as $tblrestaurant):
				echo "<tr>";
				echo "<td>".$tblrestaurant['restaurantname']."</td>";
				echo "<td>".$tblrestaurant['type']."</td>";
				
				echo "<td><button onclick='deletetype(".$tblrestaurant['typeid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				//echo "<td><button onclick='deleterestaurant(".$tblrestaurant['typeid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button> <a href='#modal-regular' data-toggle='modal' onclick='updaterestaurantmodal(".$tblrestaurant['typeid'].");' type='reset' class='btn btn-effect-ripple btn-success'><i class='fa fa-pencil'></i></a></td></tr>";
				
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
							<h3 class="modal-title"><strong>Add Tag to a Restaurant</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="" id="form_upload" method="post" class="form-horizontal" onsubmit="return false;">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Restaurant</label>
                                            <div class="col-md-6">
                                                <select id="restaurantid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one">
													  
														<?php
														foreach ($restaurants_list as $tblrestaurants):
														echo "<option value='".$tblrestaurants['rid']."'>".$tblrestaurants['restaurantname']."</option>";
														endforeach;
														?>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Type</label>
                                            <div class="col-md-6">
                                                <select id="restauranttype" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one">
												  <option value="Fast Food">Fast Food</option>
												  <option value="Steak House">Steak House</option>
												  <option value="Barbeque House">Barbeque House</option>
												  <option value="Coffee Shop">Coffee Shop</option>
												  <option value="Dessert House">Dessert House</option>
												  <option value="Tea House">Tea House</option>
												  <option value="Diner Restaurant">Diner Restaurant</option>
												  <option value="Sea Side Restaurant">Sea Side Restaurant</option>
												  <option value="River Side Restaurant">River Side Restaurant</option>
                                                </select>
                                            </div>
                                        </div>
										
										
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
						</div>
						<div class="modal-footer">
							<!--<button type="button" class="btn btn-effect-ripple btn-warning" id="uploadbtn">Upload</button>-->
							<!--<button type="button" class="btn btn-effect-ripple btn-success" onclick="updaterestauranttype();" id="updatetypebtn">Update</button>-->
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savetype();" id="savetypebtn">Save</button>
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


