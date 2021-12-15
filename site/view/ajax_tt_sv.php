<?php
if ($thong_tin['trang_thai'] != '3') $phe_duyet = '
<div class="resume_item1 resume_about1 border-top-0">
<div class="title">
<h5 class="text-gray font-weight-bold border-bottom pb-3">' . $dangtuyen['tieu_de'] . '</h5>
<p class="text-gray">
    <span class="font-weight-bold ">Nguyện vọng</span> 
    <span >
    ' . $thong_tin['nguyen_vong'] . '
    </span>
</p>
</div>  
<div class="pt-3 text-right">
    <span class="mr-3 text-gray font-italic">Duyệt đơn ứng tuyển: </span>
    <a class="btn btn-outline-success " href="index.php?ctrl=doanh_nghiep&act=pheduyet&id_phieu=' . $_POST['id_phieu'] . '" id="nutpheduyet"><i class="fas fa-check-circle    "></i> Phê duyệt</a>
    <a class="btn btn-outline-danger " href="index.php?ctrl=doanh_nghiep&act=tuchoi&id_phieu=' . $_POST['id_phieu'] . '" id="nuttuchoi"><i class="fas fa-window-close    "></i> Từ chối </a>
</div>
</div>';

echo '  
        <div class="resume_left">
            <div class="resume_profile">
                <img  src="../uploads/'.$thong_tin_sv['anh'].'" onerror=this.src="view/images/student.png" alt="profile_pic">
            </div>
            <div class="resume_content">
                <div class="resume_item resume_info">
                    <div class="title">
                        <p class="bold">' . $thong_tin_sv['ho_ten'] . '</p>
                        <p class="regular">' .$nganh['ten_nganh']. '</p>
                    </div>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fas fa-map-marker"></i>
                            </div>
                            <div class="data">
                            ' . $thong_tin_sv['dia_chi'] . '
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="data">
                            ' . $thong_tin_sv['sdt'] . '
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="data">
                            ' . $email['email'] . '
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fab fa-weebly"></i>
                            </div>
                            <div class="data">
                                www.Nghiadep.com
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="resume_item resume_skills">
                    <div class="title">
                        <p class="bold"> ' . $kynang['ky_nang_so_truong'] . '</p>
                    </div>
                    <ul>
                        <li>
                            <div class="skill_name semi-bold">
                                Tin học
                            </div>
                            <div class="skill_progress">
                                <span style="width: 80%;"></span>
                            </div>
                            <div class="skill_per">80%</div>
                        </li>
                        <li>
                            <div class="skill_name semi-bold">
                                Tiếng Anh
                            </div>
                            <div class="skill_progress">
                                <span style="width: 70%;"></span>
                            </div>
                            <div class="skill_per">70%</div>
                        </li>
                        <li>
                            <div class="skill_name semi-bold">
                                Sáng tạo
                            </div>
                            <div class="skill_progress">
                                <span style="width: 90%;"></span>
                            </div>
                            <div class="skill_per">90%</div>
                        </li>

                    </ul>
                </div>
                <div class="resume_item resume_social">
                    <div class="title">
                        <p class="bold">Giải thưởng</p>
                    </div>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa fa-code"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold">Vô địch Code War(Fpt)</p>

                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-basketball-ball"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold">Giải ba Cầu lông</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="resume_item resume_social">
                    <div class="title">
                        <p class="bold">Hoạt động</p>
                    </div>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold">Tình nguyện viên Bụi</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold">Môi Trường Xanh</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="resume_right">
               ' . $phe_duyet . '
            <div class="resume_item resume_about">
                <div class="title">
                    <p class="bold">Mục tiêu nghề nghiệp</p>
                </div>
                <p>' . $kynang['muc_tieu_nghe_nghiep'] . '
                </p>
            </div>
            <div class="resume_item resume_work">
                <div class="title">
                    <p class="bold">Dự án đã làm</p>
                </div>
                <ul>
                    <li>
                        <div class="date">2018 - 2019</div>
                        <div class="info">
                            <p class="semi-bold">DỰ án bán hàng The corner</p>
                            <p>Đảm nhận vị trí Front-en</p>
                            <p>Đảm nhận vị trí back-end</p>

                        </div>
                    </li>
                    <li>
                        <div class="date">2019 - 2020</div>
                        <div class="info">
                            <p class="semi-bold">Dự án Leading Meida</p>
                            <p> viết quảng cáo qua các trang mạng xã hội Facebook</p>
                            <p> viết quảng cáo qua các trang mạng xã hội Facebook</p>
                        </div>
                    </li>
                    <li>
                        <div class="date">2020 - Present</div>
                        <div class="info">
                            <p class="semi-bold"> Web Freelancer</p>
                            <p>Nhận các dự án đầu tiên Front-end,Back-end,...</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="resume_item resume_education">
                <div class="title">
                    <p class="bold">Trình độ học vấn</p>
                </div>
                <ul>
                    <li>
                        <div class="date">2018 - 2020</div>
                        <div class="info">
                            <p class="semi-bold">Web Designer (FPT Polytechnic)</p>
                            <p>Tốt nghiệp loại giỏi chuyên ngành thiết kế Web của trường cao đẳng Fpt</p>
                        </div>
                    </li>
                    <li>
                        <div class="date">2020 - present</div>
                        <div class="info">
                            <p class="semi-bold">Imformation Technology(Fpt University)</p>
                            <p>Sinh viên đại học FPT</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="resume_item resume_hobby">
                <div class="title">
                    <p class="bold">Sở thích </p>
                </div>
                <ul>
                    <li><i class="fas fa-book"></i></li>
                    <li><i class="fas fa-gamepad"></i></li>
                    <li><i class="fas fa-music"></i></li>
                    <li><i class="fab fa-pagelines"></i></li>
                </ul>
            </div>
        </div>
   ';
?>