
<!DOCTYPE HTML>
<html>
	<head>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>

	<script src="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="<?=base_url();?>assets/editor/editor.js"></script>
		<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
				$("#gilaki").click(function(){
				    var txt =$(".Editor-editor").text();
				   	alert(txt);
				});
			});
		</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="<?=base_url();?>assets/editor/editor.css" type="text/css" rel="stylesheet"/>
		<title>LineControl | v1.1.0</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<h2 class="demo-text">LineControl Demo</h2>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 nopadding">
							<textarea id="txtEditor"></textarea> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid footer">
			<p class="pull-right">&copy; Suyati Technologies <script>document.write(new Date().getFullYear())</script>. All rights reserved.</p>
		</div>
		<input type="button" id="gilaki" style="width:600px; height:200px;">
	</body>
</html>
