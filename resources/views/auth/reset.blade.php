@extends('auth.commun.base')
@section('title', __('Reset Password'))

@section('content')
    <form onsubmit="{{ route('actions.reset.show', $token) }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <div class="w-full">
            <label for="password" class="font-black text-base text-gray-950">{{ __('New password') }}</label>
            <input x-password type="password" id="password" name="password" placeholder="{{ __('New password') }}" />
        </div>
        <div class="w-full">
            <label for="confirm_password" class="font-black text-base text-gray-950">{{ __('Confirm password') }}</label>
            <input x-password type="password" id="confirm_password" name="confirm_password"
                placeholder="{{ __('Confirm password') }}" />
        </div>
        <div class="w-full flex items-center justify-between">
            <button type="submit"
                class="block bg-primary px-8 py-2 ms-auto rounded-md text-white text-base outline-none font-bold hover:bg-opacity-60 focus:bg-opacity-60">
                {{ __('Reset') }}
            </button>
        </div>
    </form>
@endsection
