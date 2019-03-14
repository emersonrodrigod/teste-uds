<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Resources\SizeResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SizeController extends Controller
{
    private $size;

    public function __construct(Size $size)
    {
        $this->size = $size;
    }
 
    public function index()
    {
        $data = $this->size->all();
        return SizeResource::collection($data);
    }

    public function show($id)
    {
        try{
            $data = $this->size->findOrFail($id);
            return new SizeResource($data);
        }
        catch(ModelNotFoundException $e)
        {
           return response([
               'error' => true,
               'message' => 'Resource not found'
           ],404);
        }
    }

}
