@extends('layouts.main')

@section('title')
Statin | Register
@endsection


@section('content')
    <div class="" style="width: 100%;">
        <div class="row p-5 mt-2" style="width: 100%;">
            <img src="/img/logo_statin.png" alt="logo">
        </div>
        <div class="row ps-5 pe-5" style="width: 100%;">
            <form action="{{ route('register') }}" method="POST">@csrf
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                </div>
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
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                </div>
                <div class="row" style="width: 100%;">
                    <div class="col">
                        Have an account ? <a class="display:inline;" href="/login">Login Now</div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
              </form>
        </div>
    </div>
@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
