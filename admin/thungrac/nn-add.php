

<form method="POST" class="col-5 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=nhom_nganh&act=insert">
    <div class="row justify-content-center align-items-center text-warning">
        <h1>Thêm nhóm ngành</h1>
    </div>
        <div class="form-group">
            <label for="ten_loai">Tên nhóm ngành</label>
            <input type="text" class="form-control" id="ten_nn" name="ten_nn">
            <?php if (isset($nn_error)) { ?>
                <span class="badge badge-warning"> <?= $nn_error ?> </span>
            <?php } ?>
            <span id="kqchecknn"></span>
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="an_hien" id="anhien1" value="1" checked>
                <label class="form-check-label" for="anhien1"> Hiện </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="an_hien" id="anhien0" value="0">
                <label class="form-check-label" for="anhien0">Ẩn</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
</form>
<script>
    $(document).ready(function() {
        $("#ten_nn").blur(function() {
            u = $(this).val();
            $("#kqchecknn").load("<?= ADMIN_URL ?>/?ctrl=nhom_nganh&act=kiemtra_ten_nn&ten_nn=" + u);
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

