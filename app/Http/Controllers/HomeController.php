<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home\Event;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stock = \DB::table('stock')
                ->sum('jumlah_stock');

        $stock_kemarin = ((!empty($stock)) ? ($stock) : ('0'));

        $jumlahInput = \DB::table('jumlah_input')
                    ->sum('jumlah');

        $jml_input = ((!empty($jumlahInput)) ? ($jumlahInput) : ('0'));

        $jumlahOutput = \DB::table('jumlah_output')
                ->sum('jumlah');

        $jml_output = ((!empty($jumlahOutput)) ? ($jumlahOutput) : ('0'));

        $gap = \DB::table('gap')
                    ->first();

        $jml_actual = ((!empty($gap)) ? ($gap->actual) : ('0'));

        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['event_id','title','start', 'end']);
         return response()->json($data);
        }

        return view('home', compact('stock_kemarin', 'jml_input', 'jml_output', 'jml_actual'));
    }

    public function create(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Event::create($insertArr);   
        return response()->json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('event_id' => $request->event_id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
 
        return response()->json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        try {
           $event = Event::where('event_id',$request->event_id)->delete();
            \DB::commit();

            return response()->json($event);
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public function dataTable()
    {
        $data = \DB::table('event')->select('event_id', 'title', 'start', 'end')
        ->orderBy('created_at')
        ->get();

        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('start', function($data){
            return \Carbon\Carbon::parse($data->start)->translatedFormat('d M Y');
        })
        ->addColumn('end', function($data){
            return \Carbon\Carbon::parse($data->end)->translatedFormat('d M Y');
        })
        ->rawColumns(['start'])
        ->make(true);
    }    
}
