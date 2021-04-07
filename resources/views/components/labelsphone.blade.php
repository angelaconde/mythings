<div class="col-6 d-block d-lg-none">
    <span class="badge {{ $game->wanted ? 'bg-success' : 'bg-secondary' }} w-100">Wanted</span>
    <span class="badge {{ $game->started ? 'bg-success' : 'bg-secondary' }} w-100">Started</span>
    <span class="badge {{ $game->finished ? 'bg-success' : 'bg-secondary' }} w-100">Finished</span>
    <span class="badge {{ $game->completed ? 'bg-success' : 'bg-secondary' }} w-100">Completed</span>
    <span class="badge {{ $game->abandoned ? 'bg-success' : 'bg-secondary' }} w-100">Abandoned</span>
</div>
<div class="col-6 d-block d-lg-none">
    <span class="badge {{ $game->owned ? 'bg-success' : 'bg-secondary' }} w-100">Owned</span>
    <span class="badge {{ $game->physical ? 'bg-success' : 'bg-secondary' }} w-100">Physical</span>
    <span class="badge {{ $game->digital ? 'bg-success' : 'bg-secondary' }} w-100">Digital</span>
    <span class="badge {{ $game->plus ? 'bg-success' : 'bg-secondary' }} w-100">Plus</span>
    <span class="badge {{ $game->now ? 'bg-success' : 'bg-secondary' }} w-100">Now</span>
</div>
