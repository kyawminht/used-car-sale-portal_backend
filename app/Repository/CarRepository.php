<?php
namespace App\Repository;

use App\Models\Car;

class CarRepository
{
    public function allCar()
    {
        return Car::all();
    }

    public function showCarById($id)
    {
        return Car::findOrFail($id);
    }

    


}
