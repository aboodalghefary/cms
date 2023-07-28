<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Author;
use App\Policies\AlbumsPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Albums::class);

      $albums = Album::all();
      return view('cms.albums.index', compact('albums'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {

      $this->authorize('create', Albums::class);


      return view('cms.albums.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {

      $this->authorize('create', Albums::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'ادخل محتوى التعليق',
         'title.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      if (!$validator->fails()) {
         $album = new Album();
         $album->title = $request->get('title');
         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/albums/', $imageName);
            $album->image = $imageName;
         }
         $isSaved = $album->save();

         if ($isSaved) {
            DB::commit();
            return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
         } else {
            DB::rollBack();
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */
   public function show(Album $album)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $this->authorize('update', Albums::class);
      $album = Album::findOrFail($id);
      return view('cms.albums.edit', compact('album'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Albums::class);


      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'ادخل محتوى التعليق',
         'title.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      if (!$validator->fails()) {
         $album = Album::findOrFail($id);
         $album->title = $request->get('title');
         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/albums/', $imageName);
            $album->image = $imageName;
         }
         $isSaved = $album->save();

         if ($isSaved) {
            DB::commit();
            return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
         } else {
            DB::rollBack();
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Albums::class);

      $album = Album::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $album ? 200 : 400);
   }
}
