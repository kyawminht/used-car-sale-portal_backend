<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Service\BidService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    protected BidService $bidService;

    public function __construct(BidService $bidService){
        $this->bidService=$bidService;
    }
    public function index()
    {

    }


        public function store(BidRequest $request)
        {
            $data = $request->all();
            $data['user_id'] = Auth::id();

            $bid = $this->bidService->storeBid($data);

            return response()->json([
                'data'    => $bid,
                'message' => 'Bid placed successfully',
                'status'  => 'success',
            ]);
        
    }
}
