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
										</div>
									</header>
									<div id="login-box-inner">
										<form method="post" action="<?php echo base_url() . 'login'; ?>">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input class="form-control" type="text" placeholder="Mobile" autocomplete="off" name="mobile" id="mobile">
											</div>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input type="password" class="form-control" placeholder="Password" autocomplete="off" name="password" id="password">
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
		$(document).ready(function() {
			$("#loginbtn").click(function() {
				alert('');
				// $.post("demo_test_post.asp",
				// {
				//   name: "Donald Duck",
				//   city: "Duckburg"
				// },
				// function(data,status){
				//   alert("Data: " + data + "\nStatus: " + status);
				// });
			});
		});
	</script>
	<script type="text/javascript">
            $(document).ready(function() {
                 $('#password').keydown(function(event){    
            if(event.keyCode==13){
               $('#loginbtn').trigger('click');
            }
        });
                $('#loginbtn').click(function(){
                   // alert("hello");
                 $('#res').html("<img width='30' src='https://lemontrade.in/mypanel/assets/img/loading.gif'>");
               $email = $('#email').val();
               $password = $('#password').val();
               if($email == '' || $password == '')
               {
                   //alert('Please enter all login details.');
                    $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>Enter login details..!</span>");
                   return false;
               }
//               $(this).attr('disabled','disabled');
               $.post('https://lemontrade.in/Adminity/validateLogin',{ email:$email,password:$password},function(data){
                   //alert(data);
                  if(data==1) 
                  {	
                  	  $('#res').html("<h5><span style='color:green;text-transform:capitalize;font-size:13px'>Login Success..!</span><br><img width='30' src='https://lemontrade.in/mypanel/assets/img/loading.gif'><br><span style='font-size:12px'>Redirecting.....</span></h5>");
                     // window.location="http://wegrocers.com/wegrocers-admin/";
                          window.location="https://lemontrade.in/";
                  }else{
//                    
                      $('#res').html("<h5><span style='color:red;text-transform:capitalize;font-size:12px'>"+data+"</span></h5>");
                  }
               });
            });
            });
            
        </script>

</body>

</html>