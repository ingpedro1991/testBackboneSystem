<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateZipCodeAPIRequest;
use App\Http\Requests\API\UpdateZipCodeAPIRequest;
use App\Models\ZipCode;
use App\Repositories\ZipCodeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ZipCodeController
 * @package App\Http\Controllers\API
 */

class ZipCodeAPIController extends AppBaseController
{
    /** @var  ZipCodeRepository */
    private $zipCodeRepository;

    public function __construct(ZipCodeRepository $zipCodeRepo)
    {
        $this->zipCodeRepository = $zipCodeRepo;
    }

    public function filterCode($zipCodeSearch)
    {
        /** @var ZipCode $zipCode */
        $zipCode = ZipCode::where('d_codigo', $zipCodeSearch)->first();

        if (empty($zipCode)) {
            return $this->sendError('Zip Code not found');
        }

        return $this->sendResponse($zipCode->toArray(), 'Zip Code retrieved successfully');
    }
   
}
