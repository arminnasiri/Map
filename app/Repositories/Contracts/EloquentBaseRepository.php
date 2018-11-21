<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 12:51 AM
 */

namespace App\Repositories\Contracts;


use App\Point;

class EloquentBaseRepository implements RepositoryInterface
{
    protected $model;

    public function find(int $ID)
    {
        return $this->model::find($ID);
    }

    public function store(array $item)
    {
        return $this->model::create($item);
    }

    public function delete(int $ID)
    {
            return $this->model::find($ID)->delete();
    }

    public function findBy(array $criteria, array $columns = null, bool $single = true)
    {
        $query = $this->model::query();
        foreach ($criteria as $key => $item) {
            $query->where($key, $item);
        }
        $method = $single ? 'first' : 'get';

        return is_null($columns) ? $query->{$method}() : $query->{$method}($columns);
    }

    public function all(array $columns = null)
    {
        $query = $this->model::query();
        if (!is_null($columns)) {
            return $query->get($columns);
        }
        return $query->get();
    }

    // return $this->query->paginate($perPage, $columns, $pageName, $page);
    public function paginate(int $page, $columns = ['*'], $pageName = 'page', int $per_page = 50)
    {
        return $this->model::paginate($page);
    }

}
