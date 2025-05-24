<!DOCTYPE html>
<html lang="en">
@include('arses.partials.head')

<body>

<div class="bodyDiv overflow-hidden">
    @include('arses.partials.custom-success-toast')
    @include('arses.partials.custom-error-toast')
    @stack('upper-content')
    @yield('content')
    @include('arses.partials.footer')
</div>

@include('arses.partials.scripts')
@stack('scripts')
</body>
</html>
