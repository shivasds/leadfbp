<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    if($this->session->userdata("user_type") == "admin")
        $this->load->view('inc/admin_header');
    else
        $this->load->view('inc/header');    
?>

<div class="container">
	<div class="page-header">
	  <h1><?php echo $heading; ?></h1>
	</div>

	<form action="<?php echo base_url()?>admin/generate_report">
		<div class="col-sm-6 form-group">
			<label for="emp_code">From:</label>
            <input type="text" class="form-control datepicker" id="fromDate" name="fromDate" placeholder="Date" required="required" autocomplete="off" >
            <!-- <input type="date" class="form-control" id="fromDate" name="fromDate" placeholder="Date" required="required"> -->
            <input type="time" class="form-control" id="fromTime" name="fromTime" placeholder="Time" value="00:00" required="required">
		</div>
		<div class="col-sm-6 form-group">
			<label for="emp_code">To:</label>
            <input type="text" class="form-control datepicker" id="" name="toDate" placeholder="Date" required="required" autocomplete="off">
            <!-- <input type="date" class="form-control" id="toDate" name="toDate" placeholder="Date" required="required"> -->
            <input type="time" class="form-control" id="toTime" name="toTime" placeholder="Time" value="23:59" required="required">
		</div>
		<div class="col-sm-6 form-group radio-btn">
			<!-- <label for="emp_code">To:</label> -->
            <label for = "project_wise" class="col-xs-5">Project wise:</label>
            <div class="col-xs-6">
                <input type="radio" class="form-control col-xs-5" id="project_wise" value="project_wise" name="project_wise" >
            </div>
            <div class="clearfix"></div>
            <label for = "Source wise" class="col-xs-5">Source wise:</label>
            <div class="col-xs-6">
                <input type="radio" class="form-control" id="Source_wise" value="Source_wise" name="Source_wise" >
            </div>
            <div class="clearfix"></div>
            <br/><br/><br/>
		<div class="col-sm-6 form-group">
            <button type="reset" id="save" class="btn btn-danger btn-block">Cancel</button>
        </div>
        <div class="col-sm-6 form-group">
            <button type="submit" id="Generate" class="btn btn-success btn-block">Generate</button>
        </div>
	</form>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('#example').DataTable();
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }

        $("#due_report").click(function(){
            window.location = "<?php echo base_url()."admin/generate_report" ?>?reportType=due&fromDate=1";
        });
       
    });
</script>