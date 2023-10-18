<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Sys::lang() ? 'ltr' : 'rtl' }}" class="scroll-smooth overflow-x-hidden">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}{{ env('PUBLIC_VERSION') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}{{ env('PUBLIC_VERSION') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>@yield('title') | {{ __('PROFESSIONEL BROTHERS') }}</title>
</head>

<body class="overflow-x-hidden w-full">
    @include('guest.commun.header')
    <main>
        @yield('content')
        @include('guest.commun.contact')
    </main>
    @include('guest.commun.footer')
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        x.Toggle().Select();
        AOS.init();
    </script>
    @yield('scripts')
</body>

</html>
