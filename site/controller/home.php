<?php 

require_once "../system/database.php";
require_once('model/home.php');
require_once('model/sinh_vien.php');
require_once('model/doanh_nghiep.php');

  $act = "index";
  if(isset($_GET["act"])==true) $act=$_GET["act"];
  switch ($act) {
    case "index":
          $view = "view/home.php";   
          // $view = "view/list-job.php";
          // $view = "view/job-detail.php";
          $ds_nn=ds_nn(); 
          require_once "view/layout.php";
      break;
      case "thongtindt":
        $thongtindt= checkdangtuyenbyid($_GET['id_dt']);
        $thongtindn=checkdoanhnghiepbyid($thongtindt['id_dn']);
        $thongtinnganh=checknganhbyid($thongtindt['id_nganh']);
        $view = "view/job-detail.php";
          require_once "view/layout.php";
      break;
      case "xemdoanhnghiep":   
      if (isset($_POST['arr'])){
        $thongtindt= checkdangtuyenbyid($_POST['arr']);
        $thongtindn=checkdoanhnghiepbyid($thongtindt['id_dn']);
        $thongtinnganh=checknganhbyid($thongtindt['id_nganh']);
        require_once 'view/ajax_chitiet_dangtuyen.php';
      }
    break;
      case "listjob":
          if(isset($_GET['id_nganh'])){
            $id_nganh=$_GET['id_nganh'];
            $thongtinnganh=checknganhbyid($id_nganh);
            $tennganh= $thongtinnganh['ten_nganh'];
          }elseif(isset($_SESSION['sid'])&& isset($_GET['id_nganh_sv'])){
            $id_nganh=$_GET['id_nganh_sv'];
            $thongtinnganh=checknganhbyid($id_nganh);
            $tennganh= $thongtinnganh['ten_nganh'];
          }elseif(isset($_GET['id_nganh_sv']) && $_GET['id_nganh_sv']==0 ){
          header("Location: " . $_SERVER["HTTP_REFERER"]);
          echo "<script type='text/javascript'>alert('Hãy đăng nhập để xem chức năng này ');</script>";
          }
          else {$id_nganh= 0 ;
            $tennganh='Tất Cả';
          }
          $thongtindangtuyen=thongtindangtuyen($id_nganh);
          $coutdangtuyen= coutdangtuyen($id_nganh);      
          $view = "view/list-job.php";
        require_once "view/layout.php";
    break;
    case 'nopdonungtuyen':
     $kiemtratontaicv = thongtincv();
     if(isset($kiemtratontaicv['ngay_cap_nhap'])){
      if( isset($_POST['nguyen_vong'])){
        $thongtindt= checkdangtuyenbyid($_POST['id_dt']);
        $thongtindn=checkdoanhnghiepbyid($thongtindt['id_dn']);
        $thongtinnganh=checknganhbyid($thongtindt['id_nganh']);
        $nguyen_vong = $_POST['nguyen_vong'];
        $id_dt = $_POST['id_dt'];
        $id_sv = $_SESSION['sid_sv'];
        $ngay_dk = date("Y/m/d");
        // echo($ngay_dk);
        // echo "<script type='text/javascript'>alert('$ngay_dk');</script>";
        addphieudkin($id_sv,$ngay_dk,$nguyen_vong,$id_dt,$thongtindt['id_dn']);
        if(isset($_POST['jobdetail'])) {
          require_once  "view/job-detail.php";
          }
        else require_once 'view/ajax_chitiet_dangtuyen.php'; 

      }
     } else {
      echo "<script type='text/javascript'> window.location='index.php?ctrl=sinh_vien&act=cv_edit';</script>";
      echo "<script type='text/javascript'>alert('Hãy nhập thông tin của CV để đủ điều kiện ứng tuyển');</script>";
      exit();
     }
      
      break;
    case 'xoadonungtuyen':
        xoadonungtuyen($_POST['id_sv'],$_POST['id_dt']);
        
        $thongtindt= checkdangtuyenbyid($_POST['id_dt']);
        $thongtindn=checkdoanhnghiepbyid($thongtindt['id_dn']);
        $thongtinnganh=checknganhbyid($thongtindt['id_nganh']);
        require_once 'view/ajax_chitiet_dangtuyen.php';
      break;
    case 'thongtindoanhnghiep':
      $dangtuyen= checkdangtuyenbyid($_GET['id_dt']);
      $doanhnghiep=checkdoanhnghiepbyid($dangtuyen['id_dn']);
      $dt=getAllDangtuyen();
      $view = "view/dn_ttdn.php";
      require_once "view/layout.php";
      break;
    case 'thongtindoanhnghiep-dn':
      $doanhnghiep = checkdoanhnghiepbyid($_SESSION['sid_dn']);
      $dt=getAllDangtuyen();
      $view = "view/dn_ttdn.php";
      require_once "view/layout.php";
    break;
    case "chitietdangtuyen": 
      if (isset($_GET['iddangtuyen'])){
        echo "<script type='text/javascript'>alert('addaa');</script>";
        echo 'aa';
      }
    case "login":
      if(isset($_POST['login'])){
        $user = $_POST['login'][0];
        $pass = $_POST['login'][1];
        $checkkhachhang=checkkhachhang($user,$pass);
        
      }
      if(isset($checkkhachhang) && $checkkhachhang!=''){	
        $_SESSION['user']=$user;
          $_SESSION['sid']=$checkkhachhang['id_user'];
          if($checkkhachhang['chuc_vu']==0){
            $seach_kh_byid =  checkkhachhangbyid($_SESSION['sid']);
            $_SESSION['sname']=$seach_kh_byid['ho_ten'];
            $_SESSION['sid_sv']=$seach_kh_byid['id_sv'];
            $_SESSION['schuc_vu'] = 0;
            $kt_dn_landau= checktaikhoanbyid($_SESSION['sid']);
            if($kt_dn_landau['kich_hoat']==0) echo '10';else
            echo '0';
            
         
          }elseif($checkkhachhang['chuc_vu']==1){
            $seach_dn_byid =  checkdoanhnghiepbyiduser($_SESSION['sid']);
            $_SESSION['sname'] = $seach_dn_byid['ten_dn'];
            $_SESSION['sid_dn'] = $seach_dn_byid['id_dn'];
            $_SESSION['schuc_vu'] = 1;
            echo '1';
           
          }
          elseif($checkkhachhang['chuc_vu']==2){
            $_SESSION['sname'] = "admin ";
            $_SESSION['admin'] = $user;
            $_SESSION['schuc_vu'] = 2;
            echo '2';
            
          }
         

      }else {
        echo '3';
       }
       
      break;
      case "logout":
        unset($_SESSION['sid']);
        unset($_SESSION['sid_sv']);
        unset($_SESSION['sid_dn']);
        unset($_SESSION['schuc_vu']);
        unset($_SESSION['sname']);
        unset($_SESSION['admin']);
        header('location:index.php');
        break;
 
    }
