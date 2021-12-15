

    <form class="col-5 mx-auto border border-warning p-2 shadow rounded mt-4" method="post" action="<?= ADMIN_URL ?>/?ctrl=user&act=doimk">
        <div class="form-group">
            <h1 class="row justify-content-center align-items-center text-info">Đổi mật khẩu</h1>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control"  name="user" id="user" required placeholder="Nhập user">
            <?php if (isset($user_error)) { ?>
                <span class="badge badge-warning"> <?= $user_error ?> </span>
            <?php } ?>
            <span id="kqcheckuser"></span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass"  placeholder="Nhập mật khẩu hiện tại">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass_new"  placeholder="Nhập mật khẩu mới">
        </div>
        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
    <script>
        $(document).ready(function() {
            $("#user").blur(function() {
                u = $(this).val();
                $("#kqcheckuser").load("<?= ADMIN_URL ?>/?ctrl=home&act=kiemtrauser&user=" + u);
            });
        });
    </script>

