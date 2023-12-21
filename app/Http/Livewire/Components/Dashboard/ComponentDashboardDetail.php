<?php

namespace App\Http\Livewire\Components\Dashboard;

use App\Services\Stock\StockService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Services\Book\BookService;
use App\Services\Loan\LoanService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ComponentDashboardDetail extends Component
{
    use LivewireAlert;

    public $book_id;
    public $book, $loan_date, $code, $return_date, $count, $title, $loan, $writer, $warning;
    public $loan_id;

    protected $rules = [
        'loan_date' => 'required|after_or_equal:today',
        'return_date' => 'required',
    ];

    public function mount($id, BookService $book_service, LoanService $loan_service, StockService $stock_service)
    {
        $this->book_id = $id;
        $this->book = $book_service->getById($id);
        $this->count = $stock_service->getAvailableStockCountByBookId($this->book_id);
        if ($this->count == 2 || $this->count == 1) {
            $this->warning = 'Stock is limited!!';
        } elseif ($this->count == 0) {
            $this->warning = 'Stock is not available';
        }
    }
    public function render()
    {
        return view('livewire.components.dashboard.component-dashboard-detail');
    }

    public function loanBook(LoanService $loan_service, StockService $stock_service)
    {
        $this->validate();
        $stock = $stock_service->getStockByBookId($this->book_id);
        if ($stock == null) {
            $this->alert('error', 'Stock is not available');
            return;
        } else {
            $stock_service->loanBook($stock->id);
        }
        $data = [
            'stock_id' => $stock->id,
            'user_id' => Auth::user()->id,
            'loan_date' => $this->loan_date,
            'expected_return' => $this->return_date,
            'code' => $stock->code,
        ];
        $loan = $loan_service->create($data);
        $this->loan_id = $loan->id;
        $this->alert('success', 'You can take your book later!');
        $this->closeLoanModal();
        $this->openSuccessModal();
        if ($this->loan_id) {
            $this->loan = $loan_service->getById($this->loan_id);
            $this->code = $this->loan->stock->code;
            $this->title = $this->loan->stock->book->title;
            $this->writer = $this->loan->stock->book->writer;
        }
    }

    public function openLoanModal()
    {
        $this->dispatchBrowserEvent('openLoanModal');
    }

    public function closeLoanModal()
    {
        $this->dispatchBrowserEvent('closeLoanModal');
    }

    public function openSuccessModal()
    {
        $this->dispatchBrowserEvent('openSuccessModal');
    }

    public function closeSuccessModal()
    {
        $this->dispatchBrowserEvent('closeSuccessModal');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
