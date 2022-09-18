<?php 
	$obj_adminBack = new adminBack();
	if (isset($_GET['status'])) {
		$get_id = $_GET['id'];
		if ($_GET['status']=='edit') {
			$return_data = $obj_adminBack->getCatinfo_category($get_id);
		}
	}
	if (isset($_POST['up_ctg_btn'])) {
		$return_msg = $obj_adminBack->update_category($_POST);
	}

 ?>
 <?php if (isset($return_msg)) {
 	echo $return_msg;
 } ?>
 <form action="" method="post">
 	<div class="form-group">
        <input hidden type="text" name="up_ctg_id" class="form-control" value="<?php echo $return_data['ctg_id']; ?>">
    </div>
    <div class="form-group">
        <label for="up_ctg_name">Category Name</label>
        <input type="text" name="up_ctg_name" class="form-control" value="<?php echo $return_data['ctg_name']; ?>">
    </div>
    <div class="form-group">
        <label for="up_ctg_des">Category Description</label>
        <input type="text" name="up_ctg_des" class="form-control" value="<?php echo $return_data['ctg_des']; ?>">
    </div>
    <input type="submit" value="Update Category" name="up_ctg_btn" class="btn btn-primary">
    
</form>