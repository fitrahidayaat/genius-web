@include('template.head')

<body class="font-lato bg-gray-100">
    @include('template.nav-auth')

    <div class="flex justify-center">
        <div class="mt-[7.2rem] w-full">
            @yield('content')
        </div>
    </div>
    
</body>

</html>
