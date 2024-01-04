<?php

namespace App\Http\Livewire\Pages\Admin\Statistics;

use Livewire\Component;

class AdminStatisticIndex extends Component
{
    public $page_title = 'Statistic | Staff LibraReads';
    public $page_name = 'Statistic';

    public function render()
    {
        return view('livewire.pages.admin.statistics.admin-statistic-index')
            ->extends('layouts.admin')
            ->section('content');
    }
}
