<!DOCTYPE html>
<html lang="en">

@include('common.head')

<body>
    
    @include('common.header')

    @yield('content')

    @include('common.footer')
    
    @include('common.script')
</body>
</html>