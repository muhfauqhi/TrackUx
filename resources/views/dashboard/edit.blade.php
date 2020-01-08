@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Profile</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('trackux') }}"> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<form method="post" enctype="multipart/form-data" action="">
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            @if(auth()->user()->avatar != null)
            <div class="hero-profile">
                <img src="{{ asset('storage/'.auth()->user()->avatar) }}" alt="">
            </div>
            <div class="mt-4 float-right">
                <a href="{{ route('avatar.delete') }}" class="btn-danger btn-sm" onclick="event.preventDefault();
                document.getElementById('remove-avatar').submit();">Delete Avatar</a>
            </div>
                @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') ?? auth()->user()->email }}" required autofocus>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address" name="address" value="{{ old('address') ?? auth()->user()->address }}" required autofocus>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gender:</strong>
            <br>
            <input id="gender" type="radio" value="Male" class="{{ $errors->has('address') ? ' is-invalid' : '' }}" name="gender" checked required autofocus> Male <br>
            <input id="gender" type="radio" value="Female" class="{{ $errors->has('address') ? ' is-invalid' : '' }}" name="gender" required autofocus> Female
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Phone" name="phone" value="{{ old('phone') ?? auth()->user()->phone }}" required autofocus>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Avatar:</strong>
            <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
<form action="{{ route('avatar.delete') }}" method="post" id="remove-avatar">
    @csrf
    {{ method_field('DELETE') }}
</form>
@endsection
