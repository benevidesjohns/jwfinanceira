<?php

namespace App\Repositories\User;

use App\Models\Address;

class AddressRepositoryEloquent implements AddressRepositoryInterface
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Stores a new instance of Address in the database
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Address
     */
    public function store($data)
    {
        return $this->address->create($data);
    }

    /**
     * Returns all instances of Address from the database
     * @param array|string $columns
     * @param array<array> $filters
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList($columns=['*'], $filters=null)
    {
        return $this->address->where($filters)->get($columns);
    }

    /**
     * Returns an instance of Address from the given id
     * @param int|string $id
     * @return Address
     */
    public function get($id)
    {
        return $this->address->find($id);
    }

    /**
     * Updates the data of an instance of Address
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return Address
     */
    public function update($data, $id)
    {
        $address = $this->address->find($id);
        $address->update($data);
        return $address;
    }

    /**
     * Removes an instance of Address from the database
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->address->find($id)->delete();
    }
}
