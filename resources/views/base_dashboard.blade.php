@extends('app')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
@endif


@if (session()->has('info'))
    <div class="alert alert-info">
        <ul>
              @foreach (session('info') as $info)
                  <li>{{ $info }}</li>
              @endforeach
        </ul>
    </div>
@endif

                        
                        

<div class="container">
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
            <a class="btn btn-default" href="{{URL::route('post.create')}}"> Insert new Article</a>
            <a class="btn btn-default" href="{{URL::route('post.index')}}"> List Articles</a>
                @yield('content_dashboard')
		</div>
	</div>
</div>
@endsection




