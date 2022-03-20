<script>
  //==== Ajax Request ====
  	
	var form 	 = $('#validation');
	var info_err = $('.info-error');
	var info_suc = $('.info-suc');
	var file_err = $('.file-error');
	var db_err 	 = $('.db-error');
	var loading  = $('.loading');
		
	var url = form.attr("action");
	var type = form.attr("method");

	function ajaxSubmit(){
        //======CsrfToken For Ajax Request=====
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        
		$.ajax({
			method: type,
			data: new FormData($('#validation')[0]),	
			url: url,		
		    processData: false,
		    contentType: false,
			//async: true,
			beforeSend: function(){
            	loading.show(); 
            },
			success: function(data){
				//console.log(data);
				if(data.success == true){
					info_suc.slideDown();
    				info_suc.delay(3000).slideUp(300);
    				if(data.update != true){
						$('#validation')[0].reset();
    				}
				} 
				if(data.success == false){
					info_err.hide().find('ul').empty();

					$.each(data.error, function(index, error){
						info_err.find('ul').append('<li>'+error+'</li>');
						//console.log(error);
					});
					info_err.slideDown();
    				info_err.delay(6000).slideUp(300);
				}
				if(data.upload == false){
					file_err.slideDown();
    				file_err.delay(5000).slideUp(300);
				}	
				if(data.error == true){					
					db_err.hide().find('label').empty();	
					db_err.find('label').append(data.status);	
					db_err.slideDown();
    				db_err.delay(5000).slideUp(300);
				}				
				loading.hide(); 
			},
			error: function(data){
				alert('error occurred! Please Check');
				loading.hide(); 
			}
		});
	}

</script>