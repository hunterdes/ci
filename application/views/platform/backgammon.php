<html><head>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js" ></script>
	<script type="application/javascript">
	function drawlines(ctx){
	
		for(var i =30;i<600;i+=30){
			ctx.moveTo(0,i);
			ctx.lineTo(800,i);
			ctx.stroke();
		}
		
		for(var i =40;i<800;i+=40){
			ctx.moveTo(i,0);
			ctx.lineTo(i,600);
			ctx.stroke();
		}
	}
	
	var matrix = new Array();

	function block(x,y,x_1,y_1){
	
		this.x = x;
		this.y = y;
		this.x_1 = x_1;
		this.y_1 = y_1;
		this.flag = 0;
	}
	
	block.prototype.getX = function(){return this.x;}
	block.prototype.getY = function(){return this.y;}
	block.prototype.getX_1 = function(){
	
		return this.x_1;
	}
	block.prototype.getY_1 = function(){
	
		return this.y_1;
	}
	block.prototype.getFlag = function(){
	
		return this.flag;
	}
	
	block.prototype.setFlag= function(flag){
	
		this.flag = flag;
	}
	
	
	function generateMaxtrix(ctx){
		var x =0;
		var y = 0;
		var i = 0;
		var j = 0;
		while(x < 600){
		
			matrix[i] = new Array();
			while(y < 600){	
				var x_1 = x + 30;
				var y_1 = y + 30;
				ctx.rect(x,y,x_1,y_1);
				
				matrix
				ctx.stroke();
				var objBlock = new block(x,y,x_1,y_1);
				matrix[i][j] = objBlock;
				y += 30;
				j += 1;
			}
			y = 0;
			j=0;
			x += 30;
			i += 1;
			
		}
	}
	
	function checkwin(x,y){
	
		console.log("check win for:"+x+"=="+y);
	}
	
	
	$( document ).ready(function() {

		var c = document.getElementById("canvas");
		var ctx = c.getContext("2d");
		ctx.fillStyle = "#FF0000";
		
		var turn = 0;
		
		function init(ctx){
		
			turn = 1;//black first
			//ctx.clear(true);
			generateMaxtrix(ctx);
		}
		
		init(ctx);
		
		c.addEventListener('click', function(event) {

			var x = event.x;
			var y = event.y;
			x -= c.offsetLeft;
			y -= c.offsetTop;
			
			for(var i=0;i<matrix.length;i++){
				
				for(var j=0;j<matrix[i].length;j++){
				
					
					if(x >= matrix[i][j].getX() && x < matrix[i][j].getX_1() && y >= matrix[i][j].getY() && y< matrix[i][j].getY_1()&&matrix[i][j].getFlag() == 0){
						
						var centerX =  matrix[i][j].getX() + (matrix[i][j].getX_1() - matrix[i][j].getX()) / 2;
						var centerY = matrix[i][j].getY() + (matrix[i][j].getY_1() - matrix[i][j].getY()) / 2;
						var radius = 0.667*(matrix[i][j].getX_1() - matrix[i][j].getX()) / 2 
						console.log(matrix[i][j]);
						ctx.beginPath();
						ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
						if(turn==1){
							ctx.fillStyle = 'black';
							matrix[i][j].setFlag(1);
						}
						else if(turn == -1){
						
							ctx.fillStyle = 'white';
							matrix[i][j].setFlag(-1);
						}
						ctx.fill();
						ctx.lineWidth = 5;
						ctx.strokeStyle = 'black';
						ctx.stroke();
						
						if(turn==1){
			
							turn = -1;
						}
						else if(turn==-1){
						
							turn = 1;
						}
						
						checkwin(i,j);
						
						break;
					}
				}
			}
			
			

		}, false);
		
		
	});
	</script>
</head>
<body>
	<h1>Welcome to <?php echo $title;?></h1>
	<canvas id="canvas" width="600" style="border:1px solid" height="600"></canvas>
</body>
</html>