<?php

namespace App\Services\Library;

use App\Models\Table\LibraryTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class LibraryService extends AppService implements AppServiceInterface
{

    public function __construct(LibraryTable $model)
    {
        parent::__construct($model);
    }


    public function dataTable($filter)
    {
        return LibraryTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return LibraryTable::findOrFail($id);
    }

    public function create($data)
    {
        return LibraryTable::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, $data)
    {
        $row = LibraryTable::findOrFail($id);
        $row->update([
            'name' => $data['name'],
        ]);
        return $row;
    }

    public function delete($id)
    {
        $row = LibraryTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
