<?php
namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class BaseService
{
    public $serviceName;

    protected function ExceptionLog(\Exception $ex)
    {
        $this->bmsLogService->error($this->serviceName, $ex->getMessage(), null, null, $ex);

    }

    protected function pagenator(array $targetAry, string $currentPageNo = null, string $pagesize = null) 
    {
        //ページがnullの場合は1を設定
        if (is_null($currentPageNo)) {
            $currentPageNo = 1;
        }

        if($targetAry != null){
            $data = array_chunk($targetAry,$pagesize);
            $displayData = $data[$currentPageNo-1];
        }else{
            $displayData = null;
        }

        return new LengthAwarePaginator(
                    $displayData, //該当ページに表示するデータ
                    count($targetAry), //全件数
                    $pagesize, //1ページに表示する数
                    $currentPageNo, //現在のページ番号
                );
    }
}
