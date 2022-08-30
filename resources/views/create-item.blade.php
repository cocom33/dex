@extends('layouts.user_type.auth')

@push('style')
  @livewireStyles
@endpush

@section('content')
  @livewire('create-item')
@endsection

@push('script')
  @livewireScripts
@endpush
