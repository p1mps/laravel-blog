@extends('base_dashboard')


@section('content_dashboard')
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
                <td>{{$post->name}}</td>
                <td>{{$post->email}}</td>
                <td>{{$post->address}}</td>
                <td>{{$post->text}}</td>
                <td class="col-md-4">
                    
                    <a href="{{URL::route('post.edit', [$post->id])}}" class="btn btn-default">Edit</a>
                    <div class="dashboard-buttons">
                {!!Form::model($post, ['route'=> 'post.destroy', 'method' => 'DELETE'])!!}
                        <input type="hidden" name="id" value="{{ $post->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}
                {!!Form::close()!!}
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
{!! $posts->render() !!} 
@endsection
