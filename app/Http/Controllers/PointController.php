<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PointRepositoryInterface;
use App\Repositories\Eloquent\EloquentPointRepository;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PointController extends Controller
{

    /**
     * @var PointRepositoryInterface
     */
    private $pointRepository;

    public function __construct(EloquentPointRepository $pointRepository)
    {

        $this->pointRepository = $pointRepository;
    }

    public function index()
    {
        //get all points in database
        $all=$this->pointRepository->all(['lat','lng']);
        foreach ($all as $key => $point) {
            //send for map.ir api and get data
            $response =Curl::to('https://map.ir/reverse')
                ->withData( array( 'lat' => "$point->lng" ,'lon'=>"$point->lat") )
                ->withHeader('accept: application/json')
                ->withHeader('x-api-key: WsLdHK46I5Wfr5xgI0ynjjyiw9Fyhydu')
                ->get();
            // decode data to array
            $result=json_decode($response);
            //if city = tehran saved data
            if($result->county=="تهران"){
                $data['data']['geometry'.$key] = [
                    $result
                ];
            }
        }
        //return all data city=tehran
        return response()->json($data,200);
    }
}
