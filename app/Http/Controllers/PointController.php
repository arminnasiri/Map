<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PointRepositoryInterface;
use Illuminate\Http\Request;

class PointController extends Controller
{

    /**
     * @var PointRepositoryInterface
     */
    private $pointRepository;

    public function __construct(PointRepositoryInterface $pointRepository)
    {

        $this->pointRepository = $pointRepository;
    }

    public function index()
    {
       $all=$this->pointRepository->paginate(10);
       return view('welcome',compact('all'));
    }
}
