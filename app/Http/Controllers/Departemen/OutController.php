<?php

namespace App\Http\Controllers\Departemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Departemen\OutRequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\Master\Departemen;
use App\Models\Master\PartNumber;
use App\Models\Master\Stock;
use App\Models\Transaksi\JumlahOutput;

class OutController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    
    public function index()
    {
        $departemen = Departemen::select('departemen_id', 'nama_departemen')->get();

        $part = PartNumber::select('part_number.part_number_id', 'part_number.part_no')->get();

        $resultPart = '<option selected disabled>Pilih Part Number</option>';
        foreach ($part as $myPart) {
            $resultPart .= '<option value="'.$myPart->part_number_id.'">'.$myPart->part_no.'</option>';
        }

        $resultDepartemen = '<option selected disabled>Pilih Departemen</option>';
        foreach ($departemen as $myDepartemen) {
            $resultDepartemen .= '<option value="'.$myDepartemen->departemen_id.'">'.$myDepartemen->nama_departemen.'</option>';
        }

        return view('Departemen.Out.index', compact('departemen', 'resultPart', 'resultDepartemen'));
    }

    public function create()
    {
        //
    }

    public function store(OutRequest $request)
    {   
        $ps = Departemen::select('departemen_id', 'nama_departemen', 'password')
            ->where('departemen_id', $request->departemen_id)
            ->first();

        $crypt = Crypt::decryptString($ps->password);

        $stock = Stock::select('*')
                ->where('stock_id', $request->stock_id)
                ->first();

        $update['jumlah_stock'] = $stock->jumlah_stock-$request->jumlah;
        $update['user_updated'] = \Auth::user()->id;
        $update['updated_at'] = date('Y-m-d H:i:s');

        $jumlah = JumlahOutput::select('*')
                    ->where('stock_id', $request->stock_id)
                    ->where('departemen_id', $request->departemen_id)
                    ->first();

        $input = $request->except(['password', 'part_number_id']);

        if ($stock->jumlah_stock <= 0) {
            return redirect()->route('Departemen.Out.index')->with('error', 'Stock Part Barang Habis, Hubungi Admin!');
        }
        try {
            if ($request->password == $crypt) {
                if ($jumlah == null) {
                    JumlahOutput::create($input);
                }else{
                    JumlahOutput::create($input);
                }

                $stock->update($update);
                \DB::commit();

                return redirect()->route('Departemen.Out.index')->with('success', 'Data Berhasil Disimpan!');
            }else{

                return redirect()->route('Departemen.Out.index')->with('error', 'Password Salah!');
            }
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public function show($id)
    {
        $data = Stock::select('stock.stock_id', 
                                'part_number.part_no as part_no',
                                'part_number.description as description',
                                'model.nama_model as nama_model'
            )->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
            ->join('model', 'model.model_id', 'part_number.model_id')
            ->findOrFail($id);

        $jumlah_output = JumlahOutput::select('jumlah_output.jumlah_output_id',
                                            'jumlah_output.jumlah',
                                            'jumlah_output.stock_id',
                                            'jumlah_output.created_at',
                                            'departemen.nama_departemen as nama_departemen')
                        ->join('departemen', 'departemen.departemen_id', 'jumlah_output.departemen_id')
                        ->where('stock_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('Departemen.Out.show', compact('data', 'jumlah_output'));
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
        $jumlah = JumlahOutput::select('*')
                    ->where('stock_id', $id)
                    ->get();
        
        try {
           JumlahOutput::destroy($jumlah);
            \DB::commit();

            return response()->json(['status' => 'success']);
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public function print($id)
    {
        $jumlah_output = JumlahOutput::select('jumlah_output.jumlah_output_id',
                                            'jumlah_output.jumlah',
                                            'jumlah_output.stock_id',
                                            'jumlah_output.created_at',
                                            'model.nama_model as nama_model',
                                            'part_number.part_no as part_no',
                                            'part_number.description as description',
                                            'departemen.nama_departemen as nama_departemen')
                        ->join('departemen', 'departemen.departemen_id', 'jumlah_output.departemen_id')
                        ->join('stock', 'stock.stock_id', 'jumlah_output.stock_id')
                        ->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
                        ->join('model', 'model.model_id', 'part_number.model_id')
                        ->where('jumlah_output_id', $id)
                        ->get();

        
        return view('Departemen.Out.edit', compact('jumlah_output'));
    }

    public function getDetail(Request $request)
    {
        if ($request->ajax()) {
            return array(
                'description'=> $this->getDescription($request),
                'model'=> $this->getModel($request),
                'stock_id'=> $this->getStock($request)
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

    public function getStock($request)
    {
        $data = Stock::select('stock_id', 'part_number_id')
                ->where('part_number_id', $request->part_number_id)
                ->get();


        foreach ($data as $key => $value) {
                $result = $value->stock_id;
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
                    'model.nama_model as nama_model',)
            ->join('part_number', 'part_number.part_number_id', 'stock.part_number_id')
            ->join('model', 'model.model_id', 'part_number.model_id')
            ->get();

        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('sein', function($data) {
            $sein = \DB::table('jumlah_output')
                    ->where('departemen_id', 1)
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center">' .((!empty($sein)) ? ($sein) : ('0')) .'</h4>';
        })
        ->addColumn('kitting', function($data){
            $kitting = \DB::table('jumlah_output')
                    ->where('departemen_id', 2)
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center">'.((!empty($kitting)) ? ($kitting) : ('0')).'</h4>';
        })
        ->addColumn('repair', function($data){
            $repair = \DB::table('jumlah_output')
                    ->where('departemen_id', 3)
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center">'.((!empty($repair)) ? ($repair) : ('0')).'</h4>';
        })
        ->addColumn('iqc', function($data){
            $iqc = \DB::table('jumlah_output')
                    ->where('departemen_id', 4)
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center">'.((!empty($iqc)) ? ($iqc) : ('0')).'</h4>';
        })
        ->addColumn('produksi', function($data){
            $operator = \DB::table('jumlah_output')
                    ->where('departemen_id', 5)
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center">'.((!empty($operator)) ? ($operator) : ('0')).'</h4>';
        })
        ->addColumn('semiAssy', function($data){
            $semiAssy = \DB::table('jumlah_output')
                    ->where('departemen_id', 6)
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center">'.((!empty($semiAssy)) ? ($semiAssy) : ('0')).'</h4>';
        })
        ->addColumn('jumlah', function($data) {
            $jumlah = \DB::table('jumlah_output')
                    ->where('stock_id', $data->stock_id)
                    ->sum('jumlah');

            return '<h4 class="text-center"><u>'.((!empty($jumlah)) ? ($jumlah) : ('0')).'</u></h4>';
        })
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', [ 
                                                        // 'print' => $data->stock_id,
                                                        // 'ajaxDelete' =>  $data->stock_id,
                                                        'show' => route('Departemen.Out.show', $data->stock_id),
                                                        ]);
        })->rawColumns(['action', 'sein', 'repair', 'kitting',  'iqc', 'produksi', 'semiAssy', 'jumlah'])
        ->make(true);
    }
}
