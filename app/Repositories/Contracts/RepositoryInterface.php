<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 12:36 AM
 */

namespace App\Repositories\Contracts;


interface RepositoryInterface
{
    public function all(array $columns = []);

    public function paginate(int $page, $columns = ['*'], $pageName = 'page', int $per_page = 50);

    public function find(int $ID);

    public function findBy(array $criteria, array $columns = null, bool $single = true);

    public function store(array $item);

    public function delete(int $ID);


}