<?php

namespace App\Http\Livewire\Pages\Member\Library;

use Livewire\Component;

class MemberLibraryDetail extends Component
{
    public $page_title = 'Book Detail | Member LibraReads';
    public $page_name = 'Book Detail';

    public $book_id = null;
    public function mount($id = null)
    {
        if ($id) {
            $this->book_id = $id;
        }
    }
    public function render()
    {
        return view('livewire.pages.member.library.member-library-detail')
            ->extends('layouts.admin')
            ->section('content');
    }

    
}
