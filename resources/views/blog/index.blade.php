<!DOCTYPE html>
<html>
<head>
	<title>Laravel Application</title>

	<link rel="stylesheet" type="text/css" href="{{ url('packages/bootstrap-4.3.1/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('packages/fontawesome/css/all.css') }}">
</head>
<body>
	<div class="container">
		@if(session()->get('success'))
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
					{!! session()->get('success') !!}
				</div>
			</div>
		</div>
		@endif
		<div class="row mt-2">
			<div class="col-md-12 mb-3 mt-3">
				<div class="d-flex align-items-center">
					<h3 class="mr-2">Blogs</h3>
					<a href="{{ url('blog/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Blog</a>
				</div>
			</div>
			<div class="col-md-12 mb-5">
				<div class="row">
					<div class="col-md-4">
						<a href="{{ url('blog/show', $blogs->last()->id) }}" class="card-text text-dark">
							<img src="{{ url('images/sample-image.png') }}" width="100%">
						</a>
					</div>
					<div class="col-md-8">
						<div class="d-flex justify-content-between align-items-center mb-3">
							<div>
								<small class="mr-2">
									<i class="far fa-clock"></i>
									{{ date('F d, Y', strtotime($blogs->last()->created_at)) }}
								</small>
								<small>
									<i class="far fa-user"></i>
									{{ $blogs->last()->author_name }}
								</small>
							</div>
							<div>
							  <a href="{{ url('blog/edit', $blogs->last()->id) }}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
							  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							</div>
						</div>
						<a href="{{ url('blog/show', $blogs->last()->id) }}" class="card-text text-dark">
							<h5>{{ $blogs->last()->title }}</h5>
							<p>{{ $blogs->last()->content }}</p>
						</a>
					</div>
				</div>
			</div>
			@foreach($blogs as $i => $blog)
			<div class="col-md-4">
				<a href="{{ url('blog/show', $blog->id) }}" class="card-text text-dark">
					<div class="card border-0">
						<div class="card-body p-0">
							<img src="{{ url('images/sample-image.png') }}" width="100%">
							<div class="mt-2" style="position: relative;">
								<div class="d-flex justify-content-between align-items-center mb-2">
									<div>
										<small class="mr-2">
											<i class="far fa-clock"></i>
											{{ date('F d, Y', strtotime($blog->created_at)) }}
										</small>
										<small>
											<i class="far fa-user"></i>
											{{ $blog->author_name }}
										</small>
									</div>
									<div>
									  <a href="{{ url('blog/edit', $blog->id) }}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
									  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
									</div>
								</div>
								<h5>{{ $blog->title }}</h5>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="row text-center mt-3">
			<div class="col-md-12">
				{!! $blogs->links() !!}
			</div>
		</div>
	</div>

	<script type="text/javascript" src="{{ url('packages/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('packages/fontawesome/js/all.js') }}"></script>
</body>
</html>