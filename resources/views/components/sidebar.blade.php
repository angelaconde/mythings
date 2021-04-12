<div class="col-12 d-lg-none text-center pb-2">
    <a href="#collapseSidebar" class="btn btn-dark text-right" role="button" data-toggle="collapse"
        aria-expanded="false" aria-controls="collapseSidebar">
        Toggle panel
    </a>
</div>
<div class="container-fluid col-12 col-lg-2 collapse dont-collapse" id="collapseSidebar">
    <div class="col-12 col-lg-2 p-3 mt-4 text-center">
        <img src="{{ asset('img/avatars\/' . Auth::user()->avatar) }}"
            class="avatar rounded-circle border border-dark" alt="avatar">
    </div>
    @include('components.addgame')
    @include('components.filters')
</div>
