<link rel='stylesheet' id='camera-css'  href='<?php echo base_url();?>assets/js/camera/css/camera.css' type='text/css' media='all'>
<script type='text/javascript' src='<?php echo base_url();?>assets/js/camera/scripts/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/js/camera/scripts/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/js/camera/scripts/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='<?php echo base_url();?>assets/css/js/bootstrap.js'></script> 

<!--<div class="fluid_container">
	<div class="camera_wrap camera_azure_skin" id="camera_wrap_1" >
		<?php
		
			foreach($dishes as $value){
		?>
		<div data-src="<?php echo base_url();?>assets/<?php echo $value->image;?>" data-thumb="<?php echo base_url();?>assets/<?php echo $value->image;?>">
			<div class="camera_caption fadeFromBottom">
				<?php echo $value->description;?>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</div>-->
<div id="myCarousel" class="carousel slide">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php
			$index = 0;
			foreach($dishes as $value){
		?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $index;?>" class="<?php if($index==0){echo "active";}?>"></li>
		<?php
				$index++;
			}
		?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php
			$index = 0;
			foreach($dishes as $value){
				if($index ==0){
		?>
		<div class="item active">
			<div class="fill" style="background-image:url('<?php echo base_url();?>assets/<?php echo $value->image;?>');"></div>
			<div class="carousel-caption">
				<h1><?php echo $value->description;?></h1>
			</div>
		</div>
		<?php
			}
			else{
		?>
		<div class="item">
			<div class="fill" style="background-image:url('<?php echo base_url();?>assets/<?php echo $value->image;?>');"></div>
			<div class="carousel-caption">
				<h1><?php echo $value->description;?></h1>
			</div>
		</div>
		<?php 
				}
				$index ++;
			}
		?>
		
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="icon-prev"></span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="icon-next"></span>
	</a>
</div>
	<div class="container">
		<h1>Welcome to Xiaohao Kitchen</h1>
	</div>
	<!--<p>Thumbnails with fixed height</p>
	<div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
		<div data-thumb="<?php echo base_url();?>assets/js/camera/images/slides/thumbs/bridge.jpg" data-src="<?php echo base_url();?>assets/js/camera/images/slides/bridge.jpg">
			<div class="camera_caption fadeFromBottom">
				Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
			</div>
		</div>
		<div data-thumb="<?php echo base_url();?>assets/js/camera/images/slides/thumbs/leaf.jpg" data-src="<?php echo base_url();?>assets/js/camera/images/slides/leaf.jpg">
			<div class="camera_caption fadeFromBottom">
				It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
			</div>
		</div>
		<div data-thumb="<?php echo base_url();?>assets/js/camera/images/slides/thumbs/road.jpg" data-src="<?php echo base_url();?>assets/js/camera/images/slides/road.jpg">
			<div class="camera_caption fadeFromBottom">
				<em>It's completely free</em> (even if a donation is appreciated)
			</div>
		</div>
		<div data-thumb="<?php echo base_url();?>assets/js/camera/images/slides/thumbs/sea.jpg" data-src="<?php echo base_url();?>assets/js/camera/images/slides/sea.jpg">
			<div class="camera_caption fadeFromBottom">
				Camera slideshow provides many options <em>to customize your project</em> as more as possible
			</div>
		</div>
		<div data-thumb="<?php echo base_url();?>assets/js/camera/images/slides/thumbs/shelter.jpg" data-src="<?php echo base_url();?>assets/js/camera/images/slides/shelter.jpg">
			<div class="camera_caption fadeFromBottom">
				It supports captions, HTML elements and videos and <em>it's validated in HTML5</em> (<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.pixedelic.com%2Fplugins%2Fcamera%2F&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;group=0&amp;user-agent=W3C_Validator%2F1.2" target="_blank">have a look</a>)
			</div>
		</div>
		<div data-thumb="<?php echo base_url();?>assets/js/camera/images/slides/thumbs/tree.jpg" data-src="<?php echo base_url();?>assets/js/camera/images/slides/tree.jpg">
			<div class="camera_caption fadeFromBottom">
				Different color skins and layouts available, <em>fullscreen ready too</em>
			</div>
		</div>
	</div>-->
	<div class="container">
		<h2>Today`s food</h2 >
		<h3>Click to order</h3>
		<?php if(count($today_dish)>0){?>
		<?php foreach($today_dish as $key => $value){?>
			<a href="<?php echo base_url();?>index.php/home/menu">
				<img width="400px" height="300px" src="<?php echo base_url();?>assets/<?php echo $value->image?>"/>
			</a>
		<?php } ?>
		<?php }?>
	</div>



<script>
    // jQuery(function(){

		// jQuery('#camera_wrap_1').camera({
			
			// thumbnails: false
		// });
		// /*height: '400px',
			// loader: 'bar',
			// pagination: false,*/
	// });
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

