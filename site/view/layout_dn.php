<div id="doanhnghiep">   
    <div class="row mt-4 m-0 py-3">
        <div class="h-sidebar-container h-menu-sticky shadow mr-4">
            <div class="h-box-left py-3">
                <!-- <div class="px-3 py-3">
                    <img src="images/logofpt.png" alt="logofpt" class="h-sidebar-img" width="100%" height="200px" style="object-fit: cover;">
                    <hr style="width: 50%;">
                </div> -->
                <ul class="h-sidebar-navigation mt-0 px-3 pb-3">
                    <a data-toggle="modal" data-target="#exampleModal-Nghia">
                        <button class="h-dn-dangbai mb-3"><i class="far fa-plus-circle"></i> Đăng bài</button>
                    </a>
                    <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=tttk">
                        <span class="h-dn-dangxuat">Đăng xuất <i class="far fa-sign-out-alt"
                                aria-hidden="true"></i></span>
                    </a>
                    <li class="h-header">TÀI KHOẢN</li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=tttk">
                            <i class="fas fa-user-tie"></i> Thông tin tài khoản
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=tdmk">
                            <i class="far fa-key"></i> Đổi mật khẩu
                        </a>
                    </li>
                    <li class="h-header">DOANH NGHIỆP</li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep">
                            <i class="far fa-briefcase" aria-hidden="true"></i> Thông tin doanh nghiệp
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=qlns">
                            <i class="far fa-users" aria-hidden="true"></i> Quản lý nhân sự
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=qlbv&id_user=<?= $_SESSION['sid']?>">
                            <i class="far fa-list-ul" aria-hidden="true"></i> Quản lý bài viết
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=dshs">
                            <i class="far fa-address-card" aria-hidden="true"></i> Quản lý hồ sơ
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=thongbao">
                            <i class="far fa-info-circle" aria-hidden="true"></i> Thông báo 
                            <?php $soluong=demThongbao($_SESSION['sid_dn']);?> 
                           <?php if($soluong>0){?>
                              <span class="badge badge-danger"><?=$soluong?></span>
                           <?php } ?>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <i class="far fa-sign-out-alt" aria-hidden="true"></i> Đăng xuất
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="h-box-detail p-3 h-box-right shadow">
            <?php include $view_dn; ?>
        </div>
    </div>
</div>
