<?php

namespace App\Http\Livewire\Components\Dashboard;

use App\Services\Book\BookService;
use App\Services\Member\MemberService;
use App\Services\Stock\StockService;
use Livewire\Component;

class ComponentDashboardIndex extends Component
{
    public $count_member;
    public $count_loaned;
    public $total_book;
    public function mount(MemberService $member_service, StockService $stock_service)
    {
        $this->count_member = $member_service->countMemberOnly();
        $this->count_loaned = $stock_service->countLoanedBook();
        $this->total_book = $stock_service->countBook();
    }
    public function render()
    {
        return view('livewire.components.dashboard.component-dashboard-index');
    }
}
