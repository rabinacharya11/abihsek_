<?php if ($_settings->chk_flashdata('success')): ?>
<script>
  alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
</script>
<?php endif; ?>

<div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <div class="card-tools">
        <a class="btn btn-block btn-sm btn-default btn-flat border-primary new_volunteering" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-hover table-bordered table-compact" id="list">
        <colgroup>
          <col width="5%">
          <col width="20%">
          <col width="20%">
          <col width="15%">
          <col width="35%">
          <col width="15%">
        </colgroup>
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Organization</th>
            <th>Role</th>
            <th>Year</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $qry = $conn->query("SELECT * FROM `volunteerexperience` ORDER BY `year` DESC");
          if ($qry) {
            while ($row = $qry->fetch_assoc()) {
              $desc = html_entity_decode($row['description']);
              $desc = strip_tags($desc);
              $desc = stripslashes($desc);
          ?>
              <tr>
                <th class="text-center"><?php echo $i++ ?></th>
                <td><b class="truncate-1"><?php echo ucwords($row['organization']) ?></b></td>
                <td><b class="truncate-1"><?php echo ucwords($row['role']) ?></b></td>
                <td><b class="truncate-1"><?php echo $row['year'] ?></b></td>
                <td><small class="truncate-1"><?php echo $desc ?></small></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" class="btn btn-primary btn-flat btn-sm manage_volunteerexperience">
                      <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm btn-flat delete_volunteerexperience" data-id="<?php echo $row['id'] ?>">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "Error: " . $conn->error; // Display error message if the query fails
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('.new_volunteerexperience').click(function() {
      location.href = _base_url_ + "admin/?page=volunteerexperience/manage";
    })
    $('.manage_volunteerexperience').click(function() {
      location.href = _base_url_ + "admin/?page=volunteerexperience/manage&id=" + $(this).attr('data-id');
    })
    $('.delete_volunteerexperience').click(function() {
      _conf("Are you sure to delete this detail?", "delete_volunteerexperience", [$(this).attr('data-id')]);
    })
    $('#list').dataTable();
  });

  function delete_volunteerexperience($id) {
    start_loader();
    $.ajax({
      url: _base_url_ + 'classes/Content.php?f=volunteerexperience_delete',
      method: 'POST',
      data: {
        id: $id
      },
      success: function(resp) {
        if (resp == 1) {
          location.reload();
        }
      }
    });
  }
</script>
