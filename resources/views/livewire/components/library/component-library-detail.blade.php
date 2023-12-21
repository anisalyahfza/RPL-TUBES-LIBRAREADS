<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col-md-8 text-center">
                    <img src="{{ asset('storage/' . $loan->stock->book->image) }}" style="max-height: 100%; height: 80%"
                        alt="">
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col card card-custom card-border" style="height: 100%">
                    <div class="d-flex justify-content-between text-start p-5">
                        <div>
                            <h3>{{ $loan->stock->book->title }} <br>
                                <span class="text-muted font-size-lg">{{ $loan->stock->book->writer }}</span>
                            </h3>
                            <p class="text-muted font-weight-light">Loan Code: {{ $loan->stock->code }}</p>
                            @if ($return_code)
                                <p class="font-weight-light font-weight-bold">Give this code to admin for returning book
                                    <br><span class="text-danger">Return Code: {{ $return_code }}</span></p>
                            @endif
                        </div>
                        <div>
                            <span
                                class="label label-pill label-inline font-size-h6 label-{{ $loan->status_color }} p-5">{{ $loan->status }}</span>
                        </div>
                    </div>
                    <div class="card card-border p-8 mb-10">
                        <h6 class="text-muted">Synopsis</h6>
                        <p>{{ $loan->stock->book->synopsis }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="font-weight-boldest text-muted">ISBN : <br><span
                                    class="font-size-lg text-secondary font-weight-bold">{{ $loan->stock->book->isbn }}</span>
                            </h5>
                            @if (Carbon\Carbon::now()->greaterThanOrEqualTo($loan->expected_return))
                                <h5 class="font-weight-bold text-muted mt-10">Denda : <span
                                        class="font-size-h4 text-danger">{{ $fine }}</span></h5>
                            @endif
                        </div>
                        <div class="text-right">
                            <h5 class="font-weight-bold text-muted">Due Date : <br><span
                                    class="text-secondary font-size-lg font-weight-bold">{{ $loan->expected_return }}</span>
                            </h5>
                        </div>
                    </div>
                    @if ($loan->status != \App\Models\Entity\Loan::STATUS_RETURNED)
                        <div class="form-group d-flex justify-content-end align-items-end my-7">
                            <button wire:click='openReturnModal' data-target="#returnModal"
                                class="btn btn-pink btn-lg btn-pill font-weight-bold font-size-h6">Return</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="returnModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-muted my-5">Denda :<span class="text-danger font-size-lg">Rp.
                                    {{ $fine }}</span>
                            </h5>
                            <a wire:click="returnBook" type="button"
                                class="btn-pink btn-pill btn btn-lg btn-block font-size-h6">
                                <i class="flaticon-coins text-white"></i>COD
                            </a>
                            <a wire:click="returnBook" type="button"
                                class="btn-pink btn-pill btn btn-lg btn-block font-size-h6">
                                <i class="flaticon-suitcase text-white"></i>Transfer Bank
                            </a>
                            <a wire:click="returnBook" type="button"
                                class="btn-pink btn-pill btn btn-lg btn-block font-size-h6">
                                <i class="flaticon2-protected text-white"></i>E-Wallet
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Buku Sudah Dikembalikan</h5>
                        <p>Berikan kode kepada administrator perpustakaan</p>
                        <div class="form-group">
                            <div class="input-icon">
                                <input type="text" class="form-control form-lg font-size-h6 rounded-lg" disabled
                                    wire:model="code">
                                <span><i class="flaticon2-file"></i></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('member.library.index') }}"
                                class="btn btn-pink btn-lg btn-pill font-size-h6">Selesai
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('openReturnModal', event => {
                $("#returnModal").modal('show');
            })

            window.addEventListener('closeReturnModal', event => {
                $("#returnModal").modal('hide');
            })

            window.addEventListener('openSuccessModal', event => {
                $("#successModal").modal('show');
            })

            window.addEventListener('closeSuccessModal', event => {
                $("#successModal").modal('hide');
            })
        </script>
    @endpush
</div>
