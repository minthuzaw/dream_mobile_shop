<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h3 class="text-center">Login</h3>
        <p class="text-muted text-center">Please Fill Your Login</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Phone Number -->
            <div class="form-outline mb-4">
                <x-input class="form-control" type="phone" name="phone" :value="old('phone')" required autofocus />
                <x-label for="phone" :value="__('Phone')" />

            </div>

            <!-- Password -->
            <div class="form-outline mt-4">
                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-label for="password" :value="__('Password')" />

            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="mt-4">
                <x-button class="btn-block">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
