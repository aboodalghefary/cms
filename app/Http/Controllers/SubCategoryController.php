<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index($id)
   {
      $this->authorize('viewAny', Categories::class);

      $sub_categories = SubCategory::where('category_id', $id)->get();
      return view('cms.sub_categories.index', compact('sub_categories'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create($id)
   {
      $this->authorize('create', Categories::class);
      $category_id = $id;
      return view('cms.sub_categories.create', compact('category_id'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Categories::class);

      $validator = validator($request->all(), [
         'name' => 'required|string|min:3|max:20',
      ], [
         'name.required' => 'الإسم مطلوب',
         'name.min' => 'لا يقبل أقل من 3 حروف',
         'name.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      if (!$validator->fails()) {
         $category = new SubCategory();
         $category->name = $request->get('name');
         $category->category_id = $request->get('category_id');

         if (request()->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/category', $imageName);
            $category->image = $imageName;
         }

         $isSaved = $category->save();

         if ($isSaved) {
            DB::commit();
            return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
         } else {
            DB::rollBack();
            return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
         }
      } else {
         return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
      $this->authorize('update', Categories::class);

      $sub_category = SubCategory::findOrFail($id);
      $category_id = $id;
      return view('cms.sub_categories.edit', compact('sub_category', 'category_id'));
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
      $this->authorize('update', Categories::class);

      $validator = validator($request->all(), [
         'name' => 'required|string|min:3|max:20',
      ], [
         'name.required' => 'الإسم مطلوب',
         'name.min' => 'لا يقبل أقل من 3 حروف',
         'name.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $category = SubCategory::findOrFail($id);
            $category->name = $request->get('name');
            $category->category_id = $request->get('category_id');

            if (request()->hasFile('image')) {
               $image = $request->file('image');
               $imageName = time() . 'image.' . $image->getClientOriginalExtension();
               $image->move('storage/images/category', $imageName);
               $category->image = $imageName;
            }

            $isSaved = $category->save();

            if ($isSaved) {
               DB::commit();
               return response()->json(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
            } else {
               DB::rollBack();
               return response()->json(['icon' => 'error', 'title' => "فشلت عملية التخزين"], 400);
            }
         } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
         }
      } catch (Exception $e) {
         DB::rollBack();
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 500);
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
      $this->authorize('delete', Categories::class);

      $category = SubCategory::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $category ? 200 : 400);
   }
}
