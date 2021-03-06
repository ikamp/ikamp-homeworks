<?php

namespace App\Http\Controllers;

use App\Food;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderHistory = Order::with(["items", "items.food", "restaurant"])->where("user_id", Auth::id())->get();
        // var_dump(response()->json($orderHistory[0]));
        //$orderHistory = OrderItem::with("food")->where("foodId", 1)->get();
        return response()->json(($orderHistory));
        // return response()->json(OrderItem::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->restaurant_id = $request->restaurantId;
        $order->save();

        foreach ($request->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->price = $item["price"];
            $orderItem->quantity = $item["quantity"];
            $orderItem->order_id = $order->id;
            $orderItem->food_id = $item["id"];
            $orderItem->save();
        }

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(["items", "items.food", "restaurant"])->where("user_id", Auth::id())->find($id);
        return response()->json($order);
    }

}
