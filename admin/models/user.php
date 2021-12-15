
    <?php require_once('../system/database.php');
    function getAllUser()
    {
        $sql = "SELECT * from user";
        return query($sql);
    }
    function addNewUser($user,$pass,$email,$chuc_vu)
    {
        $sql = "INSERT INTO user (user,pass,email,chuc_vu) 
        values('$user','$pass','$email','$chuc_vu')";
        execute($sql);
    }
    function getUserByID($id_user)
    {
        $sql = "SELECT * from user where id_user='$id_user'";
        return queryOne($sql);
    }
    function updateUser($id_user, $user, $pass,$email,$chuc_vu)
    {
        try {
            $sql = "UPDATE user SET user='$user', pass ='$pass',email='$email',chuc_vu='$chuc_vu' WHERE id_user='$id_user'";
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
    function checkUserTonTai($u)
    {
        $sql = "SELECT count(*) as sodong FROM user WHERE user='$u'";
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
    //doi mk
    function checkHople_($u,$p){
        $sql = "SELECT count(*) as sodong FROM user where user ='$u' and pass='$p'";
        $kq = query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function updateUser_($u,$p1)
    {
        try {
            $sql = "UPDATE  user SET pass='$p1' where user ='$u'";
            execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    ?>
