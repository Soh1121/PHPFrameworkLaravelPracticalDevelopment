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
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function ($key) {
            return $key % 2 == 0;
        });
        $result = Person::get()->only($even);
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
