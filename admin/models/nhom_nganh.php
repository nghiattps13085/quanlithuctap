
    <?php require_once('../system/database.php');
    function getAllNhomnganh()
    {
        $sql = "SELECT * from nhom_nganh";
        return query($sql);
    }
    function addNewNhomnganh($ten_nn, $an_hien)
    {
        $sql = "insert into nhom_nganh (ten_nn,an_hien) 
        values('$ten_nn','$an_hien')";
        execute($sql);
    }
    function checkNhomnganhTonTai($u)
    {
        $sql = "SELECT count(*) as sodong FROM nhom_nganh WHERE ten_nn='$u'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function getNhomnganhByID($id)
    {
        $sql = "SELECT * from nhom_nganh where id_nn='$id'";
        return queryOne($sql);
    }
    function updateNhomnganh($id_nn, $ten_nn, $an_hien)
    {
        try {
            $sql = "UPDATE nhom_nganh SET ten_nn='$ten_nn', an_hien ='$an_hien' WHERE id_nn='$id_nn'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function deleteNhomnganh($id_nn)
    {
        $sql = "DELETE FROM nhom_nganh WHERE id_nn='$id_nn'";
        execute($sql);
    }
    function checkTennhomnganhTonTai($ten_nn)
    {
        $sql = "SELECT count(*) as sodong FROM nhom_nganh WHERE ten_nn='$ten_nn'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    ?>
