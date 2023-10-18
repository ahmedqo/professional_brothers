@extends('admin.commun.base')
@section('title', __('Types list'))

@section('content')
    @include('admin.commun.header', ['title' => __('Types list')])
    <section class="w-full container mx-auto p-4 flex flex-col gap-4">
        <form action="{{ route('actions.types.edit') }}" method="POST" class="w-full flex flex-col gap-4 tbl">
            @csrf
            <div class="w-full flex items-center gap-1 lg:gap-4 -mb-2">
                <label
                    class="hidden lg:block w-0 flex-1 uppercase text-sm text-gray-950 font-black px-2">{{ __('Name') }}</label>
                <label
                    class="flex-1 w-0 lg:flex-[none] lg:w-48 uppercase text-center text-sm text-gray-950 font-black px-2">{{ __('Price') }}</label>
                <label
                    class="flex-1 w-0 lg:flex-[none] lg:w-48 uppercase text-center text-sm text-gray-950 font-black px-2">{{ __('Discount') }}</label>
                <label
                    class="w-[4.5rem] uppercase text-center text-sm text-gray-950 font-black px-2">{{ __('Status') }}</label>
            </div>

            @foreach ($data as $row)
                <div class="w-full flex items-center gap-1 lg:gap-4 flex-wrap">
                    <input readonly tabindex="-1" type="text" placeholder="{{ __('Name') }}"
                        value="{{ __($row->name) }}"
                        class="w-full lg:w-0 lg:flex-1 appearance-none block mx-auto rounded-md p-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 outline-none" />
                    <input type="hidden" name="name[]" value="{{ $row->name }}" />
                    <input type="number" name="price[]" placeholder="{{ __('Price') }}" value="{{ $row->price }}"
                        class="appearance-none block flex-1 w-0 lg:flex-[none] lg:w-48 mx-auto text-center rounded-md p-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                    <input type="number" name="discount[]" placeholder="{{ __('Discount') }}"
                        value="{{ $row->discount }}"
                        class="appearance-none block flex-1 w-0 lg:flex-[none] lg:w-48 mx-auto text-center rounded-md p-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-primary" />
                    <div class="w-[4.5rem] flex justify-center items-center">
                        <input x-switch type="checkbox" name="status[]" value="{{ $row->name }}"
                            @if ($row->status) checked @endif />
                    </div>
                </div>
            @endforeach

            <div class="w-full flex items-center justify-between">
                <button type="submit"
                    class="block bg-primary px-8 py-2 ms-auto rounded-md text-white text-base outline-none font-bold hover:bg-opacity-60 focus:bg-opacity-60">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        x.DataTable.options.Data = {
            Search: "{{ __('Search...') }}",
            Empty: "{{ __('No data found') }}",
        }
        x.DataTable().Switch();
    </script>
@endsection
