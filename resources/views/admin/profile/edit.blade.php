@extends('admin.commun.base')
@section('title', __('Edit profile'))

@section('content')
    @include('admin.commun.header', ['title' => __('Edit profile')])
    <section class="w-full container mx-auto p-4 flex flex-col gap-4">
        <form action="{{ route('actions.profile.update') }}" method="POST" class="w-full flex flex-col gap-4">
            @csrf
            <h2 class="w-max text-lg lg:text-2xl font-black text-gray-950">{{ __('General') }}</h2>
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="w-full">
                    <label for="first_name" class="font-black text-base text-gray-950">{{ __('First name') }}</label>
                    <input type="text" id="first_name" name="first_name" placeholder="{{ __('First name') }}"
                        value="{{ $data->first_name }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
                <div class="w-full">
                    <label for="last_name" class="font-black text-base text-gray-950">{{ __('Last name') }}</label>
                    <input type="text" id="last_name" name="last_name" placeholder="{{ __('Last name') }}"
                        value="{{ $data->last_name }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
            </div>
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="w-full">
                    <label for="identity" class="font-black text-base text-gray-950">{{ __('Identity') }}</label>
                    <input type="text" id="identity" name="identity" placeholder="{{ __('Identity') }}"
                        value="{{ $data->identity }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
                <div class="w-full">
                    <label for="nationality" class="font-black text-base text-gray-950">{{ __('Nationality') }}</label>
                    <input type="text" id="nationality" name="nationality" placeholder="{{ __('Nationality') }}"
                        value="{{ $data->nationality }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
            </div>
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="w-full">
                    <label for="birth_date" class="font-black text-base text-gray-950">{{ __('Birth Date') }}</label>
                    <input x-date type="date" id="birth_date" name="birth_date" placeholder="{{ __('Birth Date') }}"
                        value="{{ $data->birth_date }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
                <div class="w-full">
                    <div class="w-full">
                        <label for="gender" class="font-black text-base text-gray-950">{{ __('Gender') }}</label>
                        <select x-select id="gender" name="gender" placeholder="{{ __('Gender') }}"
                            class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary">
                            <option value="male" @if ($data->gender === 'male') selected @endif>{{ __('Male') }}
                            </option>
                            <option value="female" @if ($data->gender === 'female') selected @endif>{{ __('Female') }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <h2 class="w-max text-lg lg:text-2xl font-black text-gray-950 mt-2">{{ __('Contact') }}</h2>
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="w-full">
                    <label for="email" class="font-black text-base text-gray-950">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" placeholder="{{ __('Email') }}"
                        value="{{ $data->email }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
                <div class="w-full">
                    <label for="phone" class="font-black text-base text-gray-950">{{ __('Phone') }}</label>
                    <input type="tel" id="phone" name="phone" placeholder="{{ __('Phone') }}"
                        value="{{ $data->phone }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
            </div>
            <div class="w-full">
                <label for="address" class="font-black text-base text-gray-950">{{ __('Address') }}</label>
                <input type="text" id="address" name="address" placeholder="{{ __('Address') }}"
                    value="{{ $data->address }}"
                    class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
            </div>
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="w-full">
                    <label for="state" class="font-black text-base text-gray-950">{{ __('State') }}</label>
                    <input type="text" id="state" name="state" placeholder="{{ __('State') }}"
                        value="{{ $data->state }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
                <div class="w-full">
                    <label for="city" class="font-black text-base text-gray-950">{{ __('City') }}</label>
                    <input type="text" id="city" name="city" placeholder="{{ __('City') }}"
                        value="{{ $data->city }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                </div>
                <div class="w-full">
                    <label for="zipcode" class="font-black text-base text-gray-950">{{ __('Zipcode') }}</label>
                    <input type="number" id="zipcode" name="zipcode" placeholder="{{ __('Zipcode') }}"
                        value="{{ $data->zipcode }}"
                        class="appearance-none w-full rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
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
        x.Select().DatePicker();
    </script>
@endsection
