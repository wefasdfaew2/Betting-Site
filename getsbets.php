<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
jQuery(document).ready(function() {  
		$.ajax({
		url: 'http://api.nfldata.apiphany.com/trial/XML/Teams?subscription-key=fe046f1cd089439a9d3aeb3491e91cc9',
		type: 'GET',
		})
		.done(function(data) {
		console.log("success");
		document.write(data);
		})
		.fail(function() {
		console.log("error");
		});
		});
</script>123