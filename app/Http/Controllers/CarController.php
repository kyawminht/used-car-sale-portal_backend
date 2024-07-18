<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Repository\CarRepository;
use App\Repository\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected CarRepository $carRepository;
    protected CarService $carService;
    public function __construct(CarRepository $carRepository,CarService $carService)
    {
        $carRepository=$this->carRepository;
        $carService=$this->carService;
    }

    public function index()
    {
        $cars=$this->carRepository->allCar();

        return response()->json([
            'data'   => $cars,
            'status' => 'success',
        ]);
    }

    public function show($id)
    {
        $car=$this->carRepository->showCarById($id);

        return response()->json([
            'data'   => $car,
            'status' => 'success',
        ]);
    }

    public function store(CarRequest $request)
    {
        $data=$request->all();
        $car=$this->carService->storeCar($data);

        return response()->json([
            'data'   => $car,
            'message' => 'car created successfully',
            'status' => 'success',
        ]);
    }

    public function update(CarRequest $request,$id)
    {
        $data=$request->all();
        $car=$this->carService->updateCar($data,$id);

        return response()->json([
            'data'   => $car,
            'message' => 'car updated successfully',
            'status' => 'success',
        ]);
    }

    public function destroy($id)
    {

        $car=$this->carService->deleteCar($id);

        return response()->json([
            'data'   => $car,
            'message' => 'car deleted successfully',
            'status' => 'success',
        ]);
    }
}
