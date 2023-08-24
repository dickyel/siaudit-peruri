<!-- Add/Edit Temuan Modal -->
<div class="modal fade" id="editTemuanModal" tabindex="-1" role="dialog" aria-labelledby="editTemuanModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTemuanModalLabel">Edit Temuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editTemuanForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Form fields for editing Temuan data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
