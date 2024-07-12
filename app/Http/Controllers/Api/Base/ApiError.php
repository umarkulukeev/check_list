<?php

namespace App\Http\Controllers\Api\Base;

class ApiError
{

    public static $errors = [
        'OK' => [
            'code' => 200,
            'en'   => 'OK',
            'ru'   => 'OK',
        ],
        'uknown_error' => [
            'code' => 1000,
            'en'   => 'Uknown error',
            'ru'   => 'Неизвестная ошибка',
        ],
        'user_not_found' => [
            'code' => 1001,
            'en'   => 'User not found',
            'ru'   => 'Пользователь не найден',
        ],
        'user_is_not_master' => [
            'code' => 1002,
            'en'   => 'User is not master',
            'ru'   => 'Пользователь не является мастером',
        ],
        'user_has_no_service' => [
            'code' => 1002,
            'en'   => 'User has no this service',
            'ru'   => 'У пользователя нет такого сервиса',
        ],
        'wrong_credentials' => [
            'code' => 1002,
            'en'   => 'Wrong credentials',
            'ru'   => 'Неправильные учетные данные',
        ],
        'token_expired' => [
            'code' => 1003,
            'en'   => 'Token is expired',
            'ru'   => 'Срок действия токена истек',
        ],
        'api_token_not_found' => [
            'code' => 1004,
            'en'   => 'API Token not found',
            'ru'   => 'АПИ Токен отсутствует',
        ],
        'item_not_found' => [
            'code' => 1005,
            'en'   => 'Item not found',
            'ru'   => 'Объект не найден',
        ],
        'survey_not_found' => [
            'code' => 1006,
            'en'   => 'Survey not found',
            'ru'   => 'Опрос не найден',
        ],
        'survey_time_expired' => [
            'code' => 1007,
            'en'   => 'Survey time has been expired',
            'ru'   => 'Истек время голосования',
        ],
        'zone_not_found' => [
            'code' => 1008,
            'en'   => 'Zone not found',
            'ru'   => 'ТСЖ не найден',
        ],
        'comservice_not_found' => [
            'code' => 1009,
            'en'   => 'ComService not found',
            'ru'   => 'Ком.услуга не найдена',
        ],
        'comservice_not_active' => [
            'code' => 1010,
            'en'   => 'ComService not active',
            'ru'   => 'Ком.услуга не активна',
        ],
        'home_not_found' => [
            'code' => 1009,
            'en'   => 'Home not found',
            'ru'   => 'Квартира не найдена',
        ],
        'user_phone_not_found' => [
            'code' => 1010,
            'en'   => 'Phone number is not registered. Please add your address for registration.',
            'ru'   => 'Добавьте свой адрес или отсканируйте QR-код на единой квитанции.',
        ],
        'same_user' => [
            'code' => 1011,
            'en'   => 'Same user. You already have this account.',
            'ru'   => 'Один и тот же пользователь. У вас уже привязан этот лицевой счет.',
        ],
        'another_user' => [
            'code' => 1012,
            'en'   => 'Same user. You already have this account.',
            'ru'   => 'По этому лиц счету зарегистрирован пользователь с другим номером',
        ],
    ];

    public static function message($message)
    {
        $locale = config('app.locale', 'en');
        $err = self::$errors;

        $defaultMessage = $err['uknown_error']['en'];

        if (empty($message) == false)
            $defaultMessage .= ' - ' . $message;

        return data_get($err, $message . '.' . $locale, $defaultMessage);
    }

    public static function code($message)
    {
        return data_get(self::$errors, $message . '.code', 1000);
    }
}
