<?php

namespace App\Http\Livewire;

use App\Models\BreakingNew;
use Exception;
use Livewire\Component;

class CreateBreakingNews extends Component
{
   public $title;
   public $href;

   public function render()
   {
      return view('livewire.create-breaking-news');
   }

   public function saveBreakingNews()
   {
      $validatedData = $this->validate([
         'title' => 'required|string|min:3',
         'href' => 'required|string|min:3',
      ], [
         'title.required' => 'الاسم مطلوب',
         'href.required' => 'الاسم مطلوب',
         'title.min' => 'لا يقبل أقل من 3 حروف',
         'href.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      try {
         $breakingNew = new BreakingNew();
         $breakingNew->title = $validatedData['title'];
         $breakingNew->href = $validatedData['href'];
         $isSaved = $breakingNew->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('BreakingNewsAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('BreakingNewsError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->dispatchBrowserEvent('BreakingNewsError', ['message' => $e->getMessage()]);
      }
   }
}
