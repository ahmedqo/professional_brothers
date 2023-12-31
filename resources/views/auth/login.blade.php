@extends('auth.commun.base')
@section('title', __('Login'))

@section('content')
    <form onsubmit="{{ route('actions.login.show') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <div class="w-full">
            <label for="email" class="font-black text-base text-gray-950">{{ __('Email') }}</label>
            <input x-icon x-target="#emailIcon" type="text" id="email" name="email"
                placeholder="{{ __('Email') }}" />
            <svg id="emailIcon" class="block pointer-events-none text-gray-950 w-4 h-4" fill="currentColor"
                viewBox="0 -960 960 960">
                <path
                    d="M480-61q-86.886 0-162.443-32.5Q242-126 184-183.5 126-241 93.5-316.399T61-479.521Q61-567 93.5-642.5 126-718 184-776t133.557-90.5Q393.114-899 480-899q88 0 163.5 32.5t133 90.5q57.5 58 90 133.684T899-479.589V-429q0 63-43 103t-107 40q-40.898 0-73.449-19.5Q643-325
        626-358q-25 37-62 54.5T480-286q-81.285 0-138.143-56.466Q285-398.933 285-480.966 285-563 341.787-619.5 398.574-676 479.76-676 561-676 618-619.5 675-563 675-480v43.933q0 30.967 21.6 51.017Q718.2-365 749-365q28.4 0 49.2-20.05Q819-405.1 819-436.067V-480q0-142.362-98.319-240.681Q622.362-819
        479.5-819q-140.862 0-239.681 98.819Q141-621.362 141-480q0 142.362 98.319 240.681Q337.638-141 480-141h175q15.3 0 27.15 11.772 11.85 11.772 11.85 28Q694-84 682.15-72.5T655-61H480Zm.235-304q48.348 0 82.057-33.238Q596-431.475 596-479.529q0-48.054-33.944-82.763Q528.113-597
        479.765-597t-82.057 34.708Q364-527.583 364-479.529t33.944 81.291Q431.887-365 480.235-365Z" />
            </svg>
        </div>
        <div class="w-full">
            <label for="password" class="font-black text-base text-gray-950">{{ __('Password') }}</label>
            <input x-password type="password" id="password" name="password" placeholder="{{ __('Password') }}" />
        </div>
        <div class="w-full flex items-center justify-between">
            <a href="{{ route('views.forgot.show') }}" class="font-semibold text-sm text-primary underline">
                {{ __('Forgot Password?') }}
            </a>
            <button type="submit"
                class="block bg-primary px-8 py-2 ms-auto rounded-md text-white text-base outline-none font-bold hover:bg-opacity-60 focus:bg-opacity-60">
                {{ __('Login') }}
            </button>
        </div>
    </form>
@endsection
