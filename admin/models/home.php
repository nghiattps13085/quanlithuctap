
    <?php require_once('../system/database.php');
    function dangNhap($user, $pass)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$user' and pass='$pass' and chuc_vu='2'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function checkHople($u, $e)
    {
        $sql = "SELECT count(*) as sodong FROM user where user ='$u' and email='$e'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function updateUser($u,$pass)
    {
        try {
            $sql = "UPDATE  user SET pass='$pass' where user ='$u'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    
    function checkUserTonTai($u)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$u'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function demDoanhnghiep()
    {
        $sql = "SELECT count(*) as sodong FROM doanh_nghiep";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function demSinhvien()
    {
        $sql = "SELECT count(*) as sodong FROM sinh_vien";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function demDangtuyen()
    {
        $sql = "SELECT count(*) as sodong FROM dang_tuyen";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function demSinhvienTT()
    {
        $sql = "SELECT count(*) as sodong FROM sinh_vien WHERE trang_thai='1'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function demDangtuyentheoDN($id_dn)
    {
        $sql = "SELECT count(*) as sodong FROM dang_tuyen WHERE id_dn='$id_dn'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    ?>
