<x-guest-layout>
    <div x-data="{ tab: 'login' }" class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">

            <!-- Toggle Buttons -->
            <div class="flex justify-center mb-6">
                <button @click="tab = 'login'"
                        :class="tab === 'login' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-800'"
                        class="px-4 py-2 rounded-l-md font-semibold focus:outline-none w-1/2">
                    Login
                </button>
                <button @click="tab = 'register'"
                        :class="tab === 'register' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-800'"
                        class="px-4 py-2 rounded-r-md font-semibold focus:outline-none w-1/2">
                    Register
                </button>
            </div>

            <!-- Login Form -->
            <div x-show="tab === 'login'">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <x-primary-button class="w-full">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Register Form -->
            <div x-show="tab === 'register'" x-cloak>
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <x-primary-button class="w-full">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
