	
	<div id="container" style="padding-top:48px;">
		<h1>Order List</h1>
		<?php
			if(count($order)>0){
				foreach($order as $arr){
		?>
					<div class="row show-grid">
					
						<div class="col-lg-1">Order ID</div>
						<div class="col-lg-2">Email</div>
						<div class="col-lg-2">Telephone</div>
						<div class="col-lg-1">Name</div>
						<div class="col-lg-2">Extra</div>
						<div class="col-lg-2">Address</div>
						<div class="col-lg-2">Date Time</div>
					</div>
					<div class="row show-grid">
					
						<div class="col-lg-1"><?php echo $arr["id"];?></div>
						<div class="col-lg-2"><?php echo $arr["email"];?></div>
						<div class="col-lg-2"><?php echo $arr["telephone"];?></div>
						<div class="col-lg-1"><?php echo $arr["name"];?></div>
						<div class="col-lg-2"><?php echo $arr["extra"];?></div>
						<div class="col-lg-2"><?php echo $arr["address"];?></div>
						<div class="col-lg-2"><?php echo $arr["datetime"];?></div>
					</div>
		<?php 
					$arrDish = $arr["dish"];
					
					if(count($arrDish) >0){
					
						foreach($arrDish as $value){			
		?>			
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-lg-3">Dish ID</div>
						<div class="col-lg-3">Dish Name</div>
						<div class="col-lg-3">Chinese Name</div>
					</div>
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-lg-3"><?php echo $value["dish_id"];?></div>
						<div class="col-lg-3"><?php echo $value["dish_name"];?></div>
						<div class="col-lg-3"><?php echo $value["chinese_name"];?></div>
					</div>
		<?php
						}
					}
		?>
			<div class="row show-grid"><div class="col-lg-12">------</div></div>
		<?php
					
				}
				
			}
		?>
	</div>