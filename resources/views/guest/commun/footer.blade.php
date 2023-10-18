<footer class="bg-primary 2xl:container mx-auto overflow-hidden">
    <div class="container mx-auto p-4 py-10 lg:py-14 flex flex-col gap-6">
        <ul class="w-full flex flex-col lg:flex-row lg:flex-wrap gap-4 lg:gap-6 lg:justify-center">
            <li>
                <a href="{{ route('views.home.show') }}"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('Home') }}
                </a>
            </li>
            <li>
                <a href="{{ route('views.home.show') }}#about-us"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('About Us') }}
                </a>
            </li>
            <li>
                <a href="{{ route('views.services.show') }}"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('Our Services') }}
                </a>
            </li>
            <li>
                <a href="{{ route('views.prices.show') }}"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('Our Prices') }}
                </a>
            </li>
            <li>
                <a href="{{ route('views.works.show') }}"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('Our Works') }}
                </a>
            </li>
            <li>
                <a href="{{ route('views.offers.guest.show') }}"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('Our Offers') }}
                </a>
            </li>
            <li>
                <a href="#contact-us"
                    class="mx-auto block w-max text-base lg:text-xl 2xl:text-2xl font-semibold text-white">
                    {{ __('Contact Us') }}
                </a>
            </li>
        </ul>
        <ul class="w-full flex flex-wrap gap-4 justify-center">
            <li>
                <a href="{{ env('LINK_INSTAGRAM') }}" target="_blank"
                    class="w-10 h-10 2xl:w-14 2xl:h-14 rounded-full bg-white text-primary flex items-center justify-center">
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
                    class="w-10 h-10 2xl:w-14 2xl:h-14 rounded-full bg-white text-primary flex items-center justify-center">
                    <svg class="w-5 h-5 2xl:w-8 2xl:h-8 pointer-events-none" fill="currentColor" viewBox="0 0 50 50">
                        <path
                            d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</footer>
<section class="w-full fixed left-0 bottom-0 z-[1]">
    <div class="container mx-auto p-4">
        <div class="relative w-max ms-auto z-50">
            <button x-toggle x-targets="#lang" x-properties="hidden" style="font-family: Arial, Helvetica, sans-serif"
                class="block px-4 py-2 font-black text-white bg-accent rounded-full cursor-pointer text-base 2xl:text-2xl">{{ Sys::lang() ? 'English' : 'العربية' }}</button>
            <ul id="lang"
                class="hidden w-max rounded-md mb-1 right-0 rtl:right-auto rtl:left-0 bg-gray-100 border border-gray-300 absolute bottom-full flex flex-col">
                <li>
                    <a href="{{ route('actions.language.show', 'en') }}"
                        style="font-family: Arial, Helvetica, sans-serif"
                        class="text-center w-full block px-4 py-2 text-gray-950 text-base 2xl:text-2xl font-black outline-0 hover:bg-gray-300 focus:bg-gray-300">
                        English
                    </a>
                </li>
                <li>
                    <a href="{{ route('actions.language.show', 'ar') }}"
                        style="font-family: Arial, Helvetica, sans-serif"
                        class="text-center w-full block px-4 py-2 text-gray-950 text-base 2xl:text-2xl font-black outline-0 hover:bg-gray-300 focus:bg-gray-300">
                        العربية
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
