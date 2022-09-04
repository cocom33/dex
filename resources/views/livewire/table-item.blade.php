<div>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Items</h5>
            <input type="text" class="form-control ms-auto me-3 w-25" wire:model="search" placeholder="Search Any Item">
            <a href="#" class="btn bg-gradient-primary mb-0" type="button">+&nbsp; New Item</a>
          </div>
        </div>
        <div class="card-body mb-2">
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
                        @if (!preg_match('/^http(s)?:\/\/[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $item->image))
                          <img src="{{ asset('storage/' . $item->image) }}" class="avatar avatar-sm me-3 img-fluid">
                        @else
                          <img src="{{ $item->image }}" class="avatar avatar-sm me-3 img-fluid">
                        @endif
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
                      <a role="button" data-bs-toggle="modal" data-bs-target="#showItem"
                        wire:click="showItem({{ $item }})">
                        <i class="fas fa-eye text-success"></i>
                      </a>
                      <a role="button" class="mx-3" data-bs-toggle="tooltip">
                        <i class="fas fa-user-edit text-warning"></i>
                      </a>
                      <a type="button" data-bs-toggle="modal" data-bs-target="#DeleteModal"
                        wire:click="deleteItem({{ $item->id_wp }})">
                        <i class="fas fa-trash text-danger"></i>
                      </a>
                      {{-- <a type="button" wire:click="deleteItem({{ $item->id }})">
                        <i class="fas fa-trash text-secondary"></i>
                      </a> --}}
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
          <div class="ms-3 mt-3">
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
          <div class="d-flex align-items-center">
            <div style="height: 100px; widht: 100px">
              @if (!preg_match('/^http(s)?:\/\/[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $image))
                <img src="{{ asset('storage/' . $image) }}" class="h-100 m-auto rounded rounded-3">
              @else
                <img src="{{ $image }}" class="h-100 m-auto rounded rounded-3">
              @endif
            </div>
            <div class="ms-3">
              <div class="d-flex">
                <p>No. {{ $id_wp }}</p>
                <h6 class="ms-3">{{ $name }}</h6>
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

  <div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <form wire:submit.prevent="destroyItem" id="deleteForm">
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
