<div class="container">
    <div class="card card-custom card-fit gutter-b">
        <div class="card-header">
            <div class="card-title">
            </div>
            <div class="card-toolbar">
                @if ($book_id)
                    <button class="btn" wire:click="openDeleteModal" data-target="#deleteModal"><i
                            class="flaticon-more-v2"></i></button>
                @endif
            </div>
        </div>
        <div class="row card-body">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <div class="col-md-8 text-center">
                    <img src="{{ $image instanceof Illuminate\Http\UploadedFile ? $image->temporaryUrl() : ($image ? asset('storage/' . $image) : asset('assets/media/users/image-blank.png')) }}"
                        class="rounded-lg" style="max-width: 100%; width: 100%" alt="">
                    <div class="d-flex justify-content-center mt-10">
                        <input type="file" id="cover_input" wire:model="image" style="display: none;">
                        <button class="btn btn-pink font-weight-bolder font-size-h6 px-8 py-4"
                            id="edit_button">Edit</button>
                    </div>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="text-start my-5">
                        <h3>Detail Buku</h3>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Title" wire:model="title" name="title" autocomplete="off">
                            <span><i class="flaticon-book icon-md"></i></span>
                        </div>
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Writer" wire:model="writer" name="writer" autocomplete="off">
                            <span><i class="flaticon-user icon-md"></i></span>
                        </div>
                        @error('writer')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="ISBN" wire:model="isbn" name="isbn" autocomplete="off">
                            <span><i class="flaticon2-open-text-book icon-md"></i></span>
                        </div>
                        @error('isbn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <select class="form-control form-control-lg" name="category" wire:model='category'
                                id="" placeholder="Pilih kategori">
                                <option value="" selected>Pilih Kategori</option>
                                <option value="Science Fiction">Science Fiction</option>
                                <option value="Horror Fiction">Horror Fiction</option>
                                <option value="Romance Fiction">Romance Fiction</option>
                                <option value="Action Fiction">Action Fiction</option>
                                <option value="Fantasy Fiction">Fantasy Fiction</option>
                                <option value="Crime Fiction">Crime Fiction</option>
                                <option value="History">History</option>
                                <option value="Biography">Biography</option>
                                <option value="Autobiography">Autobiography</option>
                                <option value="Cookbook">Cookbook</option>
                            </select>
                            <span><i class="flaticon-notes"></i></span>
                        </div>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Stock" wire:model="stock" name="stock" autocomplete="off">
                            <span><i class="flaticon2-plus"></i></span>
                        </div>
                        @error('stock')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg rounded-lg font-size-h6" id="kt_maxlength_5" maxlength="100"
                            wire:model="synopsis" name="synopsis" rows="5" placeholder="Synopsis"></textarea>
                        @error('synopsis')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" wire:click="{{ $book_id ? 'update' : 'store' }}"
                            class="btn btn-pink font-weight-bolder font-size-h6 px-8 py-4"
                            wire:loading.attr="disabled">{{ $book_id ? 'UPDATE' : 'ADD' }}
                            <div wire:loading wire:target="{{ $book_id ? 'update' : 'store' }}">
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
                        <p class="font-size-h5 text-mute font-weight-boldest mt-5">Hapus Book</p>
                        <p>Apakah kamu yakin akan menghapus buku
                            <br><span class="font-weight-boldest">{{ $title }} ?</span>
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

            var KTBootstrapMaxlength = function() {

                var demos = function() {
                    $('#kt_maxlength_5').maxlength({
                        threshold: 5,
                        warningClass: "label label-danger label-rounded label-inline",
                        limitReachedClass: "label label-primary label-rounded label-inline"
                    });
                }

                return {
                    init: function() {
                        demos();
                    }
                };
            }();

            jQuery(document).ready(function() {
                KTBootstrapMaxlength.init();
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
