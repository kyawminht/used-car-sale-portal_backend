<?php
namespace App\Service;
use App\Models\Car;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

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

    public function search($search)
    {
        if ($search) {
            $result = Car::query()
                ->where(function ($query) use ($search) {
                    $query->where('make', 'LIKE', "%{$search}%")
                          ->orWhere('model', 'LIKE', "%{$search}%")
                          ->orWhere('price', 'LIKE', "%{$search}%");
                })
                ->get();
        } else {
            $result = Car::all();
        }

        return $result;

    }

}
