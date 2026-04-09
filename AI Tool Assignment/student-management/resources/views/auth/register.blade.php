@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden mt-8">
    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <h2 class="text-lg font-bold text-gray-800">{{ __('Register Account') }}</h2>
    </div>

    <div class="p-6">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">{{ __('Name') }}</label>
                <input id="name" type="text" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                @error('name')
                    <p class="text-red-500 text-sm mt-1"><strong>{{ $message }}</strong></p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <p class="text-red-500 text-sm mt-1"><strong>{{ $message }}</strong></p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <p class="text-red-500 text-sm mt-1"><strong>{{ $message }}</strong></p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block text-gray-700 font-medium mb-2">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition shadow">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
