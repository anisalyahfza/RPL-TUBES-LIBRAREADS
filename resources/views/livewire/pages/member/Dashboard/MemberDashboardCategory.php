<?php

namespace App\Http\Livewire\Pages\Member\Dashboard;

use App\Services\Book\BookService;
use Livewire\Component;

class MemberDashboardCategory extends Component
{
    public $page_title = 'Category | Member LibraReads';
    public $page_name = 'Category';

    public $category = null;

    public function mount($category = null)
    {
        if ($category) {
            $this->category = $category;
        }
    }

    public function render()
    {
        return view('livewire.pages.member.dashboard.member-dashboard-category')
            ->extends('layouts.admin')
            ->section('content');
    }
}
