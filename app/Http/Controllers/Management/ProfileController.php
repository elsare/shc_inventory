<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Management\ProfileRequest;
use App\Repositories\Management\ManagementRepository;
use App\Models\User;
use Validator;

class ProfileController extends Controller
{
    public function __construct(ManagementRepository $_Management)
    {
        $route_name  = explode('.',\Route::currentRouteName());
        $this->route1 = ((isset($route_name[0])) ? $route_name[0] : (''));
        $this->route2 = ((isset($route_name[1])) ? $route_name[1] : (''));
        $this->route3 = ((isset($route_name[2])) ? $route_name[2] : (''));

        $this->management = $_Management;
    }

    public function index()
    {
        return redirect()->route($this->route1.'.'.$this->route2.'.'.'create');
    }

    public function create()
    {
        $id = \Auth::user()->id;
        $data = User::select('*')->where('id', $id)->first();

        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function store(Request $request)
    {  
        dd($request->all());
    }

    public function show($id)
    {
    }

    public function myProfile()
    {
        return view($this->route1.'.'.$this->route2.'.'.'show');
    }

    public function edit($id)
    {
        //
        
    }

    public function update(ProfileRequest $request, $id)
    {   
        $data = User::select('*')->where('id', $id)->first();
        $input = $request->all();

        try {
            if($request->hasFile('image')){
                $input['image'] = 'img'.rand().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/image'),$input['image']);

                \File::delete(public_path('admin/image/'.$data->image));

            $data->update($input);
            \DB::commit();
            }

            return redirect()->route($this->route1.'.'.$this->route2.'.'.'create')->with('success', 'Data Berhasil Disimpan!');
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public function destroy($id)
    {
        //
    }

    public function dataTable()
    {
        $data = User::select('id', 'name', 'email')
                ->orderBy('id','desc')
                ->get();
        return \DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('partials.buttons.datatable', ['show' => route('Management.User.show', $data->id),
                                                        'edit' => route('Management.User.edit', $data->id),
                                                        'ajaxDelete' =>  $data->id
                                                        ]);
        })->rawColumns(['action'])
        ->make(true);
    }
}
