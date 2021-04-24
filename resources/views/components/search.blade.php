<div class="container">
    <div class="row">
        <!-- search -->
            <form class="col p-0" action="{{ route('collection') }}" method="GET">
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                @if (request('order'))
                    <input type="hidden" name="order" value="{{ request('order') }}">
                @endif
                @if (request('filters'))
                    @foreach (request('filters') as $filter)
                        <input type="hidden" name="filters[]" value="{{ $filter }}">
                    @endforeach
                @endif
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" name="search" placeholder="{{ request('search') ?? 'Search something...' }}" required>
                    <button class="btn btn-dark ml-1" type="submit"><span class="fa fa-search"></span> Search
                    </button>
                </div>
            </form>
        <!-- clear -->
            <form action="{{ route('collection') }}" method="GET">
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                @if (request('order'))
                    <input type="hidden" name="order" value="{{ request('order') }}">
                @endif
                @if (request('filters'))
                    @foreach (request('filters') as $filter)
                        <input type="hidden" name="filters[]" value="{{ $filter }}">
                    @endforeach
                @endif
                <input type="text" name="search" value="" hidden />
                <button class="btn btn-dark ml-1" type="submit">Clear</button>
            </form>
    </div>
</div>
