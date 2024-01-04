<div>
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="row my-4">
                    @forelse ($books as $book)
                        <div class="col-md-3">
                            <a
                                href="{{ Auth::user()->role == 'MEMBER' ? route('member.dashboard.detail', ['id' => $book->id]) : 'javascript:;' }}">
                                <img src="{{ asset('storage/' . $book->image) }}" style="max-height: 100%; height: 80%"
                                    alt="">
                            </a>
                        </div>
                    @empty
                        <div class="col text-center justify-content-center align-items-center d-flex">
                            <p class="display-5">Unfortunately, the book you were looking for was not found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
