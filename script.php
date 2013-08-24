<!DOCTYPE html>
<html>
	<head>
		<title>Image Extractor</title>
	</head>
	<body>
		<div style="margin: 0 auto; width: 960px; height: 60px; text-align: center; padding-top:30px;">
			<form>
				<input id="start" type="submit" name="start" value="Click Here to Start Download" />
			</form>
		</div>
		<script src="/static/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				//run as page is loaded
			});
			
			$('#start').click(function() {
				var form_data = {
					start: "start"
				};
				
				$.ajax({
					url: "download_images.php",
					type: 'POST',
					data: form_data,
					beforeSend: function() {
						$("div").html('<img src="/static/ajax-loader.gif" />');
					},
					success: function(result) {
						$('div').css("text-align", "left");
						$('div').html(result);
					}
				});
				return false;
			});
		</script>
	</body>
</html>