<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Permissions::class);

      $permissions = Permission::orderBy('id', 'desc')->get();
      return response()->view('cms.permissions.index', compact('permissions'));
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Permissions::class);

      return response()->view('cms.permissions.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Permissions::class);

      $validator = validator($request->all(), []);
      if (!$validator->fails()) {
         $permissions = new Permission();
         $permissions->name = $request->get('name');
         $permissions->guard_name = $request->get('guard_name');

         $isSaved = $permissions->save();

         return response()->json(['icon' => 'success', 'title' => $isSaved ? "تمت الاضافة بنجاح" : "فشلت عملية الاضافة"], $isSaved ? 200 : 400);
      } else {
         return response()->json(['icon' => 'error', 'tilte' => $validator->getMessageBag()->first()], 400);
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
      $this->authorize('update', Permissions::class);

      $permissions = Permission::findOrFail($id);
      return response()->view('cms.permissions.edit', compact('permissions'));
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
      $this->authorize('update', Permissions::class);

      $validator = validator($request->all(), []);
      if (!$validator->fails()) {
         $permissions = Permission::findOrFail($id);
         $permissions->name = $request->get('name');
         $permissions->guard_name = $request->get('guard_name');

         $isUpdate = $permissions->save();
         return ['redirect' => route('permissions.index')];
         return response()->json(['icon' => 'success', 'title' => $isUpdate ? "تمت الاضافة بنجاح" : "فشلت عملية الاضافة"], $isUpdate ? 200 : 400);
      } else {
         return response()->json(['icon' => 'error', 'tilte' => $validator->getMessageBag()->first()], 400);
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
      $this->authorize('delete', Permissions::class);


      $permissions = Permission::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $permissions ? 200 : 400);
   }
}
