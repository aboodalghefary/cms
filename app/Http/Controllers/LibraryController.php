<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Libraries::class);

      $libraries = Library::all();
      return view('cms.libraries.index', compact('libraries'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Libraries::class);

      return view('cms.libraries.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Libraries::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'ادخل محتوى التعليق',
         'title.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      if (!$validator->fails()) {
         $library  = new Library();
         $library->title = $request->get('title');
         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/libraries/', $imageName);
            $library->image = $imageName;
         }
         $isSaved = $library->save();

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
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Http\Response
    */
   public function show(Library $library)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $this->authorize('update', Libraries::class);

      $library  = Library::findOrFail($id);
      return view('cms.libraries.edit', compact('library'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Libraries::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'ادخل محتوى التعليق',
         'title.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      if (!$validator->fails()) {
         $library = Library::findOrFail($id);
         $library->title = $request->get('title');
         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/libraries/', $imageName);
            $library->image = $imageName;
         }
         $isSaved = $library->save();

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
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Libraries::class);

      $library = Library::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $library ? 200 : 400);
   }
}
