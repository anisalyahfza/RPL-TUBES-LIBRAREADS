<?php

namespace App\Http\Livewire\Pages\Superadmin\Dashboard;

use Livewire\Component;

class SuperDashboardManage extends Component
{
    public $page_title = 'Add Staff | Admin LibraReads';
    public $page_name = 'Add Staff';
    public $member_id = null;

    public function mount($id = null)
    {
        if ($id) {
            $this->member_id = $id;
            $this->page_title = 'Staff Detail | Admin LibraReads';
            $this->page_name = 'Staff Detail';
        }
    }
    public function render()
    {
        return view('livewire.pages.superadmin.dashboard.super-dashboard-manage')
            ->extends('layouts.admin')
            ->section('content');
    }
}
