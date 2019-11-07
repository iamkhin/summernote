<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
		 		<div class="summernote">
		 			{!! $summernote->description !!}
		 		</div>
			</div>
		</div>
	</div>
	<script>
  $(document).ready(function() {
            $('.summernote').summernote('code', content);
        });
 
</script>
</body>
</html>