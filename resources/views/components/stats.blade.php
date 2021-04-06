<div class="container col-12 mb-3">
    <div class="row">
        <div class="col-12 card my-2 p-0 border border-dark rounded-3 grey-bg">
            <!-- COLLAPSE -->
            <h5 class="card-header bg-dark text-white">
                <a class="text-white" data-toggle="collapse" href="#collapse-stats" aria-expanded="true"
                    aria-controls="collapse-stats" id="heading-stats">
                    <i class="fa fa-chevron-down float-right text-white"></i>
                </a>
            </h5>
            <!-- COLLAPSE END -->
            <div class="row g-0 collapse show mx-3" id="collapse-stats" aria-labelledby="heading-stats">
                <div class="col-12 col-lg-2 p-3 text-center">
                    <img src="{{ asset('img/avatars\/' . Auth::user()->avatar) }}"
                        class="avatar rounded-circle border border-dark" alt="...">
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card-body">
                        <h5 class="card-title text-center text-lg-start">Your Game Collection Stats</h5>
                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                <div class="text-center">
                                    <span class="font-weight-bold">Wanted:</span>
                                    <h3 class="font-weight-bold">
                                        {{ $stats->wanted }}</h3>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                <div class="text-center">
                                    <span class="font-weight-bold">Owned:</span>
                                    <h3 class="font-weight-bold">
                                        {{ $stats->owned }}</h3>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                <div class="text-center">
                                    <span class="font-weight-bold">Started:</span>
                                    <h3 class="font-weight-bold">
                                        {{ $stats->started }}</h3>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                <div class="text-center">
                                    <span class="font-weight-bold">Finished:</span>
                                    <h3 class="font-weight-bold">
                                        {{ $stats->finished }}</h3>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                <div class="text-center">
                                    <span class="font-weight-bold">Completed:</span>
                                    <h3 class="font-weight-bold">
                                        {{ $stats->completed }}</h3>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                <div class="text-center">
                                    <span class="font-weight-bold">Abandoned:</span>
                                    <h3 class="font-weight-bold">
                                        {{ $stats->abandoned }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-2 white-bg p-2 my-4 text-center">
                    <h2 class="font-weight-bold">Total:</h2>
                    <h1 class="font-weight-bold">{{ $stats->total }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
