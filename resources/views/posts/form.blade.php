@extends('base_dashboard')

@section('content_dashboard')

@if(isset($post))
    {!!Form::model($post,['route' => ['post.update' , $post->id], 'id' => 'form', 'method' => 'PATCH'])!!}
@else
    {!!Form::open(['route' => 'post.store', 'id' => 'form'])!!}
@endif

<fieldset>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-8">
            <div class="form-group">
                {!!Form::label('name', 'Name *')!!}
                {!!Form::text('name', null , array( 'id' => 'name', 'class' => 'form-control', 'required' ))!!}
            </div>
            <div class="form-group">
                {!!Form::label('email', 'Email *')!!}
                {!!Form::email('email', null , array( 'id' => 'email', 'class' => 'form-control', 'required' ))!!}
            </div>
            <div class="form-group">
                {!!Form::label('address', 'Address *')!!}
                {!!Form::text('address',null,array('id' => 'content', 'class' => 'form-control'))!!}
            </div>
            <div class="form-group">
                {!!Form::label('text', 'Text *')!!}
                {!!Form::textarea('text',null,array('id' => 'content', 'class' => 'form-control'))!!}
            </div>
            
            <div class="clearfix"></div>
        </div>
    </div>
</fieldset>
<button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
@endsection
