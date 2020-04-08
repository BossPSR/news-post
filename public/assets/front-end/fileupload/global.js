var baseurl = $('meta[name^=baseUrl]').attr('content');

function save_post(url,data,redirect = true) {
	$.ajax({
		  url: baseurl + url,
		  method:"POST",
		  data:data,
		  context: document.body
		}).done(function(resp) {

		if (resp.status == 'success') {
			 if (redirect == true) {
		  		window.location.href = resp.redirectUrl;
			  }else{
			  		window.location.reload();
			  }
			}else{
				console.log('Error !');
			}
		 
	});
	
}