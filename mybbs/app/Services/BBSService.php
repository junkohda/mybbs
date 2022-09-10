<?php
namespace App\Services;

use App\Domains\Entities\MessageEntity;
use App\Repositories\Messages\IMessageRepository;
use App\Services\BaseService;

class BBSService extends BaseService
{
    /**
     * @var IMessageRepository
     */
    protected $iMessageRepository;

    /**
     * コンストラクタ
     * @param IMessageRepository $iMessageRepository
     */
    public function __construct(
        IMessageRepository $iMessageRepository
    ) {
        $this->iMessageRepository = $iMessageRepository;
    }

    /**
     * 単一のスレッドを表示
     *
     * @param integer $page
     * @param integer $pageSize
     * @return BaseApiResponse $result
     */
    public function getThreadData(int $page, int $pageSize)
    {
        $result = new BaseApiResponse();
        $result->data = $this->iMessageRepository->getMessages($pageSize);

        $result->currentPage = 1;
        $result->lastPage = 1;
        $result->total = count($this->dashboardData);

        return $result;
    }
}
