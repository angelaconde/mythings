<div id="edit-game-modal" class="modal text-left" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="edit-form" action="{{ route('editusergame') }}">
                        @csrf
                        @method('PATCH')
                        <input id="edit-id" name="id" hidden>
                        <input id="edit-name" name="name" hidden>
                        <div class="form-group row">
                            <label for="title" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <p id="edit-title"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Ownership</label>
                            <div class="col-9">
                                <div class="custom-controls-stacked">
                                    <div class="custom-control custom-checkbox">
                                        <input name="wanted" id="edit-wanted" type="checkbox" class="custom-control-input"
                                            value="wanted">
                                        <label for="edit-wanted" class="custom-control-label">Wanted</label>
                                    </div>
                                </div>
                                <div class="custom-controls-stacked">
                                    <div class="custom-control custom-checkbox">
                                        <input name="owned" id="edit-owned" type="checkbox" class="custom-control-input"
                                            value="owned">
                                        <label for="edit-owned" class="custom-control-label">Owned</label>
                                    </div>
                                </div>
                                <!-- ONLY IF OWNED IS CHECKED -->
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="physical" id="edit-physical" type="checkbox"
                                            class="custom-control-input" value="physical">
                                        <label for="edit-physical" class="custom-control-label">Physical</label>
                                    </div>
                                </div>
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="digital" id="edit-digital" type="checkbox" class="custom-control-input"
                                            value="digital">
                                        <label for="edit-digital" class="custom-control-label">Digital</label>
                                    </div>
                                </div>
                                <!-- ONLY IF DIGITAL IS CHECKED -->
                                <div class="custom-controls-stacked ml-5">
                                    <div class="custom-control custom-checkbox">
                                        <input name="plus" id="edit-plus" type="checkbox" class="custom-control-input"
                                            value="plus">
                                        <label for="edit-plus" class="custom-control-label">Plus</label>
                                    </div>
                                </div>
                                <div class="custom-controls-stacked ml-5">
                                    <div class="custom-control custom-checkbox">
                                        <input name="now" id="edit-now" type="checkbox" class="custom-control-input"
                                            value="now">
                                        <label for="edit-now" class="custom-control-label">Now</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Play Info</label>
                            <div class="col-9">
                                <div class="custom-controls-stacked">
                                    <div class="custom-control custom-checkbox">
                                        <input name="started" id="edit-started" type="checkbox" class="custom-control-input"
                                            value="started">
                                        <label for="edit-started" class="custom-control-label">Started</label>
                                    </div>
                                </div>
                                <!-- ONLY IF STARTED IS CHECKED -->
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="finished" id="edit-finished" type="checkbox"
                                            class="custom-control-input ml-5" value="finished">
                                        <label for="edit-finished" class="custom-control-label">Finished</label>
                                    </div>
                                </div>
                                <!-- ONLY IF FINISHED IS CHECKED -->
                                <div class="custom-controls-stacked ml-5">
                                    <div class="custom-control custom-checkbox">
                                        <input name="completed" id="edit-completed" type="checkbox"
                                            class="custom-control-input" value="completed">
                                        <label for="edit-completed" class="custom-control-label">Completed</label>
                                    </div>
                                </div>
                                <!-- ONLY IF STARTED IS CHECKED -->
                                <div class="custom-controls-stacked ml-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="abandoned" id="edit-abandoned" type="checkbox"
                                            class="custom-control-input" value="abandoned">
                                        <label for="edit-abandoned" class="custom-control-label">Abandoned</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="submit" type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
