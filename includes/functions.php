<?php
include'config.php';
function addadmin(){
global $db;

if(!isset($_FILES['image']['tmp_name'])){
	echo"";
}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);

	$lastname = $db->real_escape_string($_POST['lastname']);
	$firstname = $db->real_escape_string($_POST['firstname']);
	$username = $db->real_escape_string($_POST['user']);
	$password = $db->real_escape_string($_POST['password']);
	$pash = password_hash($password,PASSWORD_DEFAULT);
	$role = $db->real_escape_string($_POST['role']);
	$location = $db->real_escape_string("images/" . $_FILES["image"]["name"]);

	$query = $db->query("INSERT INTO admin
		(lastname,firstname,username,password,role,image)
		 VALUES('$lastname','$firstname','$username','$pash','$role','$location')");
		 ?>
	<script type="text/javascript">swal("SUCCESS!","Registered!","success");</script>
	<?php

}	
}

function login(){
global $db;
	if (isset($_SESSION['superadmin'])!=""){
		header('location:dashboard');
		}

	if (isset($_POST['btn-login'])){
session_start();		
			$user = $db->real_escape_string($_POST['username']);
			$pass = $db->real_escape_string($_POST['pass']);
			$query1 = $db->query("SELECT * FROM admin WHERE username = '$user'");
			$check 	= $query1->num_rows;

	if($check<1) {
	?>
	<script type="text/javascript">
	swal({   
		 title: "Error!",  
		 text: "You've entered invalid username or password.",
		 timer: 4000, 
		 type: 'error',  
		 showConfirmButton: false 
		});
	</script>
	<?php
}else{
			$row = $query1->fetch_object();
			$id = $row->id;
			$role = $row->role;
			$nash = $row->password;
		$s_admin  = 0;
		$dir      = 1;
		$admin    = 2;
		$use     = 3;

			$hash = $nash;	
		if (password_verify($pass, $hash) && $role == $s_admin){
			$_SESSION['superadmin'] = $id;
			header("location: dashboard");
		} 
		elseif (password_verify($pass,$hash) && $role == $dir){
			$_SESSION['superadmin'] = $id;
			header("location: dashboard");
		}
		elseif (password_verify($pass,$hash) && $role == $admin){
			$_SESSION['superadmin'] = $id;
			header("location: dashboard");
		}
		elseif (password_verify($pass,$hash) && $role == $use){
			$_SESSION['superadmin']= $id;
			header("location: dashboard");
		}
		else{
			?>
		<script type="text/javascript">
		swal({   
			 title: "Error!",  
			 text: "You've entered invalid username or password.",
			 timer: 4000, 
			 type: 'error',  
			 showConfirmButton: false 
			});
		</script>
		<?php
			}

			}

		}


	}

function register(){
	global $db;
	if(isset($_POST['btn-register'])){

		$ln = $db->real_escape_string($_POST['lastname']);
		$fn = $db->real_escape_string($_POST['firstname']);
		$mn = $db->real_escape_string($_POST['middlename']);
		$enc = $db->real_escape_string($_POST['encounter']);
		$cel = $db->real_escape_string($_POST['cellleader']);
		$net = $db->real_escape_string($_POST['netleader']);
		$con = $db->real_escape_string($_POST['number']);
		$sol = 'Pending';

		$train = $db->real_escape_string($_POST['train']);
		$status = $db->real_escape_string($_POST['status']);
		$disciples = 'Pending';
		$remarks = 'Pending';
		$image = 'images/user.png';
		$show = 1;

	$query = $db->query("INSERT INTO students (lastname,firstname,middlename,encounter_batch,sol_batch,cell_leader,net_leader,contact,training_level,status,disciples,remarks,image,show_tbl) 
		VALUES ('$ln','$fn','$mn','$enc','$sol','$cel','$net','$con','$train','$status','$disciples','$remarks','$image','$show')");
		?>
		<script type="text/javascript">swal("SUCCESS!","Registered!","success");</script>
		<?php

	}
	
}

function show_post(){
global $db;

		$query = $db->query("SELECT * FROM students WHERE training_level='Post' AND show_tbl='1'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary"><i class="fa fa-user"></i> Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-users"></i> Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-edit" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-edit'])){
				$mod_id = $db->real_escape_string($_POST['id']);
				$_SESSION['mod_id'] = $mod_id;
				echo'<script>window.location="edit-post"</script>';
			}

		
	}

}
function show_sol1(){
global $db;

		$query = $db->query("SELECT * FROM students WHERE training_level='Sol1' AND show_tbl='1'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary"><i class="fa fa-user"></i> Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-users"></i> Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td><img class="img-responsive" src="'.$row->image.'"></td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-edit" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-edit'])){
				$mod_id = $db->real_escape_string($_POST['id']);
				$_SESSION['mod_id'] = $mod_id;
				echo'<script>window.location="edit-post"</script>';
			}

		
	}
}

function show_sol2(){
		global $db;

		$query = $db->query("SELECT * FROM students WHERE training_level='Sol2' AND show_tbl='1'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary">Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success">Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td><img class="img-responsive" src=""></td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-edit" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-edit'])){
				$mod_id = $db->real_escape_string($_POST['id']);
				$_SESSION['mod_id'] = $mod_id;
				echo'<script>window.location="edit-post"</script>';
			}

		
	}
}

function show_sol2g(){
			global $db;

		$query = $db->query("SELECT * FROM students WHERE training_level='Sol2g' AND show_tbl='1'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary">Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success">Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td><img class="img-responsive" src=""></td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-edit" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-edit'])){
				$mod_id = $db->real_escape_string($_POST['id']);
				$_SESSION['mod_id'] = $mod_id;
				echo'<script>window.location="edit-post"</script>';
			}

		
	}
}

function show_sol3(){
		global $db;

		$query = $db->query("SELECT * FROM students WHERE training_level='Sol3' AND show_tbl='1'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary">Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success">Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td><img class="img-responsive" src=""></td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-edit" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-edit'])){
				$mod_id = $db->real_escape_string($_POST['id']);
				$_SESSION['mod_id'] = $mod_id;
				echo'<script>window.location="edit-post"</script>';
			}

		
	}

}

function show_sol3g(){
			global $db;

		$query = $db->query("SELECT * FROM students WHERE training_level='Sol3g' AND show_tbl='1'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary">Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success">Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td><img class="img-responsive" src=""></td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-edit" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-edit'])){
				$mod_id = $db->real_escape_string($_POST['id']);
				$_SESSION['mod_id'] = $mod_id;
				echo'<script>window.location="edit-post"</script>';
			}

		
	}
}
function show_netl(){
	global $db;

	$query = $db->query("SELECT * FROM net_leaders");
	$check = $query->num_rows;

	if($check < 1){
		echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
	}
	else{
		while($row = $query->fetch_object()) {
			echo'<td>'.$row->name.' </td>
				 <td>
				 <form method="POST">
				 <input type="hidden" name="id" value="'.$row->id.'">

				 <button type="submit" name="btn-view" class="btn btn-success"> <i class="fa fa-eye"></i> View</button>
				 </form>
				 </td>
				 </tr>';

		}	
		if(isset($_POST['btn-view'])){
			$view_id = $db->real_escape_string($_POST['id']);
			$_SESSION['view_id'] = $view_id;
			echo'<script>window.location="edit-netlead"</script>';
		}	
	} 
}



function update_stud(){
	global $db;
	if(isset($_POST['btn-update'])){
		$id = $db->real_escape_string($_POST['id']);
		$last = $db->real_escape_string($_POST['last']);
		$first = $db->real_escape_string($_POST['first']);
		$middle = $db->real_escape_string($_POST['middle']);
		$enco = $db->real_escape_string($_POST['enc']);
		$sol = $db->real_escape_string($_POST['sol']);
		$cel = $db->real_escape_string($_POST['cell']);
		$net = $db->real_escape_string($_POST['net']);
		$traini = $db->real_escape_string($_POST['traini']);
		$stats = $db->real_escape_string($_POST['stats']);
		$no = $db->real_escape_string($_POST['no']);
		$remar = $db->real_escape_string($_POST['remarks']);
		$number = $db->real_escape_string($_POST['number']);

		$query = $db->query("UPDATE students SET lastname = '$last', firstname = '$first', middlename = '$middle', encounter_batch = '$enco', sol_batch = '$sol', cell_leader = '$cel', net_leader = '$net', training_level = '$traini', status = '$stats', disciples = '$no', remarks = '$remar', contact = '$number' WHERE id = '$id'");
		?>

				    <script type="text/JavaScript">
			swal({   
				title: "Success!",
				text: 'Data has been updated.',  
				 timer: 4000, 
				 type: "success",  
				 showConfirmButton: false 
				});
			setTimeout("location.href = 'post'",2000);
			</script>
			<?php
	}
	if(isset($_POST['btn-delete'])){
		$id = $db->real_escape_string($_POST['id']);
		$query = $db->query("UPDATE students SET show_tbl = 0");
		?>
	    <script type="text/JavaScript">
		swal({   
			title: "Success!",
			text: 'Data is now deleted.',  
			 timer: 4000, 
			 type: "success",  
			 showConfirmButton: false 
			});
		setTimeout("location.href = 'post'",2000);
		</script>
			<?php

	}
	if(isset($_POST['back'])){
		echo'<script>location.href = "post"</script>';
	}
}

function update_net(){
	global $db;

	if(isset($_POST['btn-update'])){
		$id = $db->real_escape_string($_POST['id']);
		$name = $db->real_escape_string($_POST['last']);

		$query = $db->query("UPDATE net_leaders SET name = '$name' WHERE id = '$id'");
				?>

				    <script type="text/JavaScript">
			swal({   
				title: "Success!",
				text: 'Data has been updated.',  
				 timer: 4000, 
				 type: "success",  
				 showConfirmButton: false 
				});
			setTimeout("location.href = 'edit-net'",2000);
			</script>
			<?php
	}
	if(isset($_POST['btn-delete'])){
		$id = $db->real_escape_string($_POST['id']);

		$query = $db->query("DELETE FROM net_leaders WHERE id = '$id'");
				?>
	    <script type="text/JavaScript">
		swal({   
			title: "Success!",
			text: 'Data is now deleted.',  
			 timer: 4000, 
			 type: "success",  
			 showConfirmButton: false 
			});
		setTimeout("location.href = 'edit-net'",2000);
		</script>
			<?php

	}

	if(isset($_POST['back'])){
	echo'<script>location.href = "edit-net"</script>';
	}

	
}

function add_net(){
	global $db;
	if(isset($_POST['save'])){

		$name = $db->real_escape_string($_POST['name']);

		$query = $db->query("INSERT INTO net_leaders(name) VALUES ('$name')");
						?>
	    <script type="text/JavaScript">
		swal({   
			title: "Success!",
			text: 'Network Leader added.',  
			 timer: 4000, 
			 type: "success",  
			 showConfirmButton: false 
			});
		setTimeout("location.href = 'edit-net'",2000);
		</script>
			<?php
	}
}

function edit_title(){

	global $db;

	if(isset($_POST['btn-update'])){

		$title = $db->real_escape_string($_POST['title']);

		$query = $db->query("UPDATE title SET name = '$title'");
						?>

				    <script type="text/JavaScript">
			swal({   
				title: "Success!",
				text: 'Data has been updated.',  
				 timer: 4000, 
				 type: "success",  
				 showConfirmButton: false 
				});
			setTimeout("location.href = 'edit-title'",2000);
			</script>
			<?php
	}
}

function show_recycle(){
	global $db;

		$query = $db->query("SELECT * FROM students WHERE show_tbl='0'");
		$check = $query->num_rows;

		
			
			if($check < 1){
				echo'<div class="alert alert-danger" style="font-size:14px;font-weight:bolder;text-align:left"> No results found.</div>';
						

			}else{
			
			while ($row = $query->fetch_object()) {
				$train = $row->training_level;
				$rem = $row->remarks;
				$stat = $row->status;
				switch($train){

					case 'Post';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-info">Post Encounter</label>';
					break;
					case 'Sol1';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-primary">School of Leaders 1</label>';
					break;
					case 'Sol2';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-danger">School of Leaders 2</label>';
					break;
					case 'Sol3';
						$tl = '<label style="padding:10px;font-weight:bolder" class="label label-warning">School of Leaders 3</label>';
					break;

					default:
					break;
				}
				switch($rem){
			case 'Active';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-check"></i> Active</label>';
			break;
			case 'Pending';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-warning"><i class="fa fa-refresh"></i> Pending</label>';
			break;
			case 'Inactive';
				$rema = '<label style="padding:10px;font-weight:bolder" class="label label-danger"><i class="fa fa-close"></i> Inactive</label>';
			break;
			default:
			break;
		}
		switch($stat){
			case 'cellmem';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-primary"><i class="fa fa-user"></i> Cell Member</label>';
			break;
			case 'celllead';
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-success"><i class="fa fa-users"></i> Cell Leader</label>';
			break;
			default:
				$statu = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Pending</label>';
			break;
		}



			echo 
			'
			<td><img class="img-responsive" src="'.$row->image.'"></td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->middlename.'</td>
			<td>'.$row->encounter_batch.'</td>
			<td>'.$row->cell_leader.'</td>
			<td>'.$row->net_leader.'</td>
			<td>'.$row->contact.'</td>
			<td>'.$tl.'</td>
			<td>'.$statu.'</td>
			<td>'.$rema.'</td>
			<td>
			<form method="POST">
			<input type="hidden" name="id" value="'.$row->id.'">
			
			<button type="submit" name="btn-restore" class="btn btn-success"> <i class="fa fa-recycle"></i> Restore</button>
			</form>
			</td>
			</tr>';
			}	
			if(isset($_POST['btn-restore'])){
				$id = $db->real_escape_string($_POST['id']);

				$query = $db->query("UPDATE students SET show_tbl = '1' WHERE id = '$id'");
										?>

				    <script type="text/JavaScript">
			swal({   
				title: "Success!",
				text: 'Data has been restored.',  
				 timer: 4000, 
				 type: "success",  
				 showConfirmButton: false 
				});
			setTimeout("location.href = 'recycle'",2000);
			</script>
			<?php

				
				
			}

		
	}

}

function logout(){
session_start();
unset($_SESSION['superadmin']);
header("Location:index");
}



