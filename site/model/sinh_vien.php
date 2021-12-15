<?php
require_once('../system/database.php');
function  updatettcn($ho_ten, $mssv, $gioi_tinh, $ngay_sinh, $sdt, $dia_chi)
{
    $sql = "UPDATE sinh_vien SET ho_ten='$ho_ten', mssv='$mssv', gioi_tinh='$gioi_tinh', ngay_sinh='$ngay_sinh',sdt='$sdt', dia_chi='$dia_chi'
    where id_user= '$_SESSION[sid]'";
    execute($sql);
}
function getAllThongbao($id_ng_nhan)
{
    $sql = "SELECT * from thong_bao WHERE id_ng_nhan='$id_ng_nhan' ORDER BY thoi_gian DESC";
    return query($sql);
}
function updateThongbao_($id_tb)
{
    try {
        $sql = "UPDATE thong_bao SET trang_thai='1' WHERE id_tb='$id_tb'";
        execute($sql);
    } catch (Exception  $e) {
        print_r($e->errorInfo);
        exit();
    }
}
function demThongbao_($id_ng_nhan)
{
    $sql = "SELECT count(*) as sodong FROM thong_bao WHERE id_ng_nhan='$id_ng_nhan' AND trang_thai='0'";
    $kq = query($sql);
    $row = $kq->fetch();
    $rowcount = $row['sodong'];
    return $rowcount;
}
function getDoanhnghiepByID_($id_dn)
{
    $sql = "SELECT * from doanh_nghiep where id_dn='$id_dn'";
    return queryOne($sql);
}
function getSinhvienByID_($id_sv)
{
    $sql = "SELECT * from sinh_vien where id_sv='$id_sv'";
    return queryOne($sql);
}
function updatematkhau($mat_khau)
{
    $sql = "UPDATE user SET pass='$mat_khau' where id_user= '$_SESSION[sid]'";
    execute($sql);
}
function updateSinhvien_($id_sv)
{
    $sql = "UPDATE sinh_vien SET trang_thai='1' where id_sv= '$id_sv'";
    execute($sql);
}
function addNewThongbao_($noi_dung, $thoi_gian, $id_ng_gui, $id_ng_nhan)
{
    $sql = "INSERT INTO thong_bao (noi_dung,thoi_gian,id_ng_gui,id_ng_nhan) 
        values('$noi_dung','$thoi_gian',' $id_ng_gui','$id_ng_nhan')";
    execute($sql);
}
function updatecv($tieu_de, $trinh_do, $noi_lam_viec, $muc_tieu_nghe_nghiep, $ky_nang_so_truong, $so_thich, $ky_nang_dac_biet, $word, $excel, $power_point, $outlook, $ung_dung_khac, $av_nghe, $av_noi, $av_doc, $av_viet, $ngon_ngu_khac, $ngay_cap_nhap)
{
    $sql = "UPDATE ho_so_sv SET tieu_de='$tieu_de', trinh_do='$trinh_do', noi_lam_viec='$noi_lam_viec', muc_tieu_nghe_nghiep='$muc_tieu_nghe_nghiep', ky_nang_so_truong='$ky_nang_so_truong',
    so_thich='$so_thich', ky_nang_dac_biet='$ky_nang_dac_biet', word='$word', excel='$excel', power_point='$power_point', outlook='$outlook', ung_dung_khac='$ung_dung_khac', av_nghe='$av_nghe', av_noi='$av_noi',
    av_doc='$av_doc', av_viet='$av_viet', ngon_ngu_khac='$ngon_ngu_khac', ngay_cap_nhap='$ngay_cap_nhap'  where id_sv= '$_SESSION[sid_sv]'";
    execute($sql);
}
function suatrangthai()
{
    $sql = "UPDATE user SET kich_hoat='1' where id_user= '$_SESSION[sid]'";
    execute($sql);
}
function updatecv_1($tieu_de, $trinh_do, $noi_lam_viec, $muc_tieu_nghe_nghiep, $ngay_cap_nhap)
{
    $sql = "UPDATE ho_so_sv SET tieu_de='$tieu_de', trinh_do='$trinh_do', noi_lam_viec='$noi_lam_viec', muc_tieu_nghe_nghiep='$muc_tieu_nghe_nghiep', ngay_cap_nhap='$ngay_cap_nhap'  where id_sv= '$_SESSION[sid_sv]'";
    execute($sql);
}
function updatecv_2($ky_nang_so_truong, $so_thich, $ky_nang_dac_biet, $ngay_cap_nhap)
{
    $sql = "UPDATE ho_so_sv SET  ky_nang_so_truong='$ky_nang_so_truong',so_thich='$so_thich', ky_nang_dac_biet='$ky_nang_dac_biet', ngay_cap_nhap='$ngay_cap_nhap'  where id_sv= '$_SESSION[sid_sv]'";
    execute($sql);
}
function updatecv_3($word, $excel, $power_point, $outlook, $ung_dung_khac, $av_nghe, $av_noi, $av_doc, $av_viet, $ngon_ngu_khac, $ngay_cap_nhap)
{
    $sql = "UPDATE ho_so_sv SET  word='$word', excel='$excel', power_point='$power_point', outlook='$outlook', ung_dung_khac='$ung_dung_khac', av_nghe='$av_nghe', av_noi='$av_noi',
    av_doc='$av_doc', av_viet='$av_viet', ngon_ngu_khac='$ngon_ngu_khac', ngay_cap_nhap='$ngay_cap_nhap'  where id_sv= '$_SESSION[sid_sv]'";
    execute($sql);
}
function thongtincv()
{
    $sql = "SELECT * From ho_so_sv where id_sv='$_SESSION[sid_sv]'";
    return queryOne($sql);
}
function thongtindkallbyid()
{
    $sql = "SELECT * from phieu_dk_in where id_sv='$_SESSION[sid_sv]' order by trang_thai asc";
    return queryAll($sql);
}
function doi_tt_dt($id_phieu)
{
    $sql = "UPDATE phieu_dk_in SET trang_thai='5' where id_phieu= '$id_phieu'";
    execute($sql);
}
function xacthuc_tt_dt($id)
{
    $sql = "UPDATE phieu_dk_in SET trang_thai='3' where id_phieu= '$id'";
    execute($sql);
}
function  capnhaptrangthaisv()
{
    $sql = "UPDATE sinh_vien SET trang_thai='1' where id_sv='$_SESSION[sid_sv]'";
    execute($sql);
}
function huy_dk_dt()
{
    $sql = "UPDATE phieu_dk_in SET trang_thai='4' where trang_thai= '1' or trang_thai= '0' ";
    execute($sql);
}
function updateemail($email)
{
    $sql = "UPDATE user SET email='$email' where id_user= '$_SESSION[sid]' ";
    execute($sql);
}
function them_sl_sv_dk($dem, $id)
{
    $sql = "UPDATE dang_tuyen SET sl_sv_dk='$dem' where id_dt= '$id' ";
    execute($sql);
}
function getViecLamUngTuyen(){
    $sql = "SELECT * from phieu_dk_in where id_sv='$_SESSION[sid_sv]' and trang_thai=3";
    return queryOne($sql);
}
//baokun
function update_avtsv($anh)
{
    $sql = "UPDATE sinh_vien SET anh='$anh' where id_user = '$_SESSION[sid]'";
    execute($sql);
}

