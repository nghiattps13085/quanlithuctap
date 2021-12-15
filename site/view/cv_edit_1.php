<form action="index.php?ctrl=sinh_vien&act=cv_update&trang=1" method="POSt">
    <div class="media boder p-3 sv8-12 mb-3">
        <div class="row col-sm-12 Ng" style="margin:auto;">
            <div class="bgr"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                <h5 style="font-weight: 700;">THÔNG TIN CHUNG</h5>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <h6 class="fw-500 col-form-label">Tiêu đề hồ sơ </h6>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <p><input type="text" class="form-control mb-2 mr-sm-2" value="<?= $thongtincv['tieu_de'] ?>" placeholder="Tiêu đề" name="tieu_de"></p>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <h6 class="fw-500 col-form-label">Trình độ cao nhất </h6>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <p>
                    <select class="form-control" style="width:100%;padding: 6px 8px;" name="trinh_do">
                        <option value="0" <?php if ($thongtincv['trinh_do'] == 0) echo "selected"; ?>>Tự Học</option>
                        <option value="1" <?php if ($thongtincv['trinh_do'] == 1) echo "selected"; ?>>Trung cấp</option>
                        <option value="2" <?php if ($thongtincv['trinh_do'] == 2) echo "selected"; ?>>Cao đẳng</option>
                        <option value="3" <?php if ($thongtincv['trinh_do'] == 3) echo "selected"; ?>>Đại học</option>
                        <option value="4" <?php if ($thongtincv['trinh_do'] == 4) echo "selected"; ?>>Cao học</option>
                    </select>
                </p>
            </div>

            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <h6 class="fw-500 col-form-label">Nơi làm việc mong muốn </h6>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <p>
                    <select style="width:100%;padding: 6px 8px;" name="noi_lam_viec">
                        <option value="0" <?php if ($thongtincv['noi_lam_viec'] == 0) echo "selected"; ?>>Chưa xác định
                        </option>
                        <option value="1" <?php if ($thongtincv['noi_lam_viec'] == 1) echo "selected"; ?>>Hà Nội</option>
                        <option value="2" <?php if ($thongtincv['noi_lam_viec'] == 2) echo "selected"; ?>>Đà Nẵng</option>
                        <option value="3" <?php if ($thongtincv['noi_lam_viec'] == 3) echo "selected"; ?>>Tây Nguyên
                        </option>
                        <option value="4" <?php if ($thongtincv['noi_lam_viec'] == 4) echo "selected"; ?>>Tp.HCM</option>
                        <option value="5" <?php if ($thongtincv['noi_lam_viec'] == 5) echo "selected"; ?>>Cần Thơ</option>
                    </select>

                </p>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <h6 class="fw-500 col-form-label">Mục tiêu nghề nghiệp </h6>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ">
                <textarea style="height: 135px; width: 100%;" id="career_obj" name="muc_tieu_nghe_nghiep" class="mb-3 form-control input-text  validate[required,minSize[5],maxSize[1000]] font13 input-has-tooltip select_form_ttc inputbox-success" data-errormessage-value-missing="Yêu cầu nhập mục tiêu nghề nghiệp."><?= $thongtincv['muc_tieu_nghe_nghiep'] ?></textarea>
            </div>

        </div>

    </div>

    <div class="col-12 text-center mt-2 mb-3">
        <button class="btn btn-outline-dark mr-2"><a href="?ctrl=sinh_vien&act=cv_index" class="text-dark"> Hủy </a></button>
        <a href="file:///C:/Users/ASUS/Documents/GitHub/quan-ly-thuc-tap/site/view/sv3-qlhoso.html">
            <button class="btn buttoncapnhat " type="submit">
                Lưu hồ sơ
            </button>
        </a>
    </div>
</form>