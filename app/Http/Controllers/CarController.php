<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Repository\CarRepository;
use App\Service\CarService;
use App\Trait\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    use FileUploadTrait;
    protected CarRepository $carRepository;
    protected CarService $carService;
    public function __construct(CarRepository $carRepository,CarService $carService)
    {
        $this->carRepository = $carRepository;
        $this->carService = $carService;
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
        $data['user_id'] = Auth::id();

        $car=new Car;

          // Handle file upload
        $fileName=$this->uploadFile($request,'picture_url','uploads/car');
        if ($fileName) {
            $data['picture_url'] = $fileName;
        }
    $car = $this->carService->storeCar($data);

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
