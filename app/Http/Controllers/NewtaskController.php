<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewtaskAddRequest;
use App\Models\Newtask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\New_;

class NewtaskController extends Controller
{
   /**
    * this methode will show all data of this task
    */
    public function index()
    {
        $alldata = Newtask::all();
        return view('index', compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ],[
            'title.required'=>'Title Should not be empty'
        ]);
        $newTask = new Newtask();
        $newTask->title = $request->title;
        $newTask->description = $request->description;
        
        $newTask->save();
        Session::flash('success', 'New Task Added Successfully');
        return redirect('/');
    }

    /**
     * just Status update process.
     */
    public function statusupdate($id)
    {
        $update = Newtask::find($id);
        if($update->status == 'incomplete'){
            $update->status = 'complete';
        }
        elseif($update->status == 'complete'){
            $update->status = 'incomplete';
        }
        $update->save();
        Session::flash('success', ' Status Updated Successfully');
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newtask $newtask , $id)
    {
        $editID = Newtask::find($id);
        return view('edit', compact('editID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newtask $newtask)
    {
        $request->validate([
            'title'=>'required',
            
        ],[
            'title.required'=>'Title Should not be empty'  
        ]);
        $update = Newtask::find($request->id);
        $update->title = $request->title;
        if($update->description){
            $update->description = $request->description;
        }
        $update->status = $request->status;
        $update->save();
        Session::flash('success', ' Task Updated Successfully');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newtask $newtask , $id)
    {
        $delete = Newtask::find($id);
        $delete->delete();
        Session::flash('success', ' Task Deleted Successfully');
        return redirect()->back();
    }
}
