<?php

namespace App\Http\Livewire\Components\Library;

use App\Models\Table\LoanTable;
use App\Services\Loan\LoanService;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\Book\BookService;
use Livewire\WithPagination;

class ComponentLibraryIndex extends Component
{
    use WithPagination;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'searchBook' => 'searchBook',
    ];

    public function render(LoanService $loan_service)
    {
        $loans = $loan_service->dataTable(
            new Request([
                'entries' => 3,
                'sort_type' => 'DESC',
                'search_columns' => 'stock.book.title',
                'search_key' => $this->search,
                'filter_keys' => implode('|', LoanTable::STATUS),
                'filter_columns' => 'status',
            ]),
        );

        $histories = $loan_service->dataTable(
            new Request([
                'entries' => 3,
                'sort_type' => 'DESC',
                'filter_keys' => LoanTable::STATUS_RETURNED,
                'filter_columns' => 'status',
            ]),
        );
        return view('livewire.components.library.component-library-index', compact('loans', 'histories'));
    }

    public function searchBook($search)
    {
        $this->search = $search;
    }
}
