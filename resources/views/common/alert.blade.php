<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;">
    <div class="toast toast-{{ $type }} fade hide" role="alert" data-delay="2000" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header-{{ $type }}">
            <strong class="mr-auto" id="mr-auto">{{ __('backend.system messages') }}</strong>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body" id="toast-body">
            {{ $message }}
        </div>
    </div>
</div>
