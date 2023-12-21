<?php

namespace App\Http\Livewire\Pages\Admin\Books;

use Livewire\Component;

class AdminBooksIndex extends Component
{
    public $page_title = 'Books | Staff LibraReads';
    public $page_name = 'Books';

    public function render()
    {
        return view('livewire.pages.admin.books.admin-books-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
