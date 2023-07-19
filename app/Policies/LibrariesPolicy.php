<?php

namespace App\Policies;

use App\Models\Library;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LibrariesPolicy
{
   use HandlesAuthorization;

   /**
    * Determine whether the user can view any models.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function viewAny()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('index-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can view the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function view()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('index-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can create models.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function create()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('create-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can update the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function update()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('edit-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can delete the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function delete()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('delete-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can restore the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function restore()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('restore-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can permanently delete the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Library  $library
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function forceDelete()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('forceDelete-libraries') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }
}
