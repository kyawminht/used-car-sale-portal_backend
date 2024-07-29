<?php
namespace App\Repository;

use App\Models\Bid;

class BidRepository{
    public function showBid($id)
    {
        $id=Bid::findOrFail($id);
        return $id;
    }

    public function allBid()
    {
        return Bid::all();
    }
}
