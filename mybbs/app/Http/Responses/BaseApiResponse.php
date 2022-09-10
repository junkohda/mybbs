<?php

namespace App\Http\Responses;

use App\Domains\Entities\ResultEntity;
use App\Domains\Factories\BaseFactory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

class BaseApiResponse implements Responsable
{
    // Common Responses
    public $isSuccess;
    public $message;
    public $code;

    // Data
    public $data;

    // Pagination
    public $currentPage;
    public $lastPage;
    public $perPage;
    public $total;

    public $statusCode;

    public static function cast($obj): self
    {
        if (($obj instanceof self) == false) {
            throw new InvalidArgumentException("{$obj} is not instance of BaseApiResponse");
        }
        return $obj;
    }

    public function __construct()
    {
        $this->isSuccess = false;
        $this->message = "";
        $this->code = 0;

        // $this->data = [];
        $this->currentPage = 0;
        $this->lastPage = 0;
        $this->total = 0;

        $this->statusCode = 200;
    }

    /**
     * ResultEntity からResponse作成
     */
    static public function byResultEntity(ResultEntity $entity)
    {
        $res = new BaseApiResponse();
        $res->isSuccess = $entity->result;
        $res->message = $entity->errorMessage;

        return $res;
    }

    // isSuccess , statusCode をセット

    /**
     * API成功（データあり）
     */
    public function apiSuccessful(string $message = "")
    {
        $this->isSuccess = true;
        $this->statusCode = 200;
        $this->message = $message;
    }

    /**
     * API成功（データなし）
     */
    public function apiNoContent(string $message = "")
    {
        $this->isSuccess = true;
        $this->statusCode = 204;
        $this->message = $message;
    }

    /**
     * API失敗・エラー
     */
    public function apiFailed(int $errorCode, string $message)
    {
        $this->isSuccess = false;
        $this->statusCode = 200;
        $this->code = $errorCode;
        $this->message = $message;
    }

    /**
     * サーバーエラー
     *
     * @param integer $errorCode
     * @param string $message
     * @return void
     */
    public function apiServerError(int $errorCode, string $message)
    {
        $this->result = false;
        $this->statusCode = 500;
        $this->code = $errorCode;
        $this->message = $message;
    }

    /**
     * クライアントエラー
     *
     * @param integer $errorCode
     * @param string $message
     * @return void
     */
    public function apiClientError(int $errorCode, string $message)
    {
        $this->result = false;
        $this->statusCode = 400;
        $this->code = $errorCode;
        $this->message = $message;
    }

    /**
     * interface implementation
     */
    public function toResponse($request)
    {
        return response()
            ->json($this)
            ->setStatusCode($this->statusCode);
    }

    /**
     * Eloquent の paginate result からレスポンス作成
     */
    public function buildBySearchResult(LengthAwarePaginator $searchResult, ?string $entityClass)
    {
        if ($searchResult != null) {
            $this->isSuccess = true;
            $this->currentPage = $searchResult->currentPage();
            $this->lastPage = $searchResult->lastPage();
            $this->perPage = $searchResult->perPage();
            $this->total = $searchResult->total();

            if (count($searchResult) > 0) {
                if ($entityClass != null) {
                    $factory = new BaseFactory();
                    $this->data = $searchResult->map(function ($item) use ($factory, $entityClass) {
                        return $factory->makeEntityByModel($item, $entityClass);
                    });
                } else {
                    $this->data = $searchResult->map(function ($item) {
                        return $item;
                    })->toArray();
                }
                $this->apiSuccessful();
            } else {
                $this->apiNoContent();
            }
        } else {
            $this->apiFailed(999, "");
        }
    }


    public function buildBySearchResultArray(LengthAwarePaginator $searchResult, ?string $entityClass)
    {
        if ($searchResult != null) {
            $this->isSuccess = true;
            $this->currentPage = $searchResult->currentPage();
            $this->lastPage = $searchResult->lastPage();
            $this->perPage = $searchResult->perPage();
            $this->total = $searchResult->total();

            if (count($searchResult) > 0) {
                if ($entityClass != null) {
                    $factory = new BaseFactory();
                    $this->data = $searchResult->map(function ($item) use ($factory, $entityClass) {
                        return $factory->makeEntityByArray($item, $entityClass);
                    });
                } else {
                    $this->data = $searchResult->map(function ($item) {
                        return $item;
                    })->toArray();
                }
                $this->apiSuccessful();
            } else {
                $this->apiNoContent();
            }
        } else {
            $this->apiFailed(999, "");
        }
    }

    public function buildByCollection(Collection $searchResult, ?string $entityClass)
    {
        if ($searchResult != null) {
            $this->isSuccess = true;
            $this->currentPage = 1;
            $this->lastPage = 1;
            $this->perPage = 100;
            $this->total = count($searchResult);

            if (count($searchResult) > 0) {
                if ($entityClass != null) {
                    $factory = new BaseFactory();
                    $this->data = $searchResult->map(function ($item) use ($factory, $entityClass) {
                        return $factory->makeEntityByModel($item, $entityClass);
                    });
                } else {
                    $this->data = $searchResult->map(function ($item) {
                        return $item;
                    })->toArray();
                }
                $this->apiSuccessful();
            } else {
                $this->apiNoContent();
            }
        } else {
            $this->apiFailed(999, "");
        }
    }
}
