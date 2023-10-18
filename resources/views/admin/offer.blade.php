@extends('admin.commun.base')
@section('title', __('Offers'))

@section('content')
    @include('admin.commun.header', ['title' => __('Offers')])
    <section class="w-full container mx-auto p-4 flex flex-col gap-4">
        <div class="flex flex-col gap-4">
            <div class="w-full flex items-center">
                <div
                    class="fixed bottom-4 right-4 rtl:right-auto rtl:left-4 lg:relative lg:bottom-auto lg:left-auto lg:right-auto w-max flex flex-col lg:flex-row gap-2 lg:ms-auto z-10">
                    <button id="delete"
                        class="hidden w-[50px] h-[50px] shadow-lg lg:shadow-none flex items-center justify-center rounded-full outline-none bg-red-400 hover:bg-opacity-80 focus:bg-opacity-80">
                        <svg class="block w-[26px] h-[26px] text-white pointer-events-none" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                        </svg>
                    </button>
                    <button id="upload"
                        class="w-[50px] h-[50px] shadow-lg lg:shadow-none flex items-center justify-center rounded-full outline-none bg-primary hover:bg-opacity-80 focus:bg-opacity-80">
                        <svg class="block w-[26px] h-[26px] text-white pointer-events-none" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M109-53q-37.813 0-64.406-26.594Q18-106.188 18-144v-496q0-36.588 26.594-64.294Q71.187-732 109-732h133l55-65q13-14 31.146-23T367-829h171q20.3 0 33.15 13.338Q584-802.325 584-783v98q0 19.45 13.05 32.225Q610.1-640 629-640h82v82q0 19.45 13.05 32.225Q737.1-513 756-513h61q18.9 0 31.95 12.85T862-467v323q0 37.813-27.706 64.406Q806.588-53 770-53H109Zm330.794-169Q512-222 561-270.618q49-48.617 49-122Q610-464 560.966-512.5 511.931-561 439.382-561t-120.465 48.912Q271-463.176 271-392.088 271-319 319.294-270.5t120.5 48.5ZM771-700h-57.298q-17.227 0-26.465-9.223Q678-718.447 678-733.798q0-16.202 9.287-26.144 9.288-9.941 26.415-9.941H771v-58.953q0-15.706 9.313-25.935Q789.625-865 806.588-865q15.812 0 25.747 10.35T842.27-829v59h58.923q14.657 0 24.732 9.92T936-734.518q0 16.493-10.425 25.505Q915.15-700 901-700h-59v57.895q0 16.63-10.025 25.868Q821.95-607 806.412-607q-16.812 0-26.112-9-9.3-9-9.3-25.702V-700Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <form id="deleteForm" action="{{ route('actions.offers.destroy') }}" method="POST"
            class="w-full grid grid-cols-2 grid-rows-1 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
            @csrf
            @forelse ($data as $row)
                <div
                    class="w-full aspect-square rounded-md relative overflow-hidden bg-[#fcfcfc] flex items-center justify-center">
                    <input id="check-{{ $row->id }}" type="checkbox" name="images[]" onclick="ShowDeleteButton()"
                        class="peer cursor-pointer check opacity-0 absolute inset-0 w-full h-full"
                        value="{{ $row->id }}" />
                    <label for="check-{{ $row->id }}"
                        class="hidden absolute inset-0 peer-checked:!flex w-full h-full items-center justify-center bg-gray-500 bg-opacity-50">
                        <svg class="w-12 h-12 block lg:w-20 lg:h-20 text-white" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M297-217q-10 0-18.1-3-8.1-3-13.9-9L84-410q-13-12-13-31.957Q71-461.913 84-476q13.8-13 31.9-12.5Q134-488 148-476l149 149 65 65-32.082 33.4q-6.775 5.8-14.847 8.7Q307-217 297-217Zm165-22q-8.571 0-17.321-3.818Q435.929-246.636 430-253L249-434q-15-14.087-14.5-33.543Q235-487 249-500q12-14 32.1-13.5T315-499l147 147 351-349q12-13 31.1-13t32.9 13q14 13.848 13.5 32.924T878-637L494-253q-6 6-14.727 10-8.728 4-17.273 4Zm2-171-63-65 227-228q13-13 31.957-13 18.956 0 33.043 13 13 13.8 13 32.9 0 19.1-13 31.1L464-410Z" />
                        </svg>
                    </label>
                    <img src="{{ asset('storage/offers/' . $row->name) }}" alt="offer {{ $row->id }}"
                        class="block w-full h-full object-cover pointer-events-none" />
                </div>
            @empty
                <div
                    class="col-span-2 md:col-span-3 xl:col-span-4 2xl:col-span-5 font-black text-gray-950 text-lg p-4 text-center">
                    {{ __('NO IMAGES FOUND') }}
                </div>
            @endforelse
        </form>

        <form id="uploadForm" action="{{ route('actions.offers.create') }}" method="POST" class="w-0 h-0 overflow-hidden"
            enctype="multipart/form-data">
            @csrf
            <input id="file" type="file" name="images[]" accept="image/*" multiple />
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        DeleteAction();
        UploadAction();
    </script>
@endsection
