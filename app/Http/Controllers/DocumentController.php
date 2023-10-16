<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('created_at','desc')->paginate(10);
        $users = User::all();
        foreach($documents as $document){
            $user_id = $document->user_id;
            $document->user_name = $users->find($user_id)->name;
        }
           
        return view('repertoire.index', [
            'documents' => $documents,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repertoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'file' => 'required|mimes:zip,doc,pdf',  
        ]);
        $document = new Document;
        $document->titre = $request->input('titre');
        $file = $request->file('file');
        $original_file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $file_extension =  $file->getClientOriginalExtension();
        $nextAvailableFile = $this->getNextAvailableFile($original_file_name, $file_extension);
        $file_name = $original_file_name . '_' . $nextAvailableFile . '.' . $file_extension;
        $file->storeAs('uploads', $file_name);
        $document->fichier = $file_name;
        $document->user_id = Auth::id();
        $document->save();
        return redirect()->route('repertoire.index')->withSuccess(__("lang.success_document_add"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $user = User::find($document->user_id);
        return view('repertoire.show',[
            'document' => $document,
            'user' => $user,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('repertoire.edit',[
            'document' => $document
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'titre' => 'required',
        ]);
        $document->titre = $request->input("titre");
        $document->update();
        return redirect()->route('repertoire.index')->withSuccess(__("lang.success_document_update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        Storage::delete('uploads/' . $document->fichier);
        return redirect()->route('repertoire.index')->withSuccess(__("lang.success_document_delete"));
    }



    private function getNextAvailableFile($name, $extension)
    {
        $files = Storage::files('uploads',$name . '_*.' . $extension);
        if (empty($files)) {
            return "001";
        }

        return sprintf('%03d', count($files) + 1);
    }
}
