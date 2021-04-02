// ADDING GAME MODAL
$(function () {

    // FOCUSING CURSOR
    $('#add-game-modal').on('shown.bs.modal', function () {
        $('#title').trigger('focus');
    });

    // SHOWING HIDDEN FORM FIELDS
    $('#owned').on('change', function () {
        if (this.checked) {
            $("#physical").prop("disabled", false);
            $("#digital").prop("disabled", false);
        } else {
            $("#physical").prop("disabled", true);
            $('#physical').prop("checked", false);
            $("#digital").prop("disabled", true);
            $('#digital').prop("checked", false);
            $("#plus").prop("disabled", true);
            $('#plus').prop("checked", false);
            $("#now").prop("disabled", true);
            $('#now').prop("checked", false);
        }
    });
    $('#digital').on('change', function () {
        if (this.checked) {
            $("#plus").prop("disabled", false);
            $("#now").prop("disabled", false);
        } else {
            $("#plus").prop("disabled", true);
            $('#plus').prop("checked", false);
            $("#now").prop("disabled", true);
            $('#now').prop("checked", false);
        }
    });
    $('#started').on('change', function () {
        if (this.checked) {
            $("#finished").prop("disabled", false);
            $("#abandoned").prop("disabled", false);
        } else {
            $("#finished").prop("disabled", true);
            $('#finished').prop("checked", false);
            $("#abandoned").prop("disabled", true);
            $('#abandoned').prop("checked", false);
            $("#completed").prop("disabled", true);
            $('#completed').prop("checked", false);
        }
    });
    $('#finished').on('change', function () {
        if (this.checked) {
            $("#completed").prop("disabled", false);
            $('#abandoned').prop("checked", false);
        } else {
            $("#completed").prop("disabled", true);
            $('#completed').prop("checked", false);
        }
    });
    $('#abandoned').on('change', function () {
        if (this.checked) {
            $('#finished').prop("checked", false);
            $("#completed").prop("disabled", true);
            $('#completed').prop("checked", false);
        }
    });

    // CLEARING MODAL IF CLOSED
    $('#add-game-modal').on('hidden.bs.modal', function () {
        $("#add-form").trigger("reset");
        $("#wanted").prop("disabled", false);
        $("#owned").prop("disabled", false);
        $("#physical").prop("disabled", true);
        $("#digital").prop("disabled", true);
        $("#plus").prop("disabled", true);
        $("#now").prop("disabled", true);
        $("#started").prop("disabled", false);
        $("#finished").prop("disabled", true);
        $("#completed").prop("disabled", true);
        $("#abandoned").prop("disabled", true);
    });

});
