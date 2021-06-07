<style>
    html {
        position: relative;
        min-height: 100%;
    }

    body {
        margin-bottom: 60px;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
    }

</style>

<footer class="footer bg-dark">
    <div class="container text-center bg-dark">
        <span class="text-muted mr-3">© {{ now()->year }} My Things</span>
        <span class="text-muted">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#aboutModal">
                About us
            </button>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#termsModal">
                Terms and conditions
            </button>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#privacyModal">
                Privacy policy
            </button>
            <a href="{{ route('contact') }}" class="btn btn-link">Contact us</a>
        </span>
    </div>
    @include('components.legal-modals')
</footer>
