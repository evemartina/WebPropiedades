@extends('layouts.guest')

<div class="login-back d-flex justify-content-center align-items-center"
    style="min-height: 100vh; background-color: rgba(0, 0, 0, 0.5);">
    <div class="containerLogin p-5 rounded shadow-lg bg-white opacity-90">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="form-control" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Reset Password Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-primary">
                    {{ __('Restablecer Contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
