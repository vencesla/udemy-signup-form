<!-- === Modal ==== -->
<div class="modal fade" id="password" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Password</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group mb-2">
                        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current password">
                        <div class="current-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New password">
                        <div class="new-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="change_password(this.form.current_password.value, this.form.new_password.value);">Update password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->