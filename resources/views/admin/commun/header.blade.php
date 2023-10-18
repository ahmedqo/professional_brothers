<header class="w-full bg-primary">
    <div class="w-full container mx-auto p-4 flex gap-2 items-center justify-start lg:justify-center">
        <button x-toggle x-targets="#main-menu" x-properties="!w-0, pointer-events-none"
            class="w-8 h-8 flex items-center justify-center rounded-full outline-none hover:bg-gray-50 hover:bg-opacity-20 focus:bg-gray-50 focus:bg-opacity-20 lg:hidden rtl:rotate-180">
            <svg class="block w-8 h-8 text-white pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M129-215q-20.75 0-33.375-12.675Q83-240.351 83-261.175 83-280 95.625-293T129-306h458q19.75 0 32.375 13.175 12.625 13.176 12.625 32Q632-240 619.375-227.5 606.75-215 587-215H129Zm0-221q-20.75 0-33.375-13.175Q83-462.351 83-482.175 83-502 95.625-514.5 108.25-527 129-527h339q18.75 0 31.875 12.675Q513-501.649 513-481.825 513-462 499.875-449 486.75-436 468-436H129Zm0-218q-20.75 0-33.375-13.175Q83-680.351 83-700.175 83-720 95.625-733 108.25-746 129-746h458q19.75 0 32.375 13.175 12.625 13.176 12.625 33Q632-680 619.375-667 606.75-654 587-654H129Zm605 173 114 113q13 14 12.5 33T847-304q-15 14-33.5 14T782-304L637-450q-14-13-14-31t14-32l145-146q13-13 31.5-13t33.5 13q13 14 12.5 33T847-594L734-481Z" />
            </svg>
        </button>
        <h1 class="text-white font-black text-base lg:text-xl">{{ __($title) }}</h1>
    </div>
</header>
