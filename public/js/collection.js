$(function () {
    // FOCUSING CURSOR
    $('#add-game-modal').on('shown.bs.modal', function () {
        $('#title').trigger('focus');
    });

    // ENABLING AND DISABLING (ADD)
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

    // EDITING GAME
    $('.editgamebutton').on('click', function () {
        let id = $(this).attr('data-id');
        $('#edit-id').val(id);
        let name = $(this).attr('data-name');
        $('#edit-name').val(name);
        $('#edit-title').text(name);
        // IF WANTED
        let wanted = $(this).attr('data-wanted');
        if (wanted == 1) {
            $('#edit-wanted').prop('checked', true);
            $('#edit-wanted').prop('disabled', false);
            // IF NOT WANTED
        } else {
            $('#edit-wanted').prop('checked', false);
            $('#edit-wanted').prop('disabled', false);
        }
        // IF OWNED
        let owned = $(this).attr('data-owned');
        if (owned == 1) {
            $('#edit-owned').prop('checked', true);
            $('#edit-owned').prop('disabled', false);
            // IF PHYSICAL
            let physical = $(this).attr('data-physical');
            if (physical == 1) {
                $('#edit-physical').prop('checked', true);
                $('#edit-physical').prop('disabled', false);
                // IF NOT PHYSICAL
            } else {
                $('#edit-physical').prop('checked', false);
                $('#edit-physical').prop('disabled', false);
            }
            // IF DIGITAL
            let digital = $(this).attr('data-digital');
            if (digital == 1) {
                $('#edit-digital').prop('checked', true);
                $('#edit-digital').prop('disabled', false);
                let plus = $(this).attr('data-plus');
                // IF PLUS
                if (plus == 1) {
                    $('#edit-plus').prop('checked', true);
                    $('#edit-plus').prop('disabled', false);
                } else {
                    $('#edit-plus').prop('checked', false);
                    $('#edit-plus').prop('disabled', false);
                }
                // IF NOW
                let now = $(this).attr('data-now');
                if (now == 1) {
                    $('#edit-now').prop('checked', true);
                    $('#edit-now').prop('disabled', false);
                } else {
                    $('#edit-now').prop('checked', false);
                    $('#edit-now').prop('disabled', false);
                }
                // IF NOT DIGITAL, UNCHECK AND DISABLE ALL CHILDREN
            } else {
                $('#edit-digital').prop('checked', false);
                $('#edit-digital').prop('disabled', false);
                $('#edit-plus').prop('checked', false);
                $('#edit-plus').prop('disabled', true);
                $('#edit-now').prop('checked', false);
                $('#edit-now').prop('disabled', true);
            }
            // IF NOT OWNED, UNCHECK AND DISABLE ALL CHILDREN
        } else {
            $('#edit-owned').prop('checked', false);
            $('#edit-owned').prop('disabled', false);
            $('#edit-physical').prop('checked', false);
            $('#edit-physical').prop('disabled', true);
            $('#edit-digital').prop('checked', false);
            $('#edit-digital').prop('disabled', true);
            $('#edit-plus').prop('checked', false);
            $('#edit-plus').prop('disabled', true);
            $('#edit-now').prop('checked', false);
            $('#edit-now').prop('disabled', true);
        }
        // IF STARTED
        let started = $(this).attr('data-started');
        if (started == 1) {
            $('#edit-started').prop('checked', true);
            $('#edit-started').prop('disabled', false);
            // IF FINISHED
            let finished = $(this).attr('data-finished');
            if (finished == 1) {
                $('#edit-finished').prop('checked', true);
                $('#edit-finished').prop('disabled', false);
                // IF COMPLETED
                let completed = $(this).attr('data-completed');
                if (completed == 1) {
                    $('#edit-completed').prop('checked', true);
                    $('#edit-completed').prop('disabled', false);
                    // IF NOT COMPLETED
                } else {
                    $('#edit-completed').prop('checked', false);
                    $('#edit-completed').prop('disabled', false);
                }
                // IF NOT FINISHED, UNCHECK AND DISABLE CHILD
            } else {
                $('#edit-finished').prop('checked', false);
                $('#edit-finished').prop('disabled', false);
                $('#edit-completed').prop('checked', false);
                $('#edit-completed').prop('disabled', true);
            }
            // IF ABANDONED
            let abandoned = $(this).attr('data-abandoned');
            if (abandoned == 1) {
                $('#edit-abandoned').prop('checked', true);
                $('#edit-abandoned').prop('disabled', false);
                // IF NOT ABANDONED
            } else {
                $('#edit-abandoned').prop('checked', false);
                $('#edit-abandoned').prop('disabled', false);
            }
            // IF NOT STARTED, UNCHECK AND DISABLE ALL CHILDREN
        } else {
            $('#edit-started').prop('checked', false);
            $('#edit-started').prop('disabled', false);
            $('#edit-finished').prop('checked', false);
            $('#edit-finished').prop('disabled', true);
            $('#edit-completed').prop('checked', false);
            $('#edit-completed').prop('disabled', true);
            $('#edit-abandoned').prop('checked', false);
            $('#edit-abandoned').prop('disabled', true);
        }
    });

    // ENABLING AND DISABLING (EDIT)
    $('#edit-owned').on('change', function () {
        if (this.checked) {
            $("#edit-physical").prop("disabled", false);
            $("#edit-digital").prop("disabled", false);
        } else {
            $("#edit-physical").prop("disabled", true);
            $('#edit-physical').prop("checked", false);
            $("#edit-digital").prop("disabled", true);
            $('#edit-digital').prop("checked", false);
            $("#edit-plus").prop("disabled", true);
            $('#edit-plus').prop("checked", false);
            $("#edit-now").prop("disabled", true);
            $('#edit-now').prop("checked", false);
        }
    });
    $('#edit-digital').on('change', function () {
        if (this.checked) {
            $("#edit-plus").prop("disabled", false);
            $("#edit-now").prop("disabled", false);
        } else {
            $("#edit-plus").prop("disabled", true);
            $('#edit-plus').prop("checked", false);
            $("#edit-now").prop("disabled", true);
            $('#edit-now').prop("checked", false);
        }
    });
    $('#edit-started').on('change', function () {
        if (this.checked) {
            $("#edit-finished").prop("disabled", false);
            $("#edit-abandoned").prop("disabled", false);
        } else {
            $("#edit-finished").prop("disabled", true);
            $('#edit-finished').prop("checked", false);
            $("#edit-abandoned").prop("disabled", true);
            $('#edit-abandoned').prop("checked", false);
            $("#edit-completed").prop("disabled", true);
            $('#edit-completed').prop("checked", false);
        }
    });
    $('#edit-finished').on('change', function () {
        if (this.checked) {
            $("#edit-completed").prop("disabled", false);
            $('#edit-abandoned').prop("checked", false);
        } else {
            $("#edit-completed").prop("disabled", true);
            $('#edit-completed').prop("checked", false);
        }
    });
    $('#edit-abandoned').on('change', function () {
        if (this.checked) {
            $('#edit-finished').prop("checked", false);
            $("#edit-completed").prop("disabled", true);
            $('#edit-completed').prop("checked", false);
        }
    });

    // DELETING GAME FROM COLLECTION
    $('.deletebutton').on('click', function () {
        let id = $(this).attr('data-id');
        $('#id').val(id);
        let name = $(this).attr('data-name');
        $('#name').val(name);
        $('#nametext').text(name);
    });

});

// VALIDATION
function validateAdd() {
    $('#val-error-title').remove();
    $('#title').removeClass('is-invalid');
    var title = $('#title').val();
    if (title.length < 3) {
        $('#title').addClass('is-invalid');
        $('#title').after('<span id="val-error-title"></span');
        $('#val-error-title').attr('role', 'alert');
        $('#val-error-title').attr('class', 'invalid-feedback d-block');
        $('#val-error-title').html('<strong>The title must be at least 3 characters.</strong>')
        return false;
    }
}
