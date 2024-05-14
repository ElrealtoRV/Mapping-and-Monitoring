<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" autofocus autocomplete="middle_name" />
            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="age" :value="__('age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="idnum" :value="__('idnum')" />
            <x-text-input id="idnum" class="block mt-1 w-full" type="idnum" name="idnum" :value="old('idnum')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('idnum')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="contnum" :value="__('contnum')" />
            <x-text-input id="contnum" class="block mt-1 w-full" type="number" name="contnum" :value="old('contnum')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('contnum')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="office" :value="__('office')" />
            <x-text-input id="office" class="block mt-1 w-full" type="text" name="office" :value="old('office')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('office')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="dept" :value="__('dept')" />
            <x-text-input id="dept" class="block mt-1 w-full" type="text" name="dept" :value="old('dept')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('dept')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="bdate" :value="__('bdate')" />
            <x-text-input id="bdate" class="block mt-1 w-full" type="date" name="bdate" :value="old('bdate')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('bdate')" class="mt-2" />
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
</x-guest-layout>
