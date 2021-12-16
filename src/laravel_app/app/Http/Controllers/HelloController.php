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
        $result = Person::get()->reject(function ($person) {
            return $person->age < 20;
        });
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
