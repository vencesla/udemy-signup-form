<?php 
$user_id = $_SESSION['user_id'];
$query = $db->prepare("SELECT linkedin FROM users WHERE id = ?");
$query->execute([$user_id]);
$r = $query->fetch(PDO::FETCH_OBJ);
if(empty($r->linkedin)) {
    $linkedin = "Add Linkedin";
}else{
    $linkedin = "Update Linkedin";
}
$linkedin_value = $r->linkedin;
?>
<!-- === Modal ==== -->
<div class="modal fade" id="lkd" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $linkedin ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="lkd_user" id="lkd_user" class="form-control" placeholder="Add Linkedin Account" value="<?= isset($linkedin_value) ? $linkedin_value : ''?>">
                        <div class="lkd-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="add_linkedin_account(this.form.lkd_user.value);">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->