$(function () {
    // OPEN MODAL
    $('.launch-modal').on('click', function (e) {
        e.preventDefault();
        $('#' + $(this).data('modal-id')).modal();
    });

    // STOP VIDEO WHEN CLOSING MODAL
    $("#modal-video").on("hidden.bs.modal", function () {
        var url = $('#videoframe').attr('src');
        $('#videoframe').attr('src', '');
        $('#videoframe').attr('src', url);
    });

    // STOP SMALL VIDEO WHEN OPENING MODAL
    $("#modal-video").on("shown.bs.modal", function () {
        var url = $('#smallvideoframe').attr('src');
        $('#smallvideoframe').attr('src', '');
        $('#smallvideoframe').attr('src', url);
    });
});
