<?php

namespace App\Services\Transaction;

use App\Models\Table\TransactionTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class TransactionService extends AppService implements AppServiceInterface
{
    public function __construct(TransactionTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return TransactionTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return TransactionTable::findOrFail($id);
    }

    public function create($data)
    {
        return TransactionTable::create($data);
    }

    public function update($id, $data)
    {
        $row = TransactionTable::find($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = TransactionTable::find($id);
        $row->delete();
        return $row;
    }

    public function getLoanId($id)
    {
        return TransactionTable::where('loan_id', $id)->first();
    }

    public function getReturnId($id)  {
        return TransactionTable::where('returning_id', $id)->first();
    }

}
