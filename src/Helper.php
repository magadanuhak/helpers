<?php

namespace Merax\Helpers;

use NotFoundModuleException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

class Helper
{
    /**
     * Получение названия модуля
     *
     * @param string|null $routeName
     * @return string
     * @throws NotFoundModuleException
     */
    public static function getModuleName(string $routeName = null): string
    {

        [$version, $module] = explode('.', $routeName ?? Route::currentRouteName());
        if (!$module) {
            throw new NotFoundModuleException('Module not found', 404);
        }

        return (string)$module;
    }

    /**
     * Получение названия модели
     *
     * @param string|null $routeName
     * @return string
     * @throws NotFoundModuleException
     */
    public static function getModelName(string $routeName = null): string
    {
        return Str::ucfirst(Str::camel(Str::singular(self::getModuleName($routeName))));
    }


    /**
     * Локализация
     *
     * @param string $name  = string
     * @param string $field = 'title' ?: 'description'
     *
     * @return string
     * @throws NotFoundModuleException
     */
    public static function trans(string $name, string $field = 'title'): string
    {
        $module = self::getModuleName();
        $field = "modules.{$module}.fields.{$name}.{$field}";
        $trans = (string)trans($field);

        return $field === $trans ? '' : $trans;
    }

    /**
     * Проверка на конкурентность запроса
     *
     * @param Model $model
     *
     * @throws ConcurrentRequestException
     */
    public static function checkConcurrentRequests(Model $model): void
    {
        $formCreatedAt = (int)request()->header('X-Created-At');
        $rowUpdatedAt = \carbon($model->getAttribute('updated_at'))->timestamp;
        if ($formCreatedAt && ($rowUpdatedAt > $formCreatedAt)) {
            throw new ConcurrentRequestException('Concurrent request error', 9999);
        }
    }
}

