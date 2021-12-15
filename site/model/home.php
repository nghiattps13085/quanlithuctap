<?php
require_once('../system/database.php');
function ds_nn(){
    $sql ="SELECT * FROM nhom_nganh";
   return query($sql);
}
function ds_nganh($id){
    $sql ="SELECT * FROM nganh where id_nn=$id";
   return query($sql);
}
function ds_nganh_all($id){
    $sql ="SELECT * FROM nganh where id_nn=$id";
   return queryAll($sql);
}
function ds_dt($id){
    $sql ="SELECT * from dang_tuyen where id_nganh=$id and curdate() <= thoi_gian and sl_sv_can > sl_sv_dk order by id_dt desc";
    return query($sql);
}
function checkkhachhang($user,$pass){
    $sql="select * from user where user='$user' and pass='$pass'";
    return queryOne($sql);
}
function checkdoanhnghiepbyiduser($id){
    $sql="select * from doanh_nghiep where id_user='$id' ";
    return queryOne($sql);
}
function checkkhachhangbyid($id){
    $sql="select * from sinh_vien where id_user='$id' ";
    return queryOne($sql);
}
function checktaikhoanbyid($id){
    $sql="select * from user where id_user='$id' ";
    return queryOne($sql);
}
function checkHosoByID($id){
    $sql="select * from ho_so_sv where id_sv='$id'";
    return queryOne($sql);
}
function checkdoanhnghiepbyid($id){
    $sql="select * from doanh_nghiep where id_dn='$id'";
    return queryOne($sql);
}
function checkdangtuyenbyid($id){
    $sql="select * from dang_tuyen where id_dt='$id'";
    return queryOne($sql);
}
function checkdangtuyenidnganh($id){
    if(isset($id_nganh) && $id_nganh !=0) $sql="select * from dang_tuyen where id_nganh='$id' and curdate() <= thoi_gian and sl_sv_can > sl_sv_dk order by id_dt desc";
    else $sql="select * from dang_tuyen where curdate() <= thoi_gian and sl_sv_can > sl_sv_dk order by id_dt desc";
    return queryOne($sql);
}
function checknganhbyid($id){
    $sql="select * from nganh where id_nganh='$id' ";
    return queryOne($sql);
}
function coutdangtuyen($id_nganh){
    if(isset($id_nganh) && $id_nganh !=0){$sql= "SELECT COUNT(*) as tongdangtuyen FROM dang_tuyen where id_nganh='$id_nganh' and curdate() <= thoi_gian and sl_sv_can > sl_sv_dk";}else
    $sql= "SELECT COUNT(*) as tongdangtuyen FROM dang_tuyen where curdate() <= thoi_gian and sl_sv_can > sl_sv_dk and an_hien=1 ";
    $kq = query($sql);
    $row = $kq->fetch();
    $rowcount = $row['tongdangtuyen'];
    return $rowcount;
}
function thongtindangtuyen($id_nganh){
    if(isset($id_nganh) && $id_nganh !=0){$sql ="select * from dang_tuyen where id_nganh='$id_nganh' and curdate() <= thoi_gian and sl_sv_can > sl_sv_dk order by id_dt desc";}else
    $sql ="select * from dang_tuyen where curdate() <= thoi_gian and sl_sv_can > sl_sv_dk and an_hien=1 order by id_dt desc";
    return query($sql);
}
function checkphieudkinbyid($id){
    $sql = "select * from phieu_dk_in where id_phieu = '$id'";
    return queryOne($sql);
}
//BAOKUN nè.!
function addphieudkin($id_sv,$ngay_dk,$nguyen_vong,$id_dt,$id_dn){
    $sql = "INSERT INTO phieu_dk_in (id_sv,ngay_dk,nguyen_vong,id_dt,id_dn)
            values('$id_sv','$ngay_dk','$nguyen_vong','$id_dt','$id_dn')";
    execute($sql);
}
function xoadonungtuyen($id_sv,$id_dt){
    $sql = "DELETE FROM phieu_dk_in WHERE id_sv='$id_sv' and id_dt = '$id_dt' ";
    execute($sql);
}
function checkphieudkin($id_sv,$id_dt){
    $sql = "select * from phieu_dk_in where id_sv = ".$id_sv." and id_dt = ".$id_dt."";
    return queryOne($sql);
}
function checksinhvienbyid($id_sv){
    $sql = "select * from sinh_vien where id_sv = ".$id_sv."";
    return queryOne($sql);
}
?>