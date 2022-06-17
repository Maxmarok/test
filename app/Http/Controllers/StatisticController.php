<?php

namespace App\Http\Controllers;

use App\Models\Secret_codes;

class StatisticController extends Controller
{
    public function get($code)
    {
        $res = Secret_codes::code($code)->with(['stats', 'short'])->first();

        if(!$res) return redirect()->route('main')->with('error', 'Статистика по ссылке недоступна, создайте новую ссылку');

        return view('main', [
            'catalog' => 'stats',
            'data' => $res,
        ]);
    }
}
