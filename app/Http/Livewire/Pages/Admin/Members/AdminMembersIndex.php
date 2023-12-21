<?php

namespace App\Http\Livewire\Pages\Admin\Members;

use Livewire\Component;

class AdminMembersIndex extends Component
{
    public $page_title = 'Members | Admin LibraReads';
    public $page_name = 'Members';
    public function render()
    {
        return view('livewire.pages.admin.members.admin-members-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
