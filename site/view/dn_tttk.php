<div class="row align-items-center">
    <div class="col-lg-8">
        <h2 class="font-weight-700 mb-0">Thông tin tài khoản</h2>
    </div>
</div>

<div class="h-big-box mt-3">
    <form>
        <div class="h-tt-left rounded">
            <div class="h-tt-left-header rounded">
                <div class="h-tt-left-img">
                    <img src="../uploads/<?=$dn['anh']?>" onerror=this.src="view/images/khaihoang.jpg" id="logo-dn" alt="avatar">
                    <div class="h-tt-left-img-txt">
                        <label for="file-upload-logo" class="h-custom-file-upload">
                            <i class="far fa-camera"></i>
                        </label>
                        <input id="file-upload-logo" type="file" />
                    </div>
                </div>
                <div class="h-tt-left-text">
                    <label>Loại tài khoản: <a href="#" class="text-primary">Doanh nghiệp</a> </label>
                    <label>Mã tài khoản: <span class="text-secondary">#328465</span> </label>
                    <label>Ngày tạo: <span class="text-secondary">20/11/2020</span></label>

                    <br>
                    <div class="h-tt-bottom">
                    </div>

                    <!-- <span class="h-social">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-reddit-square"></i></a>
                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                        <a href="#"><i class="fab fa-github-square"></i></a>
                    </span> -->

                    <!-- <button class="btn btn-outline-secondary h-btn-dx mt-3">Chỉnh sửa thông tin</button> -->

                </div>
            </div>
        </div>

        <div class="h-tt-right text-right">
            <div class="form-group row">
                <label for="" class="col-lg-4 col-form-label px-0">Tên đăng nhập:</label>
                <div class="col-sm-7">
                    <!-- <label for="" class="form-control col-form-label">Chèn thông tin</label> 
                        Nếu ko sử dụng input thì sẽ sử dụng lable-->
                    <input type="text" value="khaihoang" readonly="readonly" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-lg-4 col-form-label px-0">Mật khẩu:</label>
                <div class="col-sm-7">
                    <input type="password" value="123456" readonly="readonly" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-lg-4 col-form-label px-0">Email:</label>
                <div class="col-sm-7">
                    <input type="email" value="khaihoang@gmail.com" readonly="readonly" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-lg-4 col-form-label px-0">Số điện thoại:</label>
                <div class="col-sm-7">
                    <input type="text" value="+8432132234" readonly="readonly" class="form-control">
                </div>
            </div>
        </div>
    </form>
</div>