<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $service;

	public function __construct(TaskService $service) {
        $this->service = $service;
	}

 /**
  * Summary of store
  * @param Request $req
  * @return mixed
  */
	public function store(Request $req) {
        return $this->service->store([
            'title' => $req->title,
            'description' => $req->description
        ]);
	}

	public function get($id) {
        return $this->service->get($id);
    }

    public function getList() {
        return $this->service->getList();
	}

 /**
  * Summary of update
  * @param Request $req
  * @param mixed $id
  * @return mixed
  */
	public function update(Request $req, $id) {
        return $this->service->update([
            'title' => $req->title,
            'description' => $req->description
        ], $id);
	}

    public function destroy($id) {
        return $this->service->destroy($id);
	}
}
