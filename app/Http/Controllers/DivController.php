<?php

namespace App\Http\Controllers;

use App\Models\Div;
use Illuminate\Http\Request;

class DivController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      // $divs = Div::all();
      return ['redirect' => route('divs.create')];
      // return view('cms.divs.create', compact('divs'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.divs.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $validator = validator($request->all(), [
         'content' => 'nullable',
         'image' => 'nullable',
         'href' => 'nullable',
         'name' => 'required',
      ], [
         'name.required' => ' قيمة حقل الاسم مطلوبة ',
         'content.required' => ' قيمة حقل المحتوى مطلوب مطلوبة ',
      ]);
      if (!$validator->fails()) {
         $div = new Div();
         $div->name = $request->get('name');
         $div->content = $request->get('content');
         $div->href = $request->get('href');
         if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/div/', $imageName);

            $div->image = $imageName;
         }
         $isSaved = $div->save();
         if ($isSaved) {
            return response()->json(['icon' => 'success', 'title' => "تمت عملية التخزين"], 200);
         } else {
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Div  $div
    * @return \Illuminate\Http\Response
    */
   public function show(Div $div)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Div  $div
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $div = Div::findOrFail($id);
      return view('cms.divs.edit', compact('div'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Div  $div
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Div $div)
   {
      $validator = validator($request->all(), [
         'content' => 'nullable',
         'image' => 'nullable',
         'href' => 'nullable',
      ], []);
      if (!$validator->fails()) {
         $div->content = $request->get('content');
         $div->href = $request->get('href');
         if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/div', $imageName);

            $div->image = $imageName;
         }
         $isSaved = $div->save();
         if ($isSaved) {
            return ['redirect' => route('divs.index')];
            return response()->json(['icon' => 'success', 'title' => "تمت عملية التخزين"], 200);
         } else {
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Div  $div
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $div = Div::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $div ? 200 : 400);
   }
}
