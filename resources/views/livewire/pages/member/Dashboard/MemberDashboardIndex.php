<?php

namespace App\Http\Livewire\Pages\Member\Dashboard;

use Livewire\Component;

class MemberDashboardIndex extends Component
{
    public $page_title = 'Dashboard | Member LibraReads';
    public $page_name = 'Dashboard';

    public function render()
    {
        return view('livewire.pages.member.dashboard.member-dashboard-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
