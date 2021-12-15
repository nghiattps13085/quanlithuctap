          <div id="home" class="">
                <div class="row bg-light shadow my-3">
                    <div class="home-line"></div>
                    <div class="home-note col-12 text-center">
                        <h4 class=" m-auto">Tham gia ứng tuyển công việc thực tập</h4>
                        <p class="text-gray mt-2">Sẽ giúp bạn có đầy đủ kỹ năng thực tế để tạo ra những sản phẩm sáng tạo, tinh tế và phù hợp.</p>
                    </div>
                </div>
                <div class=" row home-list-job">
                <?php
                foreach($ds_nn as $ds_nn){ $ds_nganh=ds_nganh($ds_nn['id_nn']); ?>    
                    <div class="col-12 py-5 my-3 "  style="box-shadow: 0 6px 24px -6px lightgray;">
                        <!-- MENU -->
                        <h3 class=" shadow d-inline-block" ><?=$ds_nn['ten_nn']?></h3>
                        <ul class=" nav nav-tabs mt-n2">
                            <?php
                             $i=1;
                            foreach($ds_nganh as $ds_nganh){
                               $a=$ds_nganh['id_nganh'];
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($i==1) echo 'active';?>" data-toggle="tab" href="#menu<?=$a.$i?>"><?=$ds_nganh['ten_nganh']?></a>
                            </li>
                            <?php $i= $i + 1; } ?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php 
                             $ds_nganh=ds_nganh($ds_nn['id_nn']);
                             $k=1;
                            foreach($ds_nganh as $ds_nganh){ 
                                $a=$ds_nganh['id_nganh'];
                                $ds_dt=ds_dt($ds_nganh['id_nganh']);
                                ?>
                            <div id="menu<?=$a.$k?>" class="list-box-home  tab-pane <?php if($k==1) echo 'active';?>">
                                <div class="row d-flex flex-wrap ">
                                <?php $dem=1; foreach($ds_dt as $ds_dt){ 
                                    if($dem>4) break; 
                                    $thongtindn=checkdoanhnghiepbyid($ds_dt['id_dn']);
                                    ?>
                                    <div class=" col-lg-3 col-md-6 mt-3  pb-3  float-left">

                                        <div class="card card-re h-100 bg-light">
                                            <img class="card-img-top avt-cart-home" src="../uploads/<?=$thongtindn['anh']?>" onerror=this.src="../uploads/700x400.png" alt="Card image cap ">
                                            <div class="card-body small">
                                                <h5 class="card-title "><?=$ds_dt['tieu_de']?></h5>
                                                <a href="" class="card-text text-gray "><?=$thongtindn['ten_dn']?></a>
                                                <p class="card-text text-gray py-2 font-italic h-mota-limit"><?php echo substr($ds_dt['mo_ta'],0,80)?> . . .</p>
                                                <p class="card-text "><i class="fas fa-map-marker-alt"></i> <?=$thongtindn['dia_chi']?></p>
                                                <p class="card-text text-info  "><i class="fas fa-coins   text-warning    "></i> Mức lương: <?=$ds_dt['luong_khoi_dau']?> ~ <?=$ds_dt['luong_ket_thuc']?></p>
                                                <p class="card-text  text-tomato"><i class="fas fa-calendar-alt   text-primary "></i> Hạn chót: <?=$ds_dt['thoi_gian']?></p>
                                                <a href="index.php?act=thongtindt&id_dt=<?=$ds_dt['id_dt']?>" class="card-ab btn btn-primary  float-right mt-3">Xem chi tiết <i class="fas fa-align-right    ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($dem==4){?>
                                    <!-- <div id="loadmore">
                                    <i class="fas fa-chevron-circle-right    "></i>
                                    </div> -->
                                    <div class=" col-12 text-center bg-gray border-bottom border-top my-0 p-3">
                                        <a type="button" href="index.php?act=listjob&id_nganh=<?=$ds_nganh['id_nganh']?>" class="xemthem col-lg-2 btn btn-light border btn-inline-block font-weight-bold rounded-lg  shadow  "><span>Xem thêm</span> <i class="fas fa-chevron-circle-down "></i></a>
                                    </div>
                                    <?php } ?>
                                    <?php  $dem++;}?>
                                </div>
                                </div>
                    <?php 
                  $k++;  } ?>                                          
            </div>
        </div>                  
                <?php } ?>                           