<?php

namespace App\Http\Controllers\API;

use App\Models\Data;
use App\Events\Upserted;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataStoreRequest;

class DataController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(DataStoreRequest $request)
    {
        $data = $request->validated();
        $user_id= $request->user()->id;


        $data = array_map(function ($row) use ($user_id) { //add user_id to the students to upsert
            $row['user_id'] = $user_id;
            return $row;
        }, $data);


        Data::upsert($data, ['user_id', 'ssn'], ["first_name", "last_name", "test1", "test2", "test3", "test4", "final", "grade"]);


        Upserted::dispatch($request->user()); //fire event

        return response()->json(['messege' => 'Data Upserted Successfully'], 200);
    }

    public function view(Request $request){
        $model= $request->user()->data();
        return DataTables::of($model)->toJson(); //send the data of the authinicated user
    }
}
