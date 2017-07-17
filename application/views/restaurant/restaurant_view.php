
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
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal" onclick="disableupdateres();">Add Restaurant</a>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Restaurant Name</th>
						<th>Street</th>
                        <th>Brgy.</th>
						<th>Municipality</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Store Days</th>
						<th>Store Hours</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($account_list as $tblrestaurant):
				//$contactname = strtoupper($tblrestaurant['contactname']);
				echo "<tr>";
				//echo "<td class='text-center'>".$contactname."</td>";
				echo "<td>".$tblrestaurant['restaurantname']."</td>";
				echo "<td>".$tblrestaurant['street']."</td>";
				echo "<td>".$tblrestaurant['barangay']."</td>";
				echo "<td>".$tblrestaurant['municipality']."</td>";
				echo "<td>".$tblrestaurant['contact']."</td>";
				echo "<td>".$tblrestaurant['email']."</td>";
				echo "<td>".$tblrestaurant['storehoursfromday']." - ".$tblrestaurant['storehourstoday']."</td>";
				echo "<td>".$tblrestaurant['storehoursfromtime']." - ".$tblrestaurant['storehourstotime']."</td>";
				
				echo "<td><button onclick='deleterestaurant(".$tblrestaurant['rid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button> <a href='#modal-regular' data-toggle='modal' onclick='updaterestaurantmodal(".$tblrestaurant['rid'].");' type='reset' class='btn btn-effect-ripple btn-success'><i class='fa fa-pencil'></i></a></td></tr>";
				
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
							<h3 class="modal-title"><strong>Add Restaurant Details</strong></h3>
						</div>
						<div class="modal-body">
							
							<div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="<?php echo site_url('restaurant/upload')?>" id="form_upload" method="post" class="form-horizontal" onsubmit="return false;">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Restaurant Name *</label>
                                            <div class="col-md-6">
                                                <input type="text" id="restaurantname" name="state-normal" class="form-control" >
                                                <input type="text" id="restaurantid" style="display: none;" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Street</label>
                                            <div class="col-md-6">
                                                <input type="text" id="resstreet" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Barangay</label>
                                            <div class="col-md-6">
                                               <input type="text" id="resbarangay" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Municipality</label>
                                            <div class="col-md-6">
                                                <select id="resmunicipality" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one">
                                                      <option value="Agoo">Agoo</option>
													  <option value="Aringay">Aringay</option>
													  <option value="Bacnotan">Bacnotan</option>
													  <option value="Bagulin">Bagulin</option>
													  <option value="Balaoan">Balaoan</option>
													  <option value="Bangar">Bangar</option>
													  <option value="Bauang">Bauang</option>
													  <option value="Burgos">Burgos</option>
													  <option value="Caba">Caba</option>
													  <option value="Luna">Luna</option>
													  <option value="Naguilian">Naguilian</option>
													  <option value="Pugo">Pugo</option>
													  <option value="Rosario">Rosario</option>
													  <option value="San Fernando">San Fernando</option>
													  <option value="San Gabriel">San Gabriel</option>
													  <option value="San Juan">San Juan</option>
													  <option value="Santo Tomas">Santo Tomas</option>
													  <option value="Santol">Santol</option>
													  <option value="Sudipen">Sudipen</option>
													  <option value="Tubao">Tubao</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Contact</label>
                                            <div class="col-md-6">
                                                <input type="text" id="rescontact" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Email</label>
                                            <div class="col-md-6">
                                                <input type="text" id="resemail" name="state-normal" class="form-control" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <center><label class="control-label" for="state-normal">Store Hours</label></center>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">From</label>
                                            <div class="col-md-6">
                                                <select id="resshfromday" name="example-select" class="form-control" style="width: 100%;" data-placeholder="Choose one">
													  <!--<div id="resshfromdayoption"></div>-->
                                                      <option value="Monday">Monday</option>
													  <option value="Tuesday">Tuesday</option>
													  <option value="Wednesday">Wednesday</option>
													  <option value="Thursday">Thursday</option>
													  <option value="Friday">Friday</option>
													  <option value="Saturday">Saturday</option>
													  <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">To</label>
                                            <div class="col-md-6">
                                                <select id="resshtoday" name="example-select" class="form-control" style="width: 100%;" data-placeholder="Choose one">
													  <!--<div id="resshtodayoption"></div>-->
                                                      <option value="Monday">Monday</option>
													  <option value="Tuesday">Tuesday</option>
													  <option value="Wednesday">Wednesday</option>
													  <option value="Thursday">Thursday</option>
													  <option value="Friday">Friday</option>
													  <option value="Saturday">Saturday</option>
													  <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-timepicker">From</label>
                                            <div class="col-md-5">
                                                <div class="input-group bootstrap-timepicker">
                                                    <input type="text" id="resshfromtime" name="example-timepicker" class="form-control input-timepicker">
                                                    <span class="input-group-btn">
                                                        <a href="javascript:void(0)" class="btn btn-effect-ripple btn-primary"><i class="fa fa-clock-o"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-timepicker">To</label>
                                            <div class="col-md-5">
                                                <div class="input-group bootstrap-timepicker">
                                                    <input type="text" id="resshtotime" name="example-timepicker" class="form-control input-timepicker">
                                                    <span class="input-group-btn">
                                                        <a href="javascript:void(0)" class="btn btn-effect-ripple btn-primary"><i class="fa fa-clock-o"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-input">Logo</label>
                                            <div class="col-md-9">
                                                <input type="file" id="reslogo" name="reslogo">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-input">Cover Photo</label>
                                            <div class="col-md-9">
                                                <input type="file" id="rescoverphoto" name="rescoverphoto">
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-input"></label>
                                            <div class="col-md-8">
											<div class="progress progress-striped active" style="display: none;">
											<div class="progress-bar progress-bar-info" id="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
											</div>
											<ul class="toggle-menu">
											</ul>
											</div>
                                        </div>

										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-input"></label>
                                            <div class="col-md-8">
											<div class="progress progress-striped active" style="display: none;">
											<div class="progress-bar progress-bar-info" id="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
											</div>
											<ul class="toggle-menu">
											</ul>
											</div>
                                        </div>

										<div class="image_here"></div>
										
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
							
						</div>
						<div class="modal-footer">
							<!--<button type="button" class="btn btn-effect-ripple btn-warning" id="uploadbtn">Upload</button>-->
							<button type="button" class="btn btn-effect-ripple btn-success" onclick="updaterestaurant();" id="updatebtn">Update</button>
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="saverestaurant();" id="savebtn">Save</button>
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


