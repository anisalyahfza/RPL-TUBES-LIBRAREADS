<?php

namespace App\Http\Livewire\Components\Books;

use Livewire\Component;
use App\Models\Entity\Book;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Services\Book\BookService;

class ComponentBooksIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'searchBook' => 'searchBook',
    ];

    public function render(BookService $book_service)
    {
        $books = $book_service->dataTable(
            new Request([
                'entries' => 12,
                'sort_type' => 'DESC',
                'search_columns' => 'title',
                'search_key' => $this->search,
            ]),
        );
        return view('livewire.components.books.component-books-index', compact('books'));
    }

    public function searchBook($search)
    {
        $this->search = $search;
    }
}
