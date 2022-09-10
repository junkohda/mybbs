<?php

namespace App\Domains\Entities;

use Carbon\Carbon;

/**
 * Entityの基底クラス
 */
class DomainEntity
{
    /**
     * コンストラクタ
     */
    public function __construct(
        // ?string $created_at = null,
        // ?string $updated_at = null
    ) {
    }
    
    /**
     * 配列化
     *
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * 作成日付をCarbon形式で取得する
     *
     * @return Carbon|null
     */
    public function getByCarbonCreatedAt(): ?Carbon
    {
        return $this->created_at ? Carbon::parse($this->created_at) : null;
    }

    /**
     * 更新日付をCarbon形式で取得する
     *
     * @return Carbon|null
     */
    public function getByCarbonUpdatedAt(): ?Carbon
    {
        return $this->created_at ? Carbon::parse($this->updated_at) : null;
    }

}
