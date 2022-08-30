<div class="container-fluid py-4">
  <div class="card">
    <div class="card-body pt-4 p-3">
      <form wire:submit.prevent="store" enctype="multipart/form-data">
        {{-- input gambar --}}
        <div class="row align-items-center">
          <div class="col-auto" style="width: 200px">
            <img src="{{ asset('assets/img/bruce-mars.jpg') }}" alt="insert image" id="display_image"
              class="img-fluid rounded rounded-3">
          </div>
          <div class="col">
            <div class="form-group">
              <label for="image" class="form-label">Insert Image</label>
              <input type="file" id="image" wire:model.defer="image" class="form-control">
            </div>

            <div class="row">
              <div class="form-group col-md-7">
                <label for="name" class="form-control-label">{{ __('Full Name') }}</label>
                <div>
                  <input class="form-control @error('name') border border-danger rounded-3 @enderror" type="text"
                    placeholder="Name" id="name" wire:model.defer="name">
                  @error('name')
                    <p class="text-danger text-xs ms-2 mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group col-md-5">
                <label for="id_wp">ID</label>
                <div>
                  <input type="number" class="form-control @error('id_wp') border border-danger rounded-3 @enderror"
                    id="id_wp" wire:model.defer="id_wp" placeholder="ID">
                  @error('id_wp')
                    <p class="text-danger text-xs ms-2 mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row mt-3">
          <div class="col-md-3 mt-3 mt-md-0">
            <label for="refine">Full Refine</label>
            <select class="form-select" wire:model.defer="refine" id="refine">
              <option class="d-none">Choose</option>
              <option value="5">5 Star</option>
              <option value="6">6 Star</option>
              <option value="7">7 Star</option>
            </select>
          </div>

          <div class="col-md-3 mt-3 mt-md-0">
            <label for="type">Type</label>
            <select class="form-select" wire:model="type" id="type">
              <option class="d-none">Choose</option>
              <option value="dress">Dress</option>
              <option value="weapon">Weapon</option>
              <option value="badge">Badge</option>
              <option value="pet">Pet</option>
            </select>
          </div>

          <div class="col-md-3 mt-3 mt-md-0">
            <label for="weapon_type">Weapon Type</label>
            <select class="form-select" wire:model.defer="weapon_type" id="weapon_type"
              @if ($type != 'weapon') disabled @endif>
              <option class="d-none">Choose</option>
              <option value="melee">Melee</option>
              <option value="pistol">Pistol</option>
              <option value="throw">Throw</option>
              <option value="spray">Spray</option>
              <option value="dolly">Dolly</option>
              <option value="depoy">Depoy</option>
              <option value="sniper">Sniper</option>
              <option value="bow">Bow</option>
              <option value="shotgun">Shotgun</option>
              <option value="rocket">Rocket</option>
              <option value="rifle">Rifle</option>
            </select>
          </div>

          <div class="col-md-3 mt-3 mt-md-0">
            <label for="weapon_element">Weapon Element</label>
            <select class="form-select" wire:model.defer="weapon_element" id="weapon_element"
              @if ($type != 'weapon') disabled @endif>
              <option class="d-none">Choose</option>
              <option value="electric">Electric</option>
              <option value="ice">Ice</option>
              <option value="fire">Fire</option>
              <option value="phisical">Phisical</option>
              <option value="poison">Poison</option>
              <option value="energy">Energy</option>
            </select>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-3 mt-3 mt-md-0">
            <label for="awaken">Awaken</label>
            <select class="form-select" wire:model.defer="awaken" id="awaken">
              <option class="d-none">Choose</option>
              <option value="non_awaken">Non Awaken</option>
              <option value="awaken">Awaken</option>
            </select>
          </div>

          <div class="col-md-3 mt-3 mt-md-0">
            <label for="label">Label</label>
            <select class="form-select" wire:model.defer="label" id="label">
              <option class="d-none">Choose</option>
              <option value="meta">Meta</option>
              <option value="keep">Keep</option>
              <option value="lebur">Lebur</option>
            </select>
          </div>

          <div class="col-md-3 mt-3 mt-md-0">
            <label for="dismantle">Dismantle</label>
            <select class="form-select" wire:model.defer="dismantle" id="dismantle"
              @if ($type == 'pet') disabled @endif>
              <option class="d-none"></option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
        </div>

        <div class="row mt-3 p-0">
          <div class="col-6 row m-0">
            <div class="col p-0">
              <div class="form-group">
                <label for="skill_1" class="form-label">Skill 1</label>
                <div>
                  <input type="text" wire:model.defer="skill_1" id="skill_1"
                    class="form-control @error('skill_1') border border-danger rounded-3 @enderror">
                  @error('skill_1')
                    <p class="text-danger text-xs ms-2 mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="skill_1_desc" class="form-label">Skill 1 Description</label>
                <div>
                  <textarea wire:model.defer="skill_1_desc" placeholder="Skill 1 Description"
                    class="form-control @error('skill_1_desc') border border-danger rounded-3 @enderror"></textarea>
                  @error('skill_1_desc')
                    <p class="text-danger text-xs ms-2 mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 row m-0">
            <div class="col p-0">
              <div class="form-group">
                <label for="skill_2" class="form-label">Skill 2</label>
                <div>
                  <input type="text" wire:model.defer="skill_2" id="skill_2"
                    class="form-control @error('skill_2') border border-danger rounded-3 @enderror">
                  @error('skill_2')
                    <p class="text-danger text-xs ms-2 mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="skill_2_desc" class="form-label">Skill 2 Description</label>
                <div>
                  <textarea wire:model.defer="skill_2_desc" placeholder="skill 2 Description"
                    class="form-control @error('skill_2_desc') border border-danger rounded-3 @enderror"></textarea>
                  @error('skill_2_desc')
                    <p class="text-danger text-xs ms-2 mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Create Item</button>
        </div>
    </div>
  </div>

  @push('script')
    <script>
      let imageSet = document.getElementById('image');
      let displayImage = document.getElementById('display_image');
      if (imageSet) {
        imageSet.addEventListener("change", previewGambar);

        function previewGambar() {
          const [file] = imageSet.files;
          displayImage.src = URL.createObjectURL(file);
        }

        // agar ketika gambar profil di klik, file upload juga langsung terbuka
        displayImage.addEventListener("click", () =>
          imageSet.click()
        );
      }
    </script>
  @endpush
</div>
