<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 100px; right: 25px; z-index: 999999">
    @if (session('status'))
        <div class="toast toast-success fade show bgo-dark" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto text-success">Success</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('status') }}
            </div>
        </div>
    @endif
    {{-- Unauthorized Errors --}}
    @if (session('unauthorized'))
        <div class="toast toast-error fade show bgo-dark" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto text-danger">
                    You don't have permission
                </strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Unfortunately, that road has been blocked off as you don't have permission to go there!
            </div>
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="toast toast-error fade show bgo-dark" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto text-danger">Error</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ $error }}
                </div>
            </div>
        @endforeach
    @endif

    <div class="toast-dynamic"></div>
</div>
