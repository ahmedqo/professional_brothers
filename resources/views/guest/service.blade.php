@extends('guest.commun.base')
@section('title', __('Our Services'))

@section('content')
    <section class="relative w-full overflow-hidden py-10 lg:py-20 clip-2 2xl:container mx-auto">
        <img src="{{ asset('img/BREAK-PAGE.png') }}" alt="{{ __('Cleaning Services') }}"
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
                    {{ __('Cleaning Services') }}
                </h3>
            </div>
        </div>
    </section>

     <section class="mb-10 lg:mb-20 mt-8 2xl:container mx-auto overflow-hidden">
        <div class="flex flex-col lg:gap-10 overflow-hidden">
            <div class="w-full relative 2xl:container mx-auto">
                <div
                    class="hidden lg:block absolute w-2 h-[60%] bg-primary left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2">
                </div>
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-1">
                        <h3 class="relative font-black text-xl lg:text-3xl ms-4 lg:ms-0">
                            {{ __('Glass Facade Cleaning') }}:
                            <span
                                class="block h-2 w-2 bg-accent absolute top-1/2 -translate-y-1/2 -left-4 rtl:left-auto rtl:-right-4"></span>
                        </h3>
                        <p class="text-2xl lg:text-3xl text-justify">
                            {{ __('The glass facades require regular cleaning and protection to maintain their aesthetic appearance, shine, and sparkle. They should be shielded from dirt and stains that can make them look unappealing. To clean them, it is advisable to seek the assistance of') }}
                            <strong class="underline">{{ __('Professional Brothers Company') }}</strong>.
                            {{ __('We send a team of skilled and trained workers to clean glass facades while ensuring their protection from scratches or damage. We carefully select appropriate cleaning agents and equipment for the task. Upon completion, the facades are polished using the best polishers available') }}
                        </p>
                    </div>
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-2">
                        <div class="absolute bottom-0 right-5 rtl:right-auto rtl:left-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Glass-Buildings.png') }}" alt="Glass Buildings"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px #1d1d1d;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-end font-black">
                            Glass<br />Buildings
                        </h3>
                        <div class="w-10 h-24 absolute right-0 rtl:right-auto rtl:left-0 -bottom-4 bg-accent bg-opacity-50">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full relative 2xl:container mx-auto">
                <div
                    class="hidden lg:block absolute w-2 h-[60%] bg-primary right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2">
                </div>
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-1">
                        <div class="absolute bottom-0 left-5 rtl:left-auto rtl:right-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 right-0 rtl:right-auto rtl:left-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Stone-Buildings.png') }}" alt="Stone Buildings"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px #1d1d1d;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-start font-black">
                            Stone<br />Buildings
                        </h3>
                        <div class="w-10 h-24 absolute left-0 rtl:left-auto rtl:right-0 -bottom-4 bg-accent bg-opacity-50">
                        </div>
                    </div>
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-2">
                        <h3 class="relative font-black text-xl lg:text-3xl ms-4 lg:ms-0">
                            {{ __('Stone Facade Cleaning in Kuwait') }}:
                            <span
                                class="block h-2 w-2 bg-accent absolute top-1/2 -translate-y-1/2 -left-4 rtl:left-auto rtl:-right-4"></span>
                        </h3>
                        <p class="text-2xl lg:text-3xl text-justify">
                            {{ __('The stone facades accumulate dust, stains from vehicle exhaust, and smoke, which can deteriorate their appearance over time. They require regular cleaning to maintain their beauty and remain free from any spots or pollution. For this reason') }}
                            <strong class="underline">{{ __('Professional Brothers Company') }}</strong>
                            {{ __('cleans stone and sigma facades by relying on appropriate materials and methods suitable for the type of facade, using cranes for the cleaning process') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full relative  2xl:container mx-auto">
                <div
                    class="hidden lg:block absolute w-2 h-[60%] bg-primary left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2">
                </div>
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-1">
                        <h3 class="relative font-black text-xl lg:text-3xl ms-4 lg:ms-0">
                            {{ __('Exterior Floor Cleaning') }}:
                            <span
                                class="block h-2 w-2 bg-accent absolute top-1/2 -translate-y-1/2 -left-4 rtl:left-auto rtl:-right-4"></span>
                        </h3>
                        <p class="text-2xl lg:text-3xl text-justify">
                            {{ __('After a period of time, external floors are exposed to the accumulation of dirt, dust, and car oils') }}
                            <strong class="underline">{{ __('Professional Brothers Company') }}</strong>
                            {{ __('cleans all types of external floors, including sports field surfaces, using high-quality materials') }}
                        </p>
                    </div>
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-2">
                        <div class="absolute bottom-0 right-5 rtl:right-auto rtl:left-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Exterior-Floors.png') }}" alt="Exterior Floors"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px #1d1d1d;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-end font-black">
                            Exterior<br />Floors
                        </h3>
                        <div class="w-10 h-24 absolute right-0 rtl:right-auto rtl:left-0 -bottom-4 bg-accent bg-opacity-50">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full relative 2xl:container mx-auto">
                <div
                    class="hidden lg:block absolute w-2 h-[60%] bg-primary right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2">
                </div>
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-1">
                        <div class="absolute bottom-0 left-5 rtl:left-auto rtl:right-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 right-0 rtl:right-auto rtl:left-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Wall-Cleaning.png') }}" alt="Wall Cleaning"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px #1d1d1d;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-start font-black">
                            Wall<br />Cleaning
                        </h3>
                        <div class="w-10 h-24 absolute left-0 rtl:left-auto rtl:right-0 -bottom-4 bg-accent bg-opacity-50">
                        </div>
                    </div>
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-2">
                        <h3 class="relative font-black text-xl lg:text-3xl ms-4 lg:ms-0">
                            {{ __('Wall Cleaning') }}:
                            <span
                                class="block h-2 w-2 bg-accent absolute top-1/2 -translate-y-1/2 -left-4 rtl:left-auto rtl:-right-4"></span>
                        </h3>
                        <p class="text-2xl lg:text-3xl text-justify">
                            <strong class="underline">{{ __('Professional Brothers Company') }}</strong>
                            {{ __('provides a direct and effective wall cleaning service. Our specialized team works diligently to remove unwanted writings, paints, and accumulated dirt from the walls. Using advanced tools, equipment, and safe cleaning materials, we ensure to restore the cleanliness and beauty of the walls with utmost precision and professionalism. We are here to deliver a reliable and high-quality service to meet your needs and achieve your complete satisfaction. Rely on our expertise and benefit from the exceptional cleaning service we offer to have clean and refreshed walls with a new appearance') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
