<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 1:55 AM
 */

namespace App\Services\Point;


use App\Repositories\Contracts\PointRepositoryInterface;
use App\Repositories\Eloquent\EloquentPointRepository;

class CreatePointService
{
    /**
     * @var CreatePointRequest
     */
    private $createPointRequest;
    private $pointRepository;

    /**
     * CreatePointService constructor.
     * @param CreatePointRequest $createPointRequest
     */
    public function __construct(CreatePointRequest $createPointRequest)
    {
        $this->createPointRequest = $createPointRequest;
        $this->pointRepository=resolve(EloquentPointRepository::class);
    }
    public function perform()
    {
        $newPoint = $this->pointRepository->store(
            [
                'type'         => $this->createPointRequest->getType(),
                'lat'      => $this->createPointRequest->getLat(),
                'lng'        => $this->createPointRequest->getLng()
            ]
        );

        return $newPoint;
    }

}