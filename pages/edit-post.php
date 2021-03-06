<?php
include'includes/functions.php';
include'includes/session.php';

$id = $_SESSION['mod_id'];

if(empty($id)){
	?>
			<script type="text/javascript">
		swal({   
			 title: "Error!",  
			 text: "Record Not found.",
			 timer: 4000, 
			 type: 'error',  
			 showConfirmButton: false 
			});
		</script>
		<?php
}else{
	$query = $db->query("SELECT * FROM students WHERE id = $id");
	$row = $query->fetch_object();
  $img = $row->image;
	$last = $row->lastname;
	$first = $row->firstname;
	$middle = $row->middlename;
	$enc = $row->encounter_batch;
	$sol = $row->sol_batch;
	$cell = $row->cell_leader;
	$net = $row->net_leader;
	$cont = $row->contact;
	$traini = $row->training_level;
	$status = $row->status;
	$dis = $row->disciples;
	$rema = $row->remarks;

	switch($traini){
		case 'Post';
			$train = 'Post Encounter';
		break;

		case 'Sol1';
			$train = 'School of Leaders 1';
		break;

		default:
		break;
	}

	switch($status){
		case 'cellmem';
			$stats = 'Cell Member';
		break;

		case 'celllead';
			$stats = 'Cell Leader';
		break;

		default:
		break;
	}

		switch($rema){
		case 'Active';
			$rem = 'Active';
		break;

		case 'Inactive';
			$rem = 'Inactive';
		break;

		case 'Pending';
			$rem = 'Pending';
		break;

		default:
		break;
	}
}
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
            <link href="images/alc logo.jpg" rel="icon" type="text/css">

    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="src/sweetalert.css">
    <script type="text/javascript" src="src/sweetalert-dev.js"></script>
    <script type="text/javascript" src="src/sweetalert.min.js"></script>
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
                  <li><a href="recycle"><i class="fa fa-recycle"></i>Recycle Bin</a></li>
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

 <form class="form-horizontal form-label-left" method="POST" data-parsley-validate>
            <?php update_stud();?>
                      <span class="section">Registration Form</span>



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lastname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 surname" name="last" required="required" type="text" data-parsley-required-message="Please Fill in this Field!" value="<?php echo $last?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Firstname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 surname" name="first" required="required" type="text" data-parsley-required-message="Please Fill in this Field!" value="<?php echo $first?>">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Middlename <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 surname" name="middle" required="required" type="text" data-parsley-required-message="Please Fill in this Field!" value="<?php echo $middle?>">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Encounter Batch <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="enc" value="<?php echo $enc?>" required="required" type="text" data-parsley-required-message="Please Fill in this Field!">
                        </div>
                      </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">SOL Batch <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="sol" value="<?php echo $sol?>" required="required" type="text" data-parsley-required-message="Please Fill in this Field!">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cell Leader <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 surname" name="cell" required="required" type="text" data-parsley-required-message="Please Fill in this Field!" value="<?php echo $cell?>">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Network Leader <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="net" class="form-control" required="required" data-parsley-required-message="Please Fill in this Field!">
                            <option value="<?php echo $net?>" selected><?php echo $net?></option>
                                            <?php
                                                $result= $db->query("SELECT name FROM net_leaders");
                                                while ($row = $result->fetch_object()) {
                                                    
                                                    echo'<option value="'.$row->name.'">'.$row->name.'</option>';

                                                }
                                                ?>
                          </select>
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Training Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="traini" class="form-control" required="required" data-parsley-required-message="Please Fill in this Field!">
							<?php
								switch($traini){
									case 'Post';
										echo'<option value="'.$traini.'" selected>'.$train.'</option>
											 <option value="Sol1">School of Leaders 1</option>
                            				 <option value="Sol2">School of Leaders 2</option>
                            				 <option value="Sol3">School of Leaders 3</option>';
                            		break;

                            		case 'Sol1';
                            				echo'<option value="'.$traini.'" selected>'.$train.'</option>
											               <option value="Post">Post Encounter</option>
                            				 <option value="Sol2">School of Leaders 2</option>
                            				 <option value="Sol3">School of Leaders 3</option>';
                            		break;

                            		case 'Sol2';
                            				 echo'<option value="'.$traini.'" selected>'.$train.'</option>
                            				 <option value="Post">Post Encounter</option>
											               <option value="Sol1">School of Leaders 1</option>
                            				 <option value="Sol3">School of Leaders 3</option>';
                            		break;

                            		case 'Sol3';
                            				 echo'<option value="'.$traini.'" selected>'.$train.'</option>
                            				 <option value="Post">Post Encounter</option>
											               <option value="Sol1">School of Leaders 1</option>
                            				 <option value="Sol2">School of Leaders 2</option>';
                            		break;

                            		default:
                            		break;

								}
								?>

                          </select>
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="stats" class="form-control" required="required" data-parsley-required-message="Please Fill in this Field!">
                          <?php
                          switch ($status){
                          		case 'cellmem';
                          			echo'<option value="'.$status.'" selected>'.$stats.'</option>
                          				 <option value="celllead">Cell Leader</option>';
                          		break;

                          		case 'celllead';
                          			echo'<option value="'.$status.'" selected>'.$stats.'</option>
                          				 <option value="cellmem">Cell Member</option>';
                          		break;

                          		default:
                          		break;

                          }
                          ?>
                          </select>
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No. of Disciples <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="no" value="<?php echo $dis?>" required="required" type="text" data-parsley-required-message="Please Fill in this Field!">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="remarks" class="form-control" required="required" data-parsley-required-message="Please Fill in this Field!">
                          <?php
                          switch ($rema){
                          		case 'Pending';
                          			echo'<option value="'.$rema.'" selected>'.$rem.'</option>
                          				 <option value="Active">Active</option>
                          				 <option value="Inactive">Inactive</option>';
                          		break;

                          		case 'Active';
                          			echo'<option value="'.$rema.'" selected>'.$rem.'</option>
                          				 <option value="Inactive">Inactive</option>';
                          		break;
                          		case 'Inactive';
                          			echo'<option value="'.$rema.'" selected>'.$rem.'</option>
                          				 <option value="Active">Active</option>';
                          		break;

                          		default:
                          		break;

                          }
                          ?>
                          </select>
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12" data-parsley-required-message="Please Fill in this Field!" value="<?php echo $cont?>">
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						<input type="hidden" name="id" value="<?php echo $id?>">
            <button id="send" type="submit" name="back" class="btn btn-primary"><i class="fa fa-reply"></i> Back</button>
						  <button id="send" type="submit" name="btn-delete" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                          <button id="send" type="submit" name="btn-update" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
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
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>

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

    </script>
  </body>
</html>
