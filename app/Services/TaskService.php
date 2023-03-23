<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;

class TaskService {

    private $repo;

	/**
	 * @param Model $model
	 * @return mixed
	 */
	public function __construct(TaskRepositoryInterface $repo) {
        $this->repo = $repo;
	}

	/**
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function store(array $data) {
        return $this->repo->store($data);
	}

	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function get($id) {
        return $this->repo->get($id);
    }

	/**
     * @return mixed
	 */
    public function getList() {
        return $this->repo->getList();
	}

	/**
	 *
	 * @param array $data
	 * @param mixed $id
	 * @return mixed
	 */
	public function update(array $data, $id) {
        return $this->repo->update($data, $id);
	}

	/**
	 *
	 * @param mixed $id
     * @return mixed
	 */
    public function destroy($id) {
        return $this->repo->destroy($id);
	}
}
