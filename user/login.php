<?php  
    if (!isset($_SESSION)) {
        session_start();
    } 
?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <title>E-logbook  | STT WASTUKANCANA PURWAKARTA </title>  
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="../assets/DatePicker/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/Font-Awesome-4.3.0/css/font-awesome.min.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>
    <script src="../assets/DatePicker/bootstrap-datepicker.min.js" type="text/javascript"></script>   
 </head>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">        		
        		<h2 class="modal-title" id="myModalLabel">Login</h2>
      		</div>
      		<input type="hidden" id="planid" value=0>
      		<div class="modal-body login-modal">     		
      			<br/>
      			<div class="clearfix"></div>
      			<div id='social-icons-conatainer'>
	        		<div class='modal-body-left'>
           			<div class="form-group">
                      User Id
		              		<input type="text" id="username" placeholder="Enter your name" value="" class="form-control login-field">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
                      Password
		            	  	<input type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">
		              		<i class="fa fa-lock login-field-icon"></i>
		            	</div>		
		            	<button id="login_button"  onClick="loginAction();" class="btn btn-success modal-login-btn">Login</button></br>		            	
	        		</div>	        	
	        	</div>																												
        		<div class="clearfix"></div>        	
      		</div>
      		<div class="clearfix"></div>
      		<div class="modal-footer login_modal_footer">
      		</div>
    	</div>
  	</div>
</div>
<script>
 $(document).ready(function(){
    $('#login-modal').modal('toggle');
    $('#login-modal').modal('show');   
 });
         
function loginAction()
{
	var dataString="userid="+$("#username").val()+"&password="+$("#login-pass").val()+"&planid="+$("#planid").val();
    $.ajax({
      type: "POST",
      url: "ceklogin.php" ,
      data: dataString,
      cache: false,
      success: function(result){        
        window.location="../index.php";  
      }
  });
}               
</script>     