<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col-md-8 text-center">
                    <img src="{{ asset('storage/' . $book->image) }}" style="max-height: 100%; height: 80%" alt="">
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col card card-custom card-border bg-white" style="height: 100%">
                    <div class="text-start my-3">
                        <h3>Book Description</h3>
                    </div>
                    <div class="card card-border p-8 mb-10">
                        <h6 class="text-muted">Synopsis</h6>
                        <p>{{ $book->synopsis }}</p>
                    </div>
                    <div class="form-group d-flex justify-content-end align-items-end">
                        <button wire:click='openLoanModal' data-target="#loanModal"
                            class="btn btn-pink btn-lg btn-pill font-weight-bold font-size-h6">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loanModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $book->image) }}" height="80%" alt="">
                        </div>
                        <div class="col">
                            <h4>{{ $book->title }} <br><span class="text-muted">Qty: {{ $count }} <br><span
                                        class="text-danger font-size-sm">{{ $warning }}</span></span></h4>
                            <div class="mt-10">
                                <h4>Loan Date</h4>
                                <div class="form-group">
                                    <input type="date" wire:model="loan_date"
                                        class="form-control form-control-lg rounded-lg" name="loan_date" id="">
                                    @error('loan_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <h4>Return Date</h4>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-lg rounded-lg"
                                        name="return_date" wire:model="return_date">
                                    @error('return_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-10">
                                    <button class="btn {{ $count == 0 ? 'btn-secondary' : 'btn-pink' }} btn-lg btn-pill font-size-h6 px-40"
                                        {{ $count == 0 ? 'disabled' : '' }} wire:click="loanBook">Loan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $book->image) }}" height="80%" alt="">
                        </div>
                        <div class="col">
                            <h4>This Your Book Code <br><span class="text-muted">please provide it to the
                                    administrator</span></h4>
                            <div class="mt-10">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <input type="text" wire:model="code"
                                            class="form-control form-control-lg rounded-lg" disabled name="code"
                                            id="">
                                        <span><i class="flaticon2-file"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-icon">
                                        <input type="text" class="form-control form-control-lg rounded-lg" disabled
                                            name="title" wire:model="title">
                                        <span><i class="flaticon2-plus"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-icon">
                                        <input type="text" class="form-control form-control-lg rounded-lg" disabled
                                            name="writer" wire:model="writer">
                                        <span><i class="flaticon2-user"></i></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('member.dashboard.index') }}">
                                        <button class="btn btn-pink btn-lg btn-pill font-size-h6 px-10">Done</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('openLoanModal', event => {
            $("#loanModal").modal('show');
        })

        window.addEventListener('closeLoanModal', event => {
            $("#loanModal").modal('hide');
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
