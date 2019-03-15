<?php

namespace App\Services;

use App\Models\Size;
use App\Models\Order;
use App\Models\Flavor;
use App\Models\Option;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;


class OrderService {

    private $order;
    private $size;
    private $flavor;
    private $option;

    public function __construct(Order $order, Size $size, Flavor $flavor, Option $option)
    {
        $this->order = $order;
        $this->size = $size;
        $this->flavor = $flavor;
        $this->option = $option;

    }

    public function getAll()
    {
        $data = $this->order->paginate(20);
        return OrderResource::collection($data);
    }

    public function save(OrderRequest $request)
    {

        $size = $this->size->findOrFail($request->size_id);
        $flavor = $this->flavor->findOrFail($request->flavor_id);

        $data = [
            'flavor_id' => $flavor->id,
            'size_id' => $size->id,
            'amount' => $size->price + $flavor->additional_value,
            'preparation_time' => $size->preparation_time + $flavor->additional_time
        ];

        return $this->order->create($data);
    
    }

    public function attachOption($order_id, $option_id)
    {
        $order = $this->order->findOrFail($order_id);
        $option = $this->option->findOrFail($option_id);
        $order->options()->attach($option);

        $order->preparation_time = $order->preparation_time +  $option->additional_time;
        $order->amount = $order->amount + $option->additional_value;
        $order->save();

        return $order;

    }

    public function find($id)
    {
        return $this->order->findOrFail($id);
    }

}