@extends('base_dashboard')


@section('content_dashboard')
    <div class="col-md-12">
<table class="table table-striped table-bordered" >
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Text</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td "col-md-1">{{$post->name}}</td>
                <td class="col-md-1">{{$post->email}}</td>
                <td class="col-md-3">{{$post->address}}</td>
                <td class="col-md-3">{{$post->text}}</td>
                <td class="col-md-2">
                    
                    <a href="{{URL::route('post.edit', [$post->id])}}" class="btn btn-default">Edit</a>
                    <div class="dashboard-buttons">
                {!!Form::model($post, ['route'=> 'post.destroy', 'method' => 'DELETE'])!!}
                {!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!!Form::close()!!}
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
    </div>
{!! $posts->render() !!} 
@endsection
