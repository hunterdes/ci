<html><head>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js" ></script>
	<script type="application/javascript">
	
	var matrix = new Array();
	
	var cellWidth = 30;
	var cellHeight = 30;
	var cellNumHori = 20;
	var cellNumVerti = 20;

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
		matrix = Array();
		while(x < cellWidth*cellNumHori){
		
			matrix[i] = new Array();
			while(y < cellHeight*cellNumVerti){	
				var x_1 = x + cellWidth;
				var y_1 = y + cellHeight;
				ctx.rect(x,y,x_1,y_1);

				ctx.stroke();
				var objBlock = new block(x,y,x_1,y_1);
				matrix[i][j] = objBlock;
				y += cellHeight;
				j += 1;
			}
			y = 0;
			j=0;
			x += cellWidth;
			i += 1;
			
		}
	}
	
	function checkRows(i){
	
		var whiteCount = 0;
		var blackCount = 0;
		
		for(var j=0;j<matrix[i].length;j++){
		
			if(blackCount <5 && whiteCount <5){
			
				var curFlag = matrix[i][j].getFlag(1);

				if(curFlag == 1){
					//black 
					if(blackCount >=0 && whiteCount ==0){
					
						blackCount ++;
					}
					else if(blackCount ==0 && whiteCount >0){
					
						whiteCount = 0;
						blackCount ++;
					}
					
				}
				else if(curFlag == -1){
					//white
					if(blackCount >0 && whiteCount ==0){
					
						blackCount = 0;
						whiteCount ++;
					}
					else if(blackCount ==0 && whiteCount >=0){
					
						whiteCount ++;
					}
				}
			}
			else{
				return true;
			}
		}
		
		return false;
	}
	
	function checkLeftCross(){
	
		//left
		var x = 0;
		var y = 0;

		for (var i=y;i<matrix[0].length;i++){
		
			var whiteCount = 0;
			var blackCount = 0;
			
			var x_tmp = x;
			var y_tmp = i;
		
			while(x_tmp<matrix.length && y_tmp>=0){
			
				var curFlag = matrix[x_tmp][y_tmp].getFlag(1);
				
				if(blackCount <5 && whiteCount <5){
				
					if(curFlag == 1){
					
						if(blackCount >=0 && whiteCount ==0){
						
							blackCount ++;
						}
						else if(blackCount ==0 && whiteCount >0){
						
							whiteCount = 0;
							blackCount ++;
						}
					}
					if(curFlag == -1){
					
						if(blackCount >0 && whiteCount ==0){
						
							blackCount = 0;
							whiteCount ++;
						}
						else if(blackCount ==0 && whiteCount >=0){
						
							whiteCount ++;
						}
					}
					
					if(blackCount >0){
						console.log(blackCount+"---"+whiteCount)
						if(blackCount == 5){
						
							return true;
						}
						
						if(whiteCount == 5){
						
							return true;
						}
					}
				}
				else{
					return true;
				}
				
				x_tmp ++;
				y_tmp --;
			}
		}
		
		var x = 0;
		var y = matrix[0].length-1;

		for (var j=x;j<matrix[0].length;j++){
		
			var whiteCount = 0;
			var blackCount = 0;
			
			var x_tmp = j;
			var y_tmp = y;
		
			while(x_tmp<matrix.length && y_tmp>=0){
			
				var curFlag = matrix[x_tmp][y_tmp].getFlag(1);
				
				if(blackCount <5 && whiteCount <5){
				
					if(curFlag == 1){
					
						if(blackCount >=0 && whiteCount ==0){
						
							blackCount ++;
						}
						else if(blackCount ==0 && whiteCount >0){
						
							whiteCount = 0;
							blackCount ++;
						}
					}
					if(curFlag == -1){
					
						if(blackCount >0 && whiteCount ==0){
						
							blackCount = 0;
							whiteCount ++;
						}
						else if(blackCount ==0 && whiteCount >=0){
						
							whiteCount ++;
						}
					}
					
					if(blackCount >0 || whiteCount>0){
					
						if(blackCount == 5){
						
							return true;
						}
						
						if(whiteCount == 5){
						
							return true;
						}
						console.log(blackCount+"--"+whiteCount)
					}
				}
				else{
				
					console.log("------------------------")
					return true;
				}
				
				x_tmp ++;
				y_tmp --;
			}
		}
		return false;
	}
	
	function checkRightCross(){
		
		var x = matrix[0].length-1;
		var y = 5;

		for (var i=y;i<matrix[0].length;i++){
		
			var whiteCount = 0;
			var blackCount = 0;
			
			var x_tmp = x;
			var y_tmp = i;
		
			while(x_tmp>0 && y_tmp>0){
				console.log(x_tmp+"=>"+y_tmp)
				var curFlag = matrix[x_tmp][y_tmp].getFlag(1);
				
				if(blackCount <5 && whiteCount <5){
				
					if(curFlag == 1){
					
						if(blackCount >=0 && whiteCount ==0){
						
							blackCount ++;
						}
						else if(blackCount ==0 && whiteCount >0){
						
							whiteCount = 0;
							blackCount ++;
						}
					}
					if(curFlag == -1){
					
						if(blackCount >0 && whiteCount ==0){
						
							blackCount = 0;
							whiteCount ++;
						}
						else if(blackCount ==0 && whiteCount >=0){
						
							whiteCount ++;
						}
					}
					
					if(blackCount >0 || whiteCount>0){
						if(blackCount == 5){
						
							return true;
						}
						
						if(whiteCount == 5){
						
							return true;
						}
					}
				}
				else{
					return true;
				}
				
				x_tmp --;
				y_tmp --;
			}
		}
		
		var x = 0;
		var y = 0;

		for (var j=x;j<matrix[0].length;j++){
		
			var whiteCount = 0;
			var blackCount = 0;
			
			var x_tmp = j;
			var y_tmp = y;
		
			while(x_tmp<matrix.length && y_tmp<matrix[0].length){
			
				var curFlag = matrix[x_tmp][y_tmp].getFlag(1);
				
				console.log(matrix.length+"~~~"+x_tmp+"++:"+y_tmp+"->black:"+blackCount+" white:"+whiteCount);
				
				if(blackCount <5 && whiteCount <5){
				
					if(curFlag == 1){
					
						if(blackCount >=0 && whiteCount ==0){
						
							blackCount ++;
						}
						else if(blackCount ==0 && whiteCount >0){
						
							whiteCount = 0;
							blackCount ++;
						}
					}
					if(curFlag == -1){
					
						if(blackCount >0 && whiteCount ==0){
						
							blackCount = 0;
							whiteCount ++;
						}
						else if(blackCount ==0 && whiteCount >=0){
						
							whiteCount ++;
						}
					}
					console.log("black:"+blackCount+" white:"+whiteCount);
					
					if(blackCount >0 || whiteCount>0){
					
						if(blackCount == 5){
						
							return true;
						}
						
						if(whiteCount == 5){
						
							return true;
						}
						console.log(blackCount+"--"+whiteCount)
					}
				}
				else{
					return true;
				}
				
				x_tmp ++;
				y_tmp ++;
			}
		}
		return false;
	}
	
	function checkColumns(i){
	
		var whiteCount = 0;
		var blackCount = 0;

		for(var j=0;j<matrix.length;j++){
			
			if(blackCount <5 && whiteCount <5){
		
				var curFlag = matrix[j][i].getFlag(1);
					
				if(curFlag == 1){
					//black 
					if(blackCount >=0 && whiteCount ==0){
					
						blackCount ++;
					}
					else if(blackCount ==0 && whiteCount >0){
					
						whiteCount = 0;
						blackCount ++;
					}
					
				}
				else if(curFlag == -1){
					//white
					if(blackCount >0 && whiteCount ==0){
					
						blackCount = 0;
						whiteCount ++;
					}
					else if(blackCount ==0 && whiteCount >=0){
					
						whiteCount ++;
					}
				}
			}
			else{
				return true;
			}
		}
		
		return false;
	}
	
	function checkwin(){
	
		var diagonallyMax = matrix.length - 5;
		var lastIndex = matrix.length-1;
		for(var i=0;i<matrix.length;i++){
			
			if(checkRows(i)){
			
				return true;
			}
		}
		
		for(var i=0;i<matrix[0].length;i++){
			
			if(checkColumns(i)){
			
				return true;
			}
		}
		
		if (checkLeftCross()){
		
			return true;
		}
		
		if(checkRightCross()){
		
			return true;
		}
		
		return false;
	}
	
	
	$( document ).ready(function() {

		var c = document.getElementById("canvas");
		var ctx = c.getContext("2d");
		ctx.fillStyle = "#FF0000";
		
		var turn = 0;
		
		function init(ctx){
		
			turn = 1;//black first
			//ctx.clear(true);
			ctx.clearRect(0, 0, c.width, c.height);
			generateMaxtrix(ctx);
		}
		
		init(ctx);
		
		c.addEventListener("mouseover",function(event){
			
			var x = event.x;
			var y = event.y;
			x -= c.offsetLeft;
			y -= c.offsetTop;
			
			for(var i=0;i<matrix.length;i++){
				
				for(var j=0;j<matrix[i].length;j++){
				
					if(x >= matrix[i][j].getX() && x < matrix[i][j].getX_1() && y >= matrix[i][j].getY() && y< matrix[i][j].getY_1()){
						//alert("---------------");
						//$("#lblDemo").html("i:"+i+",j:"+j);
					}
				}
			}
			
		});
		
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
						
						if(checkwin()){
							
							alert("Winning!!!")
							generateMaxtrix(ctx);
							break;
						}
						
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
	<label id="lblDemo"></label>
</body>
</html>