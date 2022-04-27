<?php

namespace App\Models\Sales;

use App\Models\route\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTeam extends Model
{
    use HasFactory;

    public const PER_PAGE = 10;


    protected $fillable = [
        'name',
        'route_id',
        'email',
        'Telephone',
        'joint_date',
        'comments',
    ];


    public function storeRules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'Telephone' => 'required|numeric|digits:10',
            'route_id' => 'required',
            'joint_date' => 'required',
        ];
    }


    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
