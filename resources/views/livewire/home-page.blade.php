<div>
  @push('style')
    @livewireStyles
  @endpush
  <div class="row">
    <div class="col-lg-12">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation" wire:click="semua">
            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
              type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
          </li>
          <li class="nav-item" role="presentation" wire:click="dress">
            <button class="nav-link" id="pills-dress-tab" data-bs-toggle="pill" data-bs-target="#pills-dress"
              type="button" role="tab" aria-controls="pills-dress" aria-selected="false">Dress</button>
          </li>
          <li class="nav-item" role="presentation" wire:click="badge">
            <button class="nav-link" id="pills-badge-tab" data-bs-toggle="pill" data-bs-target="#pills-badge"
              type="button" role="tab" aria-controls="pills-badge" aria-selected="false">Badge</button>
          </li>
          <li class="nav-item" role="presentation" wire:click="weapon">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
              type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Weapon</button>
          </li>
          <li class="nav-item" role="presentation" wire:click="pet">
            <button class="nav-link" id="pills-Pet-tab" data-bs-toggle="pill" data-bs-target="#pills-Pet" type="button"
              role="tab" aria-controls="pills-Pet" aria-selected="false">Pet</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">...</div>
          <div class="tab-pane fade" id="pills-dress" role="tabpanel" aria-labelledby="pills-dress-tab"
            tabindex="0">...</div>
          <div class="tab-pane fade" id="pills-badge" role="tabpanel" aria-labelledby="pills-badge-tab"
            tabindex="0">...</div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">...</div>
          <div class="tab-pane fade" id="pills-Pet" role="tabpanel" aria-labelledby="pills-Pet-tab" tabindex="0">
            ...</div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      @foreach ($items as $item)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-bs-toggle="modal" data-bs-target="#showItem"
          wire:click="showItem({{ $item }})">
          <div class="bg-light rounded rounded-4 mt-3">
            <div class="p-3 text-center text-muted">
              @if (!preg_match('/^http(s)?:\/\/[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $item->image))
                {{-- <div
                  style="background-image: url(storage/{{ $item->image }}); width: 150px; height: 150px; background-position:center; background-size:cover"
                  class="rounded rounded-3 mb-3"></div> --}}
                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid w-100 rounded rounded-3 mb-3">
              @else
                {{-- <div
                  style="background-image: url({{ $item->image }}); width: 150px; height: 150px; background-position:center; background-size:cover"
                  class="rounded rounded-3 mb-3"></div> --}}
                <img src="{{ $item->image }}" class="img-fluid w-100 rounded rounded-3 mb-3">
              @endif
              <h5 style="font-size: 16px">{{ $item->id_wp }}</h5>
              <p style="font-size: 18px" class="mb-0">{{ $item->name }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="mt-3">
      {{ $items->links() }}
    </div>
  </div>


  <div class="modal fade" id="showItem" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex align-items-center">
            <div style="height: 100px; widht: 100px">
              @if (!preg_match('/^http(s)?:\/\/[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $image))
                <img src="{{ asset('storage/' . $image) }}" class="h-100 m-auto rounded rounded-3">
              @else
                <img src="{{ $image }}" class="h-100 m-auto rounded rounded-3">
              @endif
            </div>
            <div class="ms-3">
              <div class="d-flex align-items-center mb-3">
                <p class="mb-0">No. {{ $id_wp }}</p>
                <h6 class="ms-3 mb-0">{{ $name }}</h6>
              </div>
              <div class="mb-3 d-flex">
                @if ($type == 'weapon')
                  <img src="{{ asset('storage/element/' . $weapon_element . '.png') }}" style="width: 25px"
                    class="me-2">
                @endif
                <div>
                  @for ($i = 1; $i <= $refine; $i++)
                    <i class="fas fa-star text-warning fs-5 mt-auto"></i>
                  @endfor
                </div>
              </div>
              <div>
                @if ($type == 'pet')
                @else
                  {{ $dismantle == 'yes' ? 'this equipment can be dismantled' : "this equipment can't be dismatled" }}
                @endif
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="text-warning">
              <strong>{{ $skill_1 }}</strong>
            </div>
            <div>
              <p>{{ $skill_1_desc }}</p>
            </div>
            <div class="text-warning">
              <strong>{{ $skill_2 }}</strong>
            </div>
            <div>
              <p>{{ $skill_2_desc }}</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-default" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @push('script')
    @livewireScripts
  @endpush
</div>
