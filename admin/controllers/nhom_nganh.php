
    <?php
    require_once "models/nhom_nganh.php"; //nạp model để có các hàm tương tác db
    $act = "index"; //chức năng mặc định
    if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
    switch ($act) {
        case "index":
            /* Chức năng hiện trang chủ
          1. nạp view hiện trên trang chủ */
          if(isset($_POST['arr'])){
            var_dump($_POST['arr']);
            foreach($_POST['arr'] as $id_nn){
                deleteNhomnganh($id_nn);
            }
        }
            $ds = getAllNhomnganh();
            $view = "views/nn-index.php";
            require_once "views/layout.php";
            break;
        case "thongbao":
            session_start();
            if (isset($_SESSION['thongbao'])) {
                $thongbao = $_SESSION['thongbao'];
                unset($_SESSION['thongbao']);
            } else {
                $thongbao = "Không có gì để thông báo";
            }
            $view = "views/thongbao.php";
            require_once "views/layout.php";
            break;
        case "addnew":
            $view = "views/nn-add.php";
            require_once "views/layout.php";
            break;
        case "insert":
            $ten_nn = trim(strip_tags($_POST['ten_nn']));
            $thongbao = "";
            $thanhcong = true;
            if ($ten_nn == "") {
                $thongbao .= "Tên nhóm ngành chưa nhập ";
                $thanhcong = false;
            } else if (strlen($ten_nn) < 4) {
                $thongbao .= "Tên nhóm ngành quá ngắn ";
                $thanhcong = false;
            } else if (checkTennhomnganhTonTai($ten_nn) == true) {
                $thongbao .= "Tên nhóm ngành đã tồn tại ";
                $thanhcong = false;
            }
            if ($thanhcong == false) {
                session_start();
                $_SESSION['thongbao']=$thongbao;
                header("location:" . ADMIN_URL . "?ctrl=nhom_nganh&act=thongbao");
                exit();
            }
            $an_hien = $_POST['an_hien'];
            settype($an_hien, "int");
            addNewNhomnganh($ten_nn, $an_hien);
            $thongbao = "Thêm nhóm ngành thành công";
            $view = "views/thongbao.php";
            require_once "views/layout.php";
            break;
        case "kiemtra_ten_nn":
            if (isset($_GET['ten_nn']))
                $ten_nn = trim(strip_tags($_GET['ten_nn']));
            else $ten_nn = "";
            if ($ten_nn == "") echo "<pan class ='badge badge-danger'>Tên nhóm ngành không được trống</pan>";
            elseif (checkNhomnganhTonTai($ten_nn)) echo "<span class = 'badge badge-danger'>Tên nhóm ngành đã có</span>";
            else echo "<pan class ='badge badge-success'>Bạn có thể dùng tên doanh nghiệp này</pan>";
            break;
        case "edit":
            $id_nn = $_GET["id_nn"];
            settype($id_nn, "int");
            $row = getNhomnganhByID($id_nn);
            $view = "views/nn-edit.php";
            require_once "views/layout.php";
            break;
        case "update":
            $id_nn = $_POST["id_nn"];
            $ten_nn = trim(strip_tags($_POST["ten_nn"]));
            $an_hien = $_POST["an_hien"];
            settype($ma_loai, "int");
            updateNhomnganh($id_nn, $ten_nn, $an_hien);
            $ds = getAllNhomnganh();
            $view = "views/nn-index.php";
            require_once "views/layout.php";
            break;
        case "delete":
            $id_nn = $_GET["id_nn"];
            settype($id_nn, "int");
            deleteNhomnganh($id_nn);
            $ds = getAllNhomnganh();
            $view = "views/nn-index.php";
            require_once "views/layout.php";
            break;
    }
    ?>
