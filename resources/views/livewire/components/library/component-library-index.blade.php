<div>
    <div class="container">
        <div class="card card-custom card-fit">
            @if (auth()->user()->role == 'ADMIN')
                <div class="card-header">
                    <div class="card-title"></div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.books.create') }}"
                            class="btn btn-lg btn-pink font-size-h6 font-weight-bold"><i
                                class="flaticon2-plus text-white"></i>Add Book</a>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div>
                    @if (!$search)
                        <h4 class="font-weight-boldest">Buku Yang Dipinjam <br><span
                                class="font-size-sm font-weight-light">Jangan Lupa Untuk Mengembalikan Buku</span>
                        </h4>
                    @endif
                    @if ($search)
                        <h5 class="font-weight-boldest text-center">Showing Result for "{{ $search }}"</h5>
                    @endif
                    <div class="row my-10">
                        @forelse ($loans as $loan)
                            <a href="{{ route('member.library.detail', ['id' => $loan->id]) }}"
                                style="text-decoration: none; color:inherit" class="col-md-4 col-lg-4">
                                <div class="card card-custom bg-hover-state-secondary card-stretch gutter-b">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('storage/' . $loan->stock->book->image) }}"
                                                class="rounded-lg img-fluid" alt="">
                                        </div>
                                        <div class="col-md-6  d-flex flex-column justify-content-center">
                                            <h4 class="font-weight-boldest font-size-h3">{{ $loan->stock->book->title }}
                                            </h4>
                                            <p class="text-muted">{{ $loan->stock->book->writer }}</p>
                                            <p class="text-muted font-size-xs">Tanggal Peminjaman <br><span
                                                    class="font-size-lg text-dark">{{ $loan->loan_date }}</span></p>
                                            <p class="font-weight-bold">Status : <span
                                                    class="label label-pill label-lg label-inline label-{{ $loan->status_color }}">{{ $loan->status }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-12 text-center">
                                <p class="display-5">Unfortunately, the book you were looking for was not found.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="row justify-content-end">
                        {{ $loans->links() }}
                    </div>
                </div>
                @if (!$search)
                    <div>
                        <h4 class="font-weight-boldest">Buku Yang Sudah Dikembalikan <br><span
                                class="font-size-sm font-weight-light">Riwayat Buku Yang Sudah Pernah Dipinjam</span>
                        </h4>
                        <div class="row my-10">
                            @forelse ($histories as $history)
                                <a href="{{ route('member.library.detail', ['id' => $history->id]) }}"
                                    style="text-decoration: none; color:inherit" class="col-md-4 col-lg-4">
                                    <div class="card card-custom bg-hover-state-secondary card-stretch gutter-b">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{ asset('storage/' . $history->stock->book->image) }}"
                                                    class="rounded-lg img-fluid" alt="">
                                            </div>
                                            <div class="col-md-6  d-flex flex-column justify-content-center">
                                                <h4 class="font-weight-boldest font-size-h3">
                                                    {{ $history->stock->book->title }}
                                                </h4>
                                                <p class="text-muted">{{ $history->stock->book->writer }}</p>
                                                <p class="text-muted font-size-xs">Tanggal Peminjaman <br><span
                                                        class="font-size-lg text-dark">{{ $history->loan_date }}</span>
                                                </p>
                                                <p class="font-weight-bold">Status : <span
                                                        class="label label-pill label-secondary label-lg label-inline">
                                                        {{ $history->status }}</span>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-12 text-center">
                                    <p class="display-5">Unfortunately, the book you were looking for was not found.</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="row justify-content-end">
                            {{ $histories->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
