<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div id="adas"></div>
<script>
var sa = "Writed by Suphi";
setInterval(function () {$.post('backend.php', {sa:sa}, function(response){ 
	 $("#adas").html(response)
	 
});  }, 60000);

</script>
