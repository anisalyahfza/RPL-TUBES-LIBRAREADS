<?php

namespace App\Http\Livewire\Components\Books;

use App\Services\Book\BookService;
use Livewire\Component;

class ComponentBookByCategory extends Component
{
    public $category;
    public $books;

    public function mount($category, BookService $book_service)
    {
        $this->category = $category;
        $this->books = $book_service->getBookByCategory($category);
    }

    public function render(BookService $book_service)
    {
        return view('livewire.components.books.component-book-by-category');
    }
}
