<?php


namespace App\Repositories;


use App\Interfaces\RepresentativeInterface;
use App\Models\Representative;

class RepresentativeRepository implements RepresentativeInterface
{
    /**
     * @var Representative
     */
    private Representative $representative;

    public function __construct(Representative $representative)
    {
        $this->representative = $representative;
    }

    /**
     * get all representatives
     * @return mixed
     */
    public function getAllRepresentatives()
    {
        return $this->representative->orderBy('id', 'desc')
            ->select('id','full_name','email','telephone','current_route','comments','joined_date')
            ->paginate(10);
    }

    /**
     * store a new representative
     * @param $representativeData
     * @return mixed
     */
    public function createRepresentative($representativeData)
    {
        return $this->representative->create($representativeData);
    }

    /**
     * update a specified representative
     * @param $representativeData
     * @param $representative
     * @return mixed
     */
    public function updateRepresentative($representativeData, $representative)
    {
        return $representative->update($representativeData);
    }

    /**
     * delete a specified representative
     * @param $representative
     * @return mixed
     */
    public function deleteRepresentative($representative)
    {
        return $representative->delete();
    }
}
