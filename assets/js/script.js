function bindMenuEvent(){

	$(".add-button").click(function(){
	
		//alert("esrgsergsegresg");
			
		var $this = $(this);
		var data_id = $this.attr("data-id");
		var data_name = $this.attr("data-name");
		var data_chinese_name = $this.attr("data-chinese_name");
		var data_image = $this.attr("data-img");
		var data_price = $this.attr("data-price");
		var data_url = $this.attr("data-url");
		var data_remain = $this.attr("data-remain");
		
		if(data_remain > 0){
			$.ajax({
			  type: "POST",
			  url: data_url,
			  data: { data_id: data_id, data_name: data_name,data_chinese_name:data_chinese_name,data_image:data_image,data_price:data_price }
			}).done(function(html) {
			  $("#your_orders").html(html);
			  data_remain --;
			  $this.attr("data-remain",data_remain);
			});
		}
		else{
			alert("The order is full")
			return false;
		}
		
		// bindMenuEvent();
		// bindOrderEvent();
		// bindSubmit();
		// bindValidation();
	});
}

function bindOrderEvent(){

	$(".delete-button").click(function(){
		
		var $this = $(this);
		var id = $this.attr("data-id");
		var url = $this.attr("data-url");
		
		$.ajax({
		  type: "POST",
		  url: url,
		  data: { data_id: id}
		}).done(function(html) {
		  $("#your_orders").html(html);
		  $("div.dish_menu button[data-id='"+id+"']").each(
			function(){
			
				var limit = $(this).attr("data-limit");
				$(this).attr("data-remain",limit);
				
			}
		  );
		});
		
		// bindMenuEvent();
		// bindOrderEvent();
		// bindSubmit();
		// bindValidation();
	});
}

function bindSubmit(){
	$("#components").submit(
		function(event){
		
			event.preventDefault();
			var action = $(this).attr("action");
			$.ajax({
				type:"POST",
				url:action,
				data:$(this).serialize()
			}).done(function( msg ) {
				$("#msgbox").html(msg);
			});
			// bindMenuEvent();
			// bindOrderEvent();
			// bindSubmit();
			// bindValidation();
		}
	);
}

function bindValidation(){

	$("#components").validate({
			
		rules:{
		
			"checkorder":{
				required: true
			}
		},
		messages: {
		
			"checkorder":{
				required: "Please order before you sumit"
			}
		}
	});
	
	$("#components").data("validator").settings.ignore = "";
}


/***************************************
Admin
******************************************/
function orderForm(){

	$("#input_daily_order").change(
		function(){
			var url = $(this).attr("data-url");
			var value = $(this).val();
			
			$.ajax({
				url: url,
				type: 'post',
				data: {'value': value},
				success: function(data) {
					$("#messagebox_limit").html(data);
				}
			});
		}
	);
}
function bindDishEditForm(){

	$("a.edit-dish").click(
		function(){
		
			var container = $(this).parent().parent().next();
		
			if($(this).parent().parent().next().text() == ""){
			
				var id = $(this).attr("data-id");
				var url = $(this).attr("data-url");
			
				$.ajax({
					url: url,
					type: 'post',
					data: {'id': id},
					success: function(data) {
						container.html(data);
					}
				});
			}
			else{
			
				$(this).parent().parent().next().html("");
			}
		}
	);
	$("a.delete-dish").click(
		function(){
		
			var container = $("#container");
			
			var id = $(this).attr("data-id");
			var url = $(this).attr("data-url");
		
			$.ajax({
				url: url,
				type: 'post',
				data: {'id': id},
				success: function(data) {

					container.html(data);
				}
			});
		}
	);
}