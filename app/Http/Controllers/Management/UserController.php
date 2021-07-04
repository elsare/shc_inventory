<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Management\UserRequest;
use App\Repositories\Management\ManagementRepository;
use App\Models\User;
use Validator;

class UserController extends Controller
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
        return view($this->route1.'.'.$this->route2.'.'.$this->route3);
    }

    public function create()
    {
        return view($this->route1.'.'.$this->route2.'.'.$this->route3);
    }

    public function store(UserRequest $request, User $model)
    {  
        $route = $this->route1.'.'.$this->route2.'.'.'index';
        $this->management->store($request, $model, $route);
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view($this->route1.'.'.$this->route2.'.'.$this->route3, compact('data'));
    }

    public function update(Request $request, $id)
    {
        //
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
