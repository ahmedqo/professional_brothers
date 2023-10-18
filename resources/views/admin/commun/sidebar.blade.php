<aside id="main-menu"
    class="overflow-hidden bg-gray-950 bg-opacity-40 backdrop-blur-sm text-white w-full fixed top-0 bottom-0 ltr:left-0 rtl:right-0 z-50 transition-all duration-200 pointer-events-none !w-0 lg:!w-[200px] lg:sticky lg:top-0 lg:bottom-auto lg:h-screen lg:ltr:left-auto lg:rtl:right-auto lg:pointer-events-auto">
    <div class="w-full p-2 flex absolute top-0 left-0 right-0 z-[-1] lg:hidden">
        <button x-toggle x-targets="#main-menu" x-properties="!w-0, pointer-events-none"
            class="ms-auto w-10 h-10 flex items-center justify-center rounded-full outline-none hover:bg-gray-50 hover:bg-opacity-20 focus:bg-gray-50 focus:bg-opacity-20">
            <svg class="block w-6 h-6 text-white pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M480-416 282-218q-14 14-32.5 14T218-218q-14-13-14-31.5t14-31.5l198-199-198-198q-13-13-13-32t13-32q12-13 31-13t33 13l198 199 199-200q13-13 31.5-13t32.5 13q13 14 13 32.5T743-679L544-481l198 199q14 14 14 32.5T742-218q-13 14-32 14t-31-14L480-416Z" />
            </svg>
        </button>
    </div>
    <nav
        class="w-9/12 max-w-[200px] h-full flex flex-col p-2 pt-0 bg-[#fcfcfc] overflow-y-auto lg:w-full lg:border-e lg:border-gray-200">
        <header class="w-full flex items-center justify-center h-[3.75rem] mb-4">
            <img src="{{ asset('logo.png') }}" class="h-[90%] block mx-auto" />
        </header>
        <ul class="flex flex-col">
            <li class="w-full">
                <a href="{{ route('views.profile.edit') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white  @if (request()->routeIs('views.profile.edit')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M233-240h237v-13q0-18-9-32t-22.128-17.692q-31.975-11.654-49.923-14.981Q371-321 354-321q-19 0-40 4.5T266-303q-14.583 5.135-23.792 18.089Q233-271.957 233-253v13Zm359-67h120q10.4 0 17.2-6.813 6.8-6.813 6.8-17.234 0-10.42-6.8-17.186Q722.4-355 712-355H592q-10.4 0-17.2 6.813-6.8 6.813-6.8 17.234 0 10.42 6.8 17.186Q581.6-307 592-307Zm-237.735-48q22.235 0 37.485-15.515Q407-386.029 407-408.265q0-22.235-15.056-37.485Q376.887-461 354.235-461q-21.735 0-37.485 15.056Q301-430.887 301-408.235q0 21.735 15.515 37.485Q332.029-355 354.265-355ZM592-419h121q9.667 0 16.333-7.553Q736-434.105 736-444.186 736-453 729.067-460q-6.934-7-16.067-7H592q-10.833 0-17.417 6.986-6.583 6.986-6.583 16.7 0 9.314 6.8 16.814T592-419ZM149-59q-37.175 0-64.088-26.912Q58-112.825 58-150v-461q0-37.588 26.912-64.794Q111.825-703 149-703h219v-125q0-32.125 20.822-53.562Q409.644-903 443.911-903h73.678q32.536 0 53.973 21.438Q593-860.125 593-828v125h218q37.588 0 64.794 27.206Q903-648.588 903-611v461q0 37.175-27.206 64.088Q848.588-59 811-59H149Zm303-544h57v-216h-57v216Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Personal profile') }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('views.types.show') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white @if (request()->routeIs('views.types.show')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M340-335H213q-29 0-41.5-24t3.5-48l372-535q8-13 23.5-17.5t30.5.5q16 4 24 19t7 30l-40 323h161q29 0 40.5 26.5T788-512L382-24q-10 12-25.5 16.5T327-11q-13-6-21-18.5T300-61l40-274Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Types list') }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('views.users.show') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white @if (request()->routeIs('views.users.show')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M68-130q-20.1 0-33.05-12.45Q22-154.9 22-174.708V-246q0-42.011 21.188-75.36 21.187-33.348 59.856-50.662Q178-404 238.469-419 298.938-434 363-434q66.062 0 126.031 15Q549-404 624-372q38.812 16.018 60.406 49.452Q706-289.113 706-246v71.708Q706-155 693.275-142.5T660-130H68Zm679 0q11-5 20.5-17.5T777-177v-67q0-65-32.5-108T659-432q60 10 113 24.5t88.88 31.939q34.958 18.329 56.539 52.945Q939-288 939-241v66.787q0 19.505-13.225 31.859Q912.55-130 893-130H747ZM364-494q-71.55 0-115.275-43.725Q205-581.45 205-652.5q0-71.05 43.725-115.275Q292.45-812 363.5-812q70.05 0 115.275 44.113Q524-723.775 524-653q0 71.55-45.112 115.275Q433.775-494 364-494Zm386-159q0 70.55-44.602 114.775Q660.796-494 591.035-494 578-494 567.5-495.5T543-502q26-27.412 38.5-65.107 12.5-37.696 12.5-85.599 0-46.903-12.5-83.598Q569-773 543-804q10.75-3.75 23.5-5.875T591-812q69.775 0 114.387 44.613Q750-722.775 750-653Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Users list') }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('views.users.create') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white @if (request()->routeIs('views.users.create')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M778.825-433q-16.25 0-25.038-9.85Q745-452.7 745-468v-89h-90q-16.175 0-25.088-9.585Q621-576.169 621-591.86q0-15.54 8.912-24.84Q638.825-626 655-626h90v-89q0-16.175 8.958-25.088 8.958-8.912 24.7-8.912 14.742 0 25.042 8.912Q814-731.175 814-715v89h88q15.75 0 25.375 9.475Q937-607.049 937-592.009q0 16.041-9.625 25.525Q917.75-557 902-557h-88v89q0 15.3-10.175 25.15-10.176 9.85-25 9.85Zm-414.206-60q-76.319 0-124.469-48.065Q192-589.13 192-664.796q0-76.667 48.177-124.435Q288.354-837 364.177-837 441-837 489.5-789.231 538-741.463 538-664.796q0 75.666-48.237 123.731T364.619-493ZM68-130q-19.75 0-32.375-12.625T23-174.708v-70.896q0-42.709 21.695-76.001 21.696-33.291 58.981-50.616 75.169-34.389 136.044-48.084Q300.594-434 364.338-434 428-434 488-420q60 14 137 48 38.531 16.553 60.266 49.503Q707-289.547 707-246v71.292q0 19.458-13.4 32.083T661-130H68Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('New user') }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('views.gallery.show') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white @if (request()->routeIs('views.gallery.show')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M119-187q-39.463 0-65.731-26.269Q27-239.538 27-279v-403q0-38 26.269-64.5Q79.537-773 119-773h403q38 0 64.5 26.5T613-682v403q0 39.462-26.5 65.731Q560-187 522-187H119Zm602-320q-21.875 0-37.938-16.062Q667-539.125 667-561v-159q0-21.875 16.062-37.438Q699.125-773 721-773h159q21.875 0 37.438 15.562Q933-741.875 933-720v159q0 21.875-15.562 37.938Q901.875-507 880-507H721ZM184.818-360h271.364Q463-360 467-367t-2-14l-80.169-106.253Q383-491 375.231-491T364-487l-64 87-45-60q-3-4-10.5-4t-10.265 3.647L175-381q-5 7-1.5 14t11.318 7ZM721-187q-21.875 0-37.938-15.562Q667-218.125 667-241v-159q0-21.875 16.062-37.438Q699.125-453 721-453h159q21.875 0 37.438 15.562Q933-421.875 933-400v159q0 22.875-15.562 38.438Q901.875-187 880-187H721Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Gallery') }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('views.offers.show') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white @if (request()->routeIs('views.offers.show')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="m480-389 54 43q12 10 26-.5t11-24.5l-22-68 54-46q12-9 6.5-24.5T589-525h-64l-24-66q-5-16-21-16t-21 16l-24 66h-63q-16 0-22 15t7 25l54 46-20 69q-5 14 8.5 24t27.5 0l53-43ZM150-138q-38 0-64.5-26.5T59-229v-135q0-7 5-15.5T78-391q30-8 48-35t18-54q0-27-18-54t-48-35q-9-3-14-11.5T59-597v-133q0-38 26.5-65t64.5-27h660q38 0 65 27t27 65v134q0 7-5.5 15.5T882-569q-30 8-48 35t-18 54q0 27 18 54t48 35q9 3 14.5 11.5T902-364v135q0 38-27 64.5T810-138H150Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Offers') }}</span>
                </a>
            </li>
        </ul>
        <ul class="flex flex-col mt-auto">
            <li class="w-full">
                <a href="{{ route('actions.language.show', Sys::lang() ? 'ar' : 'en') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M480.297-59Q392-59 315.5-91T181-181.5Q123-240 91-316.949q-32-76.948-32-165.52Q59-571 91-647.5t90-133q58-56.5 134.449-89 76.448-32.5 165.02-32.5Q569-902 645-869.5t134 89q58 56.5 90.5 133.138T902-482q0 88.404-32.5 165.202T779-181.5Q721-123 644.774-91T480.297-59ZM479-147q33-34 55.5-79.5T573-337H388q13 61 36.094 108.158T479-147Zm-81-12q-25-36-41.875-79.326Q339.25-281.651 327-337H181q36 68.806 84.5 109.403Q314-187 398-159Zm163-1q71-20 126.5-67T779-337H635.142Q622-283 604-239.5T561-160ZM162.035-393H317q-4-27-4.5-48t-.5-41q0-25 1-43.5t5-42.5H162.035Q156-544 153-526t-3 44q0 25 3 45t9.035 44Zm214.996 0H584q3-31 3.5-50t.5-39q0-20-.5-37.5t-3.531-48.5H377q-4 31-5 48.5t-1 37.5q0 20 1 39t5.031 50ZM643-393h155q4-24 7.5-44t3.5-45q0-26-3.5-44t-7.5-42H644q1 37 2 53.675 1 16.675 1 32.325 0 21-1.5 40t-2.5 49Zm-8.858-232H779q-34-66-89.5-113T560-802q25 37 43 79t31.142 98ZM388-625h186q-9-49.721-34.5-100.361Q514-776 479-811q-29 25-50.5 68.5T388-625Zm-207 0h146.816Q339-678 355-719.5t42-81.5q-75 17-129 62t-87 114Z" />
                    </svg>
                    <span class="text-sm font-medium"
                        style="font-family: Arial, Helvetica, sans-serif">{{ Sys::lang() ? 'العربية' : 'English' }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('views.profile.password') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white @if (request()->routeIs('views.profile.password')) !bg-primary !text-white @endif">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M786-639q-6.375 0-12.688-4Q767-647 764-653l-29-61-62-29q-5-3-9-9.312-4-6.313-4-12.688 0-6.375 4-12.688 4-6.312 9-9.312l62-28 29-63q3-6 9.312-9 6.313-3 12.688-3 5.375 0 11.688 3Q804-884 808-878l29 63 61 28q6 3 10.5 9.312Q913-771.375 913-765q0 6.375-4.5 12.688Q904-746 898-743l-61 29-29 61q-4 6-10.312 10-6.313 4-11.688 4Zm82.032 325q-2.677 0-6.855-2-4.177-2-6.177-6l-16-35-36-17q-2-1-8-12.968 0-2.677 2.5-6.355Q800-397 803-401l36-15 16-36q2-2 13.484-8 2.839 0 7.177 2.5Q880-455 881-452l17 36 35 15q2 3 8 14.484 0 3.839-2.5 7.677Q936-375 933-374l-35 17-17 35q-2 2-12.968 8ZM334.483-49Q316-49 303.5-60.5T289-90l-6-56q-10 2-22-3.5T242-163l-44 18q-15 8-30.5 3T142-163L77-266q-9-15-4-33t19-29l43-28q-5-11.5-5-21t5-22l-43-26q-14-12-19-30t4-33l65-104q10-13 25.5-18.5t30.5.5l44 18q7-7 19-12.5t22-4.645L289-665q2-16 14.5-28t30.983-12H457q17.973 0 30.486 12Q500-681 503-665l7 55.855q8-.855 20 4.645t20 12.5l43-18q14-6 30.432-.283Q639.865-604.565 650-592l64 104q9 15.115 4.5 33.163Q714-436.788 701-425l-44 26q5 12.5 5 22t-5 21l44 28q13 10.788 17.5 28.837Q723-281.115 714-266l-64 103q-10 16-26.5 21t-30.5-3l-43-18q-8 8.333-20 13.667Q518-144 510-146l-7 56q-3 18-15.514 29.5Q474.973-49 457-49H334.483ZM396-256q51 0 86-34.417 35-34.416 35-86.583 0-52-35-86t-86.5-34q-51.5 0-85.5 34t-34 86.5q0 51.5 33.917 86Q343.833-256 396-256Zm0-121Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Settings') }}</span>
                </a>
            </li>
            <li class="w-full">
                <a href="{{ route('actions.logout.show') }}"
                    class="min-w-max w-full flex gap-2 items-center p-2 rounded-md outline-none text-gray-900 hover:bg-primary hover:text-white focus:bg-primary focus:text-white">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M635-306q-13-15-13.5-33.125T635-371l64-63H409q-19.775 0-32.388-13.36Q364-460.719 364-479.86q0-20.14 12.612-32.64Q389.225-525 409-525h288l-66-67q-13-12.267-12.5-30.081t14.714-31.866Q644.661-666 664.705-665.5 684.75-665 699-653l141 142q4.909 6.327 8.955 15.008Q853-487.311 853-478.676q0 8.636-4.045 17.106Q844.909-453.1 840-448L699.006-305.089Q686-292 668-293t-33-13ZM181-97q-38.1 0-65.05-26.975Q89-150.95 89-188v-584q0-37.463 26.95-64.731Q142.9-864 181-864h251q20.2 0 33.1 13.763 12.9 13.763 12.9 32.816 0 20.053-12.9 32.737Q452.2-772 432-772H181v584h251q20.2 0 33.1 12.675 12.9 12.676 12.9 32.816 0 19.141-12.9 32.325Q452.2-97 432-97H181Z" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Logout') }}</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
