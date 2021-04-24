<div class="dropdown">
    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="sortMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Sort:
        @if (str_contains(url()->full(), 'name') && str_contains(url()->full(), 'asc'))
            Name (A to Z)
        @endif
        @if (str_contains(url()->full(), 'name') && str_contains(url()->full(), 'desc'))
            Name (Z to A)
        @endif
        @if (str_contains(url()->full(), 'created') && str_contains(url()->full(), 'desc'))
            Added (New to Old)
        @endif
        @if (str_contains(url()->full(), 'created') && str_contains(url()->full(), 'asc'))
            Added (Old to New)
        @endif
        @if (str_contains(url()->full(), 'updated') && str_contains(url()->full(), 'desc'))
            Updated (New to Old)
        @endif
        @if (str_contains(url()->full(), 'updated') && str_contains(url()->full(), 'asc'))
            Updated (New to Old)
        @endif
        @if (str_contains(url()->full(), 'story') && str_contains(url()->full(), 'asc'))
            Shortest story
        @endif
        @if (str_contains(url()->full(), 'story') && str_contains(url()->full(), 'desc'))
            Longest story
        @endif
        @if (str_contains(url()->full(), 'completionist') && str_contains(url()->full(), 'asc'))
            Shortest completion
        @endif
        @if (str_contains(url()->full(), 'completionist') && str_contains(url()->full(), 'desc'))
            Longest completion
        @endif
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
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=hltb_story_mins&order=asc{{ $filterQuery ?? '' }}">Shortest
            story</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=hltb_story_mins&order=desc{{ $filterQuery ?? '' }}">Longest
            story</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=hltb_completionist_mins&order=asc{{ $filterQuery ?? '' }}">Shortest
            completion</a>
        <a class="dropdown-item"
            href="{{ route('collection') }}?sort=hltb_completionist_mins&order=desc{{ $filterQuery ?? '' }}">Longest
            completion</a>
    </div>
</div>
