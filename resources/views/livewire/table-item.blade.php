<div>
  <div>
    <div class="row">
      <div class="col-12">
        @if (session()->get('success'))
          <div class="alert alert-success alert-dismissible mx-auto fade show">
            <h3 class="text-white">Data Berhasil Ditambahkan</h3>
            <button class="btn-close" data-bs-dismiss="alert" type="button"></button>
          </div>
        @endif
      </div>
      <div class="col-12">
        <div class="card mb-4 mx-4">
          <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
              <div>
                <h5 class="mb-0">All Items</h5>
              </div>
              <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New
                Item</a>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      ID
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Photo
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Name
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Max Refine
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Type
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      test
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">{{ $item->id_wp }}</p>
                      </td>
                      <td>
                        <div>
                          <img src="{{ asset('storage/' . $item->image) }}" class="avatar avatar-sm me-3 img-fluid">
                        </div>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">{{ $item->refine }}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">{{ $item->type }}</p>
                      </td>
                      <td class="text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $item->id_wp }}</span>
                      </td>
                      <td class="text-center">
                        <form action="" class="">
                          <a data-bs-toggle="modal" data-bs-target="#showItem"
                            wire:click="showItem({{ $item }})">
                            <i class="fas fa-eye"></i>
                          </a>

                          <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Item">
                            <i class="fas fa-user-edit text-secondary"></i>
                          </a>

                          {{-- <a class="" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                data-bs-target="#DeleteModal">
                                <i class="fas fa-trash text-secondary"></i>
                              </a> --}}
                          <a type="button" data-id="{{ $item->id }}" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal">
                            <i class="fas fa-trash text-secondary"></i>
                          </a>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-muted text-center">Tidak ada Data
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            {{ $items->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="showItem" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row align-items-center">
            <div class="col-md-3">
              <img src="{{ asset('storage/' . $image) }}" alt="" class="w-100">
            </div>
            <div class="col-auto">
              <h4 class="modal-title">{{ $name }}</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              ID : {{ $id_wp }}
            </div>
            <div class="col-md-3">
              star : @for ($i = 0; $i <= $refine; $i++)
                <i class="fas fa-star"></i>
              @endfor
            </div>
            <div class="col-md-3">
              awaken : {{ $awaken }}
            </div>
            <div class="col-md-3">
              disamble : {{ $dismantle }}
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-default" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <form wire:submit.prevent="deleteItem" id="deleteForm" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title tect-center">Konfirmasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p class="text-center mb-0">Anda yakin ingin menghapus user ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Ya, Hapus</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
