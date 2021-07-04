<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\ModelRequest;
use App\Repositories\Master\MasterRepository;
use App\Models\Master\ModelPart;

class ModelController extends Controller
{   
    public function __construct(MasterRepository $_Master)
    {
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

    public function store(ModelRequest $request, ModelPart $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->store($request, $model, $route);       
    }

    public function show($id)
    {
        $data = ModelPart::findOrFail($id);
        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function edit($id)
    {
        $data = ModelPart::findOrFail($id);
        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));    }

    public function update(ModelRequest $request, $id, ModelPart $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->update($id, $request, $model, $route);
    }

    public function destroy($id, ModelPart $model)
    {
        return $this->master->destroy($id, $model);       
    }

    public function dataTable()
    {
        $data = \DB::table('model')
                ->select('model.model_id', 'model.nama_model')
                ->orderBy('model_id','desc')
                ->get();
        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['show' => route('Master.Model.show', $data->model_id),
                                                        'edit' => route('Master.Model.edit', $data->model_id),
                                                        'ajaxDelete' =>  $data->model_id
                                                        ]);
        })->rawColumns(['action'])
        ->make(true);
    }
}
