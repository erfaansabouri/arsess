<!DOCTYPE html>
<html lang="en">
@include('arses.partials.head')

<body>
<div class="bodyDiv overflow-hidden">

@include('arses.partials.top-moving-logo')

@yield('content')


@include('arses.partials.footer')
@include('arses.partials.scripts')
</div>
</body>
</html>
