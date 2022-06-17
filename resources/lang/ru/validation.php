<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => 'Поле «:attribute» обязательно для заполнения',
    'required_without' => 'Поле «:attribute» обязательно для заполнения, если не указан «:values»',
    'regex' => 'Некорректный формат для поля «:attribute»',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    // 'custom' => [
    //     'ended_at' => [
    //         'ended_at' => '123123',
    //     ],
    // ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'ended_at' => 'Срок жизни ссылки',
        'endless' => 'Неограниченный срок жизни',
        'origin_url' => 'Ссылка',
    ],

];
