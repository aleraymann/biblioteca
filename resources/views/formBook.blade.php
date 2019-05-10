@extends('layouts.app')
@section('content')

<div class="card-body">
  @if(!isset($id))
  <form method="post" action="{{url("/books/save")}}">
    @else
    <form method="post" action="{{url("/books/save/$id")}}">
      @endif
      @csrf
      <fieldset class="col-lg-5 offset-2">
        <div class="form-row">
          <div class="form-group col-lg-12">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ isset($books->title) ? $books->title:'' }}" placeholder="Title">
          </div>
          <div class="form-group col-lg-12">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ isset($books->author) ? $books->author:'' }}" placeholder="Author">
          </div>
          <div class="form-group col-lg-3">
            <label for="">Employee</label>
            <select name="id_user">
              <option>Select Employee</option>
              @foreach($usersForm as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button class="btn btn-outline-primary">Save</button>
        <a href="/dashboard" class="btn btn-outline-danger">Cancel</a>
      </fieldset>
      {{csrf_field() }}
    </form>
    @if($errors->any())
    <div class="card-footer">
      @foreach($errors->all() as $i)
      <div class="alert alert-danger" role="alert">
        {{$i}}
      </div>
      @endforeach
    </div>
    @endif
    @endsection
