<?php

namespace App\Http\Livewire\Components\Library;

use App\Models\Table\LoanTable;
use App\Models\Table\StockTable;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\Entity\Loan;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Services\Book\BookService;
use App\Services\Loan\LoanService;
use App\Services\Stock\StockService;
use App\Services\Returning\ReturningService;

class ComponentLibraryDetail extends Component
{
    use LivewireAlert;
    public $loan_id;
    public $book;
    public $fine = 0;
    public $loan;
    public $returning_id;
    public $return_code;

    public function mount($id, LoanService $loan_service, StockService $stock_service, BookService $book_service, ReturningService $return_service)
    {
        $this->loan_id = $id;
        $this->loan = $loan_service->getById($this->loan_id);
        $this->return_code = $return_service->getReturnCodeByLoanId($this->loan_id);
        $fee = 2000;
        if (Carbon::now()->greaterThanOrEqualTo($this->loan->expected_return) && $this->loan->status != Loan::STATUS_RETURNED) {
            $this->loan->status = Loan::STATUS_DUE;
            $days_late = Carbon::now()->diffInDays($this->loan->expected_return);
            $this->fine = $days_late * $fee;
            $this->loan->save();
        } elseif($this->loan->status == LoanTable::STATUS_RETURNED) {
            $this->loan->status = Loan::STATUS_RETURNED;
        }
    }

    public function render()
    {
        return view('livewire.components.library.component-library-detail');
    }

    public function openReturnModal()
    {
        $this->dispatchBrowserEvent('openReturnModal');
    }

    public function closeReturnModal()
    {
        $this->dispatchBrowserEvent('closeReturnModal');
    }

    public function openSuccessModal()
    {
        $this->dispatchBrowserEvent('openSuccessModal');
    }

    public function closeSuccessModal()
    {
        $this->dispatchBrowserEvent('closeSuccessModal');
    }

    public function returnBook(ReturningService $return_service, LoanService $loan_service, StockService $stock_service)
    {
        $code = Str::random(10);
        $data = [
            'return_date' => Carbon::now(),
            'fine' => $this->fine,
            'code' => $code,
            'loan_id' => $this->loan_id,
        ];
        $returning = $return_service->create($data);
        $loan_service->update($this->loan_id, [
            'status' => LoanTable::STATUS_RETURNED,
        ]);
        $stock_id = $loan_service->getStockId($this->loan_id);
        $stock_service->returnBook($stock_id);
        $this->return_id = $returning->id;
        $this->alert('success', 'Thanks for your support');
        $this->closeReturnModal();
        $this->openSuccessModal();
        if ($this->return_id) {
            $this->return = $return_service->getById($this->return_id);
            $this->code = $this->return->code;
        }
    }
}
