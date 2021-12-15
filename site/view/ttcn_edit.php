<form action="index.php?ctrl=sinh_vien&act=ttcn_update" method="post" id="capnhapttcn" enctype="multipart/form-data">

    <div class="media p-3" style="border-radius: 5px;">
        <div class="row">
            <div class="h-tt-left rounded shadow-sm">
                <div class="h-tt-left-header rounded">
                    <div class="h-tt-left-img">
                        <img src="../uploads/<?= $ttsv['anh'] ?>" onerror=this.src="view/images/student.png" class="avt-ttsv" id="avt-sv" alt="avatar">
                        <div class="h-tt-left-img-txt">
                            <label for="file-upload-SV" class="h-custom-file-upload">
                                <i class="far fa-camera"></i>
                            </label>
                            <input id="file-upload-SV" type="file" name="file">
                        </div>
                    </div>
                    <div class="h-tt-left-text">
                        <div class="h-tttk-trangthai">
                            <p> <i class="fas fa-medal"></i> </p>
                        </div>
                        <span class="text-uppercase ">
                            <h2> <?= $ttsv['ho_ten'] ?> </h2>
                        </span>
                        <span class="text-dark">Thực tập sinh - </span>
                        <span class="text-dark font-weight-lighter font-italic"> &lpar; Đang thực tập &rpar; <i class="fa fa-circle text-success"></i></span>
                        <hr class="h-bv-hr">

                        <div class="h-ttcn text-left">
                            <form action="">
                                <label class="sr-only" for=""></label>
                                <div class="input-group mr-sm-2">
                                    <div class="input-group-prepend h-tttk-input">
                                        <label class="col-form-label">Tên tài khoản:</label>
                                    </div>
                                    <input type="text" class="form-control col-md-3 border-0" readonly id="" value="<?= $tttk['user'] ?>">
                                </div>

                                <label class="sr-only" for=""></label>
                                <div class="input-group mr-sm-2">
                                    <div class="input-group-prepend h-tttk-input">
                                        <label class="col-form-label">Chuyên Ngành:</label>
                                    </div>
                                    <input type="text" class="form-control col-md-3 border-0" readonly id="" value="<?php $nganh=checknganhbyid($ttsv['id_nganh']); echo $nganh['ten_nganh']; ?>">
                                </div>

                                <label class="sr-only" for=""></label>
                                <div class="input-group mr-sm-2">
                                    <div class="input-group-prepend h-tttk-input">
                                        <div class="col-form-label">Email:</div>
                                    </div>
                                    <input type="text" class="form-control col-md-4 border-0" readonly id="" value="<?= $tttk['email'] ?>">
                                </div>

                            </form>
                        </div>
                        <div class="h-tt-social">
                            <span class="h-social">
                                <a href="https://www.facebook.com/profile.php?=75816879" target="_blank"><i class="fa fa-facebook-square"></i></a>
                                <a href=""><i class="fa fa-twitter-square"></i></a>
                                <a href=""><i class="fa fa-github-square"></i></a>
                                <a href=""><i class="fa fa-share-square"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 h-100 p-3 shadow rounded">
                <div class="align-items-center mt-4">
                    <h3 class=" mb-0">Chỉnh sửa thông tin</h3>
                </div>
                <div class="h-ttsv-edit rounded mt-3 mb-5">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Họ &amp; tên&ast; :</label>
                            <input type="text" class="form-control" name="ho_ten" id="ho_ten" readonly="readonly" value="<?= $ttsv['ho_ten'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Mã số sinh viên&ast; :</label>
                            <input type="text" class="form-control" name="mssv" id="mssv" readonly="readonly" value="<?= $ttsv['mssv'] ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Giới tính&ast; :</label>
                            <input type="radio" class="ml-3" id="male" name="gioi_tinh" value="1" checked> Nam
                            <input type="radio" class="ml-3" id="male" name="gioi_tinh" value="0"> Nữ
                            <!-- <input type="radio" class="ml-3" id="" name="gioi_tinh" value=""> Giới tính thứ 3 -->
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Ngày sinh&ast; : </label>
                            <span class="ml-3">
                                <select name="day" style="padding:3px 10px;">
                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?= $i ?>" <?php if ($i == date('d', strtotime($ttsv['ngay_sinh']))) echo 'selected' ?>>
                                            <?= $i ?></option>';
                                    <?php } ?>
                                </select>

                                <select name="month" style="padding:3px 10px;">
                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?= $i ?>" <?php if ($i == date('m', strtotime($ttsv['ngay_sinh']))) echo 'selected' ?>>
                                            <?= $i ?></option>';
                                    <?php } ?>
                                </select>

                                <select name="year" style="padding:3px 10px;">
                                    <?php for ($i = 1995; $i <= 2020; $i++) { ?>
                                        <option value="<?= $i ?>" <?php if ($i == date('Y', strtotime($ttsv['ngay_sinh']))) echo 'selected' ?>>
                                            <?= $i ?></option>';
                                    <?php } ?>
                                </select>
                            </span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Email&ast; :</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $tttk['email'] ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Số điện thoại&ast; : </label>
                            <input type="text" class="form-control" id="sdt" name="sdt" placeholder="0912 345 6789" value="<?= $ttsv['sdt'] ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="inputCity">Địa chỉ&ast; : </label>
                            <input type="text" class="form-control validate[required,minSize[5]] inputbox-success" id="dia_chi" name="dia_chi" data-errormessage-value-missing="Yêu cầu nhập chỗ ở hiện tại." data-errormessage-range-underflow="Chỗ ở hiện tại phải lớn hơn hoặc bằng 5 ký tự." value="<?= $ttsv['dia_chi'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" readonly="readonly" value="70000">
                        </div>
                    </div>
                </div>
                <div class="form-row ttsv-edit-button float-right">
                    <button href="?ctrl=sinh_vien" class="btn btn-outline-dark mr-2"> Hủy </button>
                    <button type="submit" class="btn buttoncapnhat"> Cập nhật </button>
                </div>
</form>
