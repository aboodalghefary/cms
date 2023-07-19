<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index($id)
   {
      $this->authorize('viewAny', Photos::class);

      $album = Album::with('photos')->findOrFail($id);
      $photos = $album->photos;
      return view('cms.photos.index', compact('photos'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create($id)
   {
      $this->authorize('create', Photos::class);

      $album_id = $id;
      return view('cms.photos.create', compact('album_id'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Photos::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'الإسم مطلوب',
         'title.min' => 'لا يقبل أقل من 3 حروف',
         'title.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $photo = new Photo();
            $photo->title = $request->get('title');
            $photo->album_id = $request->get('album_id');
            if (request()->hasFile('image_path')) {
               $image = $request->file('image_path');
               $imagetitle = time() . 'image.' . $image->getClientOriginalExtension();
               $image->move('storage/images/photos', $imagetitle);
               $photo->image_path = $imagetitle;
            }

            $isSaved = $photo->save();

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
      } catch (Exception $e) {
         DB::rollBack();
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 500);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $this->authorize('update', Photos::class);

      $photo = Photo::findOrFail($id);
      return view('cms.photos.edit', compact('photo'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Photos::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'الإسم مطلوب',
         'title.min' => 'لا يقبل أقل من 3 حروف',
         'title.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $photo = Photo::findOrFail($id);
            $photo->title = $request->get('title');
            $photo->album_id = $request->get('album_id');

            if (request()->hasFile('image_path')) {
               $image = $request->file('image_path');
               $imagetitle = time() . 'image.' . $image->getClientOriginalExtension();
               $image->move('storage/images/photos', $imagetitle);
               $photo->image_path = $imagetitle;
            }

            $isSaved = $photo->save();

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
      } catch (Exception $e) {
         DB::rollBack();
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 500);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Photos::class);

      $photos = Photo::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $photos ? 200 : 400);
   }
}
