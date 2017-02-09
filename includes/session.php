<?php
session_start();
include 'config.php';
if(!isset($_SESSION['superadmin'])){
header("Location: index");
}
$res = $db->query("SELECT * FROM admin WHERE id=".$_SESSION['superadmin']);
$row = $res->fetch_object();
$id = $row->id;
$fn = $row->firstname;
$ln = $row->lastname;
$role = $row->role;
$image = $row->image;


if($role == 0) {
	$firstnames = '<label style="padding:10px;font-weight:bolder" class="label label-danger">Hello, Super Admin '.$fn.'</label>';
} elseif($role == 1) {
	$firstnames = '<label style="padding:10px;font-weight:bolder" class="label label-warning">Hello, SOL Director '.$fn.'</label>';
}
 elseif($role == 2) {
	$firstnames = '<label style="padding:10px;font-weight:bolder" class="label label-success">Hello, Admin '.$fn.'</label>';
}
 elseif($role == 3) {
	$firstnames = '<label style="padding:10px;font-weight:bolder" class="label label-primary">Hello, '.$fn.'</label>';
}

$opt = $db->query("SELECT * FROM title");
$row = $opt->fetch_object();
$id = $row->id;
$title = $row->name; 