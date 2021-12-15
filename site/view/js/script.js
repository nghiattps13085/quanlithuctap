(function($) {

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("#nav-togger").toggleClass("nav-togger_left");
        $("#overlay-nav").toggleClass("d-block");
        $(".container").toggleClass("container_left");

        $("#overlay-nav").click(function(e) {
            e.preventDefault();
            $("#nav-togger").removeClass("nav-togger_left");
            $("#overlay-nav").removeClass("d-block");
            $(".container").removeClass("container_left");
        });
    });
    $("#list-grid").on("click", function(e) {
        e.preventDefault();
        $(".detail-job_list button").addClass("col-lg-6 ");
        $(".detail-job_list ").removeClass("small");
        $(".detail-job_inf").removeClass("d-md-block");
    });
    $("#list-inf").on("click", function(e) {
        e.preventDefault();
        $(".detail-job_list ").addClass("small");
        $(".detail-job_list button").removeClass("col-lg-6");
        $(".detail-job_inf").addClass("d-md-block");

    });

    // Window loaded 
    $(document).ready(function() {
        //upload ảnh sv
        $("#file-upload-SV").on("change", function() {
            files = $('#file-upload-SV')[0].files;
            if (files.length > 0) {
                data = new FormData();
                data.append('file', files[0]);

                $.ajax({
                    type: 'POST',
                    url: "?ctrl=sinh_vien&act=ttcn_upload_anh",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false, // tell jQuery not to process the data
                    contentType: false,
                    success: function(response) {
                        $("#avt-sv").attr("src", response)
                    }
                });
            }
        });
        //upload ảnh dn
        $("#file-upload-logo").on("change", function() {
            files = $('#file-upload-logo')[0].files;
            if (files.length > 0) {
                data = new FormData();
                data.append('file', files[0]);

                $.ajax({
                    type: 'POST',
                    url: "?ctrl=doanh_nghiep&act=dn_upload_logo",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false, // tell jQuery not to process the data
                    contentType: false,
                    success: function(response) {
                        $("#logo-dn").attr("src", response)
                    }
                });
            }
        });
        //upload ảnh banner doanh nghiep
        $("#file-upload-banner").on("change", function() {
            files = $('#file-upload-banner')[0].files;
            if (files.length > 0) {
                data = new FormData();
                data.append('file', files[0]);

                $.ajax({
                    type: 'POST',
                    url: "?ctrl=doanh_nghiep&act=dn_upload_banner",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false, // tell jQuery not to process the data
                    contentType: false,
                    success: function(response) {
                        $("#banner-dn").attr("src", response)
                    }
                });
            }
        });
        //doanh ngiep dăng tuyển
        $('#chon_nn').on('change', function() {
            var id_nn = $(this).val();
            $.ajax({
                type: "post",
                url: "?ctrl=doanh_nghiep&act=chonnganh",
                data: { id_nn: id_nn },
                success: function(response) {
                    $("#nhomnganh").html(response);
                }
            });
        });
        // nghia
        $(".hide-btn").click(function() {
            $("#myDiv").hide();
        });

        // Show div by removing inline display none style rule
        $(".show-btn").click(function() {
            $("#myDiv").show();
        });

        // Toggle div display
        $(".toggle-btn").click(function() {
            $("#myDiv").toggle();
        });
        // end nghia
    });


})(jQuery);