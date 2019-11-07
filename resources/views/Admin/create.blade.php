<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bootstrap4</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
</head>
<body>
	<div class="container">
		<div  class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h1>Description</h1>
					</div>
					<div class="card-body">
						<form action="{{route('summernote.store')}}" method="POST">
							@csrf
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title" class="form-control">
							</div>
							<div class="form-group">
								<label for="des">Description</label>
								<textarea id="des" name="description" rows="10" cols="30"></textarea>
							</div>
							<input type="submit" name="publish" value="Publish" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#des').summernote({
			height: 200,            
			minHeight: null,             
			maxHeight: null,           
			focus: true,
			
			// toolbar: [
   //  // [groupName, [list of button]]
   //  ['style', ['bold', 'italic', 'underline', 'clear']],
   //  ['font', ['strikethrough', 'superscript', 'subscript']],
   //  ['fontsize', ['fontsize']],
   //  ['color', ['color']],
   //  ['para', ['ul', 'ol', 'paragraph']],
   //  ['height', ['height']]
   //  ]     
});
</script>
</body>
</html>