<form id="info-form" action="<?php echo base_url();?>index.php/admin/update_dish" method="POST" data-id="<?php echo $dish->id;?>" >
	<input type="hidden"  name="id" value="<?php echo $dish -> id;?>"/>
	Chinese name: <input type="text" name="chinese_name" value="<?php echo $dish -> chinese_name;?>"/><br/>
	English name: <input type="text" name="name" value="<?php echo $dish -> name;?>"/><br/>
	Description: <textarea name="description"  value="<?php echo $dish -> description;?>"></textarea><br/>
	price: <input value="<?php echo $dish -> price;?>" name="price"/><br/>
	active: <input name="active" type="radio" value="true" <?php if($dish -> active == "true"){echo "checked";}?>/>YES<input name="active" type="radio" value="false" <?php if($dish -> active == "false"){echo "checked";}?>/>NO<br/>
	start date: <input type="text" id="start_date" name="start_date" value="<?php echo date('m/d/Y',strtotime($dish -> available_ordertime_start));?>"/><br/>
	end date:<input type="text" id="end_date" name="end_date" value="<?php echo date('m/d/Y',strtotime($dish -> available_ordertime_end))?>"/><br/>
	<input type="submit" name="submit" value="Submit">
</form>



<div id="img">
<img src="<?php echo base_url();?>assets<?php echo $dish -> image;?>" width="300px" height="150px"/>
</div>
<form id="img_form" action="<?php echo base_url();?>index.php/admin/upload_file" method="post" enctype="multipart/form-data" >
	<label for="file">Filename:</label>
	<input type="text" name="id" value="<?php echo $dish ->id;?>"><br>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="Submit" id="image_button">
</form>

<script>

$(document).ready(function(){

	$( "#start_date" ).datepicker();
	$( "#end_date" ).datepicker();
	
	$("#info-form").submit(function(e){
		e.preventDefault();
		
		var container = $("#container");

		$.ajax({
			type:'POST',
			url: $(this).attr('action'),
			data:$(this).serialize(),
			success:function(data){
				console.log("success");
				//$("#img").html(data);
				container.html(data);
				
			},
			error: function(data){
				console.log("error");
				console.log(data);
			}
		});
	});
	$("#img_form").submit(function(e){
			e.preventDefault();
			var data = new FormData();
			jQuery.each($('#file')[0].files, function(i, file) {
				data.append('file-'+i, file);
			});

			$.ajax({
				type:'POST',
				url: $("#img_form").attr('action')+"?id="+$("#img_form").find("input[name='id']").val(),
				data:data,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					console.log("success");
					$("#img").html(data);
				},
				error: function(data){
					console.log("error");
					console.log(data);
				}
			});
			
			
		
	});
});
</script>
