<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderOptionRequest;

class OrderController extends Controller
{

    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }
   
    public function index()
    {
        return $this->service->getAll();
    }


    public function store(OrderRequest $request)
    {
        $order = $this->service->save($request);
        return new OrderResource($order);
    }

    public function attachOption(OrderOptionRequest $request, $order)
    {
        try{
            $response = $this->service->attachOption($order, $request->option_id);
            return new OrderResource($response);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'erro' => true,
                'message' => 'Duplicate entry for field option_id'
            ],422);
        }
    }


    public function show($id)
    {
        $order = $this->service->find($id);
        return new OrderResource($order);
    }
}
