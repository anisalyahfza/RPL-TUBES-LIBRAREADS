<?php

namespace App\Http\Livewire\Pages\Member\Dashboard;

use Livewire\Component;

class MemberDashboardDetail extends Component
{
    public $page_title = 'Book Details | Member LibraReads';
    public $page_name = 'Book Details';
    public $book_id = null;
    public function mount($id = null)
    {
        if ($id) {
            $this->book_id = $id;
        }
    }
    public function render()
    {
        return view('livewire.pages.member.dashboard.member-dashboard-detail')
            ->extends('layouts.admin')
            ->section('content');
    }
}
