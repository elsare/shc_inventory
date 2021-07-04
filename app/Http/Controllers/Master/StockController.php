<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\StockRequest;
use App\Repositories\Master\MasterRepository;
use App\Models\Master\PartNumber;
use App\Models\Master\Stock;

class StockController extends Controller
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
        $part = PartNumber::select('part_number.part_number_id', 'part_number.part_no')->get();

        $resultPart = '<option selected disabled>Pilih Part Number</option>';
        foreach ($part as $myPart) {
            $resultPart .= '<option value="'.$myPart->part_number_id.'">'.$myPart->part_no.'</option>';
        }

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('resultPart'));
    }

    public function store(StockRequest $request, Stock $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';

        return $this->master->store($request, $model, $route);
    }

    public function show($id)
    {
        $data = Stock::select('stock.stock_id', 
                                'stock.jumlah_stock',
                                'part_number.part_no as part_no',
                                'part_number.description as description',
                                'model.nama_model as nama_model'
            )->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
            ->join('model', 'model.model_id', 'part_number.model_id')
            ->findOrFail($id);

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function edit($id)
    {
        $data = Stock::select('stock.stock_id', 
                                'stock.jumlah_stock',
                                'part_number.part_number_id as part_number_id',
                                'part_number.part_no as part_no',
                                'part_number.description as description',
                                'model.nama_model as nama_model'
            )->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
            ->join('model', 'model.model_id', 'part_number.model_id')
            ->findOrFail($id);

        $part = PartNumber::select('part_number.part_number_id', 'part_number.part_no')->get();

        $resultPart = '<option selected disabled>Pilih Part Number</option>';
        foreach ($part as $myPart) {
            $resultPart .= '<option value="'.$myPart->part_number_id.'"'.((!empty($myPart->part_number_id)) ? ((!empty($myPart->part_number_id == $data->part_number_id)) ? ('selected') : ('')) : ('')).'>'.$myPart->part_no.'</option>';
        }

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data', 'resultPart'));
    }

    public function update(StockRequest $request, $id, Stock $model)
    {
        $route = $this->route1.'.'.$this->route2.'.'.'index';

        return $this->master->update($id, $request, $model, $route);
    }

    public function destroy($id, Stock $model)
    {
        return $this->master->destroy($id, $model);       
    }

    public function getPartDetail(Request $request)
    {
        if ($request->ajax()) {
            return array(
                'description'=> $this->getDescription($request),
                'model'=> $this->getModel($request)
            );
        }
    }

    public function getDescription($request)
    {
        $data = PartNumber::select('part_number_id', 'description')->where('part_number_id', $request->part_number_id)->get();

        foreach ($data as $key => $value) {
                $result = $value->description;
            }

        return $result;
    }

    public function getModel($request)
    {
        $data = PartNumber::select('part_number_id', 'model.nama_model as nama_model')
        ->join('model', 'model.model_id', 'part_number.model_id')
        ->where('part_number_id', $request->part_number_id)->get();

        foreach ($data as $key => $value) {
                $result = $value->nama_model;
            }

        return $result;
    }

    public function dataTable()
    {
        $data = \DB::table('stock')
                ->select('stock.stock_id',
                         'stock.jumlah_stock', 
                         'part_number.part_no as part_no',
                         'part_number.description as description', 
                         'model.nama_model as nama_model')
                ->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
                ->join('model', 'model.model_id', 'part_number.model_id')
                ->orderBy('stock_id','desc')
                ->get();
        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['show' => route('Master.Stock.show', $data->stock_id),
                                                        'edit' => route('Master.Stock.edit', $data->stock_id),
                                                        'ajaxDelete' =>  $data->stock_id
                                                        ]);
        })->rawColumns(['action'])
        ->make(true);
    }
}
