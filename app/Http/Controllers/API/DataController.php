<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataStoreRequest;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(DataStoreRequest $request)
    {
        $data = $request->validated();
        $user_id = auth()->user()->id;
        $data = $this->prepareData($data, $user_id);

        $insert = Data::upsert($data, ['user_id', 'ssn'], ["first_name", "last_name", "test1", "test2", "test3", "test4", "final", "grade"]);
        return response()->json(['messege' => 'Data Upserted Successfully' ,'insert'=> $insert], 200);
    }

    public function prepareData($data, $user_id)
    {
        $data = array_map(function ($row) use ($user_id) {
            return [
                'user_id' => $user_id,
                'ssn' => $row['SSN'],
                'first_name' => $row['First name'],
                'last_name' => $row['Last name'],
                'test1' => $row['Test1'],
                'test2' => $row['Test2'],
                'test3' => $row['Test3'],
                'test4' => $row['Test4'],
                'final' => $row['Final'],
                'grade' => $row['Grade'],
            ];
        }, $data);
        return $data;
    }
}
