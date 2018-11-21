<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 1:33 AM
 */

namespace App\Repositories\Eloquent;


use App\Point;
use App\Repositories\Contracts\EloquentBaseRepository;
use App\Repositories\Contracts\PointRepositoryInterface;

class EloquentPointRepository extends EloquentBaseRepository implements PointRepositoryInterface
{
    protected $model = Point::class;
}