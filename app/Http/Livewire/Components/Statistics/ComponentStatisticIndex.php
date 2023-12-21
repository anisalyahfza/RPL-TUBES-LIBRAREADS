<?php

namespace App\Http\Livewire\Components\Statistics;

use App\Services\Returning\ReturningService;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Services\Loan\LoanService;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Services\Transaction\TransactionService;

class ComponentStatisticIndex extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $code;
    public $condition, $return_code;
    public $transaction_id;
    protected $rules = [
        'code' => 'required',
        'condition' => 'required',
        'return_code' => 'required',
    ];

    public function render(TransactionService $transaction_service)
    {
        $transactions = $transaction_service->dataTable(
            new Request([
                'entries' => 12,
                'sort_type' => 'DESC',
            ]),
        );
        return view('livewire.components.statistics.component-statistic-index', compact('transactions'));
    }

    public function store(TransactionService $transaction_service, LoanService $loan_service)
    {
        $this->validate([
            'code' => 'required',
        ]);
        $loan = $loan_service->getLoanByCode($this->code);
        try {
            if ($transaction_service->getLoanId($loan->id)) {
                $this->alert('error', 'Data sudah ada pada tabel');
                return;
            }
            $data = [
                'code' => $this->code,
                'user_id' => $loan->user_id,
                'loan_id' => $loan->id,
                'loan_date' => $loan->loan_date,
                'admin_id' => Auth::user()->id,
                'expected_return' => $loan->expected_return,
            ];
            $transaction_service->create($data);
            $this->flash('success', 'Data added successfully', [], route('admin.statistic.index'));
        } catch (\Exception $e) {
            $this->alert('error', 'There is no book with the code');
        }
    }

    public function recordReturn(TransactionService $transaction_service, LoanService $loan_service, ReturningService $return_service)
    {
        $this->validate([
            'return_code' => 'required',
            'condition' => 'required',
        ]);
        $returning = $return_service->getReturnByCode($this->return_code);
        try {
            if ($transaction_service->getReturnId($returning->id)) {
                $this->alert('error', 'Data sudah ada pada tabel');
                return;
            }
            $data = [
                'condition' => $this->condition,
                'returning_code' => $this->return_code,
                'returning_id' => $returning->id,
                'returning_date' => $returning->return_date,
                'fine' => $returning->fine,
            ];
            $transaction_id = $transaction_service->getLoanId($returning->loan_id);
            $transaction_service->update($transaction_id->id, $data);
            $return_service->update($returning->id, [
                'condition' => $this->condition,
            ]);
            $this->flash('success', 'Data added successfully', [], route('admin.statistic.index'));
        } catch (\Exception $e) {
            $this->alert('error', 'There is no book with the code');
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

    public function openReturnModal()
    {
        $this->dispatchBrowserEvent('openReturnModal');
    }

    public function closeReturnModal()
    {
        $this->dispatchBrowserEvent('closeReturnModal');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
