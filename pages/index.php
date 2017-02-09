<?php 
include 'includes/functions.php';
?>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SOL System</title>
    <link href="images/alc logo.jpg" rel="icon" type="text/css">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
     <!-- Sweet Alert -->
    <link rel="stylesheet" href="src/sweetalert.css">
    <script type="text/javascript" src="src/sweetalert-dev.js"></script>
    <script type="text/javascript" src="src/sweetalert.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          
          <section class="login_content">
            <form class="form-horizontal form-label-left" method="POST" data-parsley-validate>
              <?php login();?>
              

              <h1>Login Form</h1>
                
                <div class="item form-group">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <input id="name" required class="form-control col-md-7 col-xs-12"  placeholder="Username" data-parsley-required-message="Username required."  name="username"   type="text">
                  </div>
                </div>


                <div class="item form-group">

                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <input id="password" required type="password" name="pass" placeholder="Password" data-parsley-required-message="Password required." class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>

              <div>
                <button type="submit" name="btn-login" class="btn btn-info"><i class="fa fa-sign-in"></i> Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">


                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-university"></i> Welcome to School of Leaders</h1>
                  <p>&copy; <?php echo date('Y')?></p>
                </div>
              </div>
            </form>

          </section>
        </div>

      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="vendors/validator/validator.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>


    <!-- validator -->
    <script>
      // initialize the validator function




      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);


      });
    </script>
    <!-- /validator -->

  </body>

</html>
  