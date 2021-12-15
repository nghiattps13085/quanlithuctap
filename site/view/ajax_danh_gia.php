<?php 
        echo '<div class="modal-header alert alert-info">
        <h5 class="modal-title" id="exampleModalLabel">Đánh giá -
            Quản lý nhân sự</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div><form method="post" action="index.php?ctrl=doanh_nghiep&act=dn_danh_gia&id_phieu=' .$id. '">
    <div class="modal-body">
        
            <div class="form-group">
                
                <label for="recipient-name" class="col-form-label">
                    <i class="far fa-trophy-alt"></i> Đánh giá:
                    <span class="text-success px-2">
                        <input type="radio" name="h-danhgia" id="h-dat" value="2" checked> Đạt <i class="fa fa-check"></i>
                    </span>
                    <span class=text-danger>
                        <input type="radio" name="h-danhgia" id="h-chuadat" value="1"> Chưa đạt <i class="fas fa-close"></i>
                    </span>
                </label>
            </div>

            <div class="form-group">
                <label for="message-text" class="col-form-label">Nhận xét:</label>
                <textarea class="form-control" cols="30" rows="7" id="message-text" name="danh_gia"></textarea>
            </div>
            
       
    </div>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button> -->
        <!-- <button type="button" class="btn btn-outline-success">Cập nhật</button> -->
        <!-- <button type="button" class="btn btn-danger" data-dismiss="">Chưa đạt <i class="far fa-close" aria-hidden="true"></i></button> -->
        <button type="submit" class="btn btn-success" data-dismiss="">Cập nhật </button>
    
            </form>
    </div>';
?>