<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Http\Resources\SizeResource;

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
        $data = $this->size->findOrFail($id);
        return new SizeResource($data);
    }

}
