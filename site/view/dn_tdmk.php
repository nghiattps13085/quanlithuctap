<div class="row align-items-center">
    <div class="col-lg-8">
        <h2 class="font-weight-700 mb-0">Đổi mật khẩu</h2>
    </div>
</div>

<div class="h-big-box mt-3">
    <div class="h-tt-left rounded">
        <div class="h-tt-left-header rounded">
            <div class="h-tt-left-img">
                <img src="../uploads/<?= $dn['anh'] ?>" onerror=this.src="view/images/khaihoang.jpg" id="logo-dn" alt="avatar">
                <div class="h-tt-left-img-txt">
                    <label for="file-upload" class="h-custom-file-upload">
                        <i class="far fa-camera"></i>
                    </label>
                    <input id="file-upload" type="file" />
                </div>
            </div>
            <div class="h-tt-left-text">
                <label>Loại tài khoản: <a href="#" class="text-primary">Doanh nghiệp</a> </label>
                <label>Mã tài khoản: <span class="text-secondary">#328465</span> </label>
                <br>
                <label>Ngày tạo: <span class="text-secondary">20/11/2020</span></label>
                <!-- <span class="h-social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-reddit-square"></i></a>
                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                        <a href="#"><i class="fab fa-github-square"></i></a>
                    </span> -->
            </div>       
        </div>
       
    </div>
</div>
<form method="post" action="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=doimk_">
    <div class="h-tt-right text-right">
        <div class="form-group row">
            <label for="" class="col-lg-5 col-form-label px-0">Mật khẩu cũ:</label>
            <div class="col-sm-6">
                <!-- <label for="" class="form-control col-form-label">Chèn thông tin</label> 
                        Nếu ko sử dụng input thì sẽ sử dụng lable-->
                <input type="password" name="passcu" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-lg-5 col-form-label px-0">Mật khẩu mới:</label>
            <div class="col-sm-6">
                <input type="password" name="passmoi" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-lg-5 col-form-label px-0">Xác nhận mật khẩu mới:</label>
            <div class="col-sm-6">
                <input type="password" name="passmoi1" class="form-control">
            </div>
        </div>

        <button type="reset" class="btn btn-outline-secondary">Làm lại <i class="far fa-redo-alt "></i></button>
        <button type="submit" class="btn btn-success mr-5">Xác nhận <i class="far fa-check"></i></button>
    </div>
</form>
