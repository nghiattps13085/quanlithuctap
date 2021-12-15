<div class="media mb-2 sv8-12 p-3">
    <div class="thongtin0">
        <div class="avt-sv">
            <img id="img-avt" src="../uploads/<?= $ttsv['anh'] ?>" onerror=this.src="view/images/avt1.jpg" alt="John Doe" class="center" style="    object-fit: contain;">
        </div>
    </div>
    <div class="thongtin1 ml-4">
        <div class="media-body" style="margin-top: -20px;"><br>
            <h3 class="text-uppercase"><?= $ttsv['ho_ten'] ?> </h3>
            <p class="text-secondary">Thực tập sinh</p>
            <hr class="mr-5" style="width: 100% ;">
            <i class="fa fa-phone mr-3" style="font-size: 13pt;"></i>
            <a href="#"><?= $ttsv['sdt'] ?></a> <br>
            <i class="fa fa-home mt-3 mr-3" style="font-size: 13pt;"></i>
            <a href="#"><?= $ttsv['dia_chi'] ?></a>
        </div>
    </div>
</div>
<div class="media boder p-3 ">
    <div class="row tt-5 col-sm-6">
        <div class="col-12  mb-2">
            <h5 style="padding: 5px 0px;font-weight: 600;">THÔNG TIN TÀI KHOẢN</h5>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ml-4">
            <p style="font-weight: 600;">Tên đăng nhập: </p>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <p> <?= $tttk['user'] ?> </p>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ml-4">
            <p style="font-weight: 600;">Mật khẩu: </p>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <input type="password" readonly="readonly" value="<?= $tttk['pass'] ?>" style="border: none;">
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ml-4">
            <p style="font-weight: 600;"> Email: </p>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <p> <?= $tttk['email'] ?> </p>
        </div>
        <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
            <!--          -->
        </div>
    </div>

    <!-- <div class="giua-tt">
        <div class="item-tt">
            <svg style="color:black;font-weight: 800;margin-left:3px;" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-emoji-sunglasses" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM6.5 6.497V6.5h-1c0-.568.447-.947.862-1.154C6.807 5.123 7.387 5 8 5s1.193.123 1.638.346c.415.207.862.586.862 1.154h-1v-.003l-.003-.01a.213.213 0 0 0-.036-.053.86.86 0 0 0-.27-.194C8.91 6.1 8.49 6 8 6c-.491 0-.912.1-1.19.24a.86.86 0 0 0-.271.194.213.213 0 0 0-.036.054l-.003.01z" />
                <path d="M2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM9 5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-2-2V5z" />
            </svg>
        </div>
    </div> -->

    <div class="tt-7 row col-sm-6 ml-2">
        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 mb-2">
            <h5 style="padding: 5px 0px;font-weight: 600;">THÔNG TIN CÁ NHÂN</h5>
        </div>

        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2 mb-2 ">
            <a class="btn btn-white-36" href="index.php?ctrl=sinh_vien&act=ttcn_edit " style="border-radius: 5px;margin-left: 10px;">
                <i style="color: black;" class="fa fa-pencil ml-2"></i>
                <span class=" text-gray-75 font400 ml-2 mr-2" style="font-size: 14px;"> Chỉnh sửa</span>
            </a>
        </div>


        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3  ml-4">
            <p style="font-weight: 600; text-align: right;">Họ và tên: </p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8  ">
            <p> <?= $ttsv['ho_ten'] ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3  ml-4">
            <p style="font-weight: 600; text-align: right;">Giới tính:</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ">
            <p> <?php if ($ttsv['gioi_tinh'] == 1) echo 'Nam';
                else echo 'Nữ'; ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
            <p style="font-weight: 600; text-align: right;">Ngày sinh:</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8  ">
            <p> <?= date('d/m/Y', strtotime($ttsv['ngay_sinh'])) ?> </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
            <p style="font-weight: 600; text-align: right;">Nơi thực tập:</p>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <p style=""> <?php if ($ttsv['trang_thai'] == 0) echo 'chưa có nơi thực tập' ?></p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3  ml-4">
            <p style="font-weight: 600; text-align: right;">Địa chỉ:</p>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8  ">
            <p> <?= $ttsv['dia_chi'] ?></p>
        </div>
    </div>
</div>
