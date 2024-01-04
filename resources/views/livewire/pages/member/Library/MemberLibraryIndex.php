<?php

namespace App\Http\Livewire\Pages\Member\Library;

use Livewire\Component;

class MemberLibraryIndex extends Component
{
    public $page_title = 'My Book | Member LibraReads';
    public $page_name = 'My Book';
    public function render()
    {
        return view('livewire.pages.member.library.member-library-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
