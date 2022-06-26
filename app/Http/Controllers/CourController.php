<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourRequest;
use App\Http\Requests\UpdateCourRequest;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Storage;
class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function delete_cour(Request $request, $id){
        $cours = $this->get($id);
        if(!empty($cours)){
         if(User::get_user_id()==$cours->auteur){
            $cours->delete();
         }  
        }
    }

    public function get(Request $request ,$id){
        try{


          $data = Cour::find($id);
          if(empty($data)){
            return array();
          }
      }catch(Exception $e){
        $data = array();
      }

          return $data;
    }
     public function get_all(){
          return Cour::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //crée un nouveau cour 
       
        $validatedData = $request->validate([
'titre' => 'required|string|max:255',
                   'contenu' => 'required|string',
]);

        $file_execute = isset($request->image) && !empty($request->image);
        
        if($file_execute){
       $image = Storage::disk("public")->put("images", $request->image);

            }

         $cour  = new Cour();
         $cour->titre = $validatedData["titre"];
         $cour->contenu = $validatedData["contenu"];
         if(isset($image)){
            $cours->image = $image;
         }
         $cours->categorie = $request->categorie;
         $cour->auteur = User::get_user_id($request);
         $cour->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function edit(Cour $cour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourRequest  $request
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
           $validatedData = $request->validate([
'titre' => 'required|string|max:255',
                   'contenu' => 'required|string',
                   'id'=>'required|int',
]);
         $cour  = Cour::find($validatedData['id']);
         $cour->titre = $validatedData["titre"];
         $cour->contenu = $validatedData["contenu"];
         $cour->auteur = User::get_user_id($request);
         $cour->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cour $cour)
    {
        //
    }
}
