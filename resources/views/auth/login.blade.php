@extends('public.template')

@section('title')
<title>{{ env('APP_NAME') }} - login</title>
@endsection

@section('content')
<h1 class="uk-heading-line uk-text-lead"><span>{{ __('Login') }}</span></h1>
@if(isset($message))

<div class="{{ $message['type'] }}-box">
    <ul>
        <li>{{ $message['content'] }}</li>
    </ul>
</div>

@endif
<div class="uk-flex uk-flex-center" uk-grid>
    <div class="uk-text-center">
        <img src="{{ asset('assets/images/lumen.png') }}" style="width: 100px;" alt="" srcset="">
    </div>
    <form class="uk-form-stacked uk-grid-small uk-wudth-1-1" method="POST" action="{{ route('login') }}" uk-grid>
        @csrf
        <div class="uk-width-1-1">
            <label class="uk-form-label" for="form-stacked-text">{{ __('E-Mail Address') }}</label>
            <div class="uk-form-controls">
                <input name="email" id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="uk-text-meta uk-text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="uk-width-1-1">
            <label class="uk-form-label" for="form-stacked-text">{{ __('Password') }}</label>
            <div class="uk-form-controls">
                <input name="password" id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" placeholder="Password" required autocomplete="password" >
                @error('password')
                <span class="uk-text-meta uk-text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="uk-width-1-1">
            <div class="uk-form-controls uk-margin-small">
                <label for=remember><input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
            </div>
            <div class="uk-form-controls">
                <button class="uk-button uk-button-primary">Login</button>
            </div>
        </div>
    </from>
</div>
@endsection


@section('requirements')
    {{ __('Login') }}
    <form method="POST" action="{{ route('login') }}">
    @csrf
    {{ __('E-Mail Address') }}
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
    <strong>{{ $message }}</strong>
    @enderror
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
    <strong>{{ $message }}</strong>
    @enderror
    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

    <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
    <button type="submit" class="btn btn-primary">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
@endsection