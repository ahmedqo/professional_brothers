<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Sys::lang() ? 'ltr' : 'rtl' }}" class="scroll-smooth overflow-hidden">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}{{ env('PUBLIC_VERSION') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}{{ env('PUBLIC_VERSION') }}" />
    <title>@yield('title') | {{ __('PROFESSIONEL BROTHERS') }}</title>
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap');
		html[dir="rtl"] * {
    			font-family: "Cairo", Arial, sans-serif;
		}
	</style>
</head>

<body class="flex items-center justify-center w-full min-h-screen bg-[#fcfcfc] overflow-hidden">
    <main class="flex flex-col gap-4 w-full lg:w-[500px] p-4">
        <section class="w-full rounded-lg bg-white relative p-4 flex flex-col gap-4 shadow-md border border-gray-200">
            <div
                class="absolute w-full h-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-lg -rotate-[14deg] z-[-1] bg-custom">
            </div>
            <a href="{{ route('views.home.show') }}" class="w-32 block mx-auto hover:opacity-60 focus:opacity-60">
                <img src="{{ asset('logo.png') }}" class="w-full" />
            </a>
            @yield('content')
        </section>
    </main>
    <section class="w-full fixed left-0 bottom-0 z-[1]">
        <div class="container mx-auto p-4">
            <div class="relative w-max ms-auto z-50">
                <button x-toggle x-targets="#lang" x-properties="hidden"
                    style="font-family: Arial, Helvetica, sans-serif"
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
    @if (Session::has('message'))
        <script>
            const info = {!! json_encode(Session::all()) !!};
            const message = (Array.isArray(info.message) ? info.message : [info.message]).join("<br />");
            const classes = info.type === "success" ? "border-green-800 bg-green-200 text-green-800" :
                "border-red-800 bg-red-200 text-red-800";
            document.body.insertAdjacentHTML("beforeend", `
                <section class="toaster w-full fixed bottom-0 left-0 p-4 z-50">
                    <div class="w-full lg:w-max lg:max-w-[30%] lg:min-w-[20%] text-center px-4 py-2 border mx-auto rounded-md lg:rounded-lg text-base font-black ${classes}">
                        ${message}
                    </div>
                </section>
            `);

            setTimeout(() => {
                [...document.querySelectorAll(".toaster")].forEach(t => t.remove());
            }, 6000);
        </script>
    @endif
    <script src="{{ asset('js/X.Elements.js') }}{{ env('PUBLIC_VERSION') }}"></script>
    <script src="{{ asset('js/index.js') }}{{ env('PUBLIC_VERSION') }}"></script>
    <script>
        x.Icon().Password().Toggle();
    </script>
    @yield('scripts')
</body>

</html>
