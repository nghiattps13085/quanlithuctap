      <form action="index.php?ctrl=sinh_vien&act=user_update" method="post" class="Ng" id="capnhapuser" enctype="multipart/form-data">
          <div class="bgr rounded shadow "></div>
          <div class="media boder p-3 sv8-12 " style="border-radius: 5px;">

              <div class="row col-sm-12">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                      <h3 class="mb-3" style="padding: 0 5px;font-weight: 600;">THAY ĐỔI MẬT KHẨU </h3>
                  </div>

                  <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4 col-form-label" style="text-align: right;">
                      <p><strong>Mật khẩu cũ<span style="color:tomato;">*</span></strong></p>
                  </div>
                  <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ml-2">
                      <p><input type="password" class="form-control mb-2 mr-sm-2" placeholder="Nhập mật khẩu cũ" name="pass" id="ho_ten"></p>
                  </div>
                  <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4 col-form-label" style="text-align: right;">
                      <p><strong>Mật khẩu mới<span style="color:tomato;">*</span></strong></p>
                  </div>
                  <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ml-2">
                      <p><input type="password" class="form-control mb-2 mr-sm-2" placeholder="Mật khẩu mới" name="mat_khau" id="ho_ten"></p>
                  </div>
                  <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-4 col-form-label" style="text-align: right;">
                      <p><strong>Nhập lại mật khẩu<span style="color:tomato;">*</span></strong></p>
                  </div>
                  <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 ml-2">
                      <p><input type="password" class="form-control mb-2 mr-sm-2" placeholder="Nhập lại mật khẩu mới" name="xac_nhan_mk" id="ho_ten"></p>
                  </div>

                  <div class="col-12 text-center mt-4">
                          <button  class="btn btn-outline-dark mr-2"> <a href="?ctrl=sinh_vien">Hủy</a>  </button>
                          <button type="submit" class="btn buttoncapnhat"> Cập nhật </button>
                  </div>
              </div>
          </div>
      </form>