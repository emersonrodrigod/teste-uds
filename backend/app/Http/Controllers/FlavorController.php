<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use App\Http\Resources\FlavorResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FlavorController extends Controller
{
    private $flavor;

    public function __construct(Flavor $flavor)
    {
        $this->flavor = $flavor;
    }
    
    public function index()
    {
        $data = $this->flavor->all();
        return FlavorResource::collection($data);
    }

   
    public function show($id)
    {
        try {
            $data = $this->flavor->findOrFail($id);
            return new FlavorResource($data);
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
