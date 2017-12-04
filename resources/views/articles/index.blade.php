@extends('layouts.app');

@section('content')
	<div class="row">
		@forelse($articles as $article)
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>
							Chan
					</span>

					<span class="pull-right">{{ $article->created_at->diffForHumans() }}</span>
				</div>
				<div class="panel-body">
					<div>
						{{ $article->shortContent }}

						<a href="/articles/{{ $article->id }}">Read more</a>
					</div>
					
				</div>
				<div class="panel-footer clearfix" style="background: white">
					<i class="fa fa-heart pull-right"></i>

					@if($article->user_id == Auth::id())
						<form class="pull-right" style="margin-left:25px " action="/articles/{{ $article->id }}" method="POST">

							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger btn-sm">
								Delete
							</button>
						</form>
					@endif
				</div>
				
			</div>
		</div>
		@empty
			No Articles.

		@endforelse	
	</div>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
			{{ $articles->links() }}
		</div>
	</div>
@endsection	