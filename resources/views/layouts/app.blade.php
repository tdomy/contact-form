<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" />
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/grids-responsive-min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @yield('script')
  </head>
  <body>
    <header>
      <div class="header-menu pure-menu pure-menu-horizontal">
        <ul class="pure-menu-list">
          <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
            <a href="#" id="menuLink1" class="pure-menu-link">{{ LaravelLocalization::getCurrentLocaleNative() }}</a>
            <ul class="pure-menu-children">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="pure-menu-item">
                  <a class="pure-menu-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <main>
      @yield('content')
    </main>
  </body>
</html>
