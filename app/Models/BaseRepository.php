<?php

namespace App\Models;

use App\helpers\Media;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\baseinterface\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseRepository  implements BaseRepositoryInterface
{

    public function __construct()
    {
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getWithPaginate($perPage = null)
    {
        $items = $this->model->query();

        if (!is_null($perPage)) {
            return $items->paginate($perPage)->withQueryString();
        } else {
            return $items->get();
        }
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail();
    }


    public function create($collection)
    {
        return  $this->model->create($collection);
    }


    public function createWithAlertMessage($collection = [], $alertMessage = [])
    {
        if ($alertMessage != []) {
            request()->session()->flash($alertMessage[0], $alertMessage[1]);
        }
        return $this->model->create($collection);
    }

    public function updateWithAlertMessage($collection = [], $alertMessage = [], $attribute)
    {
        if ($alertMessage != []) {
            request()->session()->flash($alertMessage[0], $alertMessage[1]);
        }

       return $this->model->where('id', $attribute->id)->update($collection);
    }
}
