<?php
include'includes/session.php';
include'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SOL System</title>

    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
                <script src="src/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="src/sweetalert.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-university"></i><span><?php echo $title?></span></a>
            </div>

            <div class="clearfix"></div>




            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="dashboard"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-users"></i>Students<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="post">Post Encounter</a></li>
                      <li><a href="sol1">School of Leaders 1</a></li>
                      <li><a href="sol2">School of Leaders 2</a></li>
                      <li><a href="sol2g">School of Leaders 2 Graduate</a></li>
                      <li><a href="sol3">School of Leaders 3</a></li>
                      <li><a href="sol3g">School of Leaders 3 Graduate</a></li>
                    </ul>
                  </li>
                  <li><a href="register"><i class="fa fa-user-plus"></i>Enroll Students</a></li>
                  <?php
                  if($role == 0){
                    echo'
                  
                  <li><a href="addadmin"><i class="fa fa-user-plus"></i>Add Admins</a></li>
                  <li><a href="edit-net"><i class="fa fa-pencil"></i>Edit Network Leaders</a></li>
                  <li><a href="edit-title"><i class="fa fa-pencil"></i>Edit Title</a></li>
                  <li><a href="export"><i class="fa fa-recycle"></i>Recycle Bin</a></li>
                  <li><a href="export"><i class="fa fa-file"></i>Export Database</a></li>';
                }
                else{
                  echo'';
                  }
                  ?>
                

                  
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo'<img src="'.$image.'">';?><?php echo $firstnames;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="myaccount"><i class="fa fa-user pull-right"></i> My Account</a></li>
                    <li><a href="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


               
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

 <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate>
<?php addadmin();?>
                      <span class="section fa fa-user-plus">Add Administrator</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lastname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 surname" name="lastname" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Firstname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 surname" name="firstname" required="required" type="text">
                        </div>
                      </div>


                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="user" required="required" type="text">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12 first" required="required">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Password Strength*</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <div class="progress progress-striped active">
                      <div id="jak_pstrength" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                     </div>
                     </div>
                     </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="role" class="form-control" required>
                                            <option value="">--Select role</option>
                                            <option value="0">Super Admin</option>
                                            <option value="1">SOL Director</option>
                                            <option value="2">SOL Admin</option>
                                            <option value="3">User</option>
                          </select>
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="image" required="required" type="file">
                        </div>
                      </div>

                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Add Admin</button>
                        </div>
                      </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>










     
            



                
               
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©<?php echo date('Y');?> All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

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
        <script src="src/jquery.js"></script>
    <script src="src/jaktutorial.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

 $('.surname').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });
      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    jQuery(document).ready(function(){
      jQuery("#password").keyup(function() {
        passwordStrength(jQuery(this).val());
      });
    });

    </script>
  </body>
</html>
