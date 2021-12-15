<?php

require_once "../system/database.php";
require_once "model/home.php";
require_once "model/doanh_nghiep.php";

$act = "index";
if (isset($_GET["act"]) == true) $act = $_GET["act"];
switch ($act) {
    case "index":
        $dn = getDoanhnghiepByID($_SESSION['sid_dn']);
        $ds = getAllDoanhnghiep();
        $view_dn = "view/dn_index.php";
        break;
    case "update":
        $id_dn = $_POST["id_dn"];
        $ds = getAllDoanhnghiep();
        foreach ($ds as $id) {
            if ($id['id_dn'] == $id_dn) {
                $id_user = $id['id_user'];
            }
        }
        $email = trim(strip_tags($_POST["email"]));
        updateUser($id_user, $email);
        // doanh nghiep
        $ten_dn = trim(strip_tags($_POST["ten_dn"]));
        $masothue = $_POST['masothue'];
        settype($masothue, "int");
        $dia_chi = trim(strip_tags($_POST["dia_chi"]));
        $website = trim(strip_tags($_POST["website"]));
        $fax = trim(strip_tags($_POST["fax"]));
        $sdt = $_POST['sdt'];
        settype($sdt, "int");
        $sdt_ban = $_POST['sdt_ban'];
        settype($sdt_ban, "int");
        updateDoanhnghiep($id_dn, $id_user, $ten_dn, $masothue, $dia_chi, $website, $fax, $sdt, $sdt_ban);
        $ds = getAllDoanhnghiep();
        $view_dn = "view/dn_index.php";
        break;
    case 'taodangtuyen':
        if (isset($_POST['submit'])) {
            $thoi_gian = $_POST['thoi_gian'];
            $id_nganh = $_POST['nganh_dt'];
            $id_dn = $_POST['id_dn'];
            $tieu_de = $_POST['tieude'];
            $luong_khoi_dau = $_POST['luongthapnhat'];
            $luong_ket_thuc = $_POST['luongcaonhat'];
            $thoi_gian_tt = $_POST['thoigiantt'];
            $sl_sv_can = $_POST['soluongtuyen'];
            $full_part_time = $_POST['hinhthuclamviec'];
            $thoi_gian_lam_viec = $_POST['thoigianlamviec'];
            //phucloi
            if ($_POST['thuong'] = "checked")  $che_do_thuong = 1;
            else $che_do_thuong = 0;
            if ($_POST['daotao'] = "checked") $dao_tao = 1;
            else $dao_tao = 0;
            if ($_POST['tangluong'] = "checked") $tang_luong = 1;
            else $tang_luong = 0;
            if ($_POST['nghiphep'] = "checked") $nghi_phep_nam = 1;
            else $nghi_phep_nam = 0;
            if ($_POST['dulich'] = "checked") $du_lich = 1;
            else $du_lich = 0;
            if ($_POST['baohiem'] = "checked") $che_do_bao_hiem = 1;
            else $che_do_bao_hiem = 0;
            //textarea
            $mo_ta = $_POST['mota'];
            $yeu_cau = $_POST['yeucau'];
            $quyen_loi = $_POST['quyenloi'];
            add_dangtuyen($id_nganh, $id_dn, $tieu_de, $luong_khoi_dau, $luong_ket_thuc, $thoi_gian_tt, $sl_sv_can, $full_part_time, $thoi_gian_lam_viec, $che_do_thuong, $dao_tao, $tang_luong, $nghi_phep_nam, $du_lich, $che_do_bao_hiem, $mo_ta, $yeu_cau, $quyen_loi, $thoi_gian);
        }
        $id_user = $_SESSION['sid'];
        settype($id_user, "int");
        $ds = getAllDoanhnghiep();
        foreach ($ds as $row) {
            if ($row['id_user'] == $id_user) {
                $id_dn = $row['id_dn'];
            }
        }
        $ds = getAllDangtheodn($id_dn);
        $view_dn = "view/dn_qlbv.php";
        break;
    case 'chonnganh':
        if (isset($_POST['id_nn'])) {
            $nganh = ds_nganh_all($_POST['id_nn']);
            foreach ($nganh as $nganh) {
                echo "<option value='" . $nganh['id_nganh'] . "'>" . $nganh['ten_nganh'] . "</option>";
            }
            exit();
        }
        break;
    case 'dn_upload_logo':
        if (isset($_FILES['file']['name'])) {
            $id_dn = $_SESSION['sid_dn'];
            $anh = $_FILES['file']['name'];
            $target_dir = "../uploads/";
            $anh = "logo-dn/logo-dn" . $id_dn . "." . pathinfo(basename($anh), PATHINFO_EXTENSION);
            //check ảnh sv
            if (checkdoanhnghiepbyiduser($_SESSION['sid'])['anh'] == $anh) $anh = $target_dir . "logo-dn/logo-dn" . $id_dn . "-1." . pathinfo(basename($anh), PATHINFO_EXTENSION);
            $target_file = $target_dir . $anh;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                upload_logo($anh);
                echo ($target_file);
            }
        } else $anh = '';
        exit();
        break;
    case 'dn_upload_banner':
        if (isset($_FILES['file']['name'])) {
            $id_dn = $_SESSION['sid_dn'];
            $anh = $_FILES['file']['name'];
            $target_dir = "../uploads/";
            $anh = "banner-dn/banner-dn" . $id_dn . "." . pathinfo(basename($anh), PATHINFO_EXTENSION);
            //check ảnh sv
            if (checkdoanhnghiepbyiduser($_SESSION['sid'])['banner'] == $anh) $anh = $target_dir . "banner-dn/banner-dn" . $id_dn . "-1." . pathinfo(basename($anh), PATHINFO_EXTENSION);
            $target_file = $target_dir . $anh;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                upload_banner($anh);
                echo ($target_file);
            }
        } else $anh = '';
        exit();
        break;
    case 'qlbv':
        $id_user = $_GET["id_user"];
        settype($id_user, "int");
        $ds = getAllDoanhnghiep();
        foreach ($ds as $row) {
            if ($row['id_user'] == $id_user) {
                $id_dn = $row['id_dn'];
            }
        }
        $ds = getAllDangtheodn($id_dn);
        $view_dn = "view/dn_qlbv.php";
        break;
    case "tttk":
        $dn = getDoanhnghiepByID($_SESSION['sid_dn']);
        $view_dn = "view/dn_tttk.php";
        break;
    case "dshs":
        $id_user = $_SESSION['sid'];
        $trang_thai = 0;
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_dshs.php";
        break;
    case "daduyet":
        $id_user = $_SESSION['sid'];
        $trang_thai = 1;
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_dshs.php";
        break;
    case "tuchoi_":
        $id_user = $_SESSION['sid'];
        $trang_thai = 2;
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_dshs.php";
        break;
    case "pheduyet":
        $trang_thai = 0;
        $id_phieu = $_GET["id_phieu"];
        settype($id_phieu, "int");
        $thoi_gian_duyet = date('Y-m-d H:i:s');
        $sv = getUngtuyenByID($id_phieu);
        updatePhieu($id_phieu, $thoi_gian_duyet);
        $dn = getDoanhnghiepByID($_SESSION['sid_dn']);
        $id_ng_gui = $dn['id_dn'];
        $ut = getUngtuyenByID($id_phieu);
        $id_ng_nhan = $ut['id_sv'];
        $thoi_gian = date('Y-m-d H:i:s');
        $ten_dn = $dn['ten_dn'];
        $noi_dung = "Doanh nghiệp $ten_dn đã chấp nhận đơn xin thực tập của bạn ";
        addNewThongbao($noi_dung, $thoi_gian, $id_ng_gui, $id_ng_nhan);
        $id_user = $_SESSION['sid'];
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_dshs.php";
        break;
    case "tuchoi":
        $trang_thai = 1;
        $id_phieu = $_GET["id_phieu"];
        settype($id_phieu, "int");
        updatePhieu_($id_phieu);
        $id_user = $_SESSION['sid'];
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_dshs.php";
        break;
    case "tdmk":
        $view_dn = "view/dn_tdmk.php";
        $dn = getDoanhnghiepByID($_SESSION['sid_dn']);
        break;
    case "doimk_":
        $id_user = $_SESSION['sid'];
        $p = trim(strip_tags($_POST['passcu']));
        $p1 = trim(strip_tags($_POST['passmoi']));
        $p2 = trim(strip_tags($_POST['passmoi1']));
        if ($p1 != $p2) {
            $thongbao = "Mật khẩu nhập lại không đúng";
        } elseif (checkHople_($id_user, $p) == true) {
            updateUser_($id_user, $p1);
            $thongbao = "Mật khẩu đã được đổi";
        } else
            $thongbao = "Mật khẩu không đúng";
        $view_dn = "view/thongbao.php";
        break;
    case "qlns":
        $id_user = $_SESSION['sid'];
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_qlns.php";
        break;
    case "danhgia":
        $id_phieu = $_GET["id_phieu"];
        settype($id_phieu, "int");
        updateDanhgia($id_phieu);
        $id_user = $_SESSION['sid'];
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_qlns.php";
        break;
    case "delete_dt":
        $id_dt = $_GET["id_dt"];
        settype($id_dt, "int");
        deleteDangtuyen($id_dt);
        $dn = getAllDoanhnghiep();
        foreach ($dn as $d) {
            if ($d['id_user'] == $_SESSION['sid'])
                $id_dn = $d['id_dn'];
        }
        $ds = getAllDangtheodn($id_dn);
        $view_dn = "view/dn_qlbv.php";
        break;
    case "dn_danh_gia":
        $ket_qua = $_POST['h-danhgia'];
        $danh_gia = $_POST['danh_gia'];
        $id_phieu = $_GET['id_phieu'];
        $tg_kt=date('Y-m-d H:i:s');
        danh_gia_tu_dn($ket_qua,$tg_kt,$danh_gia, $id_phieu);
        $ut = getUngtuyenByID($id_phieu);
        $id_sv = $ut['id_sv'];
        $sv = getSinhvienByID($id_sv);
        $ten_sv = $sv['ho_ten'];
        $id_user = $sv['id_user'];
        $us = getUserByID($id_user);
        $email = $us['email'];
        if ($ket_qua == 2) {
            $thong_bao = "đã thực tập đạt";
        } else {
            $thong_bao = "đã thực tập chưa đạt";
        }
        // Gửi mail kích hoạt tài khoản
        require "../admin/controllers/PHPMailer-master/src/PHPMailer.php";
        require "../admin/controllers/PHPMailer-master/src/SMTP.php";
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
        try {
            $mail->SMTPDebug = 0;  // Enable verbose debug output show code
            $mail->isSMTP();
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'khaiphan2222@gmail.com';  // SMTP username
            $mail->Password = 'Khai261093';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('khaiphan2222@gmail.com', 'khải');
            $mail->addAddress($email, $ten_sv); //mail và tên người nhận       
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Đánh giá thực tập';
            $linkKH = "<a href='" . $_SERVER['HTTP_HOST'] . SITE_URL .
                "/?act=kichhoat&id=%d&rd=%s'>Nhắp vào đây</a>";
            $linKH = sprintf($ten_sv);
            $mail->Body = "<h4>Đánh giá thực tập</h4><br>Chào bạn $linKH kết quả thực tập của bạn là " . $thong_bao;
            $mail->send();
        } catch (Exception $e) {
            $mail->ErrorInfo;
        }
        $id_user = $_SESSION['sid'];
        $ut = getUngtuyenByID($id_phieu);
        updateSinhvienTT($ut['id_sv'], $ket_qua);
        $ds = getAllDoanhnghiepID($id_user);
        $view_dn = "view/dn_qlns.php";
        break;
    case "danh_gia":
        $id = $_POST['id_phieu'];
        require_once "view/ajax_danh_gia.php";
        exit();
    case "show_cv":
        $thong_tin = checkphieudkinbyid($_POST['id_phieu']);
        $id_sv = $thong_tin['id_sv'];
        $thong_tin_sv = checksinhvienbyid($id_sv);
        $nganh = checkNganhByID($thong_tin_sv['id_nganh']);
        $email = checktaikhoanbyid($thong_tin_sv['id_user']);
        $kynang = checkHosoByID($thong_tin_sv['id_sv']);
        $dangtuyen = checkdangtuyenbyid($thong_tin['id_dt']);
        $phe_duyet = '';
        require_once "view/ajax_tt_sv.php";
        exit;
    case "an_hien_dt":
        $tt_dt = getDangtuyenByID($_POST['id_dt']);
        sua_tt_dt($tt_dt['an_hien'], $tt_dt['id_dt']);
        break;
        exit();
    case 'xuat_excel_sv':

        break;
    case 'thongbao':
        $ds = getAllThongbao_($_SESSION['sid_dn']);
        $view_dn = "view/dn_thongbao.php";
        break;
    case 'thongbao_update':
        $id_tb = $_GET["id_tb"];
        settype($id_tb, "int");
        updateThongbao($id_tb);
        $ds = getAllThongbao_($_SESSION['sid_dn']);
        $view_dn = "view/dn_thongbao.php";
        break;
}
$view = "view/layout_dn.php";
require_once "view/layout.php";
