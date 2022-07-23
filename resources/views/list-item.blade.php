@extends('layouts.user_type.auth')

@section('content')
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Max Refine
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Type
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            test
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">5</p>
                                        </td>
                                        <td>
                                            <div>
                                                <img src="/assets/img/marie.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Marie</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">marie@softui.com</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Creator</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/01/21</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr> --}}

                                    @forelse ($items as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->id_wp }}</p>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src="{{ Storage::url($item->image) }}"
                                                        class="avatar avatar-sm me-3">
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
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->id_wp }}</span>
                                            </td>
                                            <td class="text-center">
                                                <form action="" class="">
                                                    <a data-bs-toggle="modal" data-bs-target="#showItem"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-image="{{ $item->image }}" data-id_wp="{{ $item->id_wp }}"
                                                        data-refine="{{ $item->refine }}"
                                                        data-type="{{ $item->type }}"
                                                        data-weapon_type="{{ $item->weapon_type }}"
                                                        data-weapon_element="{{ $item->weapon_element }}"
                                                        data-awaken="{{ $item->awaken }}"
                                                        data-label="{{ $item->label }}"
                                                        data-dismantle="{{ $item->dismantle }}"
                                                        data-skill_1="{{ $item->skill_1 }}"
                                                        data-skill_1_desc="{{ $item->skill_1_desc }}"
                                                        data-skill_2="{{ $item->skill_2 }}"
                                                        data-skill_2_desc="{{ $item->skill_2_desc }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit Item">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="showItem" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">masih blom</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h5 id="nameItem">ok</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="DeleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('delete-item') }}" id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
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
@endsection

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#showItem', function() {
            let image = $(this).data('image');
            let name = $(this).data('name');
            let id_wp = $(this).data('id_wp');
            let refine = $(this).data('refine');
            let type = $(this).data('type');

            if (type == 'weapon') {
                let weapon_type = $(this).data('weapon_type');
                let weapon_element = $(this).data('weapon_element');
            }

            let awaken = $(this).data('awaken');
            let label = $(this).data('label');
            let dismantle = $(this).data('dismantle');
            let skill_1 = $(this).data('skill_1');
            let skill_1_desc = $(this).data('skill_1_desc');
            let skill_2 = $(this).data('skill_2');
            let skill_2_desc = $(this).data('skill_2_desc');


            $('#nameItem').text(name);
        });
    });
</script>
