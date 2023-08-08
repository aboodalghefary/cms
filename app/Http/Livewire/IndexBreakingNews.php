<?php

namespace App\Http\Livewire;

use App\Models\BreakingNew;
use Livewire\Component;

class IndexBreakingNews extends Component
{
   public function render()
   {
      $breackingNews = BreakingNew::latest()->first();
      return view('livewire.index-breaking-news', compact('breackingNews'));
   }
}
