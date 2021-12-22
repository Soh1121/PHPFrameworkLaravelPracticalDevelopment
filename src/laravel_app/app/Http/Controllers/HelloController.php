<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Events\PersonEvent;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index($id = -1)
    {
        if ($id > 0) {
            $msg = 'id = ' . $id;
            $result = [Person::find($id)];
        } else {
            $msg = 'all people data.';
            $result = Person::get();
        }
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        dump($data);
        return view('hello.index', $data);
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);

        event(new PersonEvent($person));
        $data = [
            'input' => '',
            'msg' => 'id=' . $id,
            'data' => [$person],
        ];
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
