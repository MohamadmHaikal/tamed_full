<!DOCTYPE html>
<html>
<head>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="{{asset('editor.js')}}"></script>
		<script>
			$(document).ready(function() {
				$("#demo-editor-bootstrap").Editor();
			});
		</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="{{asset('editor.css')}}" type="text/css" rel="stylesheet"/>


</head>
<body>
		<div class="container-fluid">
			<div class="row">
				<h2 class="demo-text">A demo of jQuery / Bootstrap based editor</h2>
				<div class="container">
					<div class="row">
						<div class="col-lg-6 nopadding">
							<textarea id="demo-editor-bootstrap" dir="rtl"> </textarea>
						</div>
					</div>
				</div>
			</div>
		</div>


</body>
</html>
