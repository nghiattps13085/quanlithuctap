
    <?php
    require_once "models/user.php"; //nạp model để có các hàm tương tác db
    $act = "index"; //chức năng mặc định
    if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
    switch ($act) {
        case "index":
            /* Chức năng hiện trang chủ
          1. nạp view hiện trên trang chủ */
            $ds = getAllUser();
            $view = "views/user-index.php";
            require_once "views/layout.php";
            break;
        case "addnew":
            $view = "views/user-add.php";
            require_once "views/layout.php";
            break;
        case "taikhoan_":
            $view = "views/doimk.php";
            require_once "views/layout.php";
            break;
        case "doimk":
            $u = trim(strip_tags($_POST['user']));
            $p = trim(strip_tags($_POST['pass']));
            $p1 = trim(strip_tags($_POST['pass_new']));
            if (checkHople_($u, $p) == true) {
                updateUser_($u, $p1);
                $thongbao = "Mật khẩu đã được đổi";
            } else
                $thongbao = "Mật khẩu không đúng";
            $view = "views/thongbao.php";
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
        case "insert":
            $user = trim(strip_tags($_POST['user']));
            $email = trim(strip_tags($_POST['email']));
            $pass = trim(strip_tags($_POST['pass']));
            $chuc_vu = $_POST['chuc_vu'];
            $thongbao = "";
            $thanhcong = true;
            if ($user == "") {
                $thongbao .= "Tên user chưa nhập ";
                $thanhcong = false;
            } else if (strlen($user) < 3) {
                $thongbao .= "Tên user quá ngắn ";
                $thanhcong = false;
            } else if (checkUserTonTai($user) == true) {
                $thongbao .= "Tên user đã tồn tại ";
                $thanhcong = false;
            }
            if ($email == "") {
                $thongbao .= "Email chưa nhập ";
                $thanhcong = false;
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
                $thongbao .= "Email không đúng ";
                $thanhcong = false;
            } else if (checkEmailTonTai($email) == true) {
                $thongbao .= "Email đã tồn tại ";
                $thanhcong = false;
            }
            if ($thanhcong == false) {
                session_start();
                $_SESSION['thongbao'] = $thongbao;
                header("location:" . ADMIN_URL . "?ctrl=user&act=thongbao");
                exit();
            }
            addNewUser($user, $pass, $email, $chuc_vu);
            $thongbao = "Thêm nhóm ngành thành công";
            $view = "views/thongbao.php";
            require_once "views/layout.php";
            break;
        case "edit":
            $id_user = $_GET["id_user"];
            settype($id_user, "int");
            $row = getUserByID($id_user);
            $view = "views/user-edit.php";
            require_once "views/layout.php";
            break;
        case "update":
            $id_user = $_POST["id_user"];
            $user = trim(strip_tags($_POST["user"]));
            $pass = trim(strip_tags($_POST["pass"]));
            $email = trim(strip_tags($_POST["email"]));
            $chuc_vu =  $_POST["chuc_vu"];
            settype($id_user, "int");
            settype($chuc_vu, "int");
            updateUser($id_user, $user, $pass, $email, $chuc_vu);
            $ds = getAllUser();
            $view = "views/user-index.php";
            require_once "views/layout.php";
            break;
        case "delete":
            $id_user = $_GET["id_user"];
            settype($id_user, "int");
            deleteUser($id_user);
            $ds = getAllUser();
            $view = "views/user-index.php";
            require_once "views/layout.php";
            break;
        case "kiemtrauser":
            if (isset($_GET['user'])) $user = trim(strip_tags($_GET['user']));
            else $user = "";
            if ($user == "") echo "<pan class ='badge badge-danger'>Username không có</pan>";
            else if (checkUserTonTai($user)) echo "<pan class = 'badge badge-danger'>Username đã có</pan>";
            else echo "<pan class ='badge badge-success'>Bạn có thể tạo Username này</pan>";
            break;
        case "kiemtraemail":
            if (isset($_GET['email'])) $email = trim(strip_tags($_GET['email']));
            else $email = "";
            if ($email == "") echo "<pan class ='badge badge-danger'>Email không có</pan>";
            else if (checkEmailTonTai($email)) echo "<pan class = 'badge badge-danger'>Email đã có</pan>";
            else echo "<pan class ='badge badge-success'>Bạn có thể dùng Email này</pan>";
            break;
    }
    ?>
