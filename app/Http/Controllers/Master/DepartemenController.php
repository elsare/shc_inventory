<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\DepartemenRequest;
use App\Repositories\Master\MasterRepository;
use App\Models\Master\Departemen;

class DepartemenController extends Controller
{
    public function __construct(MasterRepository $_Master)
    {
        $this->middleware('auth'); 
        $route_name  = explode('.',\Route::currentRouteName());
        $this->route1 = ((isset($route_name[0])) ? $route_name[0] : (''));
        $this->route2 = ((isset($route_name[1])) ? $route_name[1] : (''));
        $this->route3 = ((isset($route_name[2])) ? $route_name[2] : (''));

        $this->master = $_Master;
    }

    public function index()
    {
        return view($this->route1.'.'.$this->route2.'.'.$this->route3);
    }

    public function create()
    {
        return view($this->route1.'.'.$this->route2.'.'.$this->route3);
    }

    public function store(DepartemenRequest $request, Departemen $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->store($request, $model, $route);       
    }

    public function show($id)
    {
        $data = Departemen::findOrFail($id);
        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function edit($id)
    {
        $data = Departemen::findOrFail($id);
        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));    }

    public function update(DepartemenRequest $request, $id, Departemen $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->update($id, $request, $model, $route);
    }

    public function destroy($id, Departemen $model)
    {
        return $this->master->destroy($id, $model);       
    }

    public function dataTable()
    {
        $data = \DB::table('departemen')
                ->select('departemen.departemen_id', 'departemen.nama_departemen')
                ->orderBy('departemen_id','desc')
                ->get();
        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['show' => route('Master.Departemen.show', $data->departemen_id),
                                                        'edit' => route('Master.Departemen.edit', $data->departemen_id),
                                                        ]);
        })->rawColumns(['action'])
        ->make(true);
    }
}
