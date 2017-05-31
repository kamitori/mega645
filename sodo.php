<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tạo số mega ngẫu nhiên</title>
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<script src="/jquery/dist/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-44810671-3', 'auto');
		ga('send', 'pageview');
	</script>
	<style>
		#cv{
			/*border: 2px solid #333;*/
			padding: 15px;
			margin-top: 15px;
			margin-left:15px;
		}
	</style>
</head>
<body>
	<canvas id="cv" height="450" width="450"></canvas>

	<script>
		var data = {};
		var canvas = document.getElementById('cv');
      	var context = canvas.getContext('2d');
		function getData(){
			$.ajax({
				url : '/getdata.php',
				type: 'GET',
				success: function(json){
					data = $.parseJSON( json,true );
					canvas.width = data.length*10+20;
					draw();
				}
			})
		}

		function draw(){
			preDraw();
		}

		function preDraw(){
			// Trục Y
			context.beginPath();
			context.moveTo(0,0);
			context.lineTo(0, canvas.width);
			context.lineWidth = 2;
			context.stroke();

			//Trục X
			context.beginPath();
			context.moveTo(0,canvas.height);
			context.lineTo(canvas.width, canvas.height);
			context.lineWidth =2;
			context.stroke();

			//Đánh số trục Y
			context.beginPath();
			context.moveTo(0,5);
			context.lineTo(5, 5);
			context.strokeStyle = '#ff0000';
			context.lineWidth =2;
			context.stroke();

			
			for(var i=data.length;i>0;i--){

			}
		}
		getData();
	</script>
</body>
</html>