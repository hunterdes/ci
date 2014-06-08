<form id="info-form" action="<?php echo base_url();?>index.php/admin/create_dish" method="POST" >
	<input type="hidden"  name="id" value=""/>
	Chinese name: <input type="text" name="chinese_name" value=""/><br/>
	English name: <input type="text" name="name" value=""/><br/>
	Description: <textarea name="description"  value=""></textarea><br/>
	price: <input value="" name="price"/><br/>
	active: <input name="active" type="radio" value="true" />YES<input name="active" type="radio" value="false"/>NO<br/>
	start date: <input type="text" id="start_date" name="start_date"/><br/>
	end date:<input type="text" id="end_date" name="end_date"/><br/>
	<input type="submit" name="submit" value="Submit">
</form>
<script>

$(document).ready(function(){

	$( "#start_date" ).datepicker();
	$( "#end_date" ).datepicker();
	
	$("#info-form").submit(function(e){
		e.preventDefault();

		$.ajax({
			type:'POST',
			url: $(this).attr('action'),
			data:$(this).serialize(),
			success:function(data){
				console.log("success");
				//$("#img").html(data);
				$("#container").html(data);
			},
			error: function(data){
				console.log("error");
				console.log(data);
			}
		});
	});
});
</script>
