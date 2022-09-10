<?php
namespace App\Repositories\Messages;

use App\Domains\Entities\MessageEntity;
use App\Domains\Models\MessageModel;
use App\Http\Responses\BaseApiResponse;
use App\Repositories\Messages\IMessageRepository;
use App\Domains\Factories\BaseFactory;

class MessageRepository implements IMessageRepository
{
    protected $eloquent;

    /**
     *
     * @return void
     */
    public function __construct(MessageModel $messageModel)
    {
        $this->eloquent = $messageModel;
    }

    /**
     * メッセージを取得する
     *
     * @param int $pageSize
     * @return BaseApiResponse
     */
    public function getMessages(int $pageSize): BaseApiResponse
    {
        $result = null;

        $query = MessageModel::query();

        $searchResult = $query->paginate($pageSize);
        $result = new BaseApiResponse();
        $result->buildBySearchResult($searchResult, MessageEntity::class);
        return $result;
    }

    /**
     * メッセージを追加する
     *
     * @param MessageEntity $entity
     * @return bool
     */
    public function insert(MessageEntity $entity): bool
    {
        $ret = true;

        $model = $this->eloquent->where("post_id", $entity->post_id)->get()->first();

        if ($model == null) {
            $model = $this->eloquent->newInstance();
        }
        $factory = new BaseFactory();
        $filldt = $this->eloquent->newInstance();
        $factory->modelByEntity($filldt, $entity);
        $ret = $model->fill($filldt->attributesToArray())->save();

        return $ret;
    }
}
