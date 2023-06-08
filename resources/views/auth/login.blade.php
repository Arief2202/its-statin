@extends('layouts.main')

@section('title')
Statin | Login
@endsection


@section('content')
    <div class="" style="width: 100%;">
        <div style="height: 15vh;">

        </div>
        <div class="row p-5 mt-5 d-flex justify-content-center">
            <img src="/img/logo_statin.png" alt="logo" style="width: 50%;">
        </div>
        <div class="row ps-5 pe-5 d-flex justify-content-center" style="width: 100%;">
            <div style="width:50%;">
                <form action="{{ route('login') }}" method="POST">@csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email">
                      @error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror
                      {{-- $errors->get('email') --}}
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="row" style="width: 100%;">
                        <div class="col">
                            Didn't have account ? <a class="display:inline;" href="/register">Register Now</div>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
