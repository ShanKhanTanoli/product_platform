<div wire:ignore.self class="modal fade" id="view-mail-modal" tabindex="-1" role="dialog"
    aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {!! $view->subject !!}
            </div>
            <div class="modal-body">
                <p>
                    {!! $view->message !!}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-block bg-gradient-dark" data-bs-dismiss="modal">
                    {{ trans('admin.modal-cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
