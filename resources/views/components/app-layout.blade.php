<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.styles')
    <livewire:styles/>
{{--    @vite([])--}}

    <title>{{$title}}</title>
</head>

<body>
<!-- ==========Preloader========== -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ==========Preloader========== -->
<!-- ==========Overlay========== -->
<div class="overlay"></div>
<a href="#0" class="scrollToTop">
    <i class="fas fa-angle-up"></i>
</a>
<!-- ==========Overlay========== -->

<!-- ==========Header-Section========== -->
@includeWhen(!request()->is('auth/*'), 'layouts.inc.header')
<!-- ==========Header-Section========== -->

<!-- ==========Movie-Main-Section========== -->
{{$slot}}
<!-- ==========Movie-Main-Section========== -->


@includeWhen(request()->is('home'),'layouts.inc.footer')
@include('layouts.js')
<script>
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        }
    })
</script>
@stack('scripts')

<livewire:scripts/>
</body>
</html>
