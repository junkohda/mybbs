<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BBSService;

class BBSController extends Controller
{
    const serviceName = "BBS表示";

    /**
     * レスポンス投稿
     *
     * @param Request $request
     * @param BBSService $bbsService
     * @return void
     */
    public function submit(Request $request, BBSService $bbsService)
    {
        $bbsService->serviceName = self::serviceName;
        $result = $bbsService->submit($request->message, $request->poster_name);

        if($result){
            return redirect('/');
        }
    }
}