<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentSectionTwoSettingsRequest;
use App\Services\GeneralContentTwoSettingsService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentSectionTwoSettingsController
 * @package App\Http\Controllers\Project
 */
class GeneralContentSectionTwoSettingsController extends Controller
{
    /**
     * @var GeneralContentTwoSettingsService
     */
    private $generalContentTwoSettingsService;

    /**
     * GeneralContentSectionTwoSettingsController constructor.
     * @param GeneralContentTwoSettingsService $generalContentTwoSettingsService
     */
    public function __construct(GeneralContentTwoSettingsService $generalContentTwoSettingsService)
    {
        $this->generalContentTwoSettingsService = $generalContentTwoSettingsService;
    }

    /**
     * @param StoreProjectGeneralContentSectionTwoSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProjectGeneralContentSectionTwoSettingsRequest $request)
    {
        $settings = $this->generalContentTwoSettingsService->store($request);

        return response()->json(['settings' => $settings]);
    }
}
