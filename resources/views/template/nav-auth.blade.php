<nav class="flex justify-between px-12 pt-10 pb-6 bg-white w-full fixed">
    <a href="/">
        <svg width="84" height="51" viewBox="0 0 84 51" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M39.2185 48.5941C-4.84063 43.781 2.50722 13.2465 2.50722 13.2465C4.14008 7.56756 6.75265 3.1227 12.9575 1.65313C16.8023 4.65668 16.5498 6.71502 14.9106 11.4537C16.6308 10.0781 21.6866 7.37501 28.1482 7.56756C28.5564 10.736 26.4262 18.1604 18.25 18.8779C14.8476 18.7384 9.10513 19.8848 13.3541 25.5862C19.4532 29.9206 26.6837 28.9383 30.2869 24.5111C38.1724 14.8224 44.3812 4.99143 56.8295 3.82093C66.7881 2.88452 71.9553 7.20823 73.294 9.48714C78.1507 8.94464 84.0318 12.3704 81.2705 19.2818C78.055 27.3304 70.6057 52.023 39.2185 48.5941Z" fill="#0CAFF5"/>
            <path d="M2.50722 13.2465C2.50722 13.2465 -4.84063 43.781 39.2185 48.5941C70.6057 52.023 78.055 27.3304 81.2705 19.2818C84.0318 12.3704 78.1507 8.94464 73.294 9.48714M2.50722 13.2465C4.14008 7.56756 6.75265 3.1227 12.9575 1.65313C16.8023 4.65668 16.5498 6.71502 14.9106 11.4537C16.6308 10.0781 21.6866 7.37501 28.1482 7.56756C28.5564 10.736 26.4262 18.1604 18.25 18.8779C14.8476 18.7384 9.10513 19.8848 13.3541 25.5862M2.50722 13.2465C0.71107 23.3681 10.323 23.4322 13.3541 25.5862M73.294 9.48714C72.4948 9.5764 71.6631 9.7965 70.822 10.1573L73.294 9.48714ZM73.294 9.48714C71.9553 7.20823 66.7881 2.88452 56.8295 3.82093C44.3812 4.99143 38.1724 14.8224 30.2869 24.5111C26.6837 28.9383 19.4532 29.9206 13.3541 25.5862" stroke="#0CAFF5" stroke-width="3"/>
            <circle cx="20.7955" cy="3.44929" r="2.44929" fill="#0CAFF5"/>
            </svg>
    </a>
        
    <ul class="flex gap-8 text-gray-400">
        @if (request()->is('/'))
            <li><a href="/" class="hover:text-black text-gray-800">Tentang</a></li>
        @else
            <li><a href="/" class="hover:text-gray-800">Tentang</a></li>
        @endif

        @if (request()->is('faq'))
            <li><a href="/faq" class="hover:text-black text-gray-800">FAQ</a></li>
        @else
            <li><a href="/faq" class="hover:text-gray-800">FAQ</a></li>
        @endif
        @if (request()->is('register') || request()->is('register/child') || request()->is('register/parent'))
            <li><a href="/register" class="hover:text-black text-gray-800">Daftar Akun</a></li>
        @else
            <li><a href="/register" class="hover:text-gray-800">Daftar Akun</a></li>
        @endif

        <li><a href="/login"
                class="px-12 py-4 bg-primary rounded-full text-white hover:bg-primary-darker">Masuk</a></li>
    </ul>
</nav>