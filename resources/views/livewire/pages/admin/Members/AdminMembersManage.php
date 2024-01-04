<?php

namespace App\Http\Livewire\Pages\Admin\Members;

use Livewire\Component;

class AdminMembersManage extends Component
{
    public $page_title = 'Add Member | Staff LibraReads';
    public $page_name = 'Add Member';

    public $member_id = null;
    public function mount($id = null)
    {
        if ($id) {
            $this->member_id = $id;
            $this->page_title = 'Member Detail | Staff LibraReads';
            $this->page_name = 'Member Detail';
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.members.admin-members-manage')
            ->extends('layouts.admin')
            ->section('content');
    }
}
