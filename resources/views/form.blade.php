@extends('layouts.app')

@section('script')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
  function onClick(e) {
    e.currentTarget.disabled = true;

    grecaptcha.ready(function() {
      grecaptcha.execute("{{ config('services.recaptcha.sitekey') }}", {action: "submit"}).then(function(token) {
        document.getElementById("recaptchaToken").value = token;
        document.getElementById("contactForm").submit();
      });
    });
  }
</script>
@endsection

@section('content')
<form method="POST" id="contactForm" class="pure-form pure-g pure-form-stacked">
  @csrf
  <input type="hidden" id="recaptchaToken" name="token" value="">

  @error('token')
    <div class="alert pure-u-1">
      <strong>{{ __('ReCaptcha error has occurred.') }}</strong>
    </div>
  @enderror

  <fieldset class="pure-u-1">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" id="name" name="name" class="pure-input-1" value="{{ old('name') }}" placeholder="{{ __('Your Name') }}">
    @error('name')
      <div class="alert">
        <strong>{{ $message }}</strong>
      </div>
    @enderror
  </fieldset>

  <fieldset class="pure-u-1">
    <label for="email">{{ __('Email Address') }}</label>
    <input type="email" id="email" name="email" class="pure-input-1" value="{{ old('email') }}" placeholder="{{ __('Your Email Address') }}">
    @error('email')
      <div class="alert">
        <strong>{{ $message }}</strong>
      </div>
    @enderror
  </fieldset>

  <fieldset class="pure-u-1">
    <label for="message">{{ __('Message') }}</label>
    <textarea id="email" name="message" rows="8" class="pure-input-1" placeholder="{{ __('Message') }}">{{ old('message') }}</textarea>
    @error('message')
      <div class="alert pure-u-1">
        <strong>{{ $message }}</strong>
      </div>
    @enderror
  </fieldset>

  <div class="pure-u-1 pure-u-sm-1-3">
    <button type="button" class="pure-button pure-button-primary pure-input-1" onclick="onClick(event)">{{ __('Confirm') }}</button>
  </div>
</form>
@endsection
