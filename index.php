<?php
include('class/url.php');
$url = new Url('/solsystem/');
if (!$url->segment(1))
$page = '';
else
$page = $url ->segment(1);
switch ($page) {
  

  case '';
    require 'pages/index.php';
  break;

  case 'index';
    require 'pages/index.php';
  break;

  case 'dashboard';
    require 'pages/dashboard.php';
  break;

  case 'addadmin';
    require 'pages/addadmin.php';
  break;

  case 'register';
    require 'pages/register.php';
  break;

  case 'post';
    require 'pages/post.php';
  break;

  case 'logout';
    require 'pages/logout.php';
  break;

  case 'edit-post';
    require 'pages/edit-post.php';
  break;

  default:
    require 'pages/404.php';
    break;
}
