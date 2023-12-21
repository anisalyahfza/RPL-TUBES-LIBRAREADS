<?php

namespace App\Http\Livewire\Pages\Admin\Dashboard;

use Livewire\Component;

class AdminDashboardCategory extends Component
{
    public $page_title = 'Category | Staff LibraReads';
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
        return view('livewire.pages.admin.dashboard.admin-dashboard-category')
            ->extends('layouts.admin')
            ->section('content');
    }
}
