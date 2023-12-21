<div>
    <div class="container">
        <div class="mb-10">
            <h4>Data Peminjaman Buku LibraReads</h4>
            <div class="table-responsive my-5">
                <table class="table table-striped text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Id Anggota</th>
                            <th>Kode Pinjam</th>
                            <th>Id Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Id Pengembalian</th>
                            <th>Id Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user_id }}</td>
                                <td>{{ $transaction->code }}</td>
                                <td>{{ $transaction->loan_id }}</td>
                                <td>{{ $transaction->loan_date }}</td>
                                @if ($transaction->returning_id == null)
                                    @if (Carbon\Carbon::now()->greaterThanOrEqualTo($transaction->expected_return))
                                        <td><span class="label label-inline label-pill label-light-danger p-5">DUE</span>
                                        </td>
                                    @else
                                        <td><span class="label label-inline label-pill label-light-warning p-5">ON
                                                PERIOD</span></td>
                                    @endif
                                @else
                                    <td>{{ $transaction->returning_id }}</td>
                                @endif
                                <td>{{ $transaction->admin_id }}</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="12">No Data Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-end">
                {{ $transactions->links() }}
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-pink font-size-h6 btn-lg btn-pill" wire:click='openLoanModal'
                    data-target="#loanModal">Tambah Data Peminjaman</button>
            </div>
        </div>

        <div class="mb-10">
            <h4>Data Pengembalian Buku LibraReads</h4>
            <div class="table-responsive my-5">
                <table class="table table-striped text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Id Pinjam</th>
                            <th>Kode Kembali</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kondisi Buku</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            @if ($transaction->returning_id == null)
                                <tr>
                                    <td>{{ $transaction->loan_id }}</td>
                                    @if (Carbon\Carbon::now()->greaterThanOrEqualTo($transaction->expected_return))
                                        <td colspan="12"><span
                                                class="label label-inline label-pill label-light-danger p-5">Buku
                                                belum dikembalikan</span></td>
                                    @else
                                        <td colspan="12"><span
                                                class="label label-inline label-pill label-light-warning p-5">Buku
                                                masih dalam masa peminjaman</span></td>
                                    @endif
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $transaction->loan_id }}</td>
                                    <td>{{ $transaction->returning_code }}</td>
                                    <td>{{ $transaction->returning_date }}</td>
                                    <td>{{ $transaction->condition }}</td>
                                    <td>Rp. {{ $transaction->fine }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end align-items-end">
                {{ $transactions->links() }}
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-pink btn-lg font-size-h6 btn-pill" wire:click="openReturnModal"
                    data-target="#returnModal">
                    Tambah Data Pengembalian
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loanModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Insert Loan Code</label>
                        <input type="text" wire:model='code' class="form-control form-control-lg font-size-h6">
                        @error('code')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button wire:click='store' class="btn btn-pink btn-lg btn-pill px-10">Add</button>
                    </div>
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
                    <div class="form-group">
                        <label>Insert Return Code</label>
                        <input type="text" wire:model='return_code'
                            class="form-control form-control-lg font-size-h6">
                        @error('return_code')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Condition</label>
                        <input type="text" wire:model="condition" class="form-control form-control-lg font-size-h6">
                        @error('condition')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button wire:click='recordReturn' class="btn btn-pink btn-lg btn-pill px-10">Add</button>
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

            window.addEventListener('openReturnModal', event => {
                $("#returnModal").modal('show');
            })

            window.addEventListener('closeReturnModal', event => {
                $("#returnModal").modal('hide');
            })
        </script>
    @endpush
</div>
