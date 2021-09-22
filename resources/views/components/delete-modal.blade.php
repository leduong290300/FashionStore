<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="#" id="form-delete">
        @csrf
        {{ method_field('DELETE') }}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ready to delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Confirm deletion you will lose all data about this</div>
            <input type="text" hidden value="">
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="btn-delete">Delete</button>
            </div>
        </div>
        </form>
    </div>
</div>


