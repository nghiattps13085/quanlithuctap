<form action="index.php?ctrl=sinh_vien&act=cv_update&trang=2" method="POSt">
    <div class="media boder p-3 sv8-12 mt-3 mb-3">
        <div class="row col-sm-12 Ng" style="margin:auto;">
            <div class="bgr"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 mb-3">
                <h5 style="font-weight: 700;">KĨ NĂNG & SỞ TRƯỜNG</h5>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <p class="fw-500">Kỹ năng làm việc: </p>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <textarea style="height: 100px; width: 100%;" id="career_obj" name="ky_nang_so_truong" class="mb-3 input-text form-control validate[required,minSize[5],maxSize[1000]] font13 input-has-tooltip select_form_ttc inputbox-success" data-errormessage-value-missing="Yêu cầu nhập mục tiêu nghề nghiệp."><?= $thongtincv['ky_nang_so_truong'] ?></textarea>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <p class="fw-500">Sở thích: </p>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ">
                <textarea style="height: 100px; width: 100%;" id="career_obj" name="so_thich" class="mb-3 input-text form-control validate[required,minSize[5],maxSize[1000]] font13 input-has-tooltip select_form_ttc inputbox-success" data-errormessage-value-missing="Yêu cầu nhập mục tiêu nghề nghiệp."><?= $thongtincv['so_thich'] ?></textarea>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4 mt-3">
                <p class="fw-500">Kỹ năng khác: </p>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 mt-3">
                <textarea style="height: 100px; width: 100%;" id="career_obj" name="ky_nang_dac_biet" class="mb-3 input-text form-control validate[required,minSize[5],maxSize[1000]] font13 input-has-tooltip select_form_ttc inputbox-success" data-errormessage-value-missing="Yêu cầu nhập mục tiêu nghề nghiệp."><?= $thongtincv['ky_nang_dac_biet'] ?></textarea>
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