@extends('layouts.app')

@section('content')

    <h1>Edit {{ $film->name }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($film, array('route' => array('films.update', $film->id), 'method' => 'PUT','files' => true)) }}

    <div class="input-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('release_date', 'Release Date') }}
        {{ Form::text('release_date', Input::old('release_date'), array('required'=>'required','id'=>'datepicker','class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('rating', 'Rating') }}
        {{ Form::selectRange('rating', 1,5 ,Input::old('rating'), array('class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('ticket_price', 'Ticket Price') }}
        {{ Form::text('ticket_price', Input::old('ticket_price'), array('required'=>'required','class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('country', 'Country') }}
        {{ Form::text('country', Input::old('country'), array('required'=>'required','class' => 'form-control')) }}
    </div>

    <div class="input-group">
        {{ Form::label('genre', 'Genres') }}
        {{ Form::select('genres[]',$genres ,$film->genres->lists('id')->all(), array('multiple' => 'multiple','class' => 'form-control')) }}
    </div>
    <br/>
    <div class="input-group ">
        <img src="{{ $film->photo_url }}" width="171">
    </div><br/>

    <div class="input-group">
        {{ Form::label('photo_url', 'Image') }}
        {{ Form::file('photo_url', Input::old('photo_url'), array('required'=>'required','class' => 'form-control')) }}
    </div>
    <br/>

    {{ Form::submit('Update Film', array('class' => 'btn btn-primary input-group')) }}

    {{ Form::close() }}
@endsection