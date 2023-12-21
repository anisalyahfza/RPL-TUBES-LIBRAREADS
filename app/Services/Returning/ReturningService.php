<?php

namespace App\Services\Returning;

use App\Models\Table\ReturningTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class ReturningService extends AppService implements AppServiceInterface
{
    public function __construct(ReturningTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return ReturningTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return ReturningTable::find($id);
    }

    public function create($data)
    {
        return ReturningTable::create($data);
    }

    public function update($id, $data)
    {
        $row = ReturningTable::find($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = ReturningTable::findOrFail($id);
        $row->delete();
        return $row;
    }

    public function getReturnByCode($code)
    {
        return ReturningTable::where('code', $code)->first();
    }

    public function getLoanId($id)
    {
        return ReturningTable::where('loan_id', $id)->first();
    }

    public function getReturnCodeByLoanId($id)
    {
        $loan_id = $this->getLoanId($id);
        if ($loan_id) {
            return $loan_id->code;
        } else {
            return null;
        }
    }
}
