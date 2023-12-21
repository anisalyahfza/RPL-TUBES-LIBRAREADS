<?php

namespace App\Http\Livewire\Pages\Superadmin\Dashboard;

use Livewire\Component;

class SuperDashboardIndex extends Component
{
    public $page_title = 'Dashboard | Admin LibraReads';
    public $page_name = 'Dashboard';
    public function render()
    {
        return view('livewire.pages.superadmin.dashboard.super-dashboard-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
