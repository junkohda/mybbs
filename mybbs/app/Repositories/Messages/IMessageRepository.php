<?php
namespace App\Repositories\Messages;

use App\Http\Responses\BaseApiResponse;
use App\Domains\Entities\MessageEntity;

interface IMessageRepository
{

    /**
     * メッセージを取得する
     *
     * @param int $pageSize
     * @return BaseApiResponse
     */
    public function getMessages(int $pageSize): BaseApiResponse;

    /**
     * メッセージを追加する
     *
     * @param MessageEntity $entity
     * @return bool
     */
    public function insert(MessageEntity $entity): bool;

}
