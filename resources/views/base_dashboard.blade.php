@extends('app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
                <a class="btn btn-default" href="/dashboard/create"> Insert new Article</a>
                <a class="btn btn-default" href="/post"> List Articles</a>
                @yield('content_dashboard')
		</div>
	</div>
</div>
@endsection




