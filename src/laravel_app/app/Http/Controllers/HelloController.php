<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Http\Pagination\MyPaginator;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(Request $request)
    {
        $msg = 'show people record.';
        $even = Person::get()->filter(function ($item) {
            return $item->id % 2 == 0;
        });
        $map = $even->map(function ($item, $key) {
            return $item->id . ':' . $item->name;
        });
        $data = [
            'msg' => $map,
            'data' => $even,
        ];
        return view('hello.index', $data);
    }
}
