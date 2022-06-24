$(document).ready(function() {
    $('.keyword').on('keydown', function() {
        $.get("../ajax/cari_anggota.php?keyword=" + $('.keyword').val(), function(data) {
            $("#container_anggota").html(data);
            $(".jmlh_srt").css("display", "none");
            $('#navdd').dropdown();
        });
    });
});