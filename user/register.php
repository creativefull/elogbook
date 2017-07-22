<?php  
	if (!isset($_SESSION)) {
		session_start();
	}
?>

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
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>
		<script src="../assets/DatePicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header login_modal_header">
						<h2 class="modal-title" id="myModalLabel">Register</h2>
					</div>
					<input type="hidden" id="planid" value=0>
					<div class="modal-body login-modal">
						<br/>
						<div class="clearfix"></div>
						<div id='social-icons-conatainer'>
							<div id="messages"></div>
							<div class='modal-body-left'>
								<div class="form-group">
									NIM
									<input type="text" id="nim" value="" class="form-control login-field">
									<!-- <i class="fa fa-user login-field-icon"></i> -->
								</div>

								<div class="form-group">
									User Id
									<input type="text" id="userid"value="" class="form-control login-field">
									<!-- <i class="fa fa-user login-field-icon"></i> -->
								</div>

								<div class="form-group">
									Username
									<input type="text" id="username" value="" class="form-control login-field">
									<!-- <i class="fa fa-user login-field-icon"></i> -->
								</div>

								<div class="form-group">
									Password
									<input type="password" id="password"value="" class="form-control login-field">
									<!-- <i class="fa fa-lock login-field-icon"></i> -->
								</div>

								<button id="register" class="btn btn-success modal-login-btn">
									Register
								</button>
								</br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
	$(function (){
		$('#login-modal').modal('toggle');
		$('#login-modal').modal('show');

		$('#register').click(function (e){
			e.preventDefault();
			var selector = $(this);
			var nim = $('#nim').val();
			var userid = $('#userid').val();
			var username = $('#username').val();
			var password = $('#password').val();
			selector.attr('disabled', true);
			if (nim == "" || userid == "" || username == "" || password == "") {
				selector.attr('disabled', false);
				$('#messages').html("<div class = 'alert alert-danger'> data masih kosong</div>");
			} else {
				$.ajax({
					url : 'prosesRegister.php',
					type : 'POST',
					dataType : 'json',
					data : {
						nim : nim,
						userid : userid,
						username : username,
						password : password
					},
					success : function (msg) {
						if (msg.status == 200 ) {
							window.location="login.php";
						} else {
							$('#messages').html("<div class = 'alert alert-danger'> proses register gagal</div>");
						}
						selector.attr('disabled', false);
					}
				});
			}
		});
	});
</script>