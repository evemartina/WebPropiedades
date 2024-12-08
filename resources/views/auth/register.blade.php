@extends('layouts.guest')


<div class="login-back d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: rgba(0, 0, 0, 0.5);">
    <div class="containerLogin p-5 rounded shadow-lg bg-white opacity-90">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-3">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a class="text-muted" href="{{ route('admin.dashboard') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
                <x-primary-button class="btn btn-primary ms-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
