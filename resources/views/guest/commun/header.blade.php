@php
    $isHome = false;
    if (Request::url() === url('/')) {
        $isHome = true;
    }
@endphp
<header class="w-full py-2 lg:py-4 z-10 relative border-b border-gray-100 lg:border-b-0 2xl:container mx-auto">
    <nav
        class="container px-4 2xl:px-8 mx-auto flex items-center @if ($isHome) lg:items-start @endif flex-wrap justify-between @if ($isHome) lg:h-10 2xl:h-14 @endif gap-4 overflow-visible">
        <a href="{{ route('views.home.show') }}" class="block z-[1]">
            <img src="{{ asset('logo.png') }}" class="w-24 @if ($isHome) lg:w-[18rem] @endif" />
        </a>
        <button x-toggle x-targets="#menu, #trigger svg path" x-properties="hidden" id="trigger"
            class="w-10 h-10 flex lg:hidden items-center justify-center text-primary rtl:rotate-180">
            <svg viewBox="0 -960 960 960" class="w-10 h-10 pointer-events-none" fill="currentColor">
                <path
                    d="M129-215q-20.75 0-33.375-12.675Q83-240.351 83-261.175 83-280 95.625-293T129-306h458q19.75 0 32.375 13.175 12.625 13.176 12.625 32Q632-240 619.375-227.5 606.75-215 587-215H129Zm0-221q-20.75 0-33.375-13.175Q83-462.351 83-482.175 83-502 95.625-514.5 108.25-527 129-527h339q18.75 0 31.875 12.675Q513-501.649 513-481.825 513-462 499.875-449 486.75-436 468-436H129Zm0-218q-20.75 0-33.375-13.175Q83-680.351 83-700.175 83-720 95.625-733 108.25-746 129-746h458q19.75 0 32.375 13.175 12.625 13.176 12.625 33Q632-680 619.375-667 606.75-654 587-654H129Zm605 173 114 113q13 14 12.5 33T847-304q-15 14-33.5 14T782-304L637-450q-14-13-14-31t14-32l145-146q13-13 31.5-13t33.5 13q13 14 12.5 33T847-594L734-481Z" />
                <path class="hidden"
                    d="M480-416 282-218q-14 14-32.5 14T218-218q-14-13-14-31.5t14-31.5l198-199-198-198q-13-13-13-32t13-32q12-13 31-13t33 13l198 199 199-200q13-13 31.5-13t32.5 13q13 14 13 32.5T743-679L544-481l198 199q14 14 14 32.5T742-218q-13 14-32 14t-31-14L480-416Z" />
            </svg>
        </button>
        <div id="menu"
            class="hidden w-full absolute shadow-md border border-gray-100 lg:shadow-none lg:border-none top-full left-0 gap-4 bg-white flex-col z-[20] p-4 lg:relative lg:left-auto lg:top-auto lg:flex-row lg:p-0 flex-1 lg:w-0 flex lg:!flex items-center justify-between">
            <ul
                class="w-full flex flex-col lg:flex-row lg:flex-wrap gap-4 lg:gap-6 lg:justify-center lg:mx-auto lg:w-max">
                <li>
                    <a href="{{ route('views.home.show') }}"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary @if (request()->routeIs('views.home.show')) !text-accent @endif">
                        {{ __('Home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.home.show') }}#about-us"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.services.show') }}"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary @if (request()->routeIs('views.services.show')) !text-accent @endif">
                        {{ __('Our Services') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.prices.show') }}"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary @if (request()->routeIs('views.prices.show')) !text-accent @endif">
                        {{ __('Our Prices') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.works.show') }}"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary @if (request()->routeIs('views.works.show')) !text-accent @endif">
                        {{ __('Our Works') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.offers.guest.show') }}"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary relative after:content-[''] after:absolute after:w-[calc(100%+1rem)] after:h-1 lg:after:h-2 after:bg-accent after:left-1/2 after:-translate-x-1/2 after:bottom-1 after:z-[-1] after:skew-x-[-24deg] after:rtl:skew-x-[24deg] @if (request()->routeIs('views.offers.guest.show')) !text-white after:!h-full after:!bottom-0 @endif">
                        {{ __('Our Offers') }}
                    </a>
                </li>
                <li>
                    <a href="#contact-us"
                        class="mx-auto block w-max text-base lg:text-[1.15rem] 2xl:text-2xl font-semibold text-primary">
                        {{ __('Contact Us') }}
                    </a>
                </li>
            </ul>
            <ul class="mx-auto w-max lg:m-0 flex gap-2 justify-center">
                <li>
                    <a href="{{ env('LINK_INSTAGRAM') }}" target="_blank"
                        class="w-10 h-10 2xl:w-14 2xl:h-14 rounded-full bg-primary text-white flex items-center justify-center">
                        <svg class="w-5 h-5 2xl:w-8 2xl:h-8 pointer-events-none" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="3"
                                d="M41.5,21.1v-4.6c0-5.5-4.5-10-10-10h-15c-5.5,0-10,4.5-10,10v3" />
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="3"
                                d="M6.5,25.6v5.9c0,5.5,4.5,10,10,10h15c5.5,0,10-4.5,10-10v-4.6" />
                            <path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="3"
                                d="M24,15.5c-4.7,0-8.5,3.8-8.5,8.5s3.8,8.5,8.5,8.5s8.5-3.8,8.5-8.5S28.7,15.5,24,15.5z" />
                            <path d="M34,12c-1.1,0-2,0.9-2,2s0.9,2,2,2s2-0.9,2-2S35.1,12,34,12z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ env('LINK_LINKEDIN') }}" target="_blank"
                        class="w-10 h-10 2xl:w-14 2xl:h-14 rounded-full bg-primary text-white flex items-center justify-center">
                        <svg class="w-5 h-5 2xl:w-8 2xl:h-8 pointer-events-none" fill="currentColor"
                            viewBox="0 0 50 50">
                            <path
                                d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
