<?php 

	$z = mysqli_query($db,"SELECT * FROM students WHERE training_level = 'Post'");
	$zz=mysqli_num_rows($z);
	$zzz = $zz;
	$zzzz = $zzz;
    $post_count = number_format($zzzz, 0, '.' ,',');

    $a = mysqli_query($db,"SELECT * FROM students WHERE training_level = 'Sol1'");
	$aa=mysqli_num_rows($a);
	$aaa = $aa;
	$aaaa = $aaa;
    $sol1_count = number_format($aaaa, 0, '.' ,',');

    $b = mysqli_query($db,"SELECT * FROM students WHERE training_level = 'Sol2'");
	$bb=mysqli_num_rows($b);
	$bbb = $bb;
	$bbbb = $bbb;
    $sol2_count = number_format($bbbb, 0, '.' ,',');

    $c = mysqli_query($db,"SELECT * FROM students WHERE training_level = 'Sol2 Graduate'");
	$cc=mysqli_num_rows($c);
	$ccc = $cc;
	$cccc = $ccc;
    $sol2g_count = number_format($cccc, 0, '.' ,',');

    $d = mysqli_query($db,"SELECT * FROM students WHERE training_level = 'Sol3'");
	$dd=mysqli_num_rows($d);
	$ddd = $dd;
	$dddd = $ddd;
    $sol3_count = number_format($dddd, 0, '.' ,',');

    $e = mysqli_query($db,"SELECT * FROM students WHERE training_level = 'Sol3 Graduate'");
	$ee=mysqli_num_rows($e);
	$eee = $ee;
	$eeee = $eee;
    $sol3g_count = number_format($eeee, 0, '.' ,',');

 


	$f = mysqli_query($db,"SELECT * FROM students WHERE status ='celllead'");
	$ff=mysqli_num_rows($f);
	$fff = $ff;
	$ffff = $fff;
    $leader_count = number_format($ffff, 0, '.' ,',');

    $g = mysqli_query($db,"SELECT * FROM students WHERE status='cellmem'");
	$gg=mysqli_num_rows($g);
	$ggg = $gg;
	$gggg = $ggg;
    $member_count = number_format($gggg, 0, '.' ,',');


    $h = mysqli_query($db,"SELECT * FROM students WHERE remarks ='Active'");
	$hh=mysqli_num_rows($h);
	$hhh = $hh;
	$hhhh = $hhh;
    $active_count = number_format($hhhh, 0, '.' ,',');


    $i = mysqli_query($db,"SELECT * FROM students WHERE remarks='Inactive'");
	$ii=mysqli_num_rows($i);
	$iii = $ii;
	$iiii = $iii;
    $inactive_count = number_format($iiii, 0, '.' ,',');

    $j = mysqli_query($db,"SELECT * FROM students");
	$jj=mysqli_num_rows($j);
	$jjj = $jj;
	$jjjj = $jjj;
    $total_count = number_format($jjjj, 0, '.' ,',');


?>