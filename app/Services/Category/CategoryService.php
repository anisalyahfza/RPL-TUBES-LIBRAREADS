<?php

namespace App\Services\Category;

use App\Models\Table\CategoryTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class CategoryService extends AppService implements AppServiceInterface
{

    public function __construct(CategoryTable $model)
    {
        parent::__construct($model);
    }


    public function dataTable($filter)
    {
        return CategoryTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return CategoryTable::findOrFail($id);
    }

    public function create($data)
    {
        return CategoryTable::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, $data)
    {
        $row = CategoryTable::findOrFail($id);
        $row->update([
            'name' => $data['name'],
        ]);
        return $row;
    }

    public function delete($id)
    {
        $row = CategoryTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
