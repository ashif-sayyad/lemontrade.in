<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>लेमन ट्रेडिंग कंपनी | लॉगिन</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap/bootstrap.min.css'; ?>" />
	<link href="<?php echo base_url(); ?>themes/css/lemon.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/libs/font-awesome.css'; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/libs/nanoscroller.css'; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/compiled/theme_styles.css'; ?>" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<link type="image/x-icon" href="<?php echo base_url(); ?>themes/login/falcon.png" rel="shortcut icon" />

</head>

<body id="login-page-full">
	<div id="login-full-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="login-box">
						<div id="login-box-holder">
							<div class="row">
								<div class="col-xs-12">
									<header id="login-header">
										<div id="login-logo">
											<span class="d-flex flex-center mb-4" href="<?php echo base_url(); ?>">
												<img class="me-2" src="<?php echo base_url(); ?>themes/login/falcon.png" alt="लेमन ट्रेडिंग कंपनी" width="50">
												<span class="titlename font-sans-serif fw-bolder fs-5 d-inline-block">लेमन ट्रेडिंग कंपनी</span>
											</span>
											<h6>लॉगिन</h6>
											<div id="res"></div>
										</div>
									</header>
									<div id="login-box-inner">
										<form method="post" action="<?php echo base_url() . 'login'; ?>">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input class="form-control" type="text" placeholder="मोबाईल" autocomplete="off" name="mobile" id="mobile">
											</div>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input type="password" class="form-control" placeholder="पासवर्ड" autocomplete="off" name="password" id="password">
											</div>
											<div class="row">
												<div class="col-xs-12">
													<button type="button" id="loginbtn" class="btn btn-success col-xs-12">लॉगिन</button>
												</div>
											</div>
											<div id="login-box-footer">
												<div class="row">
													<div class="col-xs-12">
														Do not have an account?
														<a href="<?php echo base_url() . 'register'; ?>">
															रेजिस्टर व्हा
														</a>
													</div>
												</div>
											</div>
											<div id="login-box-footer">
												<div class="col-auto"><a class="fs--1" href="<?php echo base_url(); ?>forgot">पासवर्ड विसरलात?</a></div>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>ca/js/jquery-2.2.4.min.js"></script>
	<script>
		function ValidateMobile(mobile) {
			var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
			if (mobile.length == 10) {
				return filter.test(mobile);
			} else {
				return false;
			}
		};
		$(document).ready(function() {
			$('#password').keydown(function(event) {
				if (event.keyCode == 13) {
					$('#loginbtn').trigger('click');
				}
			});
			$('#loginbtn').click(function() {
				$('#res').html("<img width='25' src='<?php echo base_url(); ?>mypanel/assets/img/loading.gif'>");
				$mobile = $('#mobile').val();
				$password = $('#password').val();
				if ($mobile == '' || $password == '') {
					$('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>सर्व फील्ड आवश्यक आहेत..!</span>");
					return false;
				} else if (!ValidateMobile($mobile)) {
					$('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>मोबाईल नंबर कन्फर्म करा..!</span>");
					return false;
				} else {
					$('#res').html();
					$.post('<?php echo base_url(); ?>login/validatelogin', {
							mobile: $mobile,
							password: $password
						},
						function(data) {
							if (data == 1) {
								$('#res').html("<span style='color:green;text-transform:capitalize;font-size:13px'>लॉगिन यशस्वी..!</span><br><img width='25' src='<?php echo base_url(); ?>mypanel/assets/img/loading.gif'><br><span style='font-size:12px'>पुनर्निर्देशित करत आहे...</span>");
								window.location = '<?php echo base_url(); ?>dashboard';
							} else {
								$('#res').html("<h5><span style='color:red;text-transform:capitalize;font-size:12px'>" + data + "</span></h5>");
							}
						});
				}
			});
		});
	</script>

</body>

</html>