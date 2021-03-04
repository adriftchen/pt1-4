<?php
include_once "../base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$ck=$Admin->count(['acc'=>$acc,'pw'=>$pw]);

if($ck>0){
    $_SESSION['login']=$acc;
    to("../backend.php");
}else{
    to("../index.php?do=login&err=1");
}
?>