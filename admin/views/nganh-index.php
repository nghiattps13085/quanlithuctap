<div class="row">
    <div class="alert alert-primary w-100 p-3" role="alert">
        <h1 >DANH SÁCH NGÀNH HỌC</h1>
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Danh sách ngành học</li>
            </ol>
        </nav>
    </div>
</div>
<div class="mb-5">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modelId">
        <i class="fas fa-plus"></i> Thêm ngành
    </button>
    <input id="xoaall" type="submit" class="btn btn-danger ml-2" name="xoaall" value="Xóa Mục Đã Chọn" >
<!-- Button trigger modal -->

<!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header alert alert-primary">
                    <h3 class="modal-title">Thêm Ngành Học</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form method="POST"  class="col-12 border rounded-lg bg-light py-4 px-4  " action="<?= ADMIN_URL ?>/?ctrl=nganh&act=insert">
                        <div class="form-group">
                            <label for="ten_nganh" class="font-weight-bold ">Nhóm ngành</label>
                            <select id="ten_nganh" name="id_nn" class="form-control">
                                <option value="">Chọn nhóm ngành</option>
                                <?php require_once "models/nhom_nganh.php";
                                $dsnganh = getAllNhomnganh();
                                foreach ($dsnganh as $row) { ?>
                                    <option value="<?= $row['id_nn'] ?>"> <?= $row['ten_nn'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ten_loai" class="font-weight-bold ">Tên ngành</label>
                            <input type="text" class="form-control"  name="ten_nganh">
                        </div>
                        <div class="mt-5">
                            <div class="form-group border-bottom">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="an_hien" id="anhien1" value="1" checked>
                                    <label class="form-check-label" for="anhien1"> Hiện </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="an_hien" id="anhien0" value="0">
                                    <label class="form-check-label" for="anhien0">Ẩn</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<table class="table table-hover table-bordered table-striped ">
    <thead >
        <tr>
            <th scope="col"><input type="checkbox" name="checkall " class="checkall mr-2"> #</th>
            <th scope="col">Tên ngành</th>
            <th scope="col">Ẩn hiện</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
            foreach ($ds as $row) { ?>
            <tr>
                <th>
                    <div class="checkbox d-flex align-items-center"><input type="checkbox" class="checkitem mr-2" value ='<?= $row['id_nganh'] ?>' > <div ><?= $i++ ?></div> </div>
                </th>
                <td> <?= $row['ten_nganh'] ?></td>
                <td><?= ($row['an_hien'] == 1) ? "Đang hiện" : "Đang ẩn"; ?></td>
                <td><a href="?ctrl=nganh&act=edit&id_nganh=<?= $row['id_nganh'] ?>"><i class="far fa-edit"></i></a>
                </td>
                <td><a href="?ctrl=nganh&act=delete&id_nganh=<?= $row['id_nganh'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- <div class="checkbox col my-5">
        <input type="checkbox" name="checkall" class="checkall" >
        <label for="checkall" style="font-weight: bold;">Chọn Tất Cả</label>
</div> -->

<script>
        $(".checkall").change(function(){
            // $(".checkall").prop("checked",$(this).prop("checked"));
            $(".checkitem").prop("checked",$(this).prop("checked"));
        })
        $(".checkitem").change(function(){
            if($(this).prop("checked")==false){
                $(".checkall").prop("checked",false)
            }
            if($(".checkitem:checked").length == $(".checkitem").length){
                $(".checkall").prop("checked",true)
            }
        })
        $("#xoaall").click(function(){
            if($(".checkitem:checked").length > 0){
                var y = confirm("Bạn chắc chắn muốn xóa các mục đã chọn không ?");
                if(y == true){
                    let arrcheck = [];
                    $(".checkitem").each(function(){
                        check = $(this).prop("checked");
                    if(check){
                        arrcheck.push($(this).val());
                    }
                    }); 
                    console.log(arrcheck);
                    $.ajax({
                    type: "post",
                    url: "index.php?ctrl=nganh",
                    data: {arr: arrcheck},
                    success: function(data) {
                        location.reload();
                    }
                    });}
            }
        });
      
    </script>


