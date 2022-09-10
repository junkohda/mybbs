<?php

namespace App\Domains\Factories;

use App\Utilities\StrConv;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class EntityFactory
{
    /**
     * ModelからEntityインスタンスを生成してデータセットしたものを返す
     *
     * @param Model|null $model
     * @param string $entity_class_name
     * @return Object|null
     */
    public static function makeEntityByModel(?Model $model, string $entity_class_name): ?Object
    {
        if ($model == null) {
            return null;
        }
        $entity = new $entity_class_name();

        $entity_refl = new \ReflectionClass($entity);
        $entity_props = $entity_refl->getProperties();

        foreach ($entity_props as $entity_prop) {
            $snk_name = $entity_prop->getName();
            if (array_key_exists($snk_name, $model->toArray())) {
                $entity->$snk_name = $model->$snk_name;
            }
        }

        return $entity;
    }

    /**
     * Model配列からEntity配列インスタンスを生成してデータセットしたものを返す
     *
     * @param array $model_list
     * @param string $entity_class_name
     * @return array
     */
    public static function makeEntityByModelArray(array $model_list, string $entity_class_name): array
    {
        $list = [];

        $entity_base = new $entity_class_name();

        $entity_refl = new \ReflectionClass($entity_base);
        $entity_props = $entity_refl->getProperties();

        foreach ($model_list as $model) {
            $entity = clone $entity_base;
            $is_arr = is_array($model);
            $is_obj = is_object($model);

            foreach ($entity_props as $entity_prop) {
                $snk_name = $entity_prop->getName();

                if ($is_arr && array_key_exists($snk_name, $model)) {
                    $entity->$snk_name = $model[$snk_name];
                } elseif ($is_obj && array_key_exists($snk_name, $model->toArray())) {
                    $entity->$snk_name = $model->{$snk_name};
                }
            }

            $list[] = $entity;
        }

        return $list;
    }

    /**
     * Paginator配列からEntity配列インスタンスを生成してデータセットしたものを返す
     *
     * @param LengthAwarePaginator $pagi
     * @param string $entity_class_name
     * @return LengthAwarePaginator
     */
    public static function makeEntityByPaginator(LengthAwarePaginator $pagi, string $entity_class_name): LengthAwarePaginator
    {
        $pagi->getCollection()
        ->transform(function ($model, $key) use ($entity_class_name) {
            $entity = self::makeEntityByModel($model, $entity_class_name);
            return $entity;
        });

        return $pagi;
    }

    /**
     * stdClassからEntityインスタンスを生成してデータセットしたものを返す
     *
     * @param stdClass|null $std_class
     * @param string $entity_class_name
     * @return Object|null
     */
    public static function makeEntityByStdClass(?stdClass $std_class, string $entity_class_name): ?Object
    {
        if ($std_class == null) {
            return null;
        }
        $entity = new $entity_class_name();

        $entity_refl = new \ReflectionClass($entity);
        $entity_props = $entity_refl->getProperties();

        foreach ($entity_props as $entity_prop) {
            $snk_name = $entity_prop->getName();
            if (property_exists($std_class, $snk_name)) {
                $entity->$snk_name = $std_class->$snk_name;
            }
        }

        return $entity;
    }

    /**
     * stdClassリストからEntityインスタンスを生成してデータセットしたものを返す
     *
     * @param array $std_list
     * @param string $entity_class_name
     * @return array
     */
    public static function makeEntityByStdClassArray(array $std_list, string $entity_class_name): array
    {
        $list = [];
        $entity = new $entity_class_name();

        foreach ($std_list as $std_class) {
            $entity = self::makeEntityByStdClass($std_class, $entity_class_name);

            $list[] = $entity;
        }

        return $list;
    }

    /**
     * RequestからEntityインスタンスを生成してデータセットしたものを返す
     *
     * @param array $requests
     * @param string $entity_class_name
     * @return Object|null
     */
    public static function makeEntityByRequest(array $requests, string $entity_class_name): ?Object
    {
        $entity = new $entity_class_name();

        $entity_refl = new \ReflectionClass($entity);
        $entity_props = $entity_refl->getProperties();

        foreach ($entity_props as $entity_prop) {
            $snk_name = $entity_prop->getName();
            $caml_name = StrConv::camelize($snk_name);

            if (key_exists($caml_name, $requests) && property_exists($entity, $snk_name)) {
                $entity->$snk_name = $requests[$caml_name];
            }
        }

        return $entity;
    }

    /**
     * 配列からEntityインスタンスを生成してデータセットしたものを返す
     *
     * @param array $list
     * @param string $entity_class_name
     * @return Object|null
     */
    public static function makeEntityByArray(array $list, string $entity_class_name): ?Object
    {
        $entity = new $entity_class_name();

        $entity_refl = new \ReflectionClass($entity);
        $entity_props = $entity_refl->getProperties();

        foreach ($entity_props as $entity_prop) {
            $snk_name = $entity_prop->getName();

            if (key_exists($snk_name, $list) && property_exists($entity, $snk_name)) {
                $entity->$snk_name = $list[$snk_name];
            }
        }

        return $entity;
    }
}
