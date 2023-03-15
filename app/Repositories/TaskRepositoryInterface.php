<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Summary of TaskRepositoryInterface
 */
interface TaskRepositoryInterface {
    /**
     * Summary of __construct
     * @param Model $model
     */
    public function __construct(Model $model);
    public function store(array $data);
    public function get($id);
    public function getList();
    public function update(array $data, $id);
    public function destroy($id);
}
