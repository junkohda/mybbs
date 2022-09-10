<?php
namespace App\Domains\Entities;

use App\Domains\Entities\DomainEntity;
use DateTime;

class MessageEntity extends DomainEntity
{
    public ?int $post_id = null;
    public ?string $poster_name = null;
    public ?DateTime $created_at = null;
    public ?string $message = null;

    public function __construct(
    ) {
        parent::__construct();
    }
}
