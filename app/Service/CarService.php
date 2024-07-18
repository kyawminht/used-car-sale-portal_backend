<?php
namespace App\Repository;
use App\Models\Car;

class CarService
{
    public function storeCar($data)
    {
        return Car::create($data);
    }

    public function updateCar($data,$id)
    {
        $car=Car::findOrFail($id);

        $car->update($data);

        return $car;
    }

    public function deleteCar($id)
    {
         $car=Car::findOrFail($id);

        return $car->delete();
    }

}
