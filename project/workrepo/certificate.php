<style type="text/css">
	#certifi{
		color: #ca3f02;
	}
</style>


<?php
session_start();
include("connect.php");
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
include("admin_home.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 letterbox">
			<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-3">
				<select class="form-control">
					<option value="">Select One</option>
					<option value="offer_letter">Offer Letter</option>
					<option value="appoinment_letter">Appoinment Letter</option>
					<option value="warning_letter">Warning Letter</option>
					<option value="appraisal_form">Appraisal Form</option>
					<option value="appreciation_letter">Appreciation Letter</option>
					<option value="relieving_letter">Relieving Letter</option>
					<option value="experiance_letter">Experiance Certificate</option>
					<option value="termination_letter">Termination Letter</option>
				</select>
			</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label><?php echo $date->format("d M,Y");?></label><br/>
					<label>Sujeet Kumar Goyal</label><br>
					<label>Kattigenahalli,Yelahanka,</label><br>
					<label>Bangalore,Karnatka 560064</label>
					<p>	</p>
				</div>
			</div>
		</div>
	</div>
</div>
