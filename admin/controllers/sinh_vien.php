    <?php
    ob_start();
    require_once "models/sinh_vien.php";
    require_once "views/Classes/PHPExcel.php";

    require_once "models/excel.php"; //nạp model để có các hàm tương tác db
    $act = "index"; //chức năng mặc định
    if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
    switch ($act) {
        case "index":
            /* Chức năng hiện trang chủ
          1. nạp view hiện trên trang chủ */
            if (isset($_POST['arr'])) {
                var_dump($_POST['arr']);
                foreach ($_POST['arr'] as $id_user) {
                    deleteUser($id_user);
                }
            }
            $dm = getAllSinhvien();
            $view = "views/sinh_vien-index.php";
            require_once "views/layout.php";
            break;
        case "dacott":
            $dm = getAllSinhvien_dacott();
            $view = "views/sinh_vien-index.php";
            require_once "views/layout.php";
            break;
        case "chuacott":
            $dm = getAllSinhvien_chuacott();
            $view = "views/sinh_vien-index.php";
            require_once "views/layout.php";
            break;
        case "dahoanthanh":
            $dm = getAllSinhvien_dahoanthanh();
            $view = "views/sinh_vien-index.php";
            require_once "views/layout.php";
            break;
        case "thongbao":
            session_start();
            if (isset($_SESSION['thongbao'])) {
                $thongbao = $_SESSION['thongbao'];
                unset($_SESSION['thongbao']);
            } else
                $thongbao = "Không có gì để thông báo";
            $view = "views/thongbao.php";
            require_once "views/layout.php";
            break;
        case "addnew":
            $view = "views/sinh_vien-add.php";
            require_once "views/layout.php";
            break;
        case "addnew_":
            $view = "views/docfile.php";
            require_once "views/layout.php";
            break;
        case "insert":
            $user = trim(strip_tags($_POST['email']));
            $email = trim(strip_tags($_POST['email']));
            $pass = trim(strip_tags($_POST['pass']));
            $chuc_vu = 0;
            addNewUser($user, $pass, $email, $chuc_vu);
            $ds = getAllUser();
            foreach ($ds as $id) {
                if ($id['user'] == $user) {
                    $id_user = $id['id_user'];
                }
            }
            $mssv = trim(strip_tags($_POST["mssv"]));
            $id_nganh = $_POST['id_nganh'];
            settype($id_nganh, "int");
            if ($id_nganh == "") {
                $thongbao = "Thêm thất bại do bạn chưa chọn ngành";
                $view = "views/thongbao.php";
                require_once "views/layout.php";
                exit();
            }
            $ho_ten = trim(strip_tags($_POST["ho_ten"]));
            $gioi_tinh = $_POST['gioi_tinh'];
            settype($gioi_tinh, "int");
            $sdt = $_POST['sdt'];
            settype($sdt, "int");
            $trang_thai = $_POST['trang_thai'];
            settype($trang_thai, "int");
            $anh = $_FILES["anh"]["name"];
            move_uploaded_file($_FILES["anh"]["tmp_name"], "images/$anh");
            addNewSinhvien($id_user, $mssv, $id_nganh, $ho_ten, $gioi_tinh, $sdt, $trang_thai, $anh);
            $sv_full = seach_id_sv($id_user);
            $id_sv = $sv_full['id_sv'];
            addNewhosoforexecl($id_sv);
            $thongbao = "Thêm sinh viên thành công";
            $view = "views/thongbao.php";
            require_once "views/layout.php";
            break;
        case "edit":
            $id_sv = $_GET["id_sv"];
            settype($id_sv, "int");
            $row = getSinhvienByID($id_sv);
            $view = "views/sinh_vien-edit.php";
            require_once "views/layout.php";
            break;
        case "timkiem":
            if (!isset($_POST["mssv"])) {
                $view = "views/home.php";
                require_once "views/layout.php";
            }
            $mssv = trim(strip_tags($_POST["mssv"]));
            $ds = searchSinhvien($mssv);
            if (checkMssvTonTai($mssv) == false) {
                $thongbao = "Mã số sinh viên không đúng";
                $view = "views/thongbao.php";
                require_once "views/layout.php";
            }
            $view = "views/timkiem_sv.php";
            require_once "views/layout.php";
            break;
        case "update":
            $id_sv = $_POST["id_sv"];
            $ds = getAllSinhvien();
            foreach ($ds as $id) {
                if ($id['id_sv'] == $id_sv) {
                    $id_user = $id['id_user'];
                }
            }
            $user = trim(strip_tags($_POST["email"]));
            $pass = trim(strip_tags($_POST["pass"]));
            $email = trim(strip_tags($_POST["email"]));
            updateUser($id_user, $user, $pass, $email);
            $mssv = trim(strip_tags($_POST["mssv"]));
            $id_nganh = $_POST['id_nganh'];
            settype($id_nganh, "int");
            $ho_ten = trim(strip_tags($_POST["ho_ten"]));
            $gioi_tinh = $_POST['gioi_tinh'];
            settype($gioi_tinh, "int");
            $sdt = $_POST['sdt'];
            settype($sdt, "int");
            $trang_thai = $_POST['trang_thai'];
            settype($trang_thai, "int");
            $anh = $_FILES["anh"]["name"];
            move_uploaded_file($_FILES["anh"]["tmp_name"], "images/$anh");
            updateSinhvien($id_sv, $mssv, $id_nganh, $ho_ten, $gioi_tinh, $sdt, $trang_thai, $anh);
            $ds = getAllSinhvien();
            $view = "views/sinh_vien-index.php";
            require_once "views/layout.php";
            break;
        case "delete":
            $id_user = $_GET["id_user"];
            settype($id_user, "int");
            deleteUser($id_user);
            $dm = getAllSinhvien();
            $view = "views/sinh_vien-index.php";
            require_once "views/layout.php";
            break;
        case "kiemtrauser":
            if (isset($_GET['user'])) $user = trim(strip_tags($_GET['user']));
            else $user = "";
            if ($user == "") echo "<pan class ='badge badge-danger'>Username không có</pan>";
            else if (checkUserTonTaiChuaDung($user)) echo "<pan class = 'badge badge-danger '>User này đã có người dùng</pan>";
            else echo "<pan class ='badge badge-success'>Bạn có thể dùng User này</pan>";
            break;
        case "kiemtramssv":
            if (isset($_GET['mssv'])) $mssv = trim(strip_tags($_GET['mssv']));
            else $mssv  = "";
            if ($mssv  == "") echo "<pan class ='badge badge-danger'>Mã số sinh viên không được rỗng</pan>";
            else if (checkMssvTonTai($mssv)) echo "<pan class = 'badge badge-danger'>Mã số sinh viên đã có người dùng</pan>";
            else echo "<pan class ='badge badge-success'>Bạn có thể dùng mã số sinh viên này</pan>";
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
