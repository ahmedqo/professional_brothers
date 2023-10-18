@extends('guest.commun.base')
@section('title', __('Our Prices'))

@section('content')
    <section class="relative w-full overflow-hidden py-10 lg:py-20 clip-1 2xl:container mx-auto">
        <img src="{{ asset('img/BREAK-PAGE.png') }}" alt="{{ __('Our Prices') }}"
            class="object-cover object-left lg:object-center w-full h-full absolute inset-0 -scale-x-110 rtl:scale-x-110 scale-y-110" />
        <div class="absolute inset-0 w-full h-full skew-x-[-24deg] rtl:skew-x-[24deg] pointer-events-none">
            <div class="absolute top-0 bottom-0 right-0 rtl:right-auto rtl:left-0 h-full w-[130%] bg-primary bg-opacity-40">
            </div>
            <div class="absolute top-0 bottom-0 right-0 rtl:right-auto rtl:left-0 h-full w-[70%] bg-primary bg-opacity-40">
            </div>
            <div class="absolute top-0 bottom-0 w-full h-full -right-[66.66%] rtl:right-auto rtl:-left-[66.66%] bg-primary">
            </div>
        </div>
        <div class=" 2xl:p-8 flex pointer-events-none">
            <div class="w-max text-white mx-auto flex gap-3 lg:gap-6 items-center pointer-events-auto z-[1]">
                <div
                    class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-gray-50 before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-accent after:bg-opacity-50 after:h-full after:w-full">
                </div>
                <h3 class="font-black text-4xl lg:text-7xl">
                    {{ __('Our Prices') }}
                </h3>
            </div>
        </div>
    </section>

    <section class="mx-auto container mb-2 mt-10 lg:mb-10 p-4">
        <div
            class="bg-primary p-8 lg:p-10 2xl:p-16 grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-4 rounded-md rounded-tl-[3rem] rounded-br-[3rem] lg:rounded-lg lg:rounded-tl-[4rem] lg:rounded-br-[4rem] 2xl:rounded-xl 2xl:rounded-tl-[5rem] 2xl:rounded-br-[5rem]">
            <div class="flex flex-col gap-4 lg:gap-8 lg:col-start-2 lg:col-span-3">
                <div class="text-white flex gap-3 lg:gap-6 items-center mx-auto">
                    <div
                        class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-gray-50 before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-accent after:bg-opacity-50 after:h-full after:w-full">
                    </div>
                    <h1 class="font-black text-4xl lg:text-7xl">
                        {{ __('Calculate Price') }}
                    </h1>
                </div>
                <form onsubmit="Calculate(event)" class="flex flex-col gap-4">
                    <div class="calc">
                        <select id="filter" x-select placeholder="{{ __('Select type') }}" class="hidden">
                            @foreach ($data as $row)
                                <option value="{{ $row->status ? $row->discount : $row->price }}">
                                    {{ __($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-4">
                        <input type="number" id="width" name="width" step="0.001"
                            class="w-0 flex-1 p-2 lg:p-4 appearance-none text-primary text-base lg:text-xl 2xl:text-2xl bg-white rounded-lg lg:rounded-xl focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary"
                            placeholder="{{ __('Interface Width') }} ({{ __('meter') }})"
                            style="font-family: Arial, Helvetica, sans-serif" />
                        <input type="number" id="heigth" name="heigth" step="0.001"
                            class="w-0 flex-1 p-2 lg:p-4 appearance-none text-primary text-base lg:text-xl 2xl:text-2xl bg-white rounded-lg lg:rounded-xl focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary"
                            placeholder="{{ __('Interface Height') }} ({{ __('meter') }})"
                            style="font-family: Arial, Helvetica, sans-serif" />
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="w-max min-w-[8rem] block px-6 py-2 lg:py-4 bg-accent hover:bg-opacity-80 focus:bg-opacity-80 text-white text-base lg:text-xl 2xl:text-2xl font-black rounded-full">
                            {{ __('Calculate') }}
                        </button>
                        <h1 id="price" class="w-max text-2xl lg:text-5xl font-black text-white flex items-center gap-2"
                            style="font-family: Arial, Helvetica, sans-serif">
                        </h1>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
