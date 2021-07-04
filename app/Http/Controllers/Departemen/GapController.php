<?php

namespace App\Http\Controllers\Departemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\PartNumber;
use App\Models\Transaksi\Gap;
use App\Models\Master\Stock;

class GapController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    public function index()
    {
        $part = PartNumber::select('part_number.part_number_id', 'part_number.part_no')->get();

        $resultPart = '<option selected disabled>Pilih Part Number</option>';
        foreach ($part as $myPart) {
            $resultPart .= '<option value="'.$myPart->part_number_id.'">'.$myPart->part_no.'</option>';
        }

        return view('Departemen.Gap.index', compact('resultPart'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $jumlah = Gap::select('*')
                    ->where('stock_id', $request->stock_id)
                    ->first();
        $input = $request->all();

        try {
            if ($jumlah == null) {
                Gap::create($input);
            }else{
                $jumlah->update($input);
            }
            \DB::commit();

            return redirect()->route('Departemen.Gap.index')->with('success', 'Data Berhasil Disimpan!');
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
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

        $jumlah_input = \DB::table('jumlah_input')
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

        $jumlah_output = \DB::table('jumlah_output')
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

        $book_stock = '<div class="text-center">'.((!empty($jumlah_output)) ? ($data->jumlah_stock+$jumlah_input-$jumlah_output) : ($data->jumlah_stock+$jumlah_input-$jumlah_output)).'</div>';

        $gap = \DB::table('gap')
                    ->where('stock_id', $data->stock_id)
                    ->first();

        $actual = '<div class="text-center">'.((!empty($gap)) ? ($gap->actual) : ('0')).'</div>';

        $jumlah_input = \DB::table('jumlah_input')
                ->where('stock_id', $data->stock_id)
                ->sum('jumlah');

        $jumlah_output = \DB::table('jumlah_output')
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

        $jml_gap = '<div class="text-center">'.((!empty($gap)) ? ($gap->actual-(+$data->jumlah_stock+$jumlah_input-$jumlah_output)) : ('0')).'</div>';

        return view('Departemen.Gap.show', compact('data', 'book_stock', 'actual', 'jml_gap'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $actual = Gap::select('*')
                    ->where('stock_id', $id)
                    ->get();
        
        try {
           Gap::destroy($actual);
            \DB::commit();

            return response()->json(['status' => 'success']);
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public function dataTable()
    {
        $data = \DB::table('stock')
            ->select('stock.stock_id',
                    'stock.jumlah_stock',
                    'stock.updated_at',
                    'part_number.part_no as part_no',
                    'part_number.description as description',
                    'model.nama_model as nama_model')
            ->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
            ->join('model', 'model.model_id', 'part_number.model_id')
            ->get();

        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('updated_at', function($data) {

            $updated_at = ((!empty($data)) ? ($data->updated_at) : (''));
            if ($updated_at) {
                return \Carbon\Carbon::parse($updated_at)->translatedFormat('d-m-Y, H:i');
            }
        })
        ->addColumn('last_actual', function($data) {
            $actual = \DB::table('gap')
                    ->where('stock_id', $data->stock_id)
                    ->first();

            $updated_at = ((!empty($actual)) ? ($actual->updated_at) : (''));
            if ($updated_at) {
                return \Carbon\Carbon::parse($updated_at)->translatedFormat('d-m-Y, H:i');
            }
        })
        ->addColumn('actual', function($data){
            $actual = \DB::table('gap')
                    ->where('stock_id', $data->stock_id)
                    ->first();
            return '<div class="text-center">'.((!empty($actual)) ? ($actual->actual) : ('0')).'</div>';
        })
        ->addColumn('gap', function($data){
            $gap = \DB::table('gap')
                    ->where('stock_id', $data->stock_id)
                    ->first();
            $jumlah_input = \DB::table('jumlah_input')
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            $jumlah_output = \DB::table('jumlah_output')
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<div class="text-center">'.((!empty($gap)) ? (+$gap->actual-$data->jumlah_stock) : ('0')).'</div>';
        })
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['print' => $data->stock_id,
                                                        'ajaxDelete' =>  $data->stock_id,
                                                        ]);
        })->rawColumns(['action', 'book_stock', 'actual', 'gap'])
        ->make(true);
    }
}
