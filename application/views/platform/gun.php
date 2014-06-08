<html><head>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js" ></script>
	<script type="application/javascript">
	var graph = function(){}
	graph.prototype.ctx;
	graph.prototype.init = function(){
	
		ctx = $('#canvas')[0].getContext("2d");
	}
	graph.prototype.drawBall = function(x,y){
		  
		  ctx.clearRect(0,0,1024,800);
		  ctx.beginPath();
		  ctx.arc(x, y, 10, 0, Math.PI*2, true); 
		  ctx.closePath();
		  ctx.fill();
	}
		// var x = 150;
		// var y = 150;
		// var dx = 2;
		// var dy = 4;
		// var ctx;
		// function init() {
		  // ctx = $('#canvas')[0].getContext("2d");
		  // return setInterval(draw, 10);
		// }
		function draw() {
		  ctx.clearRect(0,0,300,300);
		  ctx.beginPath();
		  ctx.arc(x, y, 3, 0, Math.PI*2, true); 
		  ctx.closePath();
		  ctx.fill();
		  x += dx;
		  y += dy;
		}
		
	var gravity = function(){
	}
	
	gravity.prototype.x = 0;
	gravity.prototype.y = 0;
	gravity.prototype.g = 9.8;
	
	gravity.prototype.getAngle = function(x1,y1,x2,y2){
	
		return Math.acos(x1 / Math.sqrt((x1-x2)*(x1-x2) + (y1-y2)*(y1-y2)))* 180 / Math.PI;
	}
	
	gravity.prototype.Shoot = function(statX,statY,v,t,angle){
		var v_v = v*Math.sin(angle*Math.PI/180);
		var v_h = v*Math.cos(angle*Math.PI/180);
		this.x = statX+t*v_h;
		this.y = statY-v_v*t + this.g*t^2/2;
	}
	
	var graphItem = function(){
	
		this.x = 0;
		this.y = 0;
		
	}
	
	
	$( document ).ready(function() {
	// Handler for .ready() called.

		var obj_grav = new gravity();
		var obj_graph = new graph();
		obj_graph.init();
		
		$("#btn_start").click(function(){
			
			var t = 0;
			var t_gap = 10;
			var x = 150;
			var y = 150;
			var ctx = $('#canvas')[0].getContext("2d");
			var fireNumber = new Array();
			
			function gameFrame(){
			
				t += t_gap;
				$("#spanTime").text(t);
				draw();
			}
			
			function draw() {
			  ctx.clearRect(0,0,1024,800);
			  ctx.beginPath();
			  var i =0;
			  while(i < fireNumber.length){
				  var objBall = fireNumber[i];
				  var x = objBall.x;
				  var y = objBall.y;
				  
				  if(x < 1024 && y < 800){
				  
					  ctx.arc(x, y, 3, 0, Math.PI*2, true); 
					  ctx.fill();
					  x += 2;
					  y += 4;
					  objBall.x = x;
					  objBall.y = y;
					  fireNumber[i] = objBall;
					  i++;
				  }
				  else{
				  
					fireNumber.splice(i,1);
				  }
			  }
			  ctx.closePath();
			}
			
			$('#canvas').click(function(evt){
				var objBall = new graphItem();
				objBall.x = 0;
				objBall.y = 0;
				fireNumber.push(objBall);
				
			});

			setInterval(gameFrame,1);
		});
		
		
		// $('#canvas').click(function(evt){
			// setInterval(
				// function(){
					// console.log(evt.clientX+"=="+evt.clientY);
					
					// var angle = obj_grav.getAngle(evt.clientX,evt.clientY,0,800);
					
					// var v = 15;
					
					// obj_grav.Shoot(0,800,v,i,angle);
					
					// console.log(obj_grav.x+"==="+obj_grav.y);
					
					// obj_graph.drawBall(obj_grav.x,obj_grav.y);
					
					// console.log(angle);
				// },10);
		// });
		

		
	});
	</script>
</head>
<body>
	<?php?>
	<h1>Welcome to <?php echo $title;?></h1>
	<button id="btn_start" value="1">Start</button>
	<span id="spanTime"></span>
	<canvas id="canvas" width="1024" style="border:1px solid" height="800"></canvas>
</body>
</html>