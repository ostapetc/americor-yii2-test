<?php

namespace app\models\traits;

use app\models\Call;
use app\models\Customer;
use app\models\Fax;
use app\models\Sms;
use app\models\Task;
use app\models\User;

trait ClassNameMethods
{
    public static $classes = [
        Customer::class,
        Sms::class,
        Task::class,
        Call::class,
        Fax::class,
        User::class,
    ];

    /**
     * @param $className
     * @return mixed
     */
    public static function getObjectByTableClassName($className)
    {
        if (method_exists($className, 'tableName')) {
            return str_replace(['{', '}', '%'], '', $className::tableName());
        }

        return $className;
    }

    /**
     * @param $relation
     * @return string|null
     */
    public static function getClassNameByRelation($relation)
    {
        foreach (self::$classes as $class) {
            if (self::getObjectByTableClassName($class) == $relation) {
                return $class;
            }
        }
        return null;
    }
}