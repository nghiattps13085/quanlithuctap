
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="../thungrac/style.css">
</head>
<body>
<?php
session_start();
unset($_SESSION['admin']);
?>
<section class="section-login">
  <div class="section-login-create flex-betw">
    <div class="row form-group  justify-content-center align-items-center  text-center">
      <h2>Đăng nhập</h2>
    </div>
    <form action="/quan-ly-thuc-tap/admin/?ctrl=home&act=dangnhap" method="POST">
      <div class="login flex-betw p-3 ">
        <div class=" form-group ">
          <input type="text" name="user" id="user" class="form-control border-top border-left border-right py-4" required placeholder="Nhập Email">
          <?php if (isset($user_error)) { ?>
            <span class="badge badge-warning"> <?= $user_error ?> </span>
          <?php } ?>
          <span id="kqcheckuser"></span>
        </div>
        <div class="login-sec flex-betw">
          <input type="password" name="pass" id="pass" class="form-control border-top border-left border-right py-4" required placeholder="Nhập mật khẩu">
        </div>
        <div class="d-flex justify-content-between mt-3">
          <a href="/quan-ly-thuc-tap/admin/?ctrl=home&act=taikhoan">Quên mật khẩu?</a>
          <button type="submit" class="btn btn-primary font-weight-bold col ml-3">Đăng nhập</button>
        </div>

      </div>
    </form>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("#user").blur(function() {
      u = $(this).val();
      $("#kqcheckuser").load("<?= ADMIN_URL ?>/?ctrl=home&act=kiemtrauser&user=" + u);
    });
  });
</script>
</body>
</html>