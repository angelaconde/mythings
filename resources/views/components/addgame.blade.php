<div class="container-fluid">
    <button class="btn btn-dark btn-block mb-4" data-toggle="modal" data-target="#add-game-modal">Add Game</button>
</div>
<div id="add-game-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="add-form" action="{{ route('add') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <input id="title" name="title" placeholder="Title" type="text" required="required"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Ownership</label>
                            <div class="col-9">
                                <div class="custom-controls-stacked">
                                    <div class="custom-control custom-checkbox">
                                        <input name="wanted" id="wanted" type="checkbox" class="custom-control-input"
                                            value="wanted">
                                        <label for="wanted" class="custom-control-label">Wanted</label>
                                    </div>
                                </div>
                                <div class="custom-controls-stacked">
                                    <div class="custom-control custom-checkbox">
                                        <input name="owned" id="owned" type="checkbox" class="custom-control-input"
                                            value="owned">
                                        <label for="owned" class="custom-control-label">Owned</label>
                                    </div>
                                </div>
                                <!-- ONLY IF OWNED IS CHECKED -->
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="physical" id="physical" type="checkbox"
                                            class="custom-control-input" value="physical" disabled>
                                        <label for="physical" class="custom-control-label">Physical</label>
                                    </div>
                                </div>
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="digital" id="digital" type="checkbox" class="custom-control-input"
                                            value="digital" disabled>
                                        <label for="digital" class="custom-control-label">Digital</label>
                                    </div>
                                </div>
                                <!-- ONLY IF DIGITAL IS CHECKED -->
                                <div class="custom-controls-stacked ml-5">
                                    <div class="custom-control custom-checkbox">
                                        <input name="plus" id="plus" type="checkbox" class="custom-control-input"
                                            value="plus" disabled>
                                        <label for="plus" class="custom-control-label">Plus</label>
                                    </div>
                                </div>
                                <div class="custom-controls-stacked ml-5">
                                    <div class="custom-control custom-checkbox">
                                        <input name="now" id="now" type="checkbox" class="custom-control-input"
                                            value="now" disabled>
                                        <label for="now" class="custom-control-label">Now</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Play Info</label>
                            <div class="col-9">
                                <div class="custom-controls-stacked">
                                    <div class="custom-control custom-checkbox">
                                        <input name="started" id="started" type="checkbox" class="custom-control-input"
                                            value="started">
                                        <label for="started" class="custom-control-label">Started</label>
                                    </div>
                                </div>
                                <!-- ONLY IF STARTED IS CHECKED -->
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="finished" id="finished" type="checkbox"
                                            class="custom-control-input ml-5" value="finished" disabled>
                                        <label for="finished" class="custom-control-label">Finished</label>
                                    </div>
                                </div>
                                <!-- ONLY IF FINISHED IS CHECKED -->
                                <div class="custom-controls-stacked ml-5">
                                    <div class="custom-control custom-checkbox">
                                        <input name="completed" id="completed" type="checkbox"
                                            class="custom-control-input" value="completed" disabled>
                                        <label for="completed" class="custom-control-label">Completed</label>
                                    </div>
                                </div>
                                <!-- ONLY IF STARTED IS CHECKED -->
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="abandoned" id="abandoned" type="checkbox"
                                            class="custom-control-input" value="abandoned" disabled>
                                        <label for="abandoned" class="custom-control-label">Abandoned</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="submit" type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('#add-game-modal').modal('show');
        });
    </script>
@endif
