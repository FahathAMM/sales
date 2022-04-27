<?php

namespace App\Models\BaseInterface;

interface BaseRepositoryInterface
{
    public function getAll();

    public function findOrFail($id);

    public function getWithPaginate($perPage);

    public function createWithAlertMessage($collection, $alertMessage);

    public function updateWithAlertMessage($collection, $alertMessage, $attribute);
}
