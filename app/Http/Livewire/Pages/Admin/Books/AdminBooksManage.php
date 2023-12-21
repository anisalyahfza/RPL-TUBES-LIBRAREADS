<?php

namespace App\Http\Livewire\Pages\Admin\Books;

use Livewire\Component;

class AdminBooksManage extends Component
{
    public $page_title = 'Add Book | Staff LibraReads';
    public $page_name = 'Add Book';

    public $book_id = null;

    public function mount($id = null)
    {
        if ($id) {
            $this->book_id = $id;
            $this->page_title = 'Edit Book | Staff LibraReads';
            $this->page_name = 'Edit Book';
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.books.admin-books-manage')
            ->extends('layouts.admin')
            ->section('content');
    }
}
