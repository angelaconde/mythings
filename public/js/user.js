// CHANGING NAME
$('.changenamebutton').on('click', function () {
    let id = $(this).attr('data-id');
    $('#edit-user-id').val(id);
});
