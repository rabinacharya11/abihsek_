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
      <table class="table tabe-hover table-bordered table-compact" id="list">
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
          $qry = $conn->query("SELECT * FROM `volunteering` ORDER BY `year` DESC");
          while ($row = $qry->fetch_assoc()) :
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
                  <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_volunteering">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button type="button" class="btn btn-danger btn-sm btn-flat delete_volunteering" data-id="<?php echo $row['id'] ?>">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
		$('.new_volunterexperience').click(function(){
			location.href = _base_url_+"admin/?page=volunterexperience/manage";
		})
		$('.manage_volunterexperience').click(function(){
			location.href = _base_url_+"admin/?page=volunterexperience/manage="+$(this).attr('data-id')
		})
		$('.delete_volunterexperience').click(function(){
		_conf("Are you sure to delete this detail?","delete_volunterexperience",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_volunterexperience($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=volunterexperience_delete',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					location.reload()
				}
			}
		})
	}
</script>
