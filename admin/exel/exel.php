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
        function  xuat_sv3(){
            $sql="SELECT ho_ten,mssv,ten_nganh,ten_dn,ket_qua,danh_gia FROM sinh_vien inner join nganh on sinh_vien.id_nganh=nganh.id_nganh
             inner join phieu_dk_in on sinh_vien.id_sv=phieu_dk_in.id_sv
             inner join doanh_nghiep on phieu_dk_in.id_dn=doanh_nghiep.id_dn
             where sinh_vien.trang_thai=2 and phieu_dk_in.trang_thai=3
             
             ";
             $conn = getConnection();
             $result = $conn->query($sql);
            return $result;
        }
       function xuat_sv2(){
            $sql="SELECT ho_ten,mssv,ten_nganh,ten_dn,sinh_vien.trang_thai FROM sinh_vien inner join nganh on sinh_vien.id_nganh=nganh.id_nganh
             inner join phieu_dk_in on sinh_vien.id_sv=phieu_dk_in.id_sv
             inner join doanh_nghiep on phieu_dk_in.id_dn=doanh_nghiep.id_dn
             where sinh_vien.trang_thai=1
             ";
             $conn = getConnection();
             $result = $conn->query($sql);
            return $result;
        }
        function  xuat_sv1(){
            $sql="SELECT ho_ten,mssv,ten_nganh,email,sinh_vien.trang_thai FROM sinh_vien inner join nganh on sinh_vien.id_nganh=nganh.id_nganh
             
             inner join user on sinh_vien.id_user=user.id_user
             where sinh_vien.trang_thai=0
             ";
             $conn = getConnection();
             $result = $conn->query($sql);
            return $result;
        }
        function  xuat_sv0(){
            $sql="SELECT ho_ten,mssv,email,ten_nganh,ten_dn,ket_qua,danh_gia,sinh_vien.trang_thai,phieu_dk_in.trang_thai as cc FROM sinh_vien 
            LEFT join nganh on sinh_vien.id_nganh=nganh.id_nganh 
            LEFT join phieu_dk_in on sinh_vien.id_sv=phieu_dk_in.id_sv 
            LEFT join doanh_nghiep on phieu_dk_in.id_dn=doanh_nghiep.id_dn 
            LEFT join user on sinh_vien.id_user=user.id_user
             
            ";
             $conn = getConnection();
             $result = $conn->query($sql);
            return $result;
        }
    require_once "../views/Classes/PHPExcel.php";
    $fileType = 'Excel2007';
    $objPHPExcel = PHPExcel_IOFactory::load("product_import.xlsx");
if (isset($_POST['btnExport3'])) {   
     $array_data = xuat_sv3();
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "STT")
                                ->setCellValue('B1', "Họ Tên")
                                ->setCellValue('C1', "Chuyên Ngành")
                                ->setCellValue('D1', "Doanh Nghiệp")
                                ->setCellValue('E1', "Kết Quả")
                                ->setCellValue('F1', "Đánh Giá");
    $i = 2;
    foreach ($array_data as $value) {
        $k= $i-1;
        if($value['ket_qua']==1){
            $ket_qua='Rớt';
        } elseif($value['ket_qua']==2)
        {
            $ket_qua='Đạt';
        }
        else
        {
            $ket_qua='Chưa có kết quả';
        }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "$k")
                    ->setCellValue("B$i", $value['ho_ten'])
                    ->setCellValue("C$i", $value['ten_nganh'])
                    ->setCellValue("D$i", $value['ten_dn'])
                    ->setCellValue("E$i", $ket_qua)
                    ->setCellValue("F$i", $value['danh_gia']);
                
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
     $array_data = xuat_sv3();
    
    // Thiết lập tên các cột dữ liệu
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "")
                                ->setCellValue('B1', "")
                                ->setCellValue('C1', "")
                                ->setCellValue('D1', "")
                                ->setCellValue('E1', "")
                                ->setCellValue('F1', "");
    $i = 2;
    foreach ($array_data as $value) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "")
                    ->setCellValue("B$i", "")
                    ->setCellValue("C$i", "")
                    ->setCellValue("D$i", "")
                    ->setCellValue("E$i", "")
                    ->setCellValue("F$i", "");
                
        $i++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);

}elseif(isset($_POST['btnExport1'])){
    $array_data = xuat_sv1();
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "STT")
                                ->setCellValue('B1', "họ tên")
                                ->setCellValue('C1', "Chuyên Ngành")
                                ->setCellValue('D1', "Gmail")
                                ->setCellValue('E1', "Trạng Thái");
    $i = 2;
    foreach ($array_data as $value) {
        $k= $i-1;
        if($value['trang_thai']==0){
            $trang_thai='chưa nơi thực tập';
        }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "$k")
                    ->setCellValue("B$i", $value['ho_ten'])
                    ->setCellValue("C$i", $value['ten_nganh'])
                    ->setCellValue("D$i", $value['email'])
                    ->setCellValue("E$i", $trang_thai);
                
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
     $array_data = xuat_sv1();
    
    // Thiết lập tên các cột dữ liệu
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "")
                                ->setCellValue('B1', "")
                                ->setCellValue('C1', "")
                                ->setCellValue('D1', "")
                                ->setCellValue('E1', "");
    $i = 2;
    foreach ($array_data as $value) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "")
                    ->setCellValue("B$i", "")
                    ->setCellValue("C$i", "")
                    ->setCellValue("D$i", "")
                    ->setCellValue("E$i", "");
                
        $i++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);
}
elseif(isset($_POST['btnExport2'])){
    $array_data = xuat_sv2();
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "STT")
                                ->setCellValue('B1', "họ tên")
                                ->setCellValue('C1', "mssv")
                                ->setCellValue('D1', "ten_nganh")
                                ->setCellValue('E1', "ten_dn")
                                ->setCellValue('F1', "Trạng Thái");
    $i = 2;
    foreach ($array_data as $value) {
        $k= $i-1;
        if($value['trang_thai']==1){
            $trang_thai='Đã có nơi thực tập';
        }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "$k")
                    ->setCellValue("B$i", $value['ho_ten'])
                    ->setCellValue("C$i", $value['mssv'])
                    ->setCellValue("D$i", $value['ten_nganh'])
                    ->setCellValue("E$i", $value['ten_dn'])
                    ->setCellValue("F$i", $trang_thai);
                
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
     $array_data = xuat_sv2();
    
    // Thiết lập tên các cột dữ liệu
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "")
                                ->setCellValue('B1', "")
                                ->setCellValue('C1', "")
                                ->setCellValue('D1', "")
                                ->setCellValue('E1', "")
                                ->setCellValue('F1', "");
    $i = 2;
    foreach ($array_data as $value) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "")
                    ->setCellValue("B$i", "")
                    ->setCellValue("C$i", "")
                    ->setCellValue("D$i", "")
                    ->setCellValue("E$i", "")
                    ->setCellValue("F$i", "");
                
        $i++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);
}

elseif(isset($_POST['btnExport0'])){
    $array_data = xuat_sv0();
    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A1', "STT")
                                ->setCellValue('B1', "họ tên")
                                ->setCellValue('C1', "mssv")
                                ->setCellValue('D1', "ten_nganh")
                                ->setCellValue('E1', "Trạng Thái")
                                ->setCellValue('F1', "Tên Doanh Nghiệp")
                                ->setCellValue('G1', "Kết Quả")
                                ->setCellValue('H1', "Đánh Giá");
    $i = 2;
    foreach ($array_data as $value) {
        if ($value['cc']== 4 || $value['cc']== 2 || $value['cc']== 4 ||$value['cc']== 1 ||$value['cc']== '0' ){
            
        }else{
        $k= $i-1;
        if($value['ket_qua']==1){
            $ket_qua='Rớt';
        }
        elseif($value['ket_qua']==2){
            $ket_qua='Đạt';
        }else{
            $ket_qua='';
        }
        if($value['trang_thai']==1){
            $trang_thai='Đã có nơi thực tập';
        }
        if($value['trang_thai']==0){
            $trang_thai='chưa nơi thực tập';
        }
        if($value['trang_thai']==2){
            $trang_thai='Hoàn thành thực tập';
        }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "$k")
                    ->setCellValue("B$i", $value['ho_ten'])
                    ->setCellValue("C$i", $value['mssv'])
                    ->setCellValue("D$i", $value['ten_nganh'])
                    ->setCellValue("E$i", $trang_thai)
                    ->setCellValue("F$i", $value['ten_dn'])
                    ->setCellValue("G$i", $ket_qua)
                    ->setCellValue("H$i", $value['danh_gia']);
                
        $i++;}
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
                                ->setCellValue('G1', "")
                                ->setCellValue('H1', "");
    $i = 2;
    foreach ($array_data as $value) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "")
                    ->setCellValue("B$i", "")
                    ->setCellValue("C$i", "")
                    ->setCellValue("D$i", "")
                    ->setCellValue("E$i", "")
                    ->setCellValue("F$i", "")
                    ->setCellValue("G$i", "")
                    ->setCellValue("H$i", "");
                
        $i++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);
}

    
  
?>