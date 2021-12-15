<?php
    require_once "../../system/system.php";
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
        function  xuat_sv0(){
           
            $sql="SELECT ho_ten,mssv,email,ten_nganh,ket_qua,danh_gia FROM sinh_vien 
            inner join nganh on sinh_vien.id_nganh=nganh.id_nganh 
            inner join phieu_dk_in on sinh_vien.id_sv=phieu_dk_in.id_sv 
            inner join user on sinh_vien.id_user=user.id_user 
            where phieu_dk_in.id_dn= $_GET[id_dn] and phieu_dk_in.trang_thai=3
            ";
             $conn = getConnection();
             $result = $conn->query($sql);
            return $result;
        }
       
    require_once "../view/Classes/PHPExcel.php";
    $fileType = 'Excel2007';
    $objPHPExcel = PHPExcel_IOFactory::load("product_import.xlsx");

    $array_data = xuat_sv0();
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "STT")
                                ->setCellValue('B1', "họ tên")
                                ->setCellValue('C1', "mssv")
                                ->setCellValue('D1', "Email")
                                ->setCellValue('E1', "Chuyên Ngành")
                                ->setCellValue('F1', "Kết Quả")
                                ->setCellValue('G1', "Đánh Giá");
    $i = 2;
    foreach ($array_data as $value) {
        $k= $i-1;
        if($value['ket_qua']==2){
            $ket_qua='Đạt';
        }
        if($value['ket_qua']==0){
            $ket_qua='Chưa hoàn thành';
        }
        if($value['ket_qua']==1){
            $ket_qua='Chưa Đạt';
        }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "$k")
                    ->setCellValue("B$i", $value['ho_ten'])
                    ->setCellValue("C$i", $value['mssv'])
                    ->setCellValue("D$i", $value['email'])
                    ->setCellValue("E$i", $value['ten_nganh'])
                    ->setCellValue("F$i", $ket_qua)
                    ->setCellValue("G$i", $value['danh_gia']);
                
        $i++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);
    header('Content-Disposition: attachment; filename="'. $fileName .'"');
    header('Content-Type:application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
    header('Content-Length:'.filesize($fileName));
    header('Content-Transfer-Encoding:binary');
    header('Cache-Control:must:-revalidate');
    header('Pragma: no-cache');
    readfile($fileName);
   

    $fileType = 'Excel2007';
    $objPHPExcel = PHPExcel_IOFactory::load("product_import.xlsx");
     $array_data = xuat_sv0();
    
    // Thiết lập tên các cột dữ liệu
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "")
                                ->setCellValue('B1', "")
                                ->setCellValue('C1', "")
                                ->setCellValue('D1', "")
                                ->setCellValue('E1', "")
                                ->setCellValue('F1', "")
                                ->setCellValue('G1', "");
    $i = 2;
    foreach ($array_data as $value) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "")
                    ->setCellValue("B$i", "")
                    ->setCellValue("C$i", "")
                    ->setCellValue("D$i", "")
                    ->setCellValue("E$i", "")
                    ->setCellValue("F$i", "")
                    ->setCellValue("G$i", "");
                
        $i++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);


    
  
?>