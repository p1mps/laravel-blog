@extends('app')

@section('content')

    <div class="container">
        <div class="row">
		    <div class="col-md-10 col-md-offset-1">

                @foreach($posts as $post)
                    <div class="row">
                    
                    <h5>{{ $post->name }} -  {{ $post->email }} - {{ $post->address }}</h5>
                    
                    <p>{{$post->text}}</p>
                    </div>
                @endforeach
                
                {!! $posts->render() !!} 
                
		    </div>
	    </div>
    </div>
@endsection
