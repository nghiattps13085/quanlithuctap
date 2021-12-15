
    <?php require_once('../system/database.php');
    function getAllNganh()
    {
        $sql = "SELECT * from nganh";
        return query($sql);
    }
    function addNewNganh($ten_nganh, $an_hien,$id_nn)
    {
        $sql = "INSERT INTO nganh (ten_nganh,an_hien,id_nn) 
        values('$ten_nganh','$an_hien','$id_nn')";
        execute($sql);
    }
    function getNganhByID($id)
    {
        $sql = "SELECT * from nganh where id_nganh='$id'";
        return queryOne($sql);
    }
    function updateNganh($id_nn, $ten_nganh, $an_hien,$id_nganh)
    {
        try {
            $sql = "UPDATE nganh SET id_nn=$id_nn,ten_nganh='$ten_nganh', an_hien ='$an_hien' WHERE id_nganh='$id_nganh'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function checkNganhTonTai($ten_nganh)
    {
        $sql = "SELECT count(*) as sodong FROM nganh WHERE ten_nganh='$ten_nganh'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function deleteNganh($id_nganh)
    {
        $sql = "DELETE FROM nganh WHERE id_nganh='$id_nganh'";
        execute($sql);
    }
    ?>
