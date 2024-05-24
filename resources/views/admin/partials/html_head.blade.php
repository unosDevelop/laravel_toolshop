<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
@php
    $currentUrl = request()->path();
    $pageTitle = ucfirst(str_replace('-', ' ', $currentUrl));
@endphp
<title>Toolshop - {{ $pageTitle }}</title>
<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon/favicon.ico') }}">
<script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
{{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
