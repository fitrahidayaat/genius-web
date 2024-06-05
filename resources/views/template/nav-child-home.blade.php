<nav class="flex justify-between px-12 pt-10 pb-6 bg-white w-full fixed">
    <a href="/dashboard">
        <svg width="84" height="51" viewBox="0 0 84 51" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M39.2185 48.5941C-4.84063 43.781 2.50722 13.2465 2.50722 13.2465C4.14008 7.56756 6.75265 3.1227 12.9575 1.65313C16.8023 4.65668 16.5498 6.71502 14.9106 11.4537C16.6308 10.0781 21.6866 7.37501 28.1482 7.56756C28.5564 10.736 26.4262 18.1604 18.25 18.8779C14.8476 18.7384 9.10513 19.8848 13.3541 25.5862C19.4532 29.9206 26.6837 28.9383 30.2869 24.5111C38.1724 14.8224 44.3812 4.99143 56.8295 3.82093C66.7881 2.88452 71.9553 7.20823 73.294 9.48714C78.1507 8.94464 84.0318 12.3704 81.2705 19.2818C78.055 27.3304 70.6057 52.023 39.2185 48.5941Z"
                fill="#0CAFF5" />
            <path
                d="M2.50722 13.2465C2.50722 13.2465 -4.84063 43.781 39.2185 48.5941C70.6057 52.023 78.055 27.3304 81.2705 19.2818C84.0318 12.3704 78.1507 8.94464 73.294 9.48714M2.50722 13.2465C4.14008 7.56756 6.75265 3.1227 12.9575 1.65313C16.8023 4.65668 16.5498 6.71502 14.9106 11.4537C16.6308 10.0781 21.6866 7.37501 28.1482 7.56756C28.5564 10.736 26.4262 18.1604 18.25 18.8779C14.8476 18.7384 9.10513 19.8848 13.3541 25.5862M2.50722 13.2465C0.71107 23.3681 10.323 23.4322 13.3541 25.5862M73.294 9.48714C72.4948 9.5764 71.6631 9.7965 70.822 10.1573L73.294 9.48714ZM73.294 9.48714C71.9553 7.20823 66.7881 2.88452 56.8295 3.82093C44.3812 4.99143 38.1724 14.8224 30.2869 24.5111C26.6837 28.9383 19.4532 29.9206 13.3541 25.5862"
                stroke="#0CAFF5" stroke-width="3" />
            <circle cx="20.7955" cy="3.44929" r="2.44929" fill="#0CAFF5" />
        </svg>
    </a>

    <form action="">
        <input type="search" name="search" id="search"
            class="border rounded-full w-96 px-5 h-10 bg-gray-100 outline-none" placeholder="search">
    </form>
    <ul class="flex gap-8 text-gray-400">
        <li class="flex flex-col items-end">
            {{ $user->name }}
        </li>

        <li>
            <a href="/child/notification" class="">
                <div class="rounded-full bg-gray-100 p-2 -mt-2">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.4727 3.19092C8.46363 3.19092 6.01817 5.63637 6.01817 8.64546V11.2727C6.01817 11.8273 5.78181 12.6727 5.49999 13.1455L4.45454 14.8818C3.80908 15.9546 4.25454 17.1455 5.43635 17.5455C9.35454 18.8546 13.5818 18.8546 17.5 17.5455C18.6 17.1818 19.0818 15.8818 18.4818 14.8818L17.4364 13.1455C17.1636 12.6727 16.9273 11.8273 16.9273 11.2727V8.64546C16.9273 5.64546 14.4727 3.19092 11.4727 3.19092Z"
                            stroke="#111111" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" />
                        <path
                            d="M13.1545 3.45454C12.8727 3.37272 12.5818 3.30908 12.2818 3.27272C11.4091 3.16363 10.5727 3.22726 9.79089 3.45454C10.0545 2.78181 10.7091 2.30908 11.4727 2.30908C12.2363 2.30908 12.8909 2.78181 13.1545 3.45454Z"
                            stroke="#111111" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M14.1999 17.8728C14.1999 19.3728 12.9726 20.6001 11.4726 20.6001C10.7272 20.6001 10.0363 20.291 9.54536 19.8001C9.05445 19.3092 8.74536 18.6183 8.74536 17.8728"
                            stroke="#111111" stroke-width="1.5" stroke-miterlimit="10" />
                    </svg>

                </div>
            </a>
        </li>
        <li>
            <button id="profile" >
                <img src="{{ asset('storage/' . $user->image_path) }}" alt="" class="w-10 rounded-full -mt-2">
            </button>
            <div id="profile-dropdown"
                class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/setting" class="transition-all text-gray-700 block px-4 py-2 text-sm hover:bg-slate-100" role="menuitem"
                        tabindex="-1" id="menu-item-0">Profile</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="text-gray-700 block px-4 py-2 text-sm hover:bg-slate-100 w-full text-left" role="menuitem"
                            tabindex="-1" id="menu-item-0" type="submit">Logout</button>

                        </form>
                </div>
            </div>
            <script>
                document.getElementById('profile').addEventListener('click', function() {
                    const menu = document.getElementById('profile-dropdown');
                    if (menu.classList.contains('hidden')) {
                        menu.classList.remove('hidden');
                    } else {
                        menu.classList.add('hidden');
                    }
                });
            </script>
        </li>
    </ul>
</nav>
