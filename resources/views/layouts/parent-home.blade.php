@include('template.head')

<body class="font-lato bg-gray-100">
    @include('template.nav-parent-home')

    <div class="flex">
        <div class="w-72 fixed h-screen bg-white mt-[7.2rem]">
            @yield('left-sidebar')
        </div>
        @if ($current_student)
            <div class="ml-72 w-[55%] mt-[7.2rem]">
                @yield('content')
            </div>
            <div class="w-[25%] mt-[7.2rem]">
                @yield('right-sidebar')
            </div>
        @else
            <div class="ml-72 w-[100%] mt-[7.2rem]">
                @yield('content')
            </div>
        @endif
    </div>

</body>

</html>
