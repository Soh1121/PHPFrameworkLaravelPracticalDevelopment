<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Jobs\MyJob;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        $msg = 'show people record.';
        $result = Person::get();
        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);

        dispatch(function () use ($person) {
            Storage::append(
                'person_access_log.txt',
                $person->all_data
            );
        });
        return redirect()->route('hello');
    }

    public function save($id, $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();
        return redirect()->route('hello');
    }

    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 1234];
        $person->save();

        return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if ($id == -1) {
            return Person::get()->toJson();
        } else {
            return Person::find($id)->toJson();
        }
    }
}
