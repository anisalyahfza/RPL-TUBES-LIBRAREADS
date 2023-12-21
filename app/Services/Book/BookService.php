<?php

namespace App\Services\Book;

use App\Models\Table\BookTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class BookService extends AppService implements AppServiceInterface
{
    public function __construct(BookTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return BookTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return BookTable::find($id);
    }

    public function searchBookByTitle($search)
    {
        return BookTable::where('title', 'LIKE', '%' . $search . '%')->paginate(12);
    }

    public function getAll()
    {
        return BookTable::all();
    }

    public function getBookCover()
    {
        return BookTable::where('image')->get();
    }
    public function create($data)
    {
        return BookTable::create($data);
    }

    public function update($id, $data)
    {
        $row = BookTable::find($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = BookTable::find($id);
        $row->delete();
        return $row;
    }

    public function getBookByCategory($category)
    {
        $category = str_replace('+', ' ', $category);
        return BookTable::where('category', $category)->get();
    }
}
