@include('template.head')

<body class="font-lato bg-gray-100">
    @include('template.nav-parent-home')

    <div class="flex">
        <div class="w-72 fixed h-screen bg-white mt-[7.2rem]">
            @yield('left-sidebar')
        </div>
        <div class="ml-72 w-[70%] mt-[7.2rem]">  
            @yield('content')
        </div>
        <div class="w-[30%] mt-[7.2rem]">
            @yield('right-sidebar')
        </div>
    </div>
    
</body>

</html>
