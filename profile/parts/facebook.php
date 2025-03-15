<?php 
$user_id = $_SESSION['user_id'];
$query = $db->prepare("SELECT facebook FROM users WHERE id = ?");
$query->execute([$user_id]);
$r = $query->fetch(PDO::FETCH_OBJ);
if(empty($r->facebook)) {
    $facebbok = "Add Facebook";
}else{
    $facebbok = "Update Facebook";
}
$facebbok_value = $r->facebook;
?>
<!-- === Modal ==== -->
<div class="modal fade" id="fbk" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $facebbok ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                     <input type="text" name="fbk" id="fbk_user" class="form-control" 
                     placeholder="Add Facebook Account" value="<?= isset($facebbok_value) ? $facebbok_value : ''?>">
                     <div class="fbk-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="add_facebook_account(this.form.fbk_user.value);">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->