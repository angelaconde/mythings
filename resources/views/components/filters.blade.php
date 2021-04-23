<div class="border border-dark rounded mb-3">
    <form action="{{ route('collection') }}" method="GET">
        <input type="hidden" name="sort" value="{{ request('sort') ?? 'name' }}">
        <input type="hidden" name="order" value="{{ request('order') ?? 'asc' }}">
        <div class="px-4 py-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="wanted" aria-label="wanted"
                    {{ in_array('wanted', $filters) ? 'checked' : '' }}>Wanted
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="owned" aria-label="owned"
                    {{ in_array('owned', $filters) ? 'checked' : '' }}>Owned
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="physical" aria-label="physical"
                    {{ in_array('physical', $filters) ? 'checked' : '' }}>Physical
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="digital" aria-label="digital"
                    {{ in_array('digital', $filters) ? 'checked' : '' }}>Digital
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="plus" aria-label="plus"
                    {{ in_array('plus', $filters) ? 'checked' : '' }}>Plus
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="now" aria-label="now"
                    {{ in_array('now', $filters) ? 'checked' : '' }}>Now
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="started" aria-label="started"
                    {{ in_array('started', $filters) ? 'checked' : '' }}>Started
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="finished" aria-label="finished"
                    {{ in_array('finished', $filters) ? 'checked' : '' }}>Finished
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="completed"
                    aria-label="completed" {{ in_array('completed', $filters) ? 'checked' : '' }}>Completed
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filters[]" value="abandoned"
                    aria-label="abandoned" {{ in_array('abandoned', $filters) ? 'checked' : '' }}>Abandoned
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark my-2">Filter</button>
            <a href="{{ route('collection') }}{{ request('sort') ? '?sort=' . request('sort') : '?sort=name' }}{{ request('order') ? '&order=' . request('order') : '&order=asc' }}"
                class="btn btn-dark my-2">Clear</a>
        </div>
    </form>
</div>
