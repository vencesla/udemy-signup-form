<?php 
$user_id = $_SESSION['user_id'];
$query = $db->prepare("SELECT name FROM users WHERE id = ?");
$query->execute([$user_id]);
$r = $query->fetch(PDO::FETCH_OBJ);
if(empty($r->name)) {
    $name = "Add Name";
}else{
    $name = "Update Name";
}
$name_value = $r->name;
?>
<!-- === Modal ==== -->
<div class="modal fade" id="name" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $name ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="update_name" id="update_name" class="form-control" placeholder="<?= $name ?>" value="<?= isset($name_value) ? $name_value : "" ?>">
                        <div class="name-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="change_name(this.form.update_name.value);">Update Name</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->