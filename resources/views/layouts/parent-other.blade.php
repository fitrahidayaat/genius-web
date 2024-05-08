@include('template.head')

<body class="font-lato bg-gray-100">
    @include('template.nav-parent-home')

    <div class="flex">
        <div class="w-72 fixed h-screen bg-white mt-[7.2rem]">
            @yield('left-sidebar')
        </div>
        <div class="ml-72 w-[100%] mt-[7.2rem]">  
            @yield('content')
        </div>
        
    </div>
    
</body>

</html>
