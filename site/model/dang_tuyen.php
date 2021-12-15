
    <?php require_once('../system/database.php');
     function getAllNganh()
     {
         $sql = "SELECT * from nganh";
         return query($sql);
     }
    function getAllDangtuyen()
    {
        $sql = "SELECT * from dang_tuyen";
        return query($sql);
    }
    function getAllDangtheodn($id_dn)
    {
        $sql = "SELECT * from dang_tuyen WHERE id_dn='$id_dn'";
        return query($sql);
    }
    function getAllSinhvien()
    {
        $sql = "SELECT * from sinh_vien";
        return query($sql);
    }
    function getAllUngtuyen($id_dt)
    {
        $sql = "SELECT * from phieu_dk_in WHERE id_dt='$id_dt'";
        return query($sql);
    }
    function getAllDoanhnghiep()
    {
        $sql = "SELECT * from doanh_nghiep";
        return query($sql);
    }
    function addNewDangtuyen($id_nganh, $id_dn, $tieu_de, $noi_dung, $yeu_cau, $trang_thai, $sl_sv_can, $sl_sv_dk, $an_hien, $anh)
    {
        $sql = "INSERT INTO dang_tuyen (id_nganh,id_dn,tieu_de,noi_dung,yeu_cau,trang_thai,sl_sv_can,sl_sv_dk,an_hien,anh) 
        values('$id_nganh','$id_dn','$tieu_de','$noi_dung','$yeu_cau','$trang_thai','$sl_sv_can','$sl_sv_dk','$an_hien','$anh')";
        execute($sql);
    }
    function getDangtuyenByID($id_dt)
    {
        $sql = "SELECT * from dang_tuyen where id_dt='$id_dt'";
        return queryOne($sql);
    }
    function updateDangtuyen($id_dt,$id_nganh,$id_dn,$tieu_de,$noi_dung,$yeu_cau,$trang_thai,$sl_sv_can,$sl_sv_dk,$an_hien,$anh)
    {
        try {
            $sql = "UPDATE dang_tuyen SET id_nganh='$id_nganh',id_dn ='$id_dn',tieu_de='$tieu_de',noi_dung='$noi_dung',yeu_cau='$yeu_cau',trang_thai='$trang_thai',sl_sv_can='$sl_sv_can',sl_sv_dk='$sl_sv_dk',an_hien='$an_hien',anh='$anh'
             WHERE id_dt='$id_dt'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function duyetDangtuyen($id_dt)
    {
        try {
            $sql = "UPDATE dang_tuyen SET trang_thai='1'
             WHERE id_dt='$id_dt'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function deleteDangtuyen($id_dt)
    {
        $sql = "DELETE FROM dang_tuyen WHERE id_dt='$id_dt'";
        execute($sql);
    }
   function deleteUngtuyen($id_dt){
    $sql = "DELETE FROM dang_tuyen WHERE id_dt='$id_dt'";
    execute($sql);
   }
   function checkTendoanhnghiep($ten_dn)
    {
        $sql = "SELECT count(*) as sodong FROM doanh_nghiep WHERE ten_dn='$ten_dn'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    

    ?>

