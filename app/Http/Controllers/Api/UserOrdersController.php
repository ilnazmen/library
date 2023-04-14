<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserOrdersResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserOrdersController extends Controller
{
    public function index(Request $request)
    {
        $userOrder = $request->get('user_id');
        $order= Order::with('book')->where('user_id', $userOrder)->get();
        return response()->json($order);
    }
}
