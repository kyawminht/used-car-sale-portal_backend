<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Repository\BidRepository;
use App\Service\BidService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    protected BidService $bidService;
    protected BidRepository $bidRepository;

    public function __construct(BidService $bidService,BidRepository $bidRepository){
        $this->bidService=$bidService;
        $this->bidRepository=$bidRepository;
    }


    public function show($id)
    {
        $bid=$this->bidRepository->showBid($id);
        return response()->json([
            'data'    => $bid,
            'message' => 'Bid get successfully',
            'status'  => 'success',
        ]);
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
