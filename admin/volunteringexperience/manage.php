<?php if ($_settings->chk_flashdata('success')): ?>
<script>
  alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif; ?>

<?php
if (isset($_GET['id'])) {
  $qry = $conn->query("SELECT * FROM volunteerexperience WHERE id = '{$_GET['id']}' ");
  $row = $qry->fetch_assoc();
  $id = $row['id'];
  $organization = $row['organization'];
  $role = $row['role'];
  $year = $row['year'];
  $description = html_entity_decode($row['description']);
}
?>

<div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h5 class="card-title">Volunteer Experience</h5>
    </div>
    <div class="card-body">
      <form id="volunteer_experience">
        <div class="row details">
          <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="" class="control-label">Organization</label>
              <textarea name="organization" cols="30" rows="2" class="form-control"><?php echo isset($organization) ? $organization : '' ?></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="" class="control-label">Role</label>
              <textarea name="role" cols="30" rows="2" class="form-control"><?php echo isset($role) ? $role : '' ?></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="" class="control-label">Year</label>
              <select name="year" id="" class="select custom-select custom-select-sm">
                <?php
                for ($y = 0; $y < 100; $y++) {
                  $_year = date('Y') - $y;
                  echo "<option " . ((isset($year) && $year == $_year) ? "selected" : "") . ">" . $_year . '</option>';
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="" class="control-label">Description</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control summernote"><?php echo (isset($description)) ? $description : '' ?></textarea>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary btn-sm" form="volunteerexperience"><?php echo isset($_GET['id']) ? "Update" : "Save" ?></button>
      <a class="btn btn-primary btn-sm" href="./?page=volunteerexperience">Cancel</a>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.select').select2();

    $('#volunteerexperiencee').submit(function(e) {
      e.preventDefault();
      start_loader();
      $.ajax({
        url: _base_url_ + "classes/Content.php?f=volunteerexperience_save",
        method: "POST",
        data: $(this).serialize(),
        error: err => {
          alert_toast("An error occurred", 'error');
          console.log(err);
        },
        success: function(resp) {
          if (resp != undefined) {
            resp = JSON.parse(resp);
            if (resp.status == 'success') {
              location.href = _base_url_ + "admin/?page=volunteerexperience";
            } else {
              alert_toast("An error occurred", 'error');
              console.log(resp);
              end_loader();
            }
          }
        }
      })
    });

    $('.summernote').summernote({
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ol', 'ul', 'paragraph', 'height']],
        ['table', ['table']],
        ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
      ]
    });
  });
</script>
