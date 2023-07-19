<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Roles::class);

      $roles = Role::withCount('permissions')->orderBy('id', 'desc')->paginate(10);
      return response()->view('cms.roles.index', compact('roles'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Roles::class);

      return response()->view('cms.roles.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Roles::class);

      $validator = validator($request->all(), []);
      if (!$validator->fails()) {
         $roles = new Role();
         $roles->name = $request->get('name');
         $roles->guard_name = $request->get('guard_name');

         $isSaved = $roles->save();

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
      $this->authorize('update', Roles::class);

      $roles = Role::findOrFail($id);
      return response()->view('cms.roles.edit', compact('roles'));
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
      $this->authorize('update', Roles::class);

      $validator = validator($request->all(), []);
      if (!$validator->fails()) {
         $roles = Role::findOrFail($id);
         $roles->name = $request->get('name');
         $roles->guard_name = $request->get('guard_name');

         $isUpdate = $roles->save();
         return ['redirect' => route('roles.index')];
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
      $this->authorize('delete', Roles::class);

      $roles = Role::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $roles ? 200 : 400);
   }
}
