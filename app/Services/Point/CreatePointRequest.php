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
    private  $Lat;
    private $Lng;


    public function __construct(array $data)
    {
        $this->type = $data['type'];
        $this->Lat = $data['Lat'];
        $this->Lng = $data['Lng'];
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
        return $this->Lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->Lng;
    }
}