<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login.siswa') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="nisn" :value="__('Nisn')" />
            <x-text-input id="nisn" class="block mt-1 w-full" type="number" name="nisn" :value="old('nisn')" required autofocus autocomplete="Nisn" />
            <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('/login', []) }}">
                Login Petugas
            </a>

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
