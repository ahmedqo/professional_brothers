<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Sys::lang() ? 'ltr' : 'rtl' }}" class="scroll-smooth">

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

<body class="flex flex-col flex-wrap lg:flex-row bg-white">
    @include('admin.commun.sidebar')
    <main class="flex-1 flex flex-col max-w-full lg:w-0">
        @yield('content')
    </main>
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
        x.Toggle();
        x.DatePicker.options.Data = {
            WeekDays: ["{{ __('Sunday') }}", "{{ __('Monday') }}", "{{ __('Tuesday') }}", "{{ __('Wednesday') }}",
                "{{ __('Thursday') }}", "{{ __('Friday') }}", "{{ __('Saturday') }}"
            ],
            YearMonths: ["{{ __('January') }}", "{{ __('February') }}", "{{ __('March') }}",
                "{{ __('April') }}",
                "{{ __('May') }}", "{{ __('June') }}", "{{ __('July') }}", "{{ __('August') }}",
                "{{ __('September') }}", "{{ __('October') }}", "{{ __('November') }}", "{{ __('December') }}"
            ],
            ShowFullWeekDay: {{ Sys::lang() ? '3' : 'true' }},
            ShowFullYearMonth: true,
        }
    </script>
    @yield('scripts')
</body>

</html>
