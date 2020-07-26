@extends('layouts.app')

@section('content')
<p>{{ $name }}</p>
<p>{{ $email }}</p>
<p>{{ $message }}</p>
<form method="POST">
  @csrf
  <button type="submit">Submit</button>
</form>
@endsection
