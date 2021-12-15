<div id="doanhnghiep">
    <div class=" col-12 my-5 ">
        <div class="h-box-ttdn shadow p-5">
            <div class="row mb-5">
                <img src="../uploads/<?=$doanhnghiep['banner']?>" class="rounded border shadow-sm " alt="logofpt"
                    width="900px" height="300px" style="object-fit: cover;"
                    onerror=this.src="https://simplienglish.com/wp-content/uploads/2019/10/banner.jpg">
            </div>
            <h4 class="h-title-h4">Tổng quan công ty</h4>
            <div class="h-box-tq">
                <div class="h-box-tq-name">
                    <h5><?= $doanhnghiep['ten_dn'] ?></h5>
                </div>
                <div class="h-box-tq-biginfo">
                    <div class="h-box-tq-img mr-3">
                        <img src="../uploads/<?=$doanhnghiep['anh']?>" class="border shadow-sm " alt="logofpt"
                            width="100%" height="100%" style="object-fit: cover;"
                            onerror=this.src="view/images/img_login.png   ">
                    </div>
                    <div class="h-box-tq-info">
                        <strong>Địa chỉ: </strong><span><?= $doanhnghiep['dia_chi'] ?></span>
                        <hr>
                        <strong>Thông tin công ty</strong>
                        <ul class="h-box-tq-flex">
                            <li>
                                <i class="fas fa-user"></i> Người liên hệ: KhaiHoang
                            </li>
                            <li>
                                <i class="fas fa-user-friends"></i> Qui mô công ty: 400-599
                            </li>
                            <li>
                                <i class="fas fa-building"></i> Loại hình hoạt động: Trách nhiệm hữu hạn
                            </li>
                            <li>
                                <i class="fas fa-phone-alt"></i> Số điện thoại: <?= $doanhnghiep['sdt'] ?>
                            </li>
                            <li>
                                <i class="fas fa-link"></i> Website: https://www.kootoro.com
                            </li>
                            <li>
                                <i class="fas fa-link"></i> Số bài đăng tuyển:<?= demBaidang($doanhnghiep['id_dn']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="h-box-tq-follow float-right">
                        <strong>299</strong> <span>followers</span>
                        <button class="btn h-bg-button font-weight-bold ml-3">Theo dõi</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5 class="h-title-h4">
                        Các bài đăng tuyển của công ty
                    </h5>
                </div>
                <?php foreach ($dt as $t) { ?>
                    <?php if ($t['id_dn'] == $doanhnghiep['id_dn']) {
                        $ngayhientai = date('Y-m-d'); 
                        if($t['an_hien']==1 && $t['thoi_gian'] >= $ngayhientai ) {
                        ?>
                        <div class="col-lg-6 p-3">
                            <button type="button" class="list-group-item list-group-item-action px-0">
                                <div class="media">
                                    <img class="card-img-top col-3" src="../uploads/<?=$doanhnghiep['anh']?>" alt="Card image cap" onerror=this.src="view/images/img_login.png">
                                    <div class="media-body text-gray text-left">
                                        <a href="">
                                            <h5 class="text-dark mt-0 d-inline"><a href="index.php?act=thongtindt&id_dt=<?= $t['id_dt'] ?>"> <?= $t['tieu_de'] ?></a></h5>
                                        </a>
                                        <p><i class="fas fa-calendar-alt "></i>
                                            Hạn chót: <?php echo date('d/m/yy', strtotime($t['thoi_gian'])) ?>
                                    </div>
                                </div>
                            </button>
                        </div>
          
        <?php } } ?>
    <?php } ?>
    <div class="h-box-tq-about">
        <h4 class="h-title-h4">Giới thiệu về công ty</h4>
        <div class="h-tq-about-content">
            <p>Công Ty Kootoro được thành lập và đặt trụ sở chính tại Mỹ vào năm 2013 và chính thức ra mắt thị trường Việt Nam vào năm 2015. Toro là một ứng dụng thanh toán qua mã QR tiện lợi, được biết đến với nhận diện là Ví Tiết Kiệm Toro.
            </p>
            <p>Công ty Kootoro chính thức cho ra mắt chuỗi cửa hàng tự động không người bán đầu tiên tại Việt Nam. Chỉ bằng việc quét mã QR trên ứng dụng điện thoại Ví tiết kiệm TORO, người mua đã dễ dàng thanh toán xong món hàng mà không cần đến
                nhân viên thu ngân hay phục vụ.</p>
            <p>Star is a global consultancy that connects strategy, design, engineering and marketing services into a seamless workflow devised to support our clients every step of the way – no matter how long or complex their journey. We anchor
                everything we do in clear and compelling endgames, which in turn enable our strategists, designers and engineers to create useful, scalable products and solutions. We are 750 strategists, designers, engineers and marketers in 12
                locations around the world, and we are here to make every great idea, every great person and every great company shine. That is why we’re called Star. </p>
        </div>
        <h5 class="h-title-h4">Phạm vi hoạt động</h5>
        <div class="h-tq-about-content">
            <p>Thiết kế và thi công các công trình xây dựng dân dụng & công nghiệp Thi công M&E Định hướng phạm vi của hệ thống QLCL, AT&SKNN sẽ mở rộng trong tương lai là Thiết kế và thi công các công trình hạ tầng, sân đường, công trình cầu cảng,
                Thi công cơ giới, Cho thuê máy móc thiết bị xây dựng, Kinh doanh vật liệu xây dựng, Sản xuất và kinh doanh kết cấu thép.
            </p>
        </div>
        <h5 class="h-title-h4">Thông điệp từ công ty</h5>
        <h6 class="h-title-h6">SỨ MỆNH</h6>
        <div class="h-tq-about-content">
            <p>Cung cấp các sản phẩm xây dựng dân dụng và công nghiệp có chất lượng cao và giá cả phù hợp thông qua việc đổi mới và ứng dụng công nghệ tiên tiến</p>
            <p>Cung cấp dịch vụ thiết kế các công trình cao ốc, penhouse, biệt thự, khu nhà ở cao cấp…
            </p>
            <p>Cung cấp các dịch vụ tư vấn giải pháp xây dựng dân dụng và công nghiệp.</p>
        </div>
        <h6 class="h-title-h6">TẦM NHÌN</h6>
        <div class="h-tq-about-content">
            <p>Trên nền tảng của hệ thống quản lý chất lượng, an toàn & sức khỏe nghề nghiệp đã xây dựng, NAVICONS sẽ từng bước vững chắc phát triển quy mô và công nghệ cũng như đầu tư tài chính để thực hiện tầm nhìn trở thành 1 trong 5 tổng thầu
                trong các mảng xây dựng dân dụng và công nghiệp hàng đầu Việt Nam vào năm 2025.</p>
        </div>
        <h6 class="h-title-h6">GIÁ TRỊ CỐT LÕI</h6>
        <div class="h-tq-about-content">
            <p>Chuyên nghiệp - Tận tâm - Trách nhiệm - Hợp tác - Cải tiến</p>
        </div>
        <h6 class="h-title-h6">VĂN HÓA DOANH NGHIỆP</h6>
        <div class="h-tq-about-content">
            <p>Văn hóa doanh nghiệp là nền tảng cho sự phát triển bền vững. Tại Navicons, đó chính là sự đối xử chân thành và tôn trọng lẫn nhau, hỗ trợ nhau cùng phấn đấu để phát triển.</p>
        </div>
        <h4 class="h-title-h4">Hình ảnh công ty</h4>
        <div class="h-tq-slider1 mt-3">
                        <div class=" col-3 p-3 h-about-slider1">
                            <img src="https://img.youtube.com/vi/YgAQJPjCZyE/0.jpg" alt="">
                        </div>

                        <div class="col-3 p-3 h-about-slider1">
                            <img src="https://images.careerbuilder.vn/employer_photo/173118/mg_6609_1537872415.jpg"
                                alt="">
                        </div>
                        <div class="col-3 p-3 h-about-slider1">
                            <img src="https://images.careerbuilder.vn/employer_photo/173118/444-1_1537872423.jpg"
                                alt="">
                        </div>
                        <div class="col-3 p-3 h-about-slider1">
                            <img src="https://images.careerbuilder.vn/employer_photo/173118/222_1537872575.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>