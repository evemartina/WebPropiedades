@extends('layouts.guest')

<div class="login-back">
    <div class="containerLogin p-5 rounded shadow-lg bg-white">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? No te preocupes. Solo danos tu dirección de correo electrónico y te enviaremos un enlace de restablecimiento de contraseña que te permitirá elegir una nueva.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-primary">
                    {{ __('Enviar enlace de restablecimiento de contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
