<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
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
            return auth()->user()->hasPermissionTo('index-authors') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can view the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function view()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('index-authors') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
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
            return auth()->user()->hasPermissionTo('create-authors') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can update the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function update()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('edit-authors') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can delete the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function delete()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('delete-authors') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can restore the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function restore()
   {
      //
   }

   /**
    * Determine whether the user can permanently delete the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Author  $author
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function forceDelete()
   {
      //
   }
}
