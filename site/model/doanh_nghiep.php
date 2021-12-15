
    <?php require_once('../system/database.php');
    function getAllUser()
    {
        $sql = "SELECT * from user";
        return query($sql);
    }
    function getSinhvienByID($id_sv)
    {
        $sql = "SELECT * from sinh_vien where id_sv='$id_sv'";
        return queryOne($sql);
    }
    function getUserByID($id_user)
    {
        $sql = "SELECT * from user where id_user='$id_user'";
        return queryOne($sql);
    }
    function getUngtuyenByID($id_phieu)
    {
        $sql = "SELECT * from phieu_dk_in where id_phieu='$id_phieu'";
        return queryOne($sql);
    }
    function getAllDangtuyen()
    {
        $sql = "SELECT * from dang_tuyen";
        return query($sql);
    }
    function getAllNganh()
    {
        $sql = "SELECT * from nganh";
        return query($sql);
    }

    function getAllSinhvien()
    {
        $sql = "SELECT * from sinh_vien";
        return query($sql);
    }
    function getAllThongbao_($id_ng_nhan)
    {
        $sql = "SELECT * from thong_bao WHERE id_ng_nhan='$id_ng_nhan' ORDER BY thoi_gian DESC ";
        return query($sql);
    }
    function updateThongbao($id_tb)
    {
        try {
            $sql = "UPDATE thong_bao SET trang_thai='1' WHERE id_tb='$id_tb'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function demThongbao($id_ng_nhan)
    {
        $sql = "SELECT count(*) as sodong FROM thong_bao WHERE id_ng_nhan='$id_ng_nhan' AND trang_thai='0'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function getAllSinhvien_()
    {
        $sql = "SELECT * from sinh_vien WHERE trang_thai='1'";
        return query($sql);
    }
    function getAllUngtuyen($id_dt)
    {
        $sql = "SELECT * from phieu_dk_in WHERE id_dt='$id_dt' ORDER BY trang_thai asc";
        return query($sql);
    }
    function getAllUngtuyen_($id_dt, $trang_thai)
    {
        $sql = "SELECT * from phieu_dk_in WHERE trang_thai = '$trang_thai' AND id_dt='$id_dt' ORDER BY trang_thai asc";
        return query($sql);
    }
    function getDangtuyenByID($id_dt)
    {
        $sql = "SELECT * from dang_tuyen where id_dt='$id_dt'";
        return queryOne($sql);
    }
    function getAllDangtheodn($id_dn)
    {
        $sql = "SELECT * from dang_tuyen WHERE id_dn='$id_dn'";
        return query($sql);
    }
    function getAllDoanhnghiep()
    {
        $sql = "SELECT * from doanh_nghiep";
        return query($sql);
    }
    function getAllDoanhnghiepID($id_user)
    {
        $sql = "SELECT * from doanh_nghiep WHERE id_user='$id_user'";
        return query($sql);
    }
    function  addNewDoanhnghiep($id_user, $ten_dn, $dia_chi, $sdt, $an_hien, $anh, $website)
    {
        $sql = "INSERT INTO doanh_nghiep (id_user,ten_dn,dia_chi,sdt,an_hien,anh,website) 
    values('$id_user','$ten_dn','$dia_chi','$sdt','$an_hien','$anh','$website')";
        execute($sql);
    }
    function addNewUser($user, $pass, $email, $chuc_vu)
    {
        $sql = "INSERT INTO user (user,pass,email,chuc_vu) 
        values('$user','$pass','$email','$chuc_vu')";
        execute($sql);
    }
    function addNewThongbao($noi_dung, $thoi_gian, $id_ng_gui, $id_ng_nhan)
    {
        $sql = "INSERT INTO thong_bao (noi_dung,thoi_gian,id_ng_gui,id_ng_nhan) 
        values('$noi_dung','$thoi_gian',' $id_ng_gui','$id_ng_nhan')";
        execute($sql);
    }
    function getDoanhnghiepByID($id_dn)
    {
        $sql = "SELECT * from doanh_nghiep where id_dn='$id_dn'";
        return queryOne($sql);
    }

    function updateUser($id_user, $email)
    {
        try {
            $sql = "UPDATE user SET email='$email' WHERE id_user='$id_user'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function updatePhieu($id_phieu, $thoi_gian_duyet)
    {
        try {
            $sql = "UPDATE phieu_dk_in SET trang_thai='1',thoi_gian_duyet='$thoi_gian_duyet' WHERE id_phieu='$id_phieu'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function updateSinhvienTT($id_sv, $ket_qua)
    {
        try {
            $sql = "UPDATE sinh_vien SET trang_thai='$ket_qua' WHERE id_sv='$id_sv'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function updatePhieu_($id_phieu)
    {
        try {
            $sql = "UPDATE phieu_dk_in SET trang_thai='2' WHERE id_phieu='$id_phieu'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function updateDanhgia($id_phieu)
    {
        try {
            $sql = "UPDATE phieu_dk_in SET trang_thai='2' WHERE id_phieu='$id_phieu'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function  updateDoanhnghiep($id_dn, $id_user, $ten_dn, $masothue, $dia_chi, $website, $fax, $sdt, $sdt_ban)
    {
        try {
            $sql = "UPDATE doanh_nghiep SET id_user='$id_user', ten_dn ='$ten_dn',masothue='$masothue',dia_chi='$dia_chi',website='$website',fax='$fax',sdt='$sdt',sdt_ban='$sdt_ban'
             WHERE id_dn='$id_dn'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function deleteUser($id_user)
    {
        $sql = "DELETE FROM user WHERE id_user='$id_user'";
        execute($sql);
    }
    function checkUserTonTai($user)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$user'";
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
    function checkuserTonTaiChuaDung($user)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$user' ";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function demBaidang($id_dn)
    {
        $sql = "SELECT count(*) as sodong FROM dang_tuyen WHERE id_dn='$id_dn'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function demSinhvien($id_dt)
    {
        $sql = "SELECT count(*) as sodong FROM phieu_dk_in WHERE id_dt='$id_dt' AND trang_thai='0' ";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function searchDoanhnghiep($ten_dn)
    {
        $sql = "SELECT * from doanh_nghiep WHERE ten_dn='$ten_dn'";
        return query($sql);
    }
    function checkDoanhnghiepTonTai($ten_dn)
    {
        $sql = "SELECT count(*) as sodong FROM doanh_nghiep WHERE ten_dn='$ten_dn'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function checkHople_($id_user, $p)
    {
        $sql = "SELECT count(*) as sodong FROM user where id_user ='$id_user' and pass='$p'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function updateUser_($id_user, $p1)
    {
        try {
            $sql = "UPDATE  user SET pass='$p1' where id_user ='$id_user'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }

    // baokun
    function checkdoanhnghiep_iduser($id)
    {
        $sql = "select * from doanh_nghiep where id_user='$id'";
        return queryOne($sql);
    }
    function add_dangtuyen($id_nganh, $id_dn, $tieu_de, $luong_khoi_dau, $luong_ket_thuc, $thoi_gian_tt, $sl_sv_can, $full_part_time, $thoi_gian_lam_viec, $che_do_thuong, $dao_tao, $tang_luong, $nghi_phep_nam, $du_lich, $che_do_bao_hiem, $mo_ta, $yeu_cau, $quyen_loi, $thoi_gian)
    {
        $sql = "INSERT INTO dang_tuyen (id_nganh,id_dn,tieu_de,luong_khoi_dau,luong_ket_thuc,thoi_gian_tt,sl_sv_can,full_part_time,thoi_gian_lam_viec,
                                                    che_do_thuong,dao_tao,tang_luong,nghi_phep_nam,du_lich,che_do_bao_hiem,mo_ta,yeu_cau,quyen_loi,thoi_gian) 
        values('$id_nganh','$id_dn','$tieu_de','$luong_khoi_dau','$luong_ket_thuc','$thoi_gian_tt','$sl_sv_can','$full_part_time','$thoi_gian_lam_viec',
                            '$che_do_thuong','$dao_tao','$tang_luong','$nghi_phep_nam','$du_lich','$che_do_bao_hiem','$mo_ta','$yeu_cau','$quyen_loi','$thoi_gian')";
        execute($sql);
    }
    function deleteDangtuyen($id_dt)
    {
        $sql = "DELETE FROM dang_tuyen WHERE id_dt='$id_dt'";
        execute($sql);
    }
    function danh_gia_tu_dn($ket_qua, $tg_kt, $danh_gia, $id_phieu)
    {
        $sql = "UPDATE phieu_dk_in SET ket_qua='$ket_qua',tg_kt='$tg_kt', danh_gia='$danh_gia'  where id_phieu= '$id_phieu'";
        execute($sql);
    }
    function upload_logo($anh)
    {
        $sql = "UPDATE doanh_nghiep SET anh='$anh' where id_dn = '$_SESSION[sid_dn]'";
        execute($sql);
    }
    function upload_banner($banner)
    {
        $sql = "UPDATE doanh_nghiep SET banner='$banner' where id_dn = '$_SESSION[sid_dn]'";
        execute($sql);
    }
    function sua_tt_dt($trang_thai, $id_dt)
    {
        if ($trang_thai ==  1) {
            $sql = "UPDATE dang_tuyen SET an_hien= '0' where id_dt = '$id_dt'";
            execute($sql);
        } else {
            $sql = "UPDATE dang_tuyen SET an_hien= '1' where id_dt = '$id_dt'";
            execute($sql);
        }
    }
    function demAll_slsv(){
        $sql = "SELECT count(*) as sodong FROM phieu_dk_in  WHERE trang_thai='3' AND id_dn = $_SESSION[sid_dn]";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    function demAll_dtdn(){
        $sql = "SELECT count(*) as sodong FROM dang_tuyen  WHERE id_dn = $_SESSION[sid_dn]";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
    }
    ?>
