<?php
namespace App\Services;

use App\Domains\Entities\MessageEntity;
use App\Repositories\Messages\IMessageRepository;
use App\Services\BaseService;
use App\Http\Responses\BaseApiResponse;

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
     * @param integer $pageSize
     * @return BaseApiResponse $result
     */
    public function getThreadData(int $pageSize)
    {
        $result = $this->iMessageRepository->getMessages($pageSize);
        
        return $result;
    }
}
