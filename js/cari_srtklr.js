$(document).ready(function() {
    $('.keyword').on('keydown', function() {
        $.get("../ajax/cari_srtklr.php?keyword=" + $('.keyword').val(), function(data) {
            $("#container_srtklr").html(data);
            $(".jmlh_srt").css("display", "none");
            $('#navdd').dropdown();
        });
    });
});