<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $response = Order::all();
        return OrderResource::collection($response);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'order_date' => 'required',
            'user_id' => 'required',
            'book_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];

            return response()->json($response, 400);
        }

        $input = $request->all();
        $order = Order::create($input);

        $response = [
          'success' => true,
          'message'=> 'Order succes',
        ];
        return response()->json($response,200);
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    public function update(Order $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'order_date' => 'required',
            'user_id' => 'required',
            'book_id' => 'required',
            'booking_date' => 'required',
            'return_date' =>'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return $response()->json($response, 400);
        }
        $input = $request->all();
        $order = Order::find($id);
        $order->update($input);
        $response = [
            'success' => true,
            'message' => "Order updated successfully",
        ];

        return response()->json($response, 200);
    }

    public function destroy(Request $request, int $id)
    {
        $book = $request->get('book_id');
        $status = $request->get('status_id');
        Book::where('id', $book)
            ->update(['status_id'=> $status]);
        if ($status == 4) {
            Order::destroy($id);
        }
        return response()->noContent();
    }
}
