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
		*{
			color:#fff;
			background: #64B5F6;
		}
	</style>
</head>
<body>
	<?php 
		$arr_number = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45);
		if(isset($_SESSION['created'])){
			if((time()-$_SESSION['created'])>76400){
				$_SESSION['created'] = time();
				$_SESSION['number'] = array(array_rand($arr_number,6));
			}
		}else{
			$_SESSION['created'] = time();
			$_SESSION['number'] = array(array_rand($arr_number,6));
		}
		if(isset($_POST['count'])){
			$_SESSION['number'] = array();
			for($i=0;$i<$_POST['count'];$i++){
				$arr_tmp = array_rand($arr_number,6);
				if(!in_array($arr_tmp, $_SESSION['number'])){
					$_SESSION['number'][] = $arr_tmp;
				}else{
					$arr_tmp = array_rand($arr_number,6);
					if(!in_array($arr_tmp, $_SESSION['number'])){
						$_SESSION['number'][] = $arr_tmp;
					}else{
						$arr_tmp = array_rand($arr_number,6);
						if(!in_array($arr_tmp, $_SESSION['number'])){
							$_SESSION['number'][] = $arr_tmp;
						}else{
							$_SESSION['number'][] = array_rand($arr_number,6);
						}
					}
				}
			}
			$_SESSION['created'] = time();
		}else{
			$tmp = $_SESSION['number'][0];
			$_SESSION['number'] = array($tmp);
		}
	?>
	<div class="row">
		<div class="container text-center">
			<h1>Website tạo số Mega 6/45</h1>
			<br/>
			<a href="/thongke.php" class="btn btn-lg text-danger"><h2>Thống kê xổ số cho bạn nào ko thích random</h2></a>
			<form class="form-inline" method="POST">
				<div class="form-group">
					<label for="count"><h3>Số bộ số: </h3></label>
					<input type="number" class="form-control input-lg" id="count" value="<? if(isset($_POST['count'])) echo $_POST['count']; else echo 1;?>" min="1" max="9999" name="count" style="width:150px;display:inline-block;">
					<button class="btn btn-success btn-lg" type="submit">Tạo số</button>
				</div>
			</form>
			<div class="col-md-offset-3 col-md-6 col-xs-12">
			<?php
				if(count($_SESSION['number'])>0){ 
					foreach ($_SESSION['number'] as $key => $value) {
						echo 
						'<div data-id="'.($key+1).'" class="col-xs-2 text-left"><h1><b>'.$arr_number[$value['0']].'</b></h1></div>'.
						'<div class ="col-xs-2 text-left"><h1><b>'.$arr_number[$value['1']].'</b></h1></div>'.
						'<div class ="col-xs-2 text-left"><h1><b>'.$arr_number[$value['2']].'</b></h1></div>'.
						'<div class ="col-xs-2 text-left"><h1><b>'.$arr_number[$value['3']].'</b></h1></div>'.
						'<div class ="col-xs-2 text-left"><h1><b>'.$arr_number[$value['4']].'</b></h1></div>'.
						'<div class ="col-xs-2 text-left"><h1><b>'.$arr_number[$value['5']].'</b></h1></div>';
					}
				}
			?>
			</div>
		</div>
	</div>
	<script>
		function choose(id){
			$("[data-id="+id+"]").css('background','red');
			$("[data-id="+id+"] *").css('background','red');
			$("[data-id="+id+"]").next().css('background','red');
			$("[data-id="+id+"]").next().find('*').css('background','red');
			$("[data-id="+id+"]").next().next().css('background','red');
			$("[data-id="+id+"]").next().next().find('*').css('background','red');
			$("[data-id="+id+"]").next().next().next().css('background','red');
			$("[data-id="+id+"]").next().next().next().find('*').css('background','red');
			$("[data-id="+id+"]").next().next().next().next().css('background','red');
			$("[data-id="+id+"]").next().next().next().next().find('*').css('background','red');
			$("[data-id="+id+"]").next().next().next().next().next().css('background','red');
			$("[data-id="+id+"]").next().next().next().next().next().find('*').css('background','red');

			var arr_tmp = [
				$("[data-id="+id+"]").text(),
				$("[data-id="+id+"]").next().text(),
				$("[data-id="+id+"]").next().next().text(),
				$("[data-id="+id+"]").next().next().next().text(),
				$("[data-id="+id+"]").next().next().next().next().text(),
				$("[data-id="+id+"]").next().next().next().next().next().text(),
			];
			return arr_tmp;
		}
	</script>
</body>
</html>