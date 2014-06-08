<script>
$(document).ready(function(){

	bindOrderEvent();
});
</script>
<?php 

		if(count($orders)>0){
	
			foreach($orders as $key => $arr){
	?>		
	<div class="row" data-id="<?php echo $key?>">
		<div class="col-lg-2"><img src="<?php echo base_url()."assets".$arr["image"];?>" width="100px"/></div>
	    <div class="col-lg-1"><?php echo $arr["chinese_name"];?></div>
	    <div class="col-lg-1"><?php echo $arr["price"];?></div>
	    <div class="col-lg-1 count"><?php echo $arr["count"];?></div>
		<div class="col-lg-1">
				<a class="btn btn-danger delete-button" href="#" data-id="<?php echo $key;?>" data-url="<?php echo base_url()."index.php/home/delete_order";?>">
					<i class="icon-trash icon-white"></i>
						Delete
				</a>
		</div>
		<input id="orderid" type="hidden" name="orderid[]" type="text" class="form-control" value="<?php echo $key?>" />
		<input id="ordernumber" type="hidden" name="ordernumber[]" type="text" class="form-control" value="<?php if(count(array_values($orders))>0){echo array_values($orders)[0]['count'];}else echo 0;?>"/>
	</div>
	<?php
		}
	?>
		<input  id="checkorder" type="hidden" required name="checkorder" value="yes">
	<?php
		}else{
	?>
		<input id="checkorder" type="hidden" required name="checkorder" value="">
	<?php
		}
	?>
	
	<script>
		
	$(document).ready(function(){

		bindValidation();
		bindSubmit();
	});
	</script>