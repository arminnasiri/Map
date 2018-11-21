<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Contracts\ApiController;
use App\Http\Resources\Points;
use App\Repositories\Contracts\PointRepositoryInterface;
use App\Services\Point\CreatePointRequest;
use App\Services\Point\CreatePointService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PointController extends ApiController
{

    /**
     * @var PointRepositoryInterface
     */
    private $pointRepository;

    public function __construct(PointRepositoryInterface $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Points
     */
    public function index()
    {
        $points=$this->pointRepository->paginate(10);
        return new Points($points);
    }
    public function show($id)
    {
        $point = $this->pointRepository->find($id);
        if(!$point)
        {
            return $this->respondNoFound("Point Not Found!");
        }
        return response()->json($point->toArray(),200);
    }
    public function store(Request $request)
    {
        $createpointService = new CreatePointService(
            new CreatePointRequest(
                [
                    'type' => $request->input('type'),
                    'lat' => $request->input('lat'),
                    'lng' => $request->input('lng')
                ]
            )
        );
        $newGateway = $createpointService->perform();
        if ($newGateway) {
            return $this->respondItemCreated('Create OK!');
        }
        return $this->respondInternalError('Error can not create');

    }
    public function destroy($id)
    {
       $delete= $this->pointRepository->delete($id);
       if(is_null($delete))
       {
           return $this->respondNoFound("Point Not Found To Delete!");
       }
        return response()->json($delete->toArray(),200);
    }


}
