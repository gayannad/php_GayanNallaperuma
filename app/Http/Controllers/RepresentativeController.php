<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepresentativeRequest;
use App\Http\Requests\UpdateRepresentativeRequest;
use App\Interfaces\RepresentativeInterface;
use App\Models\Representative;

class RepresentativeController extends Controller
{
    /**
     * @var RepresentativeInterface
     */
    private RepresentativeInterface $representativeRepo;

    public function __construct(RepresentativeInterface $representativeRepo)
    {

        $this->representativeRepo = $representativeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representatives = $this->representativeRepo->getAllRepresentatives();

        return view('representatives.index', compact('representatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representativeData = Representative::select('id')
            ->orderBy('id', 'DESC')->first();

        $id = 1;
        if ($representativeData) {
            $id = $representativeData->id + 1;
        }

        return view('representatives.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRepresentativeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepresentativeRequest $request)
    {
        try {
            $representativeData = $request->all();

            $representative = $this->representativeRepo->createRepresentative($representativeData);

            if ($representative) {
                return redirect()->route('representatives.index')
                    ->with('success', 'Representative created successfully.');
            } else {
                return redirect()->route('representatives.index')
                    ->with('error', 'Representative create failed.');
            }

        } catch (\Exception $e) {

            return redirect()->route('representatives.index')
                ->with('error', 'Representative create failed.');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Representative $representative
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        return view('representatives.edit', compact('representative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRepresentativeRequest $request
     * @param \App\Models\Representative $representative
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepresentativeRequest $request, Representative $representative)
    {
        try {
            $representativeData = $request->all();

            $representative = $this->representativeRepo->updateRepresentative($representativeData, $representative);

            if ($representative) {
                return redirect()->route('representatives.index')
                    ->with('success', 'Representative updated successfully.');
            } else {
                return redirect()->route('representatives.index')
                    ->with('error', 'Representative update failed.');
            }

        } catch (\Exception $e) {

            return redirect()->route('representatives.index')
                ->with('error', 'Representative update failed.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Representative $representative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representative $representative)
    {
        try {
            $representative = $this->representativeRepo->deleteRepresentative($representative);

            if ($representative) {

                return redirect()->route('representatives.index')
                    ->with('success', 'Representative deleted successfully.');
            } else {

                return redirect()->route('representatives.index')
                    ->with('error', 'Representative delete failed.');
            }

        } catch (\Exception $e) {

            return redirect()->route('representatives.index')
                ->with('error', 'Representative delete failed.');

        }
    }
}
