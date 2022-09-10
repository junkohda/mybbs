<?php

namespace App\Domains\Factories;

use Illuminate\Database\Eloquent\Model;
use App\Utilities\StrConv;

class BaseFactory
{
    /**
     * ModelからEntityインスタンスを生成してデータセットしたものを返す
     */
    public function makeEntityByModel(?Model $model, string $entityClassName) : ?Object
    {
        if($model == null) {
            return null;
        }
        $entity = new $entityClassName();

        $entityRefl = new \ReflectionClass($entity);
        $entityProps = $entityRefl->getProperties();

        foreach ($entityProps as $entityProp) {
            $camlName = $entityProp->getName();
            $snkName = StrConv::underscore($camlName);

            $entity->$camlName = $model->$snkName;
        }

        return $entity;
    }

    /**
     * EntityからModelインスタンスにデータセット
     */
    public function modelByEntity(Model $model, $entity, bool $exclId = false, array $excludes = [])
    {

        $entityRefl = new \ReflectionClass($entity);
        $entityProps = $entityRefl->getProperties();

        foreach ($entityProps as $entityProp) {
            $isExclude = false;
            $camlName = $entityProp->getName();
            if(strpos($camlName, "__") !== false) {
                // フィールド名が [__] で始まるものは除外
                $isExclude = true;
            } else if($camlName == "checked") {
                // フィールド名が[checked]は除外
                $isExclude = true;
            } else if($camlName == "id" && $exclId) {
                $isExclude = true;
            } else {
                foreach($excludes as $exc) {
                    if ($exc == $camlName) {
                        $isExclude = true;
                        break;
                    }
                }
            }

            if ($isExclude == false) {
                $snkName = StrConv::underscore($camlName);
                $model->$snkName = $entity->$camlName;
            }
        }
    }

    public function makeEntityByArray(array $data, string $entityClassName): ?Object
    {
        if ($data == null) {
            return null;
        }
        $entity = new $entityClassName();

        $keys = array_keys($data);

        foreach ($keys as $key) {
            $entity->$key = $data[$key];
        }
        /*
        $entityRefl = new \ReflectionClass($entity);
        $entityProps = $entityRefl->getProperties();

        foreach ($entityProps as $entityProp) {
            $camlName = $entityProp->getName();
            $snkName = StrConv::underscore($camlName);

            $entity->$camlName = $model->$snkName;
        }
        */

        return $entity;
    }

    public function cloneArray(array $data): array
    {
        if ($data == null) {
            return null;
        }
        $entity = [];

        $keys = array_keys($data);

        foreach ($keys as $key) {
            $entity[$key] = $data[$key];
        }

        return $entity;
    }
}
