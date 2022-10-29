<?php


namespace App\Interfaces;


interface RepresentativeInterface
{
    public function getAllRepresentatives();
    public function createRepresentative($representativeData);
    public function updateRepresentative($representativeData,$representative);
    public function deleteRepresentative($representative);
}
