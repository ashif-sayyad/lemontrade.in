<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>लेमन ट्रेडिंग कंपनी | रेजिस्ट्रेशन</title>
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
                      <h6>रेजिस्टर</h6>
                      <div id="res"></div>
                    </div>
                  </header>
                  <div id="login-box-inner">
                    <form>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" placeholder="पहिले नाव" autocomplete="off" name="firstname" id="firstname">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" placeholder="आडनाव" autocomplete="off" name="lastname" id="lastname">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control" type="email" placeholder="ईमेल" autocomplete="off" name="email" id="email">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input class="form-control" type="text" placeholder="मोबाईल" autocomplete="off" name="mobile" id="mobile">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="पासवर्ड" autocomplete="off" name="password" id="password">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="कन्फर्म पासवर्ड" autocomplete="off" name="confirm" id="confirm">
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <button type="button" id="registerbtn" class="btn btn-success col-xs-12">रेजिस्टर व्हा</button>
                        </div>
                      </div>
                      <div id="login-box-footer">
                        <div class="row">
                          <div class="col-xs-12">
                            Have an account?
                            <a href="<?php echo base_url() . 'login'; ?>">
                              लॉगिन
                            </a>
                          </div>
                        </div>
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
    function ValidateEmail(email) {
      var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      return expr.test(email);
    };

    function ValidateMobile(mobile) {
      var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
      if (mobile.length == 10) {
        return filter.test(mobile);
      } else {
        return false;
      }
    };
    $(document).ready(function() {
      $("#registerbtn").click(function() {
        $firstname = $("#firstname").val();
        $lastname = $("#lastname").val();
        $email = $("#email").val();
        $mobile = $("#mobile").val();
        $password = $("#password").val();
        $confirm = $("#confirm").val();
        if ($firstname == '' || $lastname == '' || $email == '' || $mobile == '' || $password == '' || $confirm == '') {
          $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>सर्व फील्ड आवश्यक आहेत..!</span>");
          return false;
        } else if (!ValidateEmail($email)) {
          $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>ईमेल कन्फर्म करा..!</span>");
          return false;
        } else if (!ValidateMobile($mobile)) {
          $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>मोबाईल नंबर कन्फर्म करा..!</span>");
          return false;
        } else if ($password !== $confirm) {
          $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>पासवर्ड मॅच होत नाही..!</span>");
          return false;
        } else {
          $('#res').html();
          $.post('<?php echo base_url(); ?>register/validateregister', {
              firstname: $firstname,
              lastname: $lastname,
              email: $email,
              mobile: $mobile,
              password: $password,
              confirm: $confirm
            },
            function(data) {
              if (data == 1) {
                $('#res').html("<span style='color:green;text-transform:capitalize;font-size:12px'> लेमन ट्रेडिंग कंपनीत यशस्वीरित्या नोंदणीकृत आहात.</span><br><span style='font-size:12px'>पुनर्निर्देशित करत आहे...</span>");
                window.location="<?php echo base_url(); ?>login";
              } else {
                $('#res').html("<span style='color:red;text-transform:capitalize;font-size:12px'>नोंदणी करताना त्रुटी.</span>");
              }
            });
        }
      });
    });
  </script>
</body>

</html>