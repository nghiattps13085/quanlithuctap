<?php
    require_once "../system/system.php";
    function getConnection()  {
        try {
            $conn = new PDO("mysql:host=".HOST_DB.";dbname=".NAME_DB, USER_DB, PASS_DB);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
    
            return $conn;
            
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
        }
   
    function query($sql)   {
        $conn = getConnection();
        $result = $conn->query($sql);
        // $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        }
    function queryAll($sql)   {
            $conn = getConnection();
            $result = $conn->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            }

    //Lấy Array 1row
    function queryOne($sql) {
        $conn = getConnection();
        $result = $conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    

    //Câu lệnh Insert, Update, Delete
    function execute($sql) {
        $conn = getConnection();
        $result = $conn ->exec($sql);
        return $result;
    }
    
?>