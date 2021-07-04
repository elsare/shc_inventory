<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Master\MasterRepository;
use App\Models\Master\Rak;

class RakController extends Controller
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

    public function store(Request $request, Rak $model)
    {   
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->store($request, $model, $route);
    }

    public function show($id)
    {
        $data = Rak::select('rak.rak_id', 'rak.blok_rak', 'rak.no_satu', 'rak.no_dua')
                ->findOrFail($id);

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function edit($id)
    {
        $data = Rak::select('rak.rak_id', 'rak.blok_rak', 'rak.no_satu', 'rak.no_dua')
                ->findOrFail($id);

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function update(Request $request, $id, Rak $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        return $this->master->update($id, $request, $model, $route);
    }

    public function destroy($id, Rak $model)
    {
        return $this->master->destroy($id, $model);
    }

    public function dataTable()
    {
        $data = Rak::select('rak.rak_id', 'rak.blok_rak', 'rak.no_satu', 'rak.no_dua')
                ->orderBy('rak_id','desc')
                ->get();
        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('rak', function($data){
            return $data->blok_rak.'-'.$data->no_satu.'-'.$data->no_dua;
        })
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['show' => route('Master.Rak.show', $data->rak_id),
                                                        'edit' => route('Master.Rak.edit', $data->rak_id),
                                                        'ajaxDelete' =>  $data->rak_id
                                                        ]);
        })->rawColumns(['rak','action'])
        ->make(true);
    }
}
