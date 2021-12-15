<?php require_once('../system/database.php');

  function addNewUserE($user,$pass,$email,$chuc_vu){
      $sql = "INSERT INTO user (user,pass,email,chuc_vu) 
      values('$user','$pass','$email','$chuc_vu')";
      execute($sql);
  }
    function  seach_id_user($user){
        $sql = "SELECT id_user FROM user WHERE user='$user'";
        return queryOne($sql);
    }
    function  seach_id_sv($id_user){
        $sql = "SELECT id_sv FROM sinh_vien WHERE id_user='$id_user'";
        return queryOne($sql);
    }
    function tim_id_nganh($ten_nganh){
        $sql = "SELECT * FROM nganh WHERE ten_nganh='$ten_nganh'";
        return queryOne($sql);
    }
    function  addNewSinhvienforexecl($id_user,$ho_ten,$mssv,$id_nganh)
    {
        $sql = "INSERT INTO sinh_vien (id_user,ho_ten,mssv,id_nganh) 
    values('$id_user','$ho_ten','$mssv','$id_nganh')";
        execute($sql);
    }
    function  addNewhosoforexecl($id_sv)
    {
        $sql = "INSERT INTO ho_so_sv (id_sv) 
    values('$id_sv')";
        execute($sql);
    }
function  xuat_sv(){
    $sql="SELECT ho_ten,ten_nganh,ten_dn,ket_qua FROM sinh_vien inner join nganh on sinh_vien.id_nganh=nganh.id_nganh
     inner join phieu_dk_in on sinh_vien.id_sv=phieu_dk_in.id_sv
     inner join doanh_nghiep on phieu_dk_in.id_dn=doanh_nghiep.id_dn
     where phieu_dk_in.trang_thai=3
     ";
    return query($sql);
}
    ?>