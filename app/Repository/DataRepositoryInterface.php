<?php

namespace App\Repository;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

interface DataRepositoryInterface
{
    public function all();
    public function create(array $data) ;
    public function find($id);
    public function update($data, $id);
    public function destroy($id);

}
