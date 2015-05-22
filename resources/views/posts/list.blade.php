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
                <td>
                    <a href="{{URL::route('post.edit', [$post->id])}}" class="btn btn-default">Modifica</a>
                {!!Form::model($post, ['route'=> 'post.destroy' ,$post->id, 'method' => 'DELETE'])!!}
                {!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}
                {!!Form::close()!!}
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
@endsection