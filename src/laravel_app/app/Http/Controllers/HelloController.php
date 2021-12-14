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
        $id = $request->query('page');
        $msg = 'show page: ' . $id;
        $result = Person::paginate(2);
        $paginator = new MyPaginator($result);
        $data = [
            'msg' => $msg,
            'data' => $result,
            'paginator' => $paginator,
        ];
        return view('hello.index', $data);
    }
}
