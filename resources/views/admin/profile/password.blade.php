@extends('admin.commun.base')
@section('title', __('Change password'))

@section('content')
    @include('admin.commun.header', ['title' => __('Change password')])
    <section class="w-full container mx-auto p-4 flex flex-col gap-4">
        <form action="{{ route('actions.profile.change') }}" method="POST" class="w-full flex flex-col gap-4 setting">
            @csrf
            <div class="w-full">
                <label for="old_password" class="font-black text-base text-gray-950">{{ __('Old password') }}</label>
                <input x-password type="password" id="old_password" name="old_password"
                    placeholder="{{ __('Old password') }}" />
            </div>
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="w-full">
                    <label for="new_password" class="font-black text-base text-gray-950">{{ __('New password') }}</label>
                    <input x-password type="password" id="new_password" name="new_password"
                        placeholder="{{ __('New password') }}" />
                </div>
                <div class="w-full">
                    <label for="confirm_password"
                        class="font-black text-base text-gray-950">{{ __('Confirm password') }}</label>
                    <input x-password type="password" id="confirm_password" name="confirm_password"
                        placeholder="{{ __('Confirm password') }}" />
                </div>
            </div>
            <div class="w-full flex items-center justify-between">
                <button type="submit"
                    class="block bg-primary px-8 py-2 ms-auto rounded-md text-white text-base outline-none font-bold hover:bg-opacity-60 focus:bg-opacity-60">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        x.Password();
    </script>
@endsection
