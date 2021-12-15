
<div class="row align-items-center">
    <div class="col-lg-12">
        <h2 class="font-weight-700 mb-0">Quản lý bài viết</h2>
        <span class="text-secondary px-1"><i class="far fa-file"></i>
        <?php echo demAll_dtdn()?>
        </span>
    </div>
</div>
<?php 
    $ngayhientai = date('Y-m-d'); 
    foreach ($ds as $row) { 
        $ttdn=getDoanhnghiepByID($row['id_dn']);
        ?>
    <div class="h-box-bv">
        <div class="h-box-bv-left">
            <div class="h-bv-left-img">
                <a href="#">
                    <img src="../uploads/<?=$ttdn['anh']?>" onerror=this.src="https://img.freepik.com/free-vector/real-estate-logo-icon_126523-966.jpg?size=626&ext=jpg&ga=GA1.2.172804449.1602504837">
                </a>
            </div>
        </div>
        <div class="h-box-bv-right">
            <div class="h-bv-right-title">
                <h4 class=""><?=$row['tieu_de']?></h4>
            </div>
            <div class="h-bv-right-span">
                <span class="text-secondary">
                    <span class="text-success"><i class="fas fa-toggle-on"></i>
                        <span>Hoạt động</span>
                    </span>
                    <i class="far fa-calendar-alt"></i> <span  <?php if($row['thoi_gian'] <= $ngayhientai) echo('class="text-danger font-weight-bold"'); ?>><?=$row['thoi_gian']?></span>
                    <i class="far fa-eye"></i> <span><?=$row['sl_sv_dk']?></span>

                </span>
            </div>
            <hr class="h-bv-hr">
            <div class="h-bv-right-content">
                <a href="">
                <p class="text-uppercase text-secondary"> <?php
                                                            $ds = getAllDoanhnghiep();
                                                            foreach ($ds as $r) { ?>
                        <?php if ($row['id_dn'] == $r['id_dn']) { ?>
                            <?= $r['ten_dn'] ?>
                        <?php } ?>
                    <?php } ?></p></a>
                <span>Sinh viên đăng ký: <span><?=$row['sl_sv_dk']?></span> | </span>
                <span>Sinh viên cần: <span><?=$row['sl_sv_can']?>
                <br>
                <span class="text-success"><i class="fas fa-dollar-sign"></i> Lương: <?php echo $row['luong_khoi_dau']." - ". $row['luong_ket_thuc']?> $</span>
                <span class="text-secondary"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</span>
            </div>
            <div class="h-bv-right-button">
                <button class="btn h-bg-button"><a href="<?= SITE_URL ?>/?ctrl=home&act=thongtindt&id_dt=<?= $row['id_dt'] ?>">Xem chi tiết</a></button>
        
                <button class="btn btn-danger"> <a class="text-light text-decoration-none"
                        href="?ctrl=doanh_nghiep&act=delete_dt&id_dt=<?= $row['id_dt'] ?>"
                        onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xoá đăng tuyển</a></button>
                        <?php 
                        if($row['thoi_gian'] <= $ngayhientai){ ?>
                        <button class="btn btn-dark h-bv-text-lock disabled" ><i class="far fa-lock"></i></button>
                        <?php } else { ?>
                        <button class="btn btn-outline-warning h-bv-text-lock" onclick="an_hien_dt(<?= $row['id_dt'] ?>)">
                            <?php 
                            if($row['an_hien'] == 0) echo ' <i class="far fa-lock"></i>';
                            else echo ' <i class="fas fa-lock-open"></i>';
                            ?>
                        </button>
                   <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<script language="javascript">
    function an_hien_dt(id_dt) {
        $.ajax({
            type: "post",
            url: "index.php?ctrl=doanh_nghiep&act=an_hien_dt",
            data: {          
                id_dt: id_dt,
            },
            success: function(response) {
                
                location.reload(); 
            }
        })}
    
</script>