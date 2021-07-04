<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\PartNumberRequest;
use App\Repositories\Master\MasterRepository;
use App\Models\Master\PartNumber;

class PartNumberController extends Controller
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
        $model = \DB::table('model')->select('model.model_id', 'model.nama_model')->get();

        $result = '<option selected disabled>Pilih Model</option>';
        foreach ($model as $myModel) {
            $result .= '<option value="'.$myModel->model_id.'">'.$myModel->nama_model.'</option>';
        }

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('result'));
    }

    public function store(PartNumberRequest $request, PartNumber $model)
    {   
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->store($request, $model, $route);
    }

    public function show($id)
    {
        $data = PartNumber::select('part_number.part_no','part_number.description', 'model.nama_model as nama_model')
                ->join('model', 'model.model_id', 'part_number.model_id')
                ->findOrFail($id);

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function edit($id)
    {
        $data = PartNumber::select('part_number.part_number_id', 
                                    'part_number.part_no',
                                    'part_number.description', 
                                    'part_number.model_id', 
                                    'model.nama_model as nama_model')
                ->join('model', 'model.model_id', 'part_number.model_id')
                ->findOrFail($id);
        $model = \DB::table('model')->select('model.model_id', 'model.nama_model')->get();

        $result = '<option selected disabled>Pilih Model</option>';
        foreach ($model as $myModel) {
            $result .= '<option value="'.$myModel->model_id.'"'.((!empty($myModel->model_id)) ? ((!empty($myModel->model_id == $data->model_id)) ? ('selected') : ('')) : ('')).'>'.$myModel->nama_model.'</option>';
        }

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data', 'result'));
    }

    public function update(PartNumberRequest $request, $id, PartNumber $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->update($id, $request, $model, $route);
    }

    public function destroy($id, PartNumber $model)
    {
        return $this->master->destroy($id, $model);
    }

    public function dataTable()
    {
        $data = \DB::table('part_number')
                ->select('part_number.part_number_id', 'part_number.part_no','part_number.description', 'model.nama_model as nama_model')
                ->join('model', 'model.model_id', 'part_number.model_id')
                ->orderBy('part_number_id','desc')
                ->get();
        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['show' => route('Master.PartNumber.show', $data->part_number_id),
                                                        'edit' => route('Master.PartNumber.edit', $data->part_number_id),
                                                        'ajaxDelete' =>  $data->part_number_id
                                                        ]);
        })->rawColumns(['action'])
        ->make(true);
    }
}
