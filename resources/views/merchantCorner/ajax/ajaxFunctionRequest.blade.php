<script type="text/javascript">

	form.on('submit', function(e){
		e.preventDefault();
		var action = $(this).attr("action");
		var method = $(this).attr("method");
		alert(action);

		$.ajax({
			url 	 : action,		
			type 	 : method,
			dataType : 'json',
			data 	 : $(this).serialize(),	
			beforeSend: function(){
				//$("#btn-disabled").prop('disabled', true);
	        	loading.show(); 
	        },
			success: function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					if(data.update != true){
						form[0].reset();
					}
				} 

				if(data.error == true){					
					db_err.hide().find('label').empty();	
					db_err.find('label').append(data.status);	
					db_err.slideDown();
					db_err.delay(5000).slideUp(300);
				}	

				$("#btn-disabled").prop('disabled', false);
				loading.hide(); 
			},
			error: function(data){
				console.clear();
				var errors = $.parseJSON(data.responseText);

				console.log(errors);

				info_err.hide().find('ul').empty();

				$.each(errors, function(index, error){
					info_err.find('ul').append('<li>'+error+'</li>');
				});
				info_err.slideDown();
				info_err.delay(6000).slideUp(300);

				loading.hide(); 
				$("#btn-disabled").prop('disabled', false);
			}
		});
	}); 
	
</script>