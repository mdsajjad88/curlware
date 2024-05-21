<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use App\Http\Requests\TaskAddRequest;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $allData = Task::all();
        if($allData){
            return response()->json([
                'success'=> true,
                'message'=>' Data Taken',
                'data'=>$allData,
           ]);
        }
        else{
            return response()->json([
                'success'=> false,
                'message'=>'Data Not Available',
                
           ]);
        }
    }
    public function store(TaskAddRequest $request)
    {     
    $new = new Task();
    $new->title = $request->title;
    $new->description = $request->description;
    if($request->is_completed){
        $new->is_completed = $request->is_completed;
    }
    if(!$request->is_completed){
        $new->is_completed = 0;
    }
    if($new->save()){
        return response()->json([
            'success'=> true,
            'message'=>'Successfully added Your Task',
       ]);
    }
    else{
        return response()->json([
            'success'=> false,
            'message'=>'Something is Error',
       ]);
    }
    }

        
       
    
    public function showall(){
        $allData = Task::all();
        if($allData){
            return response()->json([
                'success'=> true,
                'message'=>' Data Taken',
                'data'=>$allData,
           ]);
        }
        else{
            return response()->json([
                'success'=> false,
                'message'=>'Data Not Available',
                
           ]);
        }
    }
    public function show($id){
        $idFind = Task::find($id);
        if($idFind){
            return response()->json([
                'success'=> true,
                'message'=>'Find Data',
                'data'=>$idFind,
           ]);
        }
        else{
            return response()->json([
                'success'=> false,
                'message'=>'Data Not Found',
                
           ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update(Request $request, $id)
    {
        $putData = Task::find($id);
        if($request->title){
            $putData->title = $request->title;
        }
        if($request->description){
            $putData->description = $request->description;
        }
        if($request->is_completed){
            $putData->is_completed = $request->is_completed;
        }           
       $update = $putData->save();
       if($update){
        return response()->json([
            'success'=> true,
            'message'=>'Data Update Successfully',
            
        ]);
        }
       else{
        return response()->json([
            'success'=> false,
            'message'=>'Something went wrong. Data Not Update',   
       ]);
       
       }
    }

    public function destroy($id)
    {
        $data = Task::find($id);
       
        if($data->delete()){
            return response()->json([
                'success'=> true,
                'message'=>'Data Deleted Successfully',   
           ]);
        }
        else{
            return response()->json([
                'success'=> false,
                'message'=>'Data Not Delete',  
           ]);
        }
    }
}
