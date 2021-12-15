<form action="index.php?ctrl=sinh_vien&act=cv_update&trang=3" method="POSt">
    <div class="media boder p-3 sv8-12 mt-3 mb-3">
        <div class="row col-sm-12" style="background: #fff;margin:auto;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                <h5 style="font-weight: 700;">TIN HỌC & NGOẠI NGỮ</h5>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <h6><span class="fw-500">Tin học văn phòng</span></h6>
            </div>

            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 taohoso text-center">
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2">&nbsp;</div>
                    <div class="col-2 mr-1 py-2" style="background-color: rgb(248 82 65);">Kém</div>
                    <div class="col-2 mr-1 py-2" style="background-color: #f38739;">Trungbình</div>
                    <div class="col-2 mr-1 py-2" style="background-color: rgb(33 149 236);">Khá</div>
                    <div class="col-2 mr-1 py-2" style="background-color: #0db04b;">Tốt</div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2 " style="background-color: aliceblue;">
                        MS Word
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc1" name="word" value="1" <?php if ($thongtincv['word'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc1" name="word" value="2" <?php if ($thongtincv['word'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc1" name="word" value="3" <?php if ($thongtincv['word'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc1" name="word" value="4" <?php if ($thongtincv['word'] == 4) echo "checked"; ?>>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2 " style="background-color: rgb(211, 234, 255);">
                        MS Excel
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc2" name="excel" value="1" <?php if ($thongtincv['excel'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc2" name="excel" value="2" <?php if ($thongtincv['excel'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc2" name="excel" value="3" <?php if ($thongtincv['excel'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc2" name="excel" value="4" <?php if ($thongtincv['excel'] == 4) echo "checked"; ?>>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2" style="background-color: aliceblue;">
                        PowerPoint
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc3" name="power_point" value="1" <?php if ($thongtincv['power_point'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc3" name="power_point" value="2" <?php if ($thongtincv['power_point'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc3" name="power_point" value="3" <?php if ($thongtincv['power_point'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc3" name="power_point" value="4" <?php if ($thongtincv['power_point'] == 4) echo "checked"; ?>>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2 ml-3 mr-1 py-2" style="background-color: rgb(211, 234, 255);">
                        Outlook
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc4" name="outlook" value="1" <?php if ($thongtincv['outlook'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc4" name="outlook" value="2" <?php if ($thongtincv['outlook'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc4" name="outlook" value="3" <?php if ($thongtincv['outlook'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="tinhoc4" name="outlook" value="4" <?php if ($thongtincv['outlook'] == 4) echo "checked"; ?>>
                    </div>
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso ml-4 mb-4">
                <h6><span class="fw-500 col-form-label">Các ứng dụng nổi bật</span></h6>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ">
                <input type="text" name="ung_dung_khac" id="" value="<?= $thongtincv['ung_dung_khac'] ?>">
            </div>

            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4">
                <h6><span class="fw-500 col-form-label ">Ngoại ngữ &lpar; Anh văn &rpar;</span></h6>

            </div>

            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 taohoso text-center">
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2">&nbsp;</div>
                    <div class="col-2 mr-1 py-2" style="background-color: rgb(248 82 65);">Kém</div>
                    <div class="col-2 mr-1 py-2" style="background-color: #f38739;">Trungbình</div>
                    <div class="col-2 mr-1 py-2" style="background-color: rgb(33 149 236);">Khá</div>
                    <div class="col-2 mr-1 py-2" style="background-color: #0db04b;">Tốt</div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2" style="background-color: aliceblue;">
                        Nghe
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu1" name="av_nghe" value="1" <?php if ($thongtincv['av_nghe'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu1" name="av_nghe" value="2" <?php if ($thongtincv['av_nghe'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu1" name="av_nghe" value="3" <?php if ($thongtincv['av_nghe'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu1" name="av_nghe" value="4" <?php if ($thongtincv['av_nghe'] == 4) echo "checked"; ?>>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2" style="background-color: rgb(211, 234, 255);">
                        Nói
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu2" name="av_noi" value="1" <?php if ($thongtincv['av_noi'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu2" name="av_noi" value="2" <?php if ($thongtincv['av_noi'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu2" name="av_noi" value="3" <?php if ($thongtincv['av_noi'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu2" name="av_noi" value="4" <?php if ($thongtincv['av_noi'] == 4) echo "checked"; ?>>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 ml-3 mr-1 py-2" style="background-color: aliceblue;">
                        Đọc
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu3" name="av_doc" value="1" <?php if ($thongtincv['av_doc'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu3" name="av_doc" value="2" <?php if ($thongtincv['av_doc'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu3" name="av_doc" value="3" <?php if ($thongtincv['av_doc'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu3" name="av_doc" value="4" <?php if ($thongtincv['av_doc'] == 4) echo "checked"; ?>>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2 ml-3 mr-1 py-2" style="background-color: rgb(211, 234, 255);">
                        Viết
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu4" name="av_viet" value="1" <?php if ($thongtincv['av_viet'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu4" name="av_viet" value="2" <?php if ($thongtincv['av_viet'] == 2) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu4" name="av_viet" value="3" <?php if ($thongtincv['av_viet'] == 3) echo "checked"; ?>>
                    </div>
                    <div class="col-2 mr-1">
                        <input type="radio" id="ngonngu4" name="av_viet" value="4" <?php if ($thongtincv['av_viet'] == 4) echo "checked"; ?>>
                    </div>
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 taohoso ml-4">
                <h6 class="col-form-label">Ngôn ngữ khác</h6>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <p>
                    <select style="padding: 6px 0px; width: 36%;" name="ngon_ngu_khac">
                        <option selected value="0" <?php if ($thongtincv['ngon_ngu_khac'] == 0) echo "selected"; ?>>Không có</option>
                        <option value="1" <?php if ($thongtincv['ngon_ngu_khac'] == 1) echo "selected"; ?>>Tiếng Trung</option>
                        <option value="2" <?php if ($thongtincv['ngon_ngu_khac'] == 2) echo "selected"; ?>>Tiếng Nhật</option>
                        <option value="3" <?php if ($thongtincv['ngon_ngu_khac'] == 3) echo "selected"; ?>>Tiếng Đức</option>
                        <option value="4" <?php if ($thongtincv['ngon_ngu_khac'] == 4) echo "selected"; ?>>Tiếng Pháp</option>
                        <option value="5" <?php if ($thongtincv['ngon_ngu_khac'] == 5) echo "selected"; ?>>Ngôn ngữ khác</option>
                    </select>
                </p>
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