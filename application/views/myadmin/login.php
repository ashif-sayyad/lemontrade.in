<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart Residency | Login</title>

    <!-- ================= Favicon ================== -->
   <link rel="shortcut icon" href="<?php echo base_url();?>mypanel/assets/img/logo.png"> 
    <!-- Styles -->
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>mypanel/assets/css/lib/unix.css" rel="stylesheet">
    <link href="<?php echo base_url();?>mypanel/assets/css/style.css" rel="stylesheet">
    <style> 
body {
    background-image: url("<?php echo base_url();?>mypanel/assets/img/main-img.png");  
    background-size:cover;
}
.login-form .btn {
    width: 100%;
    text-transform: uppercase;
    font-size: 12px;
    padding: 12px;
}
.form-control {
    height: 35px;
}
 .login-content {
    margin: 10px;
}   
</style>
</head>

<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-lg-offset-4">
                    <div class="login-content">                       
                        <div class="login-form">
                            
                            <center>
                                <span>
                                    <a><img style="height: 80px" src="<?php echo base_url();?>mypanel/assets/img/main-logo.png" alt="Dream Society" /></a>
                                    
                                    <h6><small id="res" class="display-block"></small></h6>
                            </span>
                            </center>
                            <form>
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="button" id="loginbtn" class="btn btn-primary btn-flat m-b-20">Sign in</button>
                                <!--<center><span style="font-size: 10px;">Powered By <a style="color:blue" href="#">CannyWorks.com</a></span></center>-->
                              
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
<script src="<?php echo base_url();?>mypanel/assets/js/lib/jquery.min.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                 $('#password').keydown(function(event){    
            if(event.keyCode==13){
               $('#loginbtn').trigger('click');
            }
        });
                $('#loginbtn').click(function(){
                   // alert("hello");
                 $('#res').html("<img width='30' src='<?php echo base_url();?>mypanel/assets/img/loading.gif'>");
               $email = $('#email').val();
               $password = $('#password').val();
               if($email == '' || $password == '')
               {
                   //alert('Please enter all login details.');
                    $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>Enter login details..!</span>");
                   return false;
               }
//               $(this).attr('disabled','disabled');
               $.post('<?php echo base_url();?>Adminity/validateLogin',{ email:$email,password:$password},function(data){
                   //alert(data);
                  if(data==1) 
                  {	
                  	  $('#res').html("<h5><span style='color:green;text-transform:capitalize;font-size:13px'>Login Success..!</span><br><img width='30' src='<?php echo base_url();?>mypanel/assets/img/loading.gif'><br><span style='font-size:12px'>Redirecting.....</span></h5>");
                     // window.location="http://wegrocers.com/wegrocers-admin/";
                          window.location="<?php echo base_url();?>";
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
