<?php
namespace App\Service;

use App\Models\Bid;

class BidService
{
    public function storeBid($data)
    {
        return Bid::create($data);
    }
}
