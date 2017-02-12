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

  case 'sol1';
    require 'pages/sol1.php';
    break;

  case 'sol2';
    require 'pages/sol2.php';
    break;

  case 'sol2g';
    require 'pages/sol2g.php';
    break; 

  case 'sol3';
    require 'pages/sol3.php';
    break;

  case 'sol3g';
    require 'pages/sol3g.php';
    break;

  case 'edit-net';
    require 'pages/edit-net.php';
    break;

  case 'edit-netlead';
    require 'pages/edit-netlead.php';
    break;
    

  default:
    require 'pages/404.php';
    break;
}
