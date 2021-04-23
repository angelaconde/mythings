<div class="dropdown">
    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="sortMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Sort by
    </button>
    <div class="dropdown-menu" aria-labelledby="sortMenuButton">
        @if (request('filters'))
            @php $filterQuery = ''; @endphp
            @foreach (request('filters') as $filter)
                @php $filterQuery .= ('&filters%5B%5D='.$filter); @endphp
            @endforeach
        @endif
        <a class="dropdown-item" href="{{ route('collection') }}?sort=name&order=asc{{ $filterQuery ?? '' }}">Name
            (A to Z)</a>
        <a class="dropdown-item" href="{{ route('collection') }}?sort=name&order=desc{{ $filterQuery ?? '' }}">Name
            (Z to A)</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=created_at&order=desc{{ $filterQuery ?? '' }}">Added
            (New to Old)</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=created_at&order=asc{{ $filterQuery ?? '' }}">Added
            (Old to New)</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=updated_at&order=desc{{ $filterQuery ?? '' }}">Updated (New to
            Old)</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=updated_at&order=asc{{ $filterQuery ?? '' }}">Updated (Old to
            New)</a>
    </div>
</div>
