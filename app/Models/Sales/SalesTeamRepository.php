<?php

namespace App\Models\Sales;

use App\Models\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesTeamRepository extends BaseRepository
{
    protected $model;

    public function __construct(SalesTeam $model)
    {
        $this->model = $model;
    }
}
