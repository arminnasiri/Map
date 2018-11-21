<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 1:58 AM
 */

namespace App\Services\Point;


class CreatePointRequest
{
    private $type;
    private  $lat;
    private $lng;


    public function __construct(array $data)
    {
        $this->type = $data['type'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
    }
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }
}