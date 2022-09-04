@extends('layouts.user_type.auth')

@push('style')
  @livewireStyles
  <style>
    #display_image {
      width: 200px;
      height: 200px;
      border-radius: 10px;
      background-size: cover;
    }
  </style>
@endpush

@section('content')
  @livewire('create-item')
@endsection

@push('script')
  @livewireScripts
  <script>
    const image_input = document.querySelector("#image");
    var uploaded_image = "";

    image_input.addEventListener("change", function() {
      const reader = new FileReader();
      reader.addEventListener("load", () => {
        uploaded_image = reader.result;
        document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`;
      });
      reader.readAsDataURL(this.files[0]);
    })

    document.getElementById('display_image').addEventListener("click", () =>
      image_input.click()
    );
  </script>
@endpush
