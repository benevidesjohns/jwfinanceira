<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class TaskRepositoryEloquent implements TaskRepositoryInterface{

    protected $model;

	/**
	 * @param Model $model
	 * @return mixed
	 */
	public function __construct(Model $model) {
        $this->model = $model;
	}

	/**
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function store(array $data) {
        return $this->model->create($data);
	}

	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function get($id) {
        return $this->model->find($id);
    }

	/**
     * @return mixed
	 */
    public function getList() {
        return $this->model->all();
	}

	/**
	 *
	 * @param array $data
	 * @param mixed $id
	 * @return mixed
	 */
	public function update(array $data, $id) {
        return $this->model->find($id)->update($data);
	}

	/**
	 *
	 * @param mixed $id
     * @return mixed
	 */
    public function destroy($id) {
        return $this->model->find($id)->delete();
	}
}
