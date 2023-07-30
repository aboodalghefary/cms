<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Policies\CategoriesPolicy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $this->authorize('viewAny', Categories::class);

      $categories = Category::whereNull('parent_id')->get();
      return view('cms.categories.index', compact('categories'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $this->authorize('create', Categories::class);
      $categories = Category::all();
      return view('cms.categories.create', compact('categories'));
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
         $category = new Category();
         $category->name = $request->get('name');
         if ($request->get('parent_id') != null) {
            $category->parent_id = $request->get('parent_id');
         }
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
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function show(Category $category)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $this->authorize('update', Categories::class);

      $category = Category::findOrFail($id);
      $categories = Category::all();
      return view('cms.categories.edit', compact('category', 'categories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Category  $category
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
            $category = Category::findOrFail($id);
            $category->name = $request->get('name');
            $category->parent_id = $request->get('parent_id');

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
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $this->authorize('delete', Categories::class);

      $category = Category::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $category ? 200 : 400);
   }
}
