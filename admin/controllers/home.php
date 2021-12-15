
    <?php
    require_once "models/home.php"; //nạp model để có các hàm tương tác db
    $act = "index"; //chức năng mặc định
    if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
    switch ($act) {
        case "index":
            $view = "views/home.php";
            require_once "views/layout.php";
            break;
        case "dangnhap":
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if (dangNhap($user, $pass) == true) {
                session_start();
                $_SESSION['admin'] = $user;
                header('location:index.php');
            }
            $view = "views/home.php";
            require_once "views/layout.php";
            break;
        case "taikhoan":
            require_once "views/quenmk.php";
            break;
        case "logout":
            session_start();
            unset($_SESSION['admin']);
            unset( $_SESSION['schuc_vu']);
            unset( $_SESSION['sname']);
            unset($_SESSION['sid']);
            header('location:index.php');
            break;
        case "quenmk":
            $u = trim(strip_tags($_POST['user']));
            $e = trim(strip_tags($_POST['email']));
            $thongbao = "";
            if (checkHople($u, $e) == true) {
                $pass = substr(md5(time()), 0, 16);
                updateUser($u, $pass, $e);
                $thongbao = "Mật khẩu mới đã được gửi đến hợp thư";
                session_start();
                $_SESSION['thongbao'] = $thongbao;
                header("location:" . ADMIN_URL . "?ctrl=home&act=thongbao");
            } else {
                $thongbao = "Tài khoản hoặc email không đúng";
                session_start();
                $_SESSION['thongbao'] = $thongbao;
                header("location:" . ADMIN_URL . "?ctrl=home&act=thongbao");
                exit();
            }
            // Gửi mail kích hoạt tài khoản
            require "PHPMailer-master/src/PHPMailer.php";
            require "PHPMailer-master/src/SMTP.php";
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
            try {
                $mail->SMTPDebug = 2;  // Enable verbose debug output
                $mail->isSMTP();
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'khaiphan2222@gmail.com';  // SMTP username
                $mail->Password = 'Khai261093';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom('khaiphan2222@gmail.com', 'khải');
                $mail->addAddress($e, $u); //mail và tên người nhận       
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Lấy lại mật khẩu';
                $linkKH = "<a href='" . $_SERVER['HTTP_HOST'] . SITE_URL .
                    "/?act=kichhoat&id=%d&rd=%s'>Nhắp vào đây</a>";
                $linKH = sprintf($pass);
                $mail->Body = "<h4>Lấy lại mật khẩu</h4>Mật khẩu mới của bạn là: " . $linKH;
                $mail->send();
                echo "Tài khoản đã lưu vào database và đã gửi mail kích hoạt";
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }
            break;
        case "thongbao":
            session_start();
            if (isset($_SESSION['thongbao'])) {
                $thongbao = $_SESSION['thongbao'];
                unset($_SESSION['thongbao']);
            } else {
                $thongbao = "Không có gì để thông báo";
            }
            require_once "views/thongbao.php";
            break;
        case "kiemtrauser":
            if (isset($_GET['user'])) $user = trim(strip_tags($_GET['user']));
            else $user = "";
            if ($user == "") echo "<pan class ='badge badge-danger'>User không được trống</pan>";
            else if (checkUserTonTai($user)) echo "<pan class = 'badge badge-success'>User đã đúng</pan>";
            else echo "<pan class ='badge badge-danger'>User không tồn tại</pan>";
            break;
    }
    ?>
