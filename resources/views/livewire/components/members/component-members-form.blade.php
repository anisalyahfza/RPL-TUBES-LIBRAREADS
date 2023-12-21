<div class="container">
    <div class="card card-custom gutter-b card-fit">
        <div class="card-header">
            <div class="card-title"></div>
            @if ($member_id)
                <div class="card-toolbar">
                    <button wire:click="openDeleteModal" class="btn" data-target="#deleteModal"><i
                            class="flaticon-more-v2"></i></button>
                </div>
            @endif
        </div>
        <div class="row card-body">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <div class="col-md-8 text-center">
                    <img src="{{ $photo instanceof Illuminate\Http\UploadedFile ? $photo->temporaryUrl() : ($photo ? asset('storage/' . $photo) : asset('assets/media/users/image-blank.png')) }}"
                        class="rounded-lg" style="max-width: 100%; width: 100%" alt="">
                    <div class="d-flex justify-content-center mt-10">
                        <input type="file" id="cover_input" wire:model="photo" style="display: none;">
                        <button class="btn btn-pink font-weight-bolder font-size-h6 px-8 py-4"
                            id="edit_button">Edit</button>
                    </div>
                    @error('photo')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="text-start my-5">
                        <h3>Detail Member</h3>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Name" wire:model="name" name="name" autocomplete="off">
                            <span><i class="flaticon-book icon-md"></i></span>
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Nisn" wire:model="nisn" name="nisn" autocomplete="off">
                            <span><i class="flaticon-user icon-md"></i></span>
                        </div>
                        @error('nisn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="email"
                                placeholder="Email" wire:model="email" name="email" autocomplete="off">
                            <span><i class="flaticon2-open-text-book icon-md"></i></span>
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="password"
                                placeholder="Password" wire:model="password" name="password" autocomplete="off">
                            <span><i class="flaticon2-plus"></i></span>
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" wire:click="{{ $member_id ? 'update' : 'store' }}"
                            class="btn btn-pink font-weight-bolder font-size-h6 px-8 py-4"
                            wire:loading.attr="disabled">{{ $member_id ? 'UPDATE' : 'ADD' }}
                            <div wire:loading wire:target="{{ $member_id ? 'update' : 'store' }}">
                                <div class="spinner-border spinner-border-sm" role="status"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="flaticon2-rubbish-bin-delete-button icon-3x"></i>
                        <p class="font-size-h5 text-mute font-weight-boldest mt-5">Hapus Akun</p>
                        <p>Apakah kamu yakin akan menghapus
                            {{ auth()->user()->role == \App\Models\User::ROLE_SUPERADMIN ? 'staff' : 'member' }}
                            <br><span class="font-weight-boldest">{{ $name }} ?</span>
                        </p>
                        <div class="justify-content-between mt-10">
                            <button class="btn btn-pink px-10" data-dismiss="modal">Batal</button>
                            <button wire:click="destroy" class="btn btn-outline-pink px-10">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.getElementById('edit_button').addEventListener('click', function() {
                document.getElementById('cover_input').click();
            });

            window.addEventListener('openDeleteModal', event => {
                $("#deleteModal").modal('show');
            })

            window.addEventListener('closeDeleteModal', event => {
                $("#deleteModal").modal('hide');
            })
        </script>
    @endpush
</div>
