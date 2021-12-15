
    <?php require_once('../system/database.php');
    function getAllUser()
    {
        $sql = "SELECT * from user";
        return query($sql);
    }
    function getAllSinhvien()
    {
        $sql = "SELECT * from sinh_vien";
        return query($sql);
    }
    function getAllDoanhnghiep()
    {
        $sql = "SELECT * from doanh_nghiep";
        return query($sql);
    }
    function getDoanhnghiepByID($id_dn)
    {
        $sql = "SELECT * from doanh_nghiep where id_dn='$id_dn'";
        return queryOne($sql);
    }
    function getAllSinhvien_dacott()
    {
        $sql = "SELECT * from sinh_vien WHERE trang_thai='1'";
        return query($sql);
    }
    function getAllSinhvien_chuacott()
    {
        $sql = "SELECT * from sinh_vien  WHERE trang_thai='0'";
        return query($sql);
    }
    function getAllSinhvien_dahoanthanh()
    {
        $sql = "SELECT * from sinh_vien  WHERE trang_thai='2'";
        return query($sql);
    }
    function addNewSinhvien($id_user, $mssv, $id_nganh, $ho_ten, $gioi_tinh, $sdt, $trang_thai, $anh)
    {
        $sql = "INSERT INTO sinh_vien (id_user,mssv,id_nganh,ho_ten,gioi_tinh,sdt,trang_thai,anh) 
    values('$id_user','$mssv','$id_nganh','$ho_ten','$gioi_tinh','$sdt','$trang_thai','$anh')";
        execute($sql);
    }
    function searchid_user($user, $email)
    {
        $sql = "SELECT * from user where user='$user' AND email='$email'";
        return queryOne($sql);
    }
    function getSinhvienByID($id_sv)
    {
        $sql = "SELECT * from sinh_vien where id_sv='$id_sv'";
        return queryOne($sql);
    }
    function getUngtuyenByID($id_sv)
    {
        $sql = "SELECT * from phieu_dk_in where id_sv='$id_sv'";
        return queryOne($sql);
    }
    function  updateSinhvien($id_sv, $mssv, $id_nganh, $ho_ten, $gioi_tinh, $sdt, $trang_thai, $anh)
    {
        try {
            $sql = "UPDATE sinh_vien SET mssv='$mssv',id_nganh='$id_nganh',ho_ten='$ho_ten',gioi_tinh='$gioi_tinh',sdt='$sdt',trang_thai='$trang_thai',anh='$anh'
             WHERE id_sv='$id_sv'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function checkuserTonTaiChuaDung($user)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$user'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function checkUserTonTai($user)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$user'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function checkMssvTonTai($mssv)
    {
        $sql = "SELECT count(*) as sodong FROM sinh_vien WHERE mssv='$mssv'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function checkEmailTonTai($email)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE email='$email'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function updateUser_Trangthai($id_user)
    {
        try {
            $sql = "UPDATE user SET trang_thai='1' WHERE id_user='$id_user'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function updateUser($id_user, $user, $pass, $email)
    {
        try {
            $sql = "UPDATE user SET user='$user', pass ='$pass',email='$email' WHERE id_user='$id_user'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function addNewUser($user, $pass, $email, $chuc_vu)
    {
        $sql = "INSERT INTO user (user,pass,email,chuc_vu) 
        values('$user','$pass','$email','$chuc_vu')";
        execute($sql);
    }
    function deleteUser($id_user)
    {
        $sql = "DELETE FROM user WHERE id_user='$id_user'";
        execute($sql);
    }
    function searchSinhvien($mssv)
    {
        $sql = "SELECT * from sinh_vien WHERE mssv='$mssv'";
        return query($sql);
    }
    ?>
