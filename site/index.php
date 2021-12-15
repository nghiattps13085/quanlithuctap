<?php
    session_start();
    define("ARR_CONTROLLER", ['home','sinh_vien','doanh_nghiep','dang_tuyen']);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ctrl ='home';
    if(isset($_GET['ctrl']) == true) $ctrl=$_GET['ctrl'];
    if(in_array($ctrl, ARR_CONTROLLER) == false) die("Ko ton tai!");
    $pathFile = "controller/$ctrl.php";
    if(file_exists($pathFile) == true) require_once $pathFile;
    else echo "Controller $ctrl ko ton tai.!";

?>