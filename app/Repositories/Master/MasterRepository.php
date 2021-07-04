<?php
namespace App\Repositories\Master;

use App\Helpers\helper;
use Illuminate\Support\Facades\Crypt;

class MasterRepository
{
	
 	public function store($request, $model, $route)
 	{ 
 		$input = $request->all();
     		if ($request->password) {
                $input['password'] = Crypt::encryptString($request->password);
            }

        try {
            $model->create($input);
            \DB::commit();

            return redirect()->route($route)->with('success', 'Data Berhasil Disimpan!');
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }

 	}

 	public function update($id, $request, $model, $route)
 	{
        $data = $model->findOrFail($id);
        $input = $request->all();
        $input['updated_at'] = date('Y-m-d H:i:s');
        $input['user_updated'] = \Auth::user()->user_id;
        
        try {
            $data->update($input);
            \DB::commit();

            return redirect()->route($route)->with('success', 'Data Berhasil Diubah!');
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
 	}

 	public function destroy($id, $model)
 	{
        try {
           $model->destroy($id);
            \DB::commit();

            return response()->json(['status' => 'success']);
        } catch (Exception $e) {
            \DB::rollback();
            throw $e;
        }
 	}
}
