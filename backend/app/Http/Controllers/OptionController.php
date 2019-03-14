<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Resources\OptionResource;

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
        $data = $this->option->findOrFail($id);
        return new OptionResource($data);
    }

    
}
