<!DOCTYPE html>
<html lang="en">
@include('arses.partials.head')

<body>

<div class="bodyDiv overflow-hidden">
    @yield('content')


    @include('arses.partials.footer')
</div>

@include('arses.partials.scripts')

</body>
</html>
