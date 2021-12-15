  <!-- Modal Nhận xét - Đánh giá - QLNS -->
  <div class="modal fade" id="exampleModal_Hoang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" id="cc">

          </div>
      </div>
  </div>

  <div class="N-box" id="myDiv">
      <div id="overflow">

          <div class="resume ">
              <button class="btn-danger2 btn btn-info  hide-btn">X</button>
              <div id="show-cv" class="d-flex"></div>
          </div>

      </div>

  </div>

  <!-- End Modal -->
  <div class="row align-items-center">
      <div class="col-lg-8">
          <h2 class="font-weight-600 mb-0">Quản lý nhân sự</h2>
          <span class="text-secondary px-1"><i class="far fa-users"></i>
              <?php echo demAll_slsv()?>
          </span>
      </div>
      <div class="col-lg-4">
          <div class="input-group mb-3">
              <div class="input-group col-8">
                  <!-- <input type="text" class="form-control" placeholder="Tìm kiếm..">
                                        <div class="input-group-append">
                                            <button class="input-group-text">
                                                <a href=""><i class="far fa-search"></i></a>
                                            </button>
                                        </div> -->
              </div>
              <button class="input-group-text" type="button" data-toggle="dropdown">
                  Sắp xếp <i class="far fa-angle-down"></i></button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Theo MSSV</a>
                  <a class="dropdown-item" href="#">Theo tên</a>
                  <a class="dropdown-item" href="#">Theo đánh giá</a>
                  <a class="dropdown-item" href="#">Theo thời gian</a>
              </div>
          </div>
      </div>
  </div>
  <p class="text-secondary m-1"> &ast;Sinh viên đang thực tập tại công ty&ast;</p>
    <form action="exel/exel.php">
    <input type="hidden" name="id_dn" value="<?=$_SESSION['sid_dn']?>">
    <button type="submit" class="btn btn-outline-info px-5">Xuất file excel</button>
    </form>
  <div class=" h-big-box mt-4">
      <div class="h-box1">
          <table class="table table-hover table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col" class="text-center">STT</th>
                      <th scope="col">MSSV</th>
                      <th scope="col">Họ &amp; tên</th>
                      <th scope="col">Chuyên ngành</th>
                      <th scope="col" class="text-center">Hồ sơ</th>
                      <th scope="col" class="text-center">Đánh giá</th>
                  </tr>
              </thead>
              <tbody class="table-bordered">
                  <?php $i = 1;
                    foreach ($ds as $row) { ?>
                      <?php $dt = getAllDangtuyen();
                        foreach ($dt as $t) { ?>
                          <?php if ($t['id_dn'] == $row['id_dn']) { ?>
                              <?php $id_dt = $t['id_dt']; ?>
                              <?php $ut = getAllUngtuyen($id_dt); ?>
                              <?php foreach ($ut as $t) { ?>
                                  <?php if ($t['trang_thai'] == 3) { ?>
                                      <?php $sv = getAllSinhvien(); ?>
                                      <?php foreach ($sv as $s) { ?>
                                          <?php if ($s['id_sv'] == $t['id_sv']) { ?>
                                              <tr>
                                                  <th scope="row" class="text-center"><?= $i++ ?></th>
                                                  <td><?= $s['mssv'] ?></td>
                                                  <td><?= $s['ho_ten'] ?></td>
                                                  <?php $nganh = getAllNganh();
                                                    foreach ($nganh as $n) { ?>
                                                      <?php if ($n['id_nganh'] == $s['id_nganh']) { ?>
                                                          <td><?= $n['ten_nganh'] ?></td>
                                                      <?php } ?>
                                                  <?php } ?>
                                                  <td class="text-center"><a onclick="truyen_tt(<?= $t['id_phieu'] ?>)"><i class="fas fa-address-card show-btn" style="font-size: 30px; color: #2574A9;"></i></a>
                                                  </td>
                                                  <td class="text-center">
                                                      <div class="h-md-qlns">
                                                      <?php if($t['ket_qua']!= 0 ){ ?>
                                                      <i class="fas fa-check-circle    text-success"></i>

                                                      <?php } else { ?>
                                                      <a onclick="truyen_id(<?=$t['id_phieu'] ?>)"class="text-dark"  data-toggle="modal" data-target="#exampleModal_Hoang"><i class="far fa-book-open " style="font-size: 30px; color: #2574A9;"></i></a>
                                                          
                                                      <?php }   ?>
                                                          <!-- <button type="button" class="btn text-dark" data-toggle="modal"
                                                        data-target="#exampleModal_Hoang">
                                                        <i class="far fa-edit"></i>
                                                         </button> -->
                                                      </div>
                                                  </td>
                                              </tr>
                                          <?php } ?>
                                      <?php } ?>
                                  <?php } ?>
                              <?php } ?>
                          <?php } ?>
                      <?php } ?>
                  <?php } ?>
              </tbody>
          </table>
      </div>
  </div>

  <script>
      function truyen_id(id_phieu) {
          $.ajax({
              type: "post",
              url: "index.php?ctrl=doanh_nghiep&act=danh_gia",
              data: {
                  id_phieu
              },

              success: function(response) {
                  document.getElementById('cc').innerHTML = response
              }
          });

      }

      function truyen_tt(id_phieu) {
          $.ajax({
              type: "post",
              url: "index.php?ctrl=doanh_nghiep&act=show_cv",
              data: {
                  id_phieu
              },

              success: function(response) {
                  document.getElementById('show-cv').innerHTML = response
              }
          });
      }
  </script>