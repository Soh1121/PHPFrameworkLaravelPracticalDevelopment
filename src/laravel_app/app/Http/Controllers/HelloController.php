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
        $result = Person::get()->filter(function ($person) {
            return $person->age < 50;
        });
        $result2 = Person::get()->filter(function ($person) {
            return $person->age < 20;
        });
        $result3 = $result->diff($result2);
        $data = [
            'msg' => $msg,
            'data' => $result2,
        ];
        return view('hello.index', $data);
    }
}
