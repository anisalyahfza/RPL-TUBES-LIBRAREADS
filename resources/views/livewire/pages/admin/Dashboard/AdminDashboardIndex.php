<?php

namespace App\Http\Livewire\Pages\Admin\Dashboard;

use Livewire\Component;

class AdminDashboardIndex extends Component
{
    public $page_title  = 'Dashboard | Staff LibraReads';
    public $page_name   = 'Dashboard';
    public function render()
    {
        return view('livewire.pages.admin.dashboard.admin-dashboard-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
