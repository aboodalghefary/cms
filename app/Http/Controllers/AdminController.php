<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Traits\UserTypeTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
   use UserTypeTrait;

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Admin::class);
      $admins = Admin::with('user')->get();
      return view('cms.admins.index', compact('admins'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Admin::class);
      $roles = Role::where('guard_name', 'admin')->get();
      return view('cms.admins.create', compact('roles'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Admin::class);
      try {
         DB::transaction(function () use ($request) {
            $this->createUser($request, 'admin');
         });
         return response()->json(['icon' => 'success', 'title' => 'تمت عملية الحفظ بنجاح'], 200);
      } catch (Exception $e) {
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 400);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Admin  $admin
    * @return \Illuminate\Http\Response
    */
   public function show(Admin $admin)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Admin  $admin
    * @return \Illuminate\Http\Response
    */
   public function edit(Admin $admin)
   {
      $this->authorize('update', Admin::class);

      $roles = Role::where('guard_name', 'admin')->get();
      return view('cms.admins.edit', ['admin' => $admin, 'roles' => $roles]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Admin  $admin
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->authorize('update', Admin::class);

      try {
         DB::transaction(function () use ($request, $id) {
            $this->updateUser($request, 'admin', $id);
         });
         return response()->json(['icon' => 'success', 'title' => 'تمت عملية التحديث بنجاح'], 200);
      } catch (Exception $e) {
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 400);
      }
   }

   public function admins_update_password(Request $request, $id)
   {
      $validator = validator($request->all(), [
         'new_password' => 'required',
         'current_password' => 'required',
      ], []);
      if ($validator->fails()) {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
      $admin = Admin::findOrFail($id);
      $currentPassword = $request->input('current_password');

      if (Hash::check($currentPassword, $admin->password)) {
         $newPassword = Hash::make($request->input('new_password'));
         $admin->password =  $newPassword;
         $isSaved = $admin->save();
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
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Admin  $admin
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Admin::class);
      $admin = Admin::findOrFail($id);
      $user = $admin->user;
      $user = User::destroy($user->id);
      $admin = Admin::destroy($id);

      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $admin ? 200 : 400);
   }
}
