<?php

namespace App\Services\Stock;

use App\Models\Table\BookTable;
use Illuminate\Support\Str;
use App\Models\Entity\Stock;
use App\Services\AppService;
use App\Models\Table\StockTable;
use App\Services\AppServiceInterface;

class StockService extends AppService implements AppServiceInterface
{
    public function __construct(StockTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return StockTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return StockTable::findOrFail($id);
    }

    public function create($data)
    {
        return StockTable::create($data);
    }

    public function update($id, $data)
    {
        $row = StockTable::find($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = StockTable::findOrFail($id);
        $row->delete();
        return $row;
    }

    public function deleteStockByBookId($book_id)
    {
        return StockTable::where('book_id', $book_id)->delete();
    }

    public function generateCodeForStock($book_id = null, $quantity)
    {
        $this->deleteStockByBookId($book_id);

        for ($i = 0; $i < $quantity; $i++) {
            $code = Str::random(10);
            $this->create([
                'book_id' => $book_id,
                'code' => $code,
            ]);
        }
    }

    public function getStockByBookId($id)
    {
        return StockTable::where('book_id', $id)
            ->where('status', Stock::STATUS_AVAILABLE)
            ->first();
    }

    public function loanBook($id)
    {
        return StockTable::where('id', $id)->update([
            'status' => Stock::STATUS_LOANED,
        ]);
    }

    public function getAvailableStockCountByBookId($book_id)
    {
        return StockTable::where('book_id', $book_id)
            ->where('status', Stock::STATUS_AVAILABLE)
            ->count();
    }

    public function getBookId($id)
    {
        $stock = $this->getById($id);
        return $stock->book_id;
    }

    public function returnBook($id)
    {
        return StockTable::where('id', $id)->update([
            'status' => StockTable::STATUS_AVAILABLE,
        ]);
    }
}
