
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
        <!--<div class="block-title">
            <a href="#modal-regular" class="btn btn-effect-ripple btn-primary" data-toggle="modal">Add Restaurant</a>
			<?php //print_r($heidirectory);?>
        </div>-->
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Restaurant Name</th>
						<th>Name</th>
                        <th>Email</th>
						<th>Comment</th>
						<th>Rating</th>
						<th>Timestamp</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
				
				foreach ($review_list as $tblreview):
				//$contactname = strtoupper($contact['contactname']);
				echo "<tr>";
				//echo "<td class='text-center'>".$contactname."</td>";
				echo "<td>".$tblreview['restaurantname']."</td>";
				echo "<td>".$tblreview['name']."</td>";
				echo "<td>".$tblreview['email']."</td>";
				echo "<td>".$tblreview['comment']."</td>";
				echo "<td>".$tblreview['timestamp']."</td>";
				echo "<td>".$tblreview['rating']."</td>";
				
				echo "<td><button  onclick='deletereview(".$tblreview['reviewid'].");' type='reset' class='btn btn-effect-ripple btn-danger'><i class='fa fa-times'></i></button></td></tr>";
				
				endforeach;
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
	
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


