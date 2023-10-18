@extends('guest.commun.base')
@section('title', __('Home'))

@section('content')
    <section class="relative w-full h-[260px] lg:h-screen max-h-[800px] overflow-hidden 2xl:container mx-auto">
        <div
            class="container mx-auto h-full flex gap-4 lg:gap-10 skew-x-[-24deg] rtl:skew-x-[24deg] scale-x-150 ms-[20%] relative">
            <div class="h-full flex-[1] bg-accent lg:mt-28 lg:ms-10"></div>
            <div class="h-full flex-[2] bg-accent"></div>
            <div class="h-full flex-[5]"></div>
            <div class="h-full flex-[3] bg-primary"></div>
            <div class="h-[90%] w-full absolute top-0 -left-[3%] rtl:left-auto rtl:-right-[3%] scale-x-50 overflow-hidden">
                <div class="w-full h-full bg-gray-300" data-aos="fade-up" data-aos-delay="100">
                    <div id="main-slider" class="w-full h-full skew-x-[30deg] rtl:skew-x-[-30deg] scale-x-[1.3]">
                        <ul>
                            <li>
                                <img src="{{ asset('img/slide-1.png') }}" class="w-full h-full object-cover" />
                            </li>
                            <li>
                                <img src="{{ asset('img/slide-2.png') }}" class="w-full h-full object-cover" />
                            </li>
                            <li>
                                <img src="{{ asset('img/slide-3.png') }}" class="w-full h-full object-cover" />
                            </li>
                            <li>
                                <img src="{{ asset('img/slide-4.png') }}" class="w-full h-full object-cover" />
                            </li>
                            <li>
                                <img src="{{ asset('img/slide-5.png') }}" class="w-full h-full object-cover" />
                            </li>
                            <li>
                                <img src="{{ asset('img/slide-6.png') }}" class="w-full h-full object-cover" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute top-0 left-0 w-full h-[300px] lg:h-screen max-h-[800px] pointer-events-none">
            <div class="container mx-auto p-4 2xl:p-8 h-full flex flex-col"
                data-aos="fade-{{ Sys::lang() ? 'right' : 'left' }}">
                <div
                    class="bg-primary bg-opacity-70 py-4 pe-12 lg:py-8 lg:pe-24 w-max skew-x-[-24deg] rtl:skew-x-[24deg] relative mt-auto mb-20 lg:mb-32 after:content-[''] after:absolute after:w-1/2 after:h-full after:bg-primary after:bg-opacity-70 after:top-0 after:right-full after:rtl:right-auto after:rtl:left-full after:z-[-1]">
                    <p class="text-white w-max text-3xl rtl:text-4xl lg:!text-7xl 2xl:!text-8xl font-black skew-x-[24deg] rtl:skew-x-[-24deg] pointer-events-auto"
                        style="line-height: 1.3 !important;">
                        {{ __('Efficiency Precision') }} <br />{{ __('And Reliability For') }}
                        <br />{{ __('Client Satisfaction') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="relative w-full overflow-hidden pb-[56%] lg:py-10 2xl:container mx-auto">
        <div class="absolute inset-0" data-aos="fade-{{ Sys::lang() ? 'left' : 'right' }}">
            <img src="{{ asset('img/about-us.png') }}" alt="{{ __('The Company') }}"
                class="object-cover object-left lg:object-center w-full h-full -scale-x-110 rtl:scale-x-110 scale-y-110" />
        </div>
        <div
            class="absolute inset-0 w-full h-full skew-y-[-6deg] rtl:skew-y-[6deg] lg:skew-y-[0deg] lg:rtl:skew-y-[0deg] lg:skew-x-[-24deg] lg:rtl:skew-x-[24deg] pointer-events-none">
            <div data-aos="fade-{{ Sys::lang() ? 'right' : 'left' }}" data-aos-delay="200"
                class="absolute left-0 right-0 top-0 h-[70%] lg:pb-0 lg:bottom-auto lg:left-0 lg:rtl:left-auto lg:rtl:right-0 lg:h-full lg:w-[70%] bg-white bg-opacity-40">
            </div>
            <div data-aos="fade-{{ Sys::lang() ? 'right' : 'left' }}" data-aos-delay="150"
                class="absolute left-0 right-0 top-0 h-[60%] lg:pb-0 lg:bottom-auto lg:left-0 lg:rtl:left-auto lg:rtl:right-0 lg:h-full lg:w-[60%] bg-white bg-opacity-40">
            </div>
            <div data-aos="fade-{{ Sys::lang() ? 'right' : 'left' }}" data-aos-delay="100"
                class="absolute w-full h-full left-0 right-0 -top-[50%] lg:pb-0 lg:top-0 lg:bottom-auto lg:-left-[50%] lg:rtl:left-auto lg:rtl:-right-[50%] bg-white">
            </div>
        </div>
        <div id="about-us"
            class="container mx-auto px-4 2xl:px-8 py-10 grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4 pointer-events-none">
            <div class="text-primary flex flex-col gap-4 lg:gap-8 pointer-events-auto" data-aos="fade-up"
                data-aos-delay="200">
                <div class="flex gap-3 lg:gap-6 items-center">
                    <div
                        class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                    </div>
                    <h1 class="font-black text-4xl lg:text-7xl">
                        {{ __('The Company') }}:
                    </h1>
                </div>
                <p class="text-xl lg:text-3xl text-justify">
                    {{ __('With') }} <strong class="underline">{{ __('Professional Brothers Company') }}</strong>
                    {{ __('for cleaning, there is no need to worry about efficiency, precision, and achievement. We are a cleaning company that carefully selects our equipment and team when it comes to cleaning facades, exterior surfaces, floors, windows, and sports fields. You should rely on Professional Brothers Cleaning Company for high-pressure and low-pressure cleaning to provide you with an exceptional level of cleanliness and access to areas you didn\'t expect, safely and effectively.') }}
                </p>
            </div>
        </div>
    </section>

     <section class="my-6 lg:my-20 overflow-hidden 2xl:container mx-auto">
        <div class="w-full flex flex-col gap-4 lg:gap-8 overflow-hidden">
            <div class="w-full container mx-auto p-4 flex gap-4 items-center"
                data-aos="fade-{{ Sys::lang() ? 'left' : 'right' }}">
                <div
                    class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                </div>
                <h2 class="font-black text-primary text-2xl lg:text-6xl">
                    {{ __('Cleaning Services') }}:
                </h2>
            </div>
            <div class="w-full relative 2xl:container mx-auto">
                <div
                    class="hidden lg:block absolute w-2 h-[60%] bg-primary left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2">
                </div>
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-1"
                        data-aos="zoom-in-{{ Sys::lang() ? 'right' : 'left' }}">
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
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-2"
                        data-aos="zoom-in-{{ Sys::lang() ? 'left' : 'right' }}">
                        <div class="absolute bottom-0 right-5 rtl:right-auto rtl:left-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Glass-Buildings.png') }}" alt="Glass Buildings"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px black;"
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
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-1"
                        data-aos="zoom-in-{{ Sys::lang() ? 'right' : 'left' }}">
                        <div class="absolute bottom-0 left-5 rtl:left-auto rtl:right-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 right-0 rtl:right-auto rtl:left-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Stone-Buildings.png') }}" alt="Stone Buildings"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px black;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-start font-black">
                            Stone<br />Buildings
                        </h3>
                        <div class="w-10 h-24 absolute left-0 rtl:left-auto rtl:right-0 -bottom-4 bg-accent bg-opacity-50">
                        </div>
                    </div>
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-2"
                        data-aos="zoom-in-{{ Sys::lang() ? 'left' : 'right' }}">
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
            <div class="w-full relative 2xl:container mx-auto">
                <div
                    class="hidden lg:block absolute w-2 h-[60%] bg-primary left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2">
                </div>
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-1"
                        data-aos="zoom-in-{{ Sys::lang() ? 'right' : 'left' }}">
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
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-2"
                        data-aos="zoom-in-{{ Sys::lang() ? 'left' : 'right' }}">
                        <div class="absolute bottom-0 right-5 rtl:right-auto rtl:left-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Exterior-Floors.png') }}" alt="Exterior Floors"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px black;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-end font-black">
                            Exterior<br />Floors
                        </h3>
                        <div
                            class="w-10 h-24 absolute right-0 rtl:right-auto rtl:left-0 -bottom-4 bg-accent bg-opacity-50">
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
                    <div class="w-full lg:col-span-2 aspect-square relative order-1 lg:order-1"
                        data-aos="zoom-in-{{ Sys::lang() ? 'right' : 'left' }}">
                        <div class="absolute bottom-0 left-5 rtl:left-auto rtl:right-5 w-10/12 bg-primary aspect-square">
                        </div>
                        <div class="absolute top-0 right-0 rtl:right-auto rtl:left-0 w-10/12 bg-blue-300 aspect-square">
                            <img src="{{ asset('img/Wall-Cleaning.png') }}" alt="Wall Cleaning"
                                class="w-full object-cover aspect-square" />
                        </div>
                        <h3 style="text-shadow: 1px 1px 2px black;"
                            class="w-8/12 absolute -bottom-2 left-1/2 -translate-x-1/2 text-white text-5xl text-start font-black">
                            Wall<br />Cleaning
                        </h3>
                        <div class="w-10 h-24 absolute left-0 rtl:left-auto rtl:right-0 -bottom-4 bg-accent bg-opacity-50">
                        </div>
                    </div>
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-2"
                        data-aos="zoom-in-{{ Sys::lang() ? 'left' : 'right' }}">
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

    <section class="relative w-full pb-12 lg:py-20 clip-1 overflow-hidden 2xl:container mx-auto">
        <div class=" absolute inset-0" data-aos="fade-{{ Sys::lang() ? 'right' : 'left' }}">
            <img src="{{ asset('img/BREAK-PAGE.png') }}" alt="{{ __('Our Offers') }}"
                class="object-cover object-left lg:object-center w-full h-full -scale-x-110 rtl:scale-x-110 scale-y-110" />
        </div>
        <div class="absolute inset-0 w-full h-full skew-x-[-24deg] rtl:skew-x-[24deg] pointer-events-none">
            <div data-aos="fade-{{ Sys::lang() ? 'left' : 'right' }}" data-aos-delay="200"
                class="absolute top-0 bottom-0 right-0 rtl:right-auto rtl:left-0 h-full w-[130%] lg:w-[70%] bg-primary bg-opacity-40">
            </div>
            <div data-aos="fade-{{ Sys::lang() ? 'left' : 'right' }}" data-aos-delay="150"
                class="absolute top-0 bottom-0 right-0 rtl:right-auto rtl:left-0 h-full w-[90%] lg:w-[60%] bg-primary bg-opacity-40">
            </div>
            <div data-aos="fade-{{ Sys::lang() ? 'left' : 'right' }}" data-aos-delay="100"
                class="absolute top-0 bottom-0 w-full h-full -right-[66.66%] rtl:right-auto rtl:-left-[66.66%] lg:-right-[50%] lg:rtl:right-auto lg:rtl:-left-[50%] bg-primary">
            </div>
        </div>
        <div
            class="container mx-auto px-4 2xl:px-8 py-10 mb-10 grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-24 pointer-events-none">
            <div class="text-white flex flex-col gap-4 lg:gap-8 pointer-events-auto lg:col-span-2 lg:col-start-2"
                data-aos="fade-up" data-aos-delay="200">
                <div class="flex gap-3 lg:gap-6 items-center">
                    <div
                        class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-gray-50 before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-accent after:bg-opacity-50 after:h-full after:w-full">
                    </div>
                    <h3 class="font-black text-4xl lg:text-7xl">
                        {{ __('Our Offers') }}
                    </h3>
                </div>
                <p class="text-3xl lg:text-6xl text-start ms-8 lg:ms-20">
                    {{ __('Benefit from our special offers and exclusive discounts') }}
                </p>
                <a href="{{ route('views.offers.guest.show') }}"
                    class="w-max min-w-[8rem] block px-6 py-2 lg:py-4 bg-accent hover:bg-opacity-80 focus:bg-opacity-80 text-white text-2xl lg:text-3xl font-black rounded-full ms-8 lg:ms-20">
                    {{ __('Discover Our Offers') }}
                </a>
            </div>
        </div>
    </section>

    <section class="-mt-28 lg:-mt-36 overflow-hidden 2xl:container mx-auto">
        <div class="flex flex-col lg:gap-10">
            <div class="w-full relative">
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-4 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-3 flex flex-col text-primary order-2 lg:order-1"
                        data-aos="zoom-out-{{ Sys::lang() ? 'right' : 'left' }}">
                        <div class="w-full container mx-auto p-4 flex gap-4 items-center">
                            <div
                                class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                            </div>
                            <h3 class="font-black text-primary text-2xl lg:text-6xl">
                                {{ __('The Perfect Team') }}:
                            </h3>
                        </div>
                        <p class="text-2xl lg:text-3xl relative text-justify ms-4 lg:ms-0">
                            <span class="block h-2 w-2 bg-accent absolute top-4 -left-4 rtl:left-auto rtl:-right-4"></span>
                            {{ __('As a building and exterior facade cleaning company using high-pressure and low-pressure techniques, we only employ specialized and professional workers who undergo intensive training to ensure customer satisfaction and excellent workmanship') }}
                        </p>
                    </div>
                    <div class="w-full lg:col-span-2 relative order-1 lg:order-2"
                        data-aos="zoom-out-{{ Sys::lang() ? 'left' : 'right' }}">
                        <img src="{{ asset('img/pro-worker.png') }}" alt="pro worker"
                            class="w-9/12 me-auto lg:me-0 ms-auto object-cover" />
                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <div
                    class="container p-4 2xl:p-8 mx-auto grid grid-rows-1 grid-cols-1 lg:grid-cols-5 lg:gap-20 items-center">
                    <div class="w-full lg:col-span-2 relative order-1 lg:order-1"
                        data-aos="zoom-out-{{ Sys::lang() ? 'right' : 'left' }}">
                        <img src="{{ asset('img/pro-machine.png') }}" alt="pro machine"
                            class="w-9/12 ms-auto lg:ms-0 me-auto object-cover" />
                    </div>
                    <div class="w-full lg:col-span-3 flex flex-col gap-4 text-primary order-2 lg:order-2"
                        data-aos="zoom-out-{{ Sys::lang() ? 'left' : 'right' }}">
                        <div class="w-full container mx-auto p-4 flex gap-4 items-center">
                            <div
                                class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-accent before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-primary after:bg-opacity-50 after:h-full after:w-full">
                            </div>
                            <h3 class="font-black text-primary text-2xl lg:text-6xl">
                                {{ __('The Ideal Equipment') }}:
                            </h3>
                        </div>
                        <p class="relative text-2xl lg:text-3xl text-justify ms-4 lg:ms-0">
                            <span class="block h-2 w-2 bg-accent absolute top-4 -left-4 rtl:left-auto rtl:-right-4"></span>
                            {{ __('We use the best and highest quality equipment and eco-friendly cleaning agents at Professional Brothers Company, ensuring safety for surfaces') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        MainSlider();
    </script>
@endsection
