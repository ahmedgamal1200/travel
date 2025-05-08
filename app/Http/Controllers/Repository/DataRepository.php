<?php

namespace App\Http\Controllers\Repository;

use App\Http\Controllers\Controller;
use App\Repository\DataRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataRepository extends Controller implements DataRepositoryInterface
{
    protected $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function validate($data, $rules) {
     return   $validator = validator($data, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    }
    public function create( $data) 
    {
       
        $model = $this->model->create($data);
    }

    public function update($data, $id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        } else {
            return null;
        }        
    }
    public function delete($id) {
        return $this->model->destroy($id);
    }
    public function destroy($id)
    {
        $model =$this->model->find($id);
        if ($model) {
            $model->delete();
            return true;
        } else {
            return false;
        }
    }

}
