@extends('layouts.user_type.auth')

@push('style')
  @livewireStyles
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
@endpush

@section('content')
  @livewire('table-item')
@endsection

@push('script')
  @livewireScripts
@endpush
