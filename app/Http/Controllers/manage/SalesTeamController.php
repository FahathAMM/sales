<?php

namespace App\Http\Controllers\manage;

use App\helpers\Helpers;
use Illuminate\Http\Request;
use App\Models\Sales\SalesTeam;
use App\Http\Controllers\Controller;
use App\Models\Sales\SalesTeamRepository;

class SalesTeamController extends Controller
{

    protected $model;
    protected $repo;
    protected $redirect;

    public function __construct(SalesTeam $model, SalesTeamRepository $Repo)
    {
        $this->model = $model;
        $this->repo = $Repo;
        $this->redirect = route('sales.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $salesTeam = $this->repo->getWithPaginate(Helpers::perPage(SalesTeam::PER_PAGE));

            return view('pages.sales.index', [
                'salesTeam' => $salesTeam,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sales.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        try {
            // validation part
            $request->validate($this->model->storeRules());

            //store data using repository class
            $item =  $this->repo->createWithAlertMessage($request->all(), ['status', 'Stored Was Successful']);

            if (!is_null($item)) {
                return  redirect($this->redirect);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        try {
            $items =  $this->model->findOrFail($request->id);
            //view data using  ajax

            if (!is_null($items)) {
                return response()->json($items);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesTeam $sale)
    {

        return view('pages.sales.edit', [
            'salesTeam' => $sale
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesTeam $sale)
    {
        try {
            // validation part
            $request->validate($this->model->storeRules());
            //update data using repository class
            $item =  $this->repo->updateWithAlertMessage($request->except('_token', '_method'), ['status', 'Updated Was Successful'], $sale);

            if (!is_null($item)) {
                return  redirect($this->redirect);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesTeam $sale)
    {
        try {
            $deleted = $sale->delete();
            if ($deleted) {
                return  redirect($this->redirect);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
