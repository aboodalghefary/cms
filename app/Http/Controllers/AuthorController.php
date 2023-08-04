<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Traits\UserTypeTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthorController extends Controller
{
   use UserTypeTrait;

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Author::class);
      $roles = Role::all();

      $authors = Author::with('user')->get();
      $admins = Admin::with('user')->get();
      return view('cms.authors.index', compact('authors', 'roles', 'admins'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Author::class);
      $roles = Role::where('guard_name', 'author')->get();

      return view('cms.authors.create', compact('roles'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Author::class);

      try {
         DB::transaction(function () use ($request) {
            $this->createUser($request, 'author');
         });
         return response()->json(['icon' => 'success', 'title' => 'تمت عملية الحفظ بنجاح'], 200);
      } catch (Exception $e) {
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 400);
      }
   }
   public function authors_update_password(Request $request, $id)
   {
      $validator = validator($request->all(), [
         'new_password' => 'required',
         'current_password' => 'required',
      ], []);
      if ($validator->fails()) {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
      $author = Author::findOrFail($id);
      $currentPassword = $request->input('current_password');

      if (Hash::check($currentPassword, $author->password)) {
         $newPassword = Hash::make($request->input('new_password'));
         $author->password =  $newPassword;
         $isSaved = $author->save();
         if ($isSaved) {
            return response()->json(['icon' => 'success', 'title' => "تمت عملية التخزين"], 200);
         } else {
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => " كلمة المرور غير متطابقة "], 400);
      }
   }
   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Http\Response
    */
   public function show(Author $author)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Http\Response
    */
   public function edit(Author $author)
   {
      $this->authorize('update', Author::class);
      $roles = Role::where('guard_name', 'author')->get();

      return view('cms.authors.edit', ['author' => $author, 'roles' => $roles]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Author::class);

      try {
         DB::transaction(function () use ($request, $id) {
            $this->updateUser($request, 'author', $id);
         });
         return response()->json(['icon' => 'success', 'title' => 'تمت عملية التحديث بنجاح'], 200);
      } catch (Exception $e) {
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 400);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Author::class);

      $author = Author::findOrFail($id);
      $user = $author->user;
      $user = Author::destroy($user->id);
      $author = Author::destroy($id);

      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $author ? 200 : 400);
   }
}
