<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  @livewireStyles

</head>
<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    @if(auth()->user()->role == 'Admin')
    @include('layouts.navigation')
    @elseif(auth()->user()->role == 'Teacher')
    @include('layouts.teacher_navigation')
    @elseif(auth()->user()->role == 'Librarian')
    @include('layouts.librarian_navigation')
    @elseif(auth()->user()->role == 'Parent')
    @include('layouts.parent_navigation')
    @else
    @include('layouts.guest')
    @endif



    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>

    <!-- Page Content -->
    <main>
      {{ $slot }}
      @yield('content')
      @yield('scripts')
    </main>
  </div>
      @livewireScripts
</body>
</html>
