
<div id="container" style="padding-top:48px;">
	<a id="add_dish" class="btn" data-url="<?php echo base_url();?>index.php/admin/add_dish">Add Dish</a>
	<div id="dvAdd"></div>
	<h1>Dishes List</h1>
	<?php
		if(count($dishes)>0){
	?>
		<div class="row-fluid show-grid">
				
			<div class="col-lg-5">Order ID</div>
			<div class="col-lg-2">name</div>
			<div class="col-lg-3">Available Time</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1"></div>
		</div>
	<?php
			foreach($dishes as $item){
	?>
				<div class="row show-grid">
				
					<div class="col-lg-5">
						<img src="<?php echo base_url();?>assets/<?php echo $item->image?>" width="400px" height="300px"/>
					</div>
					<div class="col-lg-2"><?php echo $item->name;?></div>
					<div class="col-lg-3"><?php echo $item->available_ordertime_end?></div>
					<div class="col-lg-1"><a data-id="<?php echo $item->id;?>" data-url="<?php echo base_url();?>index.php/admin/edit_dish" class="btn btn-default edit-dish">Edit</a></div>
					<div class="col-lg-1"><a data-id="<?php echo $item->id;?>" data-url="<?php echo base_url();?>index.php/admin/delete_dish" class="btn btn-default delete-dish">Delete</a></div>
				</div>
				<div class="editform"></div>
	<?php
			}
		}
	?>
	
</div>
<script>
$(document).ready(function(){

	bindDishEditForm();
	$("#add_dish").click(
		function(e){
		
			e.preventDefault();
			var url = $(this).attr("data-url");
			
			$.ajax({
				type:'POST',
				url: url,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					console.log("success");
					$("#dvAdd").html(data);
				},
				error: function(data){
					console.log("error");
					console.log(data);
				}
			});
		}
	);
	
});
</script>