<!-- color -->
@php
if (strpos($game->hltb_story, 'Mins')) {
    $colorStory = 'badge-info';
} elseif (filter_var($game->hltb_story, FILTER_SANITIZE_NUMBER_INT) < 30) {
    $colorStory = 'badge-info';
} elseif (filter_var($game->hltb_story, FILTER_SANITIZE_NUMBER_INT) > 100) {
    $colorStory = 'badge-danger';
} else {
    $colorStory = 'badge-warning';
}
if (strpos($game->hltb_completionist, 'Mins')) {
    $colorCompletionist = 'badge-info';
} elseif (filter_var($game->hltb_completionist, FILTER_SANITIZE_NUMBER_INT) < 30) {
    $colorCompletionist = 'badge-info';
} elseif (filter_var($game->hltb_completionist, FILTER_SANITIZE_NUMBER_INT) > 100) {
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
