<!-- color -->
@php
if ($game->hltb_story_mins < 1800) {
    $colorStory = 'badge-info';
} elseif ($game->hltb_story_mins > 6000) {
    $colorStory = 'badge-danger';
} else {
    $colorStory = 'badge-warning';
}
if ($game->hltb_completionist_mins < 1800) {
    $colorCompletionist = 'badge-info';
} elseif ($game->hltb_completionist_mins > 6000) {
    $colorCompletionist = 'badge-danger';
} else {
    $colorCompletionist = 'badge-warning';
}
@endphp

<!-- large -->
<div class="col-5 px-1 d-none d-lg-block">
    <span class="badge badge-pill {{ $colorStory }} d-block">Story: {{ $game->hltb_story }}</span>
</div>
<div class="col-5 px-1 d-none d-lg-block">
    <span class="badge badge-pill {{ $colorCompletionist }} d-block">Completionist:
        {{ $game->hltb_completionist }}</span>
</div>
<!-- phone -->
<div class="col-12 mb-1 d-lg-none">
    <span class="badge badge-pill {{ $colorStory }} d-block">Story: {{ $game->hltb_story }}</span>
</div>
<div class="col-12 mb-1 d-lg-none">
    <span class="badge badge-pill {{ $colorCompletionist }} d-block">Completionist:
        {{ $game->hltb_completionist }}</span>
</div>
