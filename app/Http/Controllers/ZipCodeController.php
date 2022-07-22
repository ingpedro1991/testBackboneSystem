<?php

namespace App\Http\Controllers;

use App\DataTables\ZipCodeDataTable;
use App\Http\Requests\CreateZipCodeRequest;
use App\Http\Requests\UpdateZipCodeRequest;
use App\Repositories\ZipCodeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ZipCodeController extends AppBaseController
{
    /** @var ZipCodeRepository $zipCodeRepository*/
    private $zipCodeRepository;

    public function __construct(ZipCodeRepository $zipCodeRepo)
    {
        $this->zipCodeRepository = $zipCodeRepo;
    }

    /**
     * Display a listing of the ZipCode.
     *
     * @param ZipCodeDataTable $zipCodeDataTable
     *
     * @return Response
     */
    public function index(ZipCodeDataTable $zipCodeDataTable)
    {
        return $zipCodeDataTable->render('zip_codes.index');
    }

    /**
     * Show the form for creating a new ZipCode.
     *
     * @return Response
     */
    public function create()
    {
        return view('zip_codes.create');
    }

    /**
     * Store a newly created ZipCode in storage.
     *
     * @param CreateZipCodeRequest $request
     *
     * @return Response
     */
    public function store(CreateZipCodeRequest $request)
    {
        $input = $request->all();

        $zipCode = $this->zipCodeRepository->create($input);

        Flash::success('Zip Code saved successfully.');

        return redirect(route('zipCodes.index'));
    }

    /**
     * Display the specified ZipCode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zipCode = $this->zipCodeRepository->find($id);

        if (empty($zipCode)) {
            Flash::error('Zip Code not found');

            return redirect(route('zipCodes.index'));
        }

        return view('zip_codes.show')->with('zipCode', $zipCode);
    }

    /**
     * Show the form for editing the specified ZipCode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zipCode = $this->zipCodeRepository->find($id);

        if (empty($zipCode)) {
            Flash::error('Zip Code not found');

            return redirect(route('zipCodes.index'));
        }

        return view('zip_codes.edit')->with('zipCode', $zipCode);
    }

    /**
     * Update the specified ZipCode in storage.
     *
     * @param int $id
     * @param UpdateZipCodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZipCodeRequest $request)
    {
        $zipCode = $this->zipCodeRepository->find($id);

        if (empty($zipCode)) {
            Flash::error('Zip Code not found');

            return redirect(route('zipCodes.index'));
        }

        $zipCode = $this->zipCodeRepository->update($request->all(), $id);

        Flash::success('Zip Code updated successfully.');

        return redirect(route('zipCodes.index'));
    }

    /**
     * Remove the specified ZipCode from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zipCode = $this->zipCodeRepository->find($id);

        if (empty($zipCode)) {
            Flash::error('Zip Code not found');

            return redirect(route('zipCodes.index'));
        }

        $this->zipCodeRepository->delete($id);

        Flash::success('Zip Code deleted successfully.');

        return redirect(route('zipCodes.index'));
    }
}
