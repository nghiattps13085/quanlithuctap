
    <?php
    require_once "model/dang_tuyen.php"; //nạp model để có các hàm tương tác db
    $act = "index"; //chức năng mặc định
    if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
    switch ($act) {
        case "index":
            /* Chức năng hiện trang chủ
          1. nạp view hiện trên trang chủ */
            $ds = getAllDangtuyen();
            $view = "view/dt-index.php";
            require_once "view/layout.php";
            break;
        case "theodn":
            $id_user = $_GET["id_user"];
            settype($id_user, "int");
            $ds = getAllDoanhnghiep();
            foreach ($ds as $row) {
                if ($row['id_user'] == $id_user) {
                    $id_dn = $row['id_dn'];
                }
            }
            $ds = getAllDangtheodn($id_dn);
            $view = "view/dt-theo-dn.php";
            require_once "view/layout.php";
            break;
        case "addnew":
            $view = "views/dt-add.php";
            require_once "views/layout.php";
            break;
        case "insert":
            $tieu_de = trim(strip_tags($_POST['tieu_de']));
            $noi_dung = trim(strip_tags($_POST['noi_dung']));
            $yeu_cau = trim(strip_tags($_POST['yeu_cau']));
            $ten_dn = trim(strip_tags($_POST['ten_dn']));
            $id_nganh = $_POST['id_nganh'];
            $an_hien = $_POST['an_hien'];
            settype($an_hien, "int");
            $trang_thai = $_POST['trang_thai'];
            settype($trang_thai, "int");
            $sl_sv_can = $_POST['sl_sv_can'];
            settype($sl_sv_can, "int");
            $sl_sv_dk = $_POST['sl_sv_dk'];
            settype($sl_sv_dk, "int");
            $anh = $_FILES["anh"]["name"];
            $ds = getAllDoanhnghiep();
            foreach ($ds as $d) {
                if ($d['ten_dn'] == $ten_dn) {
                    $id_dn = $d['id_dn'];
                }
            }
            if (checkTendoanhnghiep($ten_dn) == false) {
                $thongbao = "Thêm đăng tuyển thất bại sai tên doanh nghiệp";
                $view = "views/thongbao.php";
                require_once "views/layout.php";
                exit();
            }
            if ($id_nganh == "") {
                $thongbao = "Thêm đăng tuyển thất bại bạn chưa chọn ngành";
                $view = "views/thongbao.php";
                require_once "views/layout.php";
                exit();
            }
            move_uploaded_file($_FILES["anh"]["tmp_name"], "../uploads/$anh");
            addNewDangtuyen($id_nganh, $id_dn, $tieu_de, $noi_dung, $yeu_cau, $trang_thai, $sl_sv_can, $sl_sv_dk, $an_hien, $anh);
            $thongbao = "Thêm đăng tuyển thành công";
            $view = "views/thongbao.php";
            require_once "views/layout.php";
            break;
        case "edit":
            $id_dt = $_GET["id_dt"];
            settype($id_dt, "int");
            $row = getDangtuyenByID($id_dt);
            $view = "views/dt-edit.php";
            require_once "views/layout.php";
            break;
        case "update":
            $id_dt = $_POST['id_dt'];
            $tieu_de = trim(strip_tags($_POST['tieu_de']));
            $noi_dung = trim(strip_tags($_POST['noi_dung']));
            $yeu_cau = trim(strip_tags($_POST['yeu_cau']));
            $ten_dn = trim(strip_tags($_POST['ten_dn']));
            $id_nganh = $_POST['id_nganh'];
            $an_hien = $_POST['an_hien'];
            settype($an_hien, "int");
            $trang_thai = $_POST['trang_thai'];
            settype($trang_thai, "int");
            $sl_sv_can = $_POST['sl_sv_can'];
            settype($sl_sv_can, "int");
            $sl_sv_dk = $_POST['sl_sv_dk'];
            settype($sl_sv_dk, "int");
            $anh = $_FILES["anh"]["name"];
            $ds = getAllDoanhnghiep();
            foreach ($ds as $d) {
                if ($d['ten_dn'] == $ten_dn) {
                    $id_dn = $d['id_dn'];
                } else {
                    $thongbao = "Sửa thất bại do sai tên doanh nghiệp";
                    $view = "views/thongbao.php";
                    require_once "views/layout.php";
                    exit();
                }
            }
            move_uploaded_file($_FILES["anh"]["tmp_name"], "images/$anh");
            updateDangtuyen($id_dt, $id_nganh, $id_dn, $tieu_de, $noi_dung, $yeu_cau, $trang_thai, $sl_sv_can, $sl_sv_dk, $an_hien, $anh);
            $ds = getAllDangtuyen();
            $view = "views/dt-index.php";
            require_once "views/layout.php";
            break;
        case "delete":
            $id_dt = $_GET["id_dt"];
            settype($id_dt, "int");
            deleteDangtuyen($id_dt);
            $dn = getAllDoanhnghiep();
            foreach ($dn as $d) {
                if ($d['id_user'] == $_SESSION['sid'])
                    $id_dn = $d['id_dn'];
            }
            $ds = getAllDangtheodn($id_dn);
            $view = "view/dt-theo-dn.php";
            require_once "view/layout.php";
            break;
        case "duyet":
            $id_dt = $_GET["id_dt"];
            settype($id_dt, "int");
            duyetDangtuyen($id_dt);
            $ds = getAllDangtuyen();
            $view = "view/dt-index.php";
            require_once "view/layout.php";
            break;
        case "ung_tuyen":
            $id_dt = $_GET["id_dt"];
            settype($id_dt, "int");
            $ds = getAllUngtuyen($id_dt);
            $view = "view/ut-index.php";
            require_once "view/layout.php";
            break;
        case "ung_tuyen_":
            $id_dt = $_GET["id_dt"];
            settype($id_dt, "int");
            $ds = getAllUngtuyen($id_dt);
            $view = "view/ut-index.php";
            require_once "view/layout.php";
            break;
        case "chi_tiet":
            $id_dt = $_GET["id_dt"];
            settype($id_dt, "int");
            $row = getDangtuyenByID($id_dt);
            $ds = getAllUngtuyen($id_dt);
            $ut = getAllDangtuyen($id_dt);
            $view = "view/chitiet_dt.php";
            require_once "view/layout.php";
            break;
        case "kiemtrauser":
            if (isset($_GET['user'])) $user = trim(strip_tags($_GET['user']));
            else $user = "";
            if ($user == "") echo "<pan class ='badge badge-danger'>Username không có</pan>";
            else if (checkUserTonTaiChuaDung($user)) echo "<pan class = 'badge badge-danger '>User này đã có người dùng</pan>";
            else echo "<pan class ='badge badge-success'>Bạn có thể dùng User này</pan>";
            break;
        case "kiemtraemail":
            if (isset($_GET['email'])) $email = trim(strip_tags($_GET['email']));
            else $email = "";
            if ($email == "") echo "<pan class ='badge badge-danger'>Email không có</pan>";
            else if (checkEmailTonTai($email)) echo "<pan class = 'badge badge-danger'>Email đã có người dùng</pan>";
            else echo "<pan class ='badge badge-success'>Bạn có thể dùng Email này</pan>";
            break;
    }
    ?>
