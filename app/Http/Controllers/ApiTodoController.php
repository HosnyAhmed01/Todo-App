<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos; // using the todos model for database operations.

class ApiTodoController extends Controller
{
    public function index(){
        $todos=todos::all();
        $data=compact('todos');
        return [
            "data" => $data, 
            "message" => "success"
        ];
    }
    
    public function store(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'work'=>'required',
                'duedate'=>'required'
            ]
            );
            $todo = new todos;
            $todo->name=$request['name'];
            $todo->work=$request['work'];
            $todo->duedate=$request['duedate'];
            $todo->save();
            return [
                "data" => $todo, 
                "message" => "todo added successfully"
            ];
        }
    
    public function delete($id){
        todos::find($id)->delete();
        return [
            "message" => "todo deleted successfully"
        ];
    }


    public function updateData(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'work'=>'required',
                'duedate'=>'required'
            ]
            );
            $id = $request['id'];
            $todo=todos::find($id);            
            
            $todo->name=$request['name'];
            $todo->work=$request['work'];
            $todo->duedate=$request['duedate'];
            $todo->save();
            return [
                "message" => "todo updated successfully", 
                "data" => $todo
            ];
    }
}