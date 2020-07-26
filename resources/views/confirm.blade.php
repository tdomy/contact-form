@extends('layouts.app')

@section('content')
<form method="POST" class="pure-form pure-g pure-form-stacked">
  @csrf

  <fieldset class="pure-u-1">
    <label>{{ __('Name') }}</label>
    <div>{{ $name }}</div>
  </fieldset>

  <fieldset class="pure-u-1">
    <label>{{ __('Email Address') }}</label>
    <div>{{ $email }}</div>
  </fieldset>

  <fieldset class="pure-u-1">
    <label>{{ __('Message') }}</label>
    <div>{{ $message }}</div>
  </fieldset>

  <div class="pure-u-1 pure-u-sm-1-4 mb-1">
    <button type="submit" class="pure-button pure-button-primary pure-input-1">{{ __('Send') }}</button>
  </div>
  <div class="pure-u-1 pure-u-sm-1-24">
  </div>
  <div class="pure-u-1 pure-u-sm-1-4 mb-1">
    <button type="button" class="pure-button pure-input-1" onClick="history.back(); return false;">{{ __('Back') }}</button>
  </div>
</form>
@endsection
