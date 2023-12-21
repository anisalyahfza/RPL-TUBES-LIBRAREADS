<div>
    <div class="container">
        <div class="card card-custom card-fit">
            @if (auth()->user()->role == 'ADMIN')
                <div class="card-header">
                    <div class="card-title"></div>
                    <div class="card-toolbar">
                        @livewire('components.layout.component-search-bar')
                        <a href="{{ route('admin.books.create') }}"
                            class="btn btn-lg btn-pink font-size-h6 font-weight-bold"><i
                                class="flaticon2-plus text-white"></i>Add Book</a>
                    </div>
                </div>
            @endif
            <div class="card-body">
                @if ($search)
                    <h5 class="font-weight-boldest text-center">Showing Result for "{{ $search }}"</h5>
                @endif
                <div class="row my-4">
                    @forelse ($books as $book)
                        <div class="col-md-3">
                            <a
                                href="{{ auth()->user()->role == 'ADMIN' ? route('admin.books.edit', ['id' => $book->id]) : route('member.dashboard.detail', ['id' => $book->id]) }}">
                                <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('assets/media/users/blank.png') }}"
                                    style="max-height: 100%; height: 80%; max-width: 100%" alt="">
                            </a>
                        </div>
                    @empty
                        <div class="col text-center justify-content-center align-items-center d-flex">
                            <p class="display-5">Unfortunately, the book you were looking for was not found.</p>
                        </div>
                    @endforelse
                </div>
                <div class="row justify-content-end">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
