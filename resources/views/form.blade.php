@extends('layouts.app')

@section('content')
<form method="POST">
  @csrf
  <input type="text" name="name" length="20">
  @error('name')
    <span>
      <strong>{{ $message }}</strong>
    </span>
  @enderror
  <input type="email" name="email">
  @error('email')
    <span>
      <strong>{{ $message }}</strong>
    </span>
  @enderror
  <textarea name="message"></textarea>
  @error('message')
    <span>
      <strong>{{ $message }}</strong>
    </span>
  @enderror

  <button type="submit">Submit</button>
</form>
@endsection
