$(document).ready(function() {
    $('.keyword').on('keydown', function() {
        $.get("../ajax/cari_srtmsk.php?keyword=" + $('.keyword').val(), function(data) {
            $("#container_srtmsk").html(data);
            $(".jmlh_srt").css("display", "none");
            $('#navdd').dropdown();
        });
    });
});