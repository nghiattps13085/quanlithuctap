<div class="media boder p-3 sv8-12 mb-3">
    <div class="row col-sm-12 rounded">
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 ">
            <h5 style="border-left: 5px rgb(248 84 65) solid; padding: 0 5px;">THÔNG TIN CHUNG</h5>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right ">
            <a class="fw-lighter" href="index.php?ctrl=sinh_vien&act=cv_edit&trang=1">
                <button class="btn btn-dark buttoncapnhat "><i class="fa fa-pencil"></i></button>
            </a>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Tiêu đề hồ sơ :</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <?= $thongtincv['tieu_de'] ?></p>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Trình độ cao nhất :</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['trinh_do'] == 0) echo "Tự Học";
                elseif ($thongtincv['trinh_do'] == 1) echo "Trung cấp";
                elseif ($thongtincv['trinh_do'] == 2) echo "Cao đẳng";
                elseif ($thongtincv['trinh_do'] == 3) echo "Đại học";
                elseif ($thongtincv['trinh_do'] == 4) echo "Cao học";
                else echo 'chưa cập nhập';
                ?> </p>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Nơi làm việc mong muốn:</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <?php if ($thongtincv['noi_lam_viec'] == 0) echo "Chưa xác định";
                elseif ($thongtincv['noi_lam_viec'] == 1) echo "Hà Nội";
                elseif ($thongtincv['noi_lam_viec'] == 2) echo "Đà Nắng";
                elseif ($thongtincv['noi_lam_viec'] == 3) echo "Tây Nguyên";
                elseif ($thongtincv['noi_lam_viec'] == 4) echo "Tp.HCM";
                elseif ($thongtincv['noi_lam_viec'] == 5) echo "Cần Thơ";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Mục tiêu nghề nghiệp :</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?= $thongtincv['muc_tieu_nghe_nghiep'] ?></p>
        </div>
    </div>
</div>

<div class="col-sm-12 ">
    <div class="col-sm-2 mr-center">
        <hr style="background: rgb(110, 110, 110);">
    </div>
</div>

<div class="media boder p-3 sv8-12 mt-3 mb-3">
    <div class="row col-sm-12">
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 ">
            <h5 style="border-left: 5px rgb(248 84 65) solid; padding: 0 5px;">KĨ NĂNG & SỞ TRƯỜNG</h5>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right ">
            <!-- <a class=" btn btn-white-36 " href="index.php?ctrl=sinh_vien&act=cv_edit&trang=2"
                style="border-radius: 5px;">
                <i style="color: black;" class="fa fa-pencil ml-2"></i>
                <span class=" text-gray-75 font400 ml-2 mr-2"> Chỉnh sửa</span>
            </a> -->
            <a class="fw-lighter" href="index.php?ctrl=sinh_vien&act=cv_edit&trang=2">
                <button class="btn btn-dark buttoncapnhat "><i class="fa fa-pencil"></i></button>
            </a>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Kỹ năng :</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?= $thongtincv['ky_nang_so_truong'] ?> </p>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Sở thích :</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?= $thongtincv['so_thich'] ?></p>
        </div>
        <div class="col-sm-3 ml-4">
            <p><strong>Kỹ năng khác :</strong> </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <?= $thongtincv['ky_nang_dac_biet'] ?></p>
        </div>
    </div>
</div>

<div class="col-sm-12 ">
    <div class="col-sm-2 mr-center">
        <hr style="background: rgb(110, 110, 110);">
    </div>
</div>

<div class="media boder p-3 sv8-12 mt-3 mb-3">
    <div class="row col-sm-12">
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <h5 style="border-left: 5px rgb(248 84 65) solid; padding: 0 5px;">TIN HỌC & NGOẠI NGỮ</h5>
        </div>
        <div class="col-sm-2 text-right">
            <!-- <a class=" btn btn-white-36 " href="index.php?ctrl=sinh_vien&act=cv_edit&trang=3"
                style="border-radius: 5px;">
                <i style="color: black;" class="fa fa-pencil ml-2"></i>
                <span class=" text-gray-75 font400 ml-2 mr-2"> Chỉnh sửa</span>
            </a> -->
            <a class="fw-lighter" href="index.php?ctrl=sinh_vien&act=cv_edit&trang=3">
                <button class="btn btn-dark buttoncapnhat "><i class="fa fa-pencil"></i></button>
            </a>
        </div>
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 ml-4">
            <h5><strong>Tin học văn phòng</strong></h5>
        </div>
        <div class="col-sm-1">
            <p> &nbsp; </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso ml-4">
            <p>+ MS word :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['word'] == 1) echo "Kém";
                elseif ($thongtincv['word'] == 2) echo "Trung Bình";
                elseif ($thongtincv['word'] == 3) echo "Khá";
                elseif ($thongtincv['word'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ MS Excel :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['excel'] == 1) echo "Kém";
                elseif ($thongtincv['excel'] == 2) echo "Trung Bình";
                elseif ($thongtincv['excel'] == 3) echo "Khá";
                elseif ($thongtincv['excel'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ Power Point :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['power_point'] == 1) echo "Kém";
                elseif ($thongtincv['power_point'] == 2) echo "Trung Bình";
                elseif ($thongtincv['power_point'] == 3) echo "Khá";
                elseif ($thongtincv['power_point'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ Outlook :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['outlook'] == 1) echo "Kém";
                elseif ($thongtincv['outlook'] == 2) echo "Trung Bình";
                elseif ($thongtincv['outlook'] == 3) echo "Khá";
                elseif ($thongtincv['outlook'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ App khác :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if (isset($thongtincv['ung_dung_khac']) && $thongtincv['ung_dung_khac'] != '') echo $thongtincv['ung_dung_khac'];
                else echo 'Không có' ?>
            </p>
        </div>

        <div class="row"></div>

        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4 mt-4">
            <h5><strong>Ngoại ngữ </strong> </h5>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> &nbsp; </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p><strong>Thông thạo</strong></p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <strong>Tiếng Anh</strong> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ Nghe :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <?php if ($thongtincv['av_nghe'] == 1) echo "Kém";
                elseif ($thongtincv['av_nghe'] == 2) echo "Trung Bình";
                elseif ($thongtincv['av_nghe'] == 3) echo "Khá";
                elseif ($thongtincv['av_nghe'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ Nói :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <?php if ($thongtincv['av_noi'] == 1) echo "Kém";
                elseif ($thongtincv['av_noi'] == 2) echo "Trung Bình";
                elseif ($thongtincv['av_noi'] == 3) echo "Khá";
                elseif ($thongtincv['av_noi'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ Đọc :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p> <?php if ($thongtincv['av_doc'] == 1) echo "Kém";
                elseif ($thongtincv['av_doc'] == 2) echo "Trung Bình";
                elseif ($thongtincv['av_doc'] == 3) echo "Khá";
                elseif ($thongtincv['av_doc'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p>+ Viết :</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['av_viet'] == 1) echo "Kém";
                elseif ($thongtincv['av_viet'] == 2) echo "Trung Bình";
                elseif ($thongtincv['av_viet'] == 3) echo "Khá";
                elseif ($thongtincv['av_viet'] == 4) echo "Tốt";
                else echo "Chưa xác định";
                ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso  ml-4">
            <p><strong>Ngôn ngữ khác:</strong></p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <p><?php if ($thongtincv['ngon_ngu_khac'] == 0) echo "không có";
                elseif ($thongtincv['ngon_ngu_khac'] == 1) echo "Tiếng Trung Quốc";
                elseif ($thongtincv['ngon_ngu_khac'] == 2) echo "Tiếng Nhật";
                elseif ($thongtincv['ngon_ngu_khac'] == 3) echo "Tiếng Do Thái";
                elseif ($thongtincv['ngon_ngu_khac'] == 4) echo "Pháp";
                else echo "Ngôn ngữ khác";
                ?> </p>
        </div>
    </div>
</div>