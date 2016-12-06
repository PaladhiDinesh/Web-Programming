<script type="text/javascript" src="jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/53500fc571.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>	
<script>
	$(document).ready(function(){
		$('#name').keyup(function(){
			var query=$(this).val();
			if (query != '')
			{
				$.ajax({
					url:"search.php",
					method:"POST",
					data:{query,query},
					dataType:'json',
					success:function(data)
					{
						var autocomplete_data = [];
						$.each(data, function(key, value){
							autocomplete_data.push(value['admin']);
						});
						// console.log(autocomplete_data);
						$( "#name" ).autocomplete({
      						source: autocomplete_data
    					});
						// $('#userlist').fadeIn();
						// $('#userlist').html(data);
					}

				});
			}
		})
	});	
</script>