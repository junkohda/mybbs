<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Services\BBSService;

class BBSApiController extends BaseController
{

    const serviceName = "スレッド表示API";

    /**
     * スレッド表示
     *
     * @param Request $request
     * @param BBSService $bbsService
     * @return void
     */
    public function show(Request $request, BBSService $bbsService)
    {
        $bbsService->serviceName = self::serviceName;
        $result = $bbsService->getThreadData($request->pageSize);

        return $result;
    }

}