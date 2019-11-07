<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			@foreach($contents as $content)
			<div class="col-4">
				<div  class="card">
					<div class="card-body">
						{!! $content->description !!}
					</div>
					<div>
						<a href="{{route('summernote.show',$content->id)}}" class="btn btn-primary">View</a>
						<a href="{{route('summernote.edit',$content->id)}}" class="btn btn-primary">Edit</a>
						
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
	</div>
</body>
</html>