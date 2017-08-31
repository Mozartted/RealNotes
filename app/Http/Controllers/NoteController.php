<?php

namespace App\Http\Controllers;


use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //This Controller handles the notes
    public function notes(){
    	// returns all notes in the platform
    	$notes = Note::all();
    	return response()->json([
    		'status'=>'success',
    		'data'=>$notes->toArray()
    	]);
    }

    public function createNote(Request $request){
        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return response()->json([
            'status'=>'success',
            'data'=>'',
            'message'=>'Note Created Successfully'
        ]);
    }

    public function deleteNote($id){
        if(Note::destroy($id)){
            return response()->json([
                'status'=>'success',
                'message'=>'success fully deleted'
            ]);
        }
    }

    public function updateNote(Request $request, $id){
    	// update note
        $note = Note::where('id',$id);
        if($note->update($request->all())){
            return response()->json([
                'status'=>'success',
                'message'=>'Note successfully updated'
            ]);
        }
    }
}
