<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Resources\OptionResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OptionController extends Controller
{
    private $option;

    public function __construct(Option $option)
    {
        $this->option = $option;
    }

    public function index()
    {
        $data = $this->option->all();
        return OptionResource::collection($data);
    }


    public function show($id)
    {
        try {
            $data = $this->option->findOrFail($id);
            return new OptionResource($data);
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
