<!-- === Modal ==== -->
 <?php
 $id = $_SESSION['user_id'];
 GLOBAL $db;
 $query = $db->prepare("SELECT bio FROM users WHERE id = ?");
 $query->execute([$id]);
 $r = $query->fetch(PDO::FETCH_OBJ);
 if(empty($r->bio)){
    $title_bio = "Add Bio";
 }else{
    $title_bio = "Update Bio";
 }
 $value_bio = $r->bio;
 ?>
<div class="modal fade" id="bio" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $title_bio ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="bio-error"></div>
                <form action="">
                    <div class="form group">
                        <textarea cols="30" rows="10" id="bio_user" class="form-control" placeholder="<?= $title_bio ?>"><?= isset($value_bio) ? $value_bio : ""?>
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="add_bio(this.form.bio_user.value);">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->