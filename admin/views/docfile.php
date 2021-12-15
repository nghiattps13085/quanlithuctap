<?php
include 'system/system.php';
include 'Classes/PHPExcel.php';
if(isset($_POST['btn'])){
    $file= $_FILES['file']['tmp_name'];
    $objReader=PHPExcel_IOFactory::createReaderForFile($file);
    $objReader->setLoadSheetsOnly('Sheet1');
    
    $objExcel = $objReader->load($file);
    $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
    
    $highRow=$objExcel->setActiveSheetIndex()->getHighestRow();
    echo '<h1>đã có thể up đc từ excel lên  đợi DB với layout rồi insert into lên thôi </h1>';
    for($row=2;$row<=$highRow;$row++){
        $ho_ten=$sheetData[$row]['A'];
        $mssv=$sheetData[$row]['B'];
        $user=$sheetData[$row]['C'];
        $pass=$sheetData[$row]['D'];
        echo $hoten.$mssv."</br>";
    }
}
?>

s
    <form method="POST" action="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=insert" enctype="multipart/form-data">
    <input type="file" name="file" >
    <button type="submit" name="btn">uploads</button>
    </form>

