<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videos;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideosPolicy
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
            return auth()->user()->hasPermissionTo('index-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can view the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Videos  $videos
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function view()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('index-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
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
            return auth()->user()->hasPermissionTo('create-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can update the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Videos  $videos
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function update()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('update-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can delete the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Videos  $videos
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function delete()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('delete-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can restore the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Videos  $videos
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function restore()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('restore-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }

   /**
    * Determine whether the user can permanently delete the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Videos  $videos
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function forceDelete()
   {
      foreach (array_keys(config('auth.guards')) as $guard) {

         if (auth()->guard($guard)->check()) {
            return auth()->user()->hasPermissionTo('forceDelete-videos') ? $this->allow() : $this->deny('لا تملك صلاحية هذا الاجراء');
         }
      }
   }
}
