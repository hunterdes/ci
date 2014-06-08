<div class="container" style="padding-top:48px;">	
	<h2>Dish Menu</h2>
	<div class="row">
	  <div class="col-lg-3">image</div>
	  <div class="col-lg-4">dish name</div>
	  <div class="col-lg-3">price</div>
	  <div class="col-lg-1"></div>
	</div>
	<style>
		label.error {
        
			color:red;
		}
	</style>
	
	<script>
	$(document).ready(function(){

		bindMenuEvent();
		bindOrderEvent();		
		bindValidation();	
		bindSubmit();
	});
	</script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js"></script>
	<?php if(count($dishes)>0){?>
		<?php foreach($dishes as $key => $value){?>
			<div class="row">
			  <div class="col-lg-3"><img src="<?php echo base_url()."assets".$value->image;?>" width="100px"/></div>
			  <div class="col-lg-4"><?php echo $value->chinese_name;?></div>
			  <div class="col-lg-3"><?php echo $value->price;?></div>
			  <div class="col-lg-1"><button class="btn add-button" data-id="<?php echo $value->id;?>" data-name="<?php echo $value->name;?>" data-chinese_name="<?php echo $value->chinese_name;?>" data-img="<?php echo $value->image;?>" data-price="<?php echo $value->price?>" data-url="<?php echo base_url().'index.php/home/ajax_order_food'?>">order</button></div>
			</div>
		<?php } ?>
	<?php }?>
	<form class="form-horizontal" style="width:800px;" id="components" action="<?php echo base_url()?>index.php/home/book_food" method="post">
			<fieldset>

	<h2>Your Current Order</h2>
	<div id="your_orders">
		<?php 

		if(count($orders)>0){
	
			foreach($orders as $key => $arr){
	?>		
	<div class="row">
		<div class="col-lg-2"><img src="<?php echo base_url()."assets".$arr["image"];?>" width="100px"/></div>
		<div class="col-lg-1"><?php echo $arr["chinese_name"];?></div>
		<div class="col-lg-1"><?php echo $arr["price"];?></div>
		<div class="col-lg-1"><?php echo $arr["count"];?></div>
		<div class="col-lg-1">
				<a class="btn btn-danger delete-button" href="#" data-id="<?php echo $key;?>" data-url="<?php echo base_url()."index.php/home/delete_order";?>">
					<i class="icon-trash icon-white"></i>
						Delete
				</a>
		</div>
		<input id="orderid" type="hidden" name="orderid[]" type="text" class="form-control" value="<?php echo $key?>" />
		<input id="ordernumber" type="hidden" name="ordernumber[]" type="text" class="form-control" value="<?php if(count(array_values($orders))>0){echo array_values($orders)[0]["count"];}else echo 0;?>"/>
	</div>
	
	
	<?php
		}
	?>
		<input id="checkorder" type="hidden" required name="checkorder" value="yes">
	<?php
		}else{
	?>
		<input id="checkorder" type="hidden" required name="checkorder" value="">
	<?php
		}
	?>
	
	<!---->
	</div>
	<h2>Please Enter your details</h2>
	<div>
		
				
				<div class="form-group">

					<label class="control-label" for="emailinput" >Email</label>
					<div class="controls">
						<input id="emailinput" name="emailinput" type="text" placeholder="Please input your email" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="phoneinput" required>Phone</label>
					<input id="phoneinput" name="phoneinput" type="text" placeholder="Please input your Phone" class="form-control" required/>
				</div>
				<div class="form-group">
					<label class="control-label" for="nameinput" required>Name</label>
					<input id="nameinput" name="nameinput" type="text" placeholder="Please input your Name" class="form-control" required/>
				</div>
				<div class="form-group">
					<label class="control-label" for="nameinput" required>Address</label>
					<textarea id="addressinput" name="addressinput" type="text" placeholder="Please input your address" class="form-control" required>
					</textarea>
				</div>
				<div class="form-group">
					<label class="control-label" for="nameinput">Extra</label>
					<textarea id="extrainput" name="extrainput" type="text" placeholder="Please input your Extra" class="form-control">
					</textarea>
				</div>
				
				<button value="1" class="btn">Submit</button>
			
		<script>
		
		$(document).ready(function(){

		});
		</script>
	</div>
	</fieldset>
		</form>
		<div id="msgbox"></div>
</div>
	