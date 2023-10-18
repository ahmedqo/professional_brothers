<section id="contact-us" class="relative w-full overflow-hidden lg:py-4 pb-[56%] mt-10 lg:mt-16 2xl:container mx-auto">
    <div id="map" class="w-full h-full absolute inset-0 overflow-hidden">
        <iframe
            src="https://maps.google.com/maps?hl={{ app()->getLocale() }}&amp;q={{ env('LINK_MAP') }}&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            loading="lazy" class="w-full lg:w-[150%] h-[150%] lg:h-full"></iframe>
    </div>
    <div
        class="absolute inset-0 w-full h-full skew-y-[-6deg] rtl:skew-y-[6deg] lg:skew-y-[0deg] lg:rtl:skew-y-[0deg] lg:skew-x-[-24deg] lg:rtl:skew-x-[24deg] pointer-events-none">
        <div
            class="absolute left-0 right-0 top-0 h-[70%] lg:pb-0 lg:bottom-auto lg:left-0 lg:rtl:left-auto lg:rtl:right-0 lg:h-full lg:w-[70%] bg-primary bg-opacity-40">
        </div>
        <div
            class="absolute left-0 right-0 top-0 h-[60%] lg:pb-0 lg:bottom-auto lg:left-0 lg:rtl:left-auto lg:rtl:right-0 lg:h-full lg:w-[60%] bg-primary bg-opacity-40">
        </div>
        <div
            class="absolute w-full h-full left-0 right-0 -top-[50%] lg:pb-0 lg:top-0 lg:bottom-auto lg:-left-[50%] lg:rtl:left-auto lg:rtl:-right-[50%] bg-primary">
        </div>
    </div>
    <div
        class="container mx-auto px-4 2xl:px-8 py-10 grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4 relative z-[1] pointer-events-none">
        <div class="text-white flex flex-col gap-4 lg:gap-8 pointer-events-auto">
            <div class="flex gap-3 lg:gap-6 items-center">
                <div
                    class="relative w-4 lg:w-10 h-12 lg:h-28 ms-3 lg:ms-6 skew-x-[20deg] rtl:skew-x-[-20deg] before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:bg-gray-50 before:h-[70%] before:w-full before:-left-1/2 rtl:before:left-1/2 after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:bg-accent after:bg-opacity-50 after:h-full after:w-full">
                </div>
                <h1 class="font-black text-4xl lg:text-7xl">
                    {{ __('Contact Us') }}
                </h1>
            </div>
            <form action="{{ route('actions.contact.show') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <input type="text" id="name" name="name"
                    class="p-2 lg:p-4 appearance-none text-primary text-base lg:text-xl 2xl:text-2xl bg-white rounded-lg lg:rounded-xl focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary"
                    placeholder="{{ __('Full Name') }}" />
                <input type="email" id="email" name="email"
                    class="p-2 lg:p-4 appearance-none text-primary text-base lg:text-xl 2xl:text-2xl bg-white rounded-lg lg:rounded-xl focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary"
                    placeholder="{{ __('Email Address') }}" />
                <textarea rows="4" id="message" name="message"
                    class="p-2 lg:p-4 appearance-none text-primary text-base lg:text-xl 2xl:text-2xl bg-white rounded-lg lg:rounded-xl focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary"
                    placeholder="{{ __('Message') }}"></textarea>
                <button type="submit"
                    class="w-max min-w-[8rem] block px-6 py-2 lg:py-4 bg-accent hover:bg-opacity-80 focus:bg-opacity-80 text-white text-base lg:text-xl 2xl:text-2xl font-black rounded-full ms-auto">
                    {{ __('Send') }}
                </button>
            </form>
        </div>
    </div>
</section>
