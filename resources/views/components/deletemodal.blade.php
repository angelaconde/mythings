<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove game from your collection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('deleteusergame') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id" name="id" hidden>
                    <input id="name" name="name" hidden>
                    <h4 class="text-center">You're removing this game from your collection:</h4>
                    <h1 class="text-center" id="nametext"></h1>
                    <h4 class="text-center">Are you sure?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, remove the game</button>
            </div>
            </form>
        </div>
    </div>
</div>
