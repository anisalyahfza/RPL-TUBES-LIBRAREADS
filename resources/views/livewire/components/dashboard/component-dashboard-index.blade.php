<div>
    <div class="row gap-3">
        <div class="col-md-4">
            <div class="card card-custom bg-primary gutter-b" style="height: 100%">
                <div class="card-body d-flex flex-column p-0" style="position: relative;">
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Total Anggota</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">{{ $count_member }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom bg-warning gutter-b" style="height: 100%">
                <div class="card-body d-flex flex-column p-0" style="position: relative;">
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Buku Dipinjam</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">{{ $count_loaned }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom bg-success gutter-b" style="height: 100%">
                <div class="card-body d-flex flex-column p-0" style="position: relative;">
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Total Buku</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">{{ $total_book }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
