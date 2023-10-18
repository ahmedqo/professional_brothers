@extends('guest.commun.base')
@section('title', __('Our Works'))

@section('content')
    <section class="relative w-full overflow-hidden py-10 lg:py-20 clip-1 2xl:container mx-auto">
        <img src="{{ asset('img/BREAK-PAGE.png') }}" alt="{{ __('Our Works') }}"
            class="object-cover object-left lg:object-center w-full h-full absolute inset-0 -scale-x-110 rtl:scale-x-110 scale-y-110" />
        <div class="absolute inset-0 w-full h-full skew-x-[-24deg] rtl:skew-x-[24deg] pointer-events-none">
            <div class="absolute top-0 bottom-0 right-0 rtl:right-auto rtl:left-0 h-full w-[130%] bg-primary bg-opacity-40">
            </div>
            <div class="absolute top-0 bottom-0 right-0 rtl:right-auto rtl:left-0 h-full w-[70%] bg-primary bg-opacity-40">
            </div>
            <div class="absolute top-0 bottom-0 w-full h-full -right-[66.66%] rtl:right-auto rtl:-left-[66.66%] bg-primary">
            </div>
        </div>
        <div class="container mx-auto p-4 flex pointer-events-none">
            <div class="w-max text-white mx-auto flex gap-3 lg:gap-6 items-center pointer-events-auto z-[1]">
                <div
                    class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-gray-50 before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-accent after:bg-opacity-50 after:h-full after:w-full">
                </div>
                <h3 class="font-black text-4xl lg:text-7xl">
                    {{ __('Our Works') }}
                </h3>
            </div>
        </div>
    </section>

    <section class="mb-20 mt-8 lg:mt-0 2xl:container mx-auto overflow-hidden">
        <div class="container mx-auto p-4 2xl:p-8 flex flex-col gap-10">
            <div class="flex flex-col gap-8">
                <div class="flex text-primary gap-3 lg:gap-6 items-center w-max pointer-events-auto">
                    <div
                        class="relative w-3 lg:w-6 h-8 lg:h-16 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                    </div>
                    <h3 class="font-black text-xl lg:text-4xl">
                        {{ __('Glass Facade Cleaning') }}
                    </h3>
                </div>
                <div class="grid gap-4 grid-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5">
                    @forelse($glass as $row)
                        <img data-idx="{{ $loop->index }}" onclick="ShowSlider(event)"
                            alt="{{ $row->service }} image {{ $row->id }}"
                            src="{{ asset('storage/services/' . $row->name) }}"
                            class="w-full aspect-video object-cover cursor-pointer bg-[#fcfcfc] rounded-md lg:rounded-lg" />
                    @empty
                        <p
                            class="md:col-span-2 lg:col-span-3 2xl:col-span-5 font-black text-gray-950 text-lg p-4 text-center">
                            {{ __('NO IMAGES FOUND') }}
                        </p>
                    @endforelse
                </div>
            </div>
            <div class="flex flex-col gap-8">
                <div class="flex text-primary gap-3 lg:gap-6 items-center w-max pointer-events-auto">
                    <div
                        class="relative w-3 lg:w-6 h-8 lg:h-16 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                    </div>
                    <h3 class="font-black text-xl lg:text-4xl">
                        {{ __('Stone Facade Cleaning in Kuwait') }}
                    </h3>
                </div>
                <div class="grid gap-4 grid-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5">
                    @forelse($stone as $row)
                        <img data-idx="{{ $loop->index }}" onclick="ShowSlider(event)"
                            alt="{{ $row->service }} image {{ $row->id }}"
                            src="{{ asset('storage/services/' . $row->name) }}"
                            class="w-full aspect-video object-cover cursor-pointer bg-[#fcfcfc] rounded-md lg:rounded-lg" />
                    @empty
                        <p
                            class="md:col-span-2 lg:col-span-3 2xl:col-span-5 font-black text-gray-950 text-lg p-4 text-center">
                            {{ __('NO IMAGES FOUND') }}
                        </p>
                    @endforelse
                </div>
            </div>
            <div class="flex flex-col gap-8">
                <div class="flex text-primary gap-3 lg:gap-6 items-center w-max pointer-events-auto">
                    <div
                        class="relative w-3 lg:w-6 h-8 lg:h-16 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                    </div>
                    <h3 class="font-black text-xl lg:text-4xl">
                        {{ __('Exterior Floor Cleaning') }}
                    </h3>
                </div>
                <div class="grid gap-4 grid-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5">
                    @forelse($floor as $row)
                        <img data-idx="{{ $loop->index }}" onclick="ShowSlider(event)"
                            alt="{{ $row->service }} image {{ $row->id }}"
                            src="{{ asset('storage/services/' . $row->name) }}"
                            class="w-full aspect-video object-cover cursor-pointer bg-[#fcfcfc] rounded-md lg:rounded-lg" />
                    @empty
                        <p
                            class="md:col-span-2 lg:col-span-3 2xl:col-span-5 font-black text-gray-950 text-lg p-4 text-center">
                            {{ __('NO IMAGES FOUND') }}
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section id="modal" dir="ltr"
        class="h-screen w-full opacity-0 pointer-events-none fixed inset-0 z-50 bg-gray-950 bg-opacity-50 backdrop-blur-md">
        <button id="close"
            class="absolute rounded-full bg-gray-950 bg-opacity-20 right-1 top-1 w-10 h-10 flex items-center z-[10] justify-center text-white">
            <svg class="pointer-events-none w-8 h-8" viewBox="0 -960 960 960" fill="currentColor">
                <path
                    d="M480-416 282-218q-14 14-32.5 14T218-218q-14-13-14-31.5t14-31.5l198-199-198-198q-13-13-13-32t13-32q12-13 31-13t33 13l198 199 199-200q13-13 31.5-13t32.5 13q13 14 13 32.5T743-679L544-481l198 199q14 14 14 32.5T742-218q-13 14-32 14t-31-14L480-416Z" />
            </svg>
        </button>
        <button id="next"
            class="absolute rounded-full bg-gray-950 bg-opacity-20 left-1 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center z-[10] justify-center text-white">
            <svg class="pointer-events-none w-10 h-10" viewBox="0 -960 960 960" fill="currentColor">
                <path
                    d="M528-251 331-449q-7-6-10.5-14t-3.5-18q0-9 3.5-17.5T331-513l198-199q13-12 32-12t33 12q13 13 12.5 33T593-646L428-481l166 166q13 13 13 32t-13 32q-14 13-33.5 13T528-251Z" />
            </svg>
        </button>
        <ul id="slider" class="relative w-full h-full"></ul>
        <button id="prev"
            class="absolute rounded-full bg-gray-950 bg-opacity-20 right-1 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center z-[10] justify-center text-white">
            <svg class="pointer-events-none w-10 h-10" viewBox="0 -960 960 960" fill="currentColor">
                <path
                    d="M344-251q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407-712l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408-251q-13 13-32 12.5T344-251Z" />
            </svg>
        </button>
    </section>
@endsection

@section('scripts')
    <script>
        AnimateSlider();
    </script>
@endsection
