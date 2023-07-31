<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Row;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RowController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $rows = Row::all();
      return view('cms.rows.index', compact('rows'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::all();
      return view('cms.rows.create', compact('categories'));
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
         'template' => 'required|string|min:3|max:20',
         'categories' => function ($attribute, $value, $fail) use ($request) {
            $categories = is_array($value) ? $value : explode(',', $value);
            if ($request->input('template') == 'template-one' && count($categories) != 1) {
               $fail('عند اختيار قالب 1 يجب اختيار تصنيف واحد.');
            } elseif ($request->input('template') == 'template-two' && count($categories) != 2) {
               $fail('عند اختيار قالب 2 يجب اختيار تصنيفين.');
            } elseif ($request->input('template') == 'template-three' && count($categories) != 2) {
               $fail('عند اختيار قالب 3 يجب اختيار تصنيفين.');
            } elseif ($request->input('template') == 'template-four' && count($categories) != 2) {
               $fail('عند اختيار قالب 4 يجب اختيار تصنيفين.');
            } elseif ($request->input('template') == 'template-five' && count($categories) != 3) {
               $fail('عند اختيار قالب 5 يجب اختيار 3 تصنيفات.');
            }
         },
      ], []);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $row = new Row();
            $row->template = $request->input('template');
            $row->save();
            $categories = is_array($request->input('categories')) ? $request->input('categories') : explode(',', $request->input('categories'));
            $row->categories()->attach($categories);

            DB::commit();
            return response()->json(['icon' => 'success', 'title' => 'تمت الإضافة بنجاح'], 200);
         } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
         }
      } catch (Exception $e) {
         DB::rollBack();
         return response()->json(['icon' => 'error', 'title' => $e->getMessage()], 500);
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
      $categories = Category::all();
      $row = Row::findOrFail($id);
      return view('cms.rows.edit', compact('categories', 'row'));
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
      $validator = validator($request->all(), [
         'template' => 'required|string|min:3|max:20',
         'categories' => function ($attribute, $value, $fail) use ($request) {
            $categories = is_array($value) ? $value : explode(',', $value);
            if ($request->input('template') == 'template-one' && count($categories) != 1) {
               $fail('عند اختيار قالب 1 يجب اختيار تصنيف واحد.');
            } elseif ($request->input('template') == 'template-two' && count($categories) != 2) {
               $fail('عند اختيار قالب 2 يجب اختيار تصنيفين.');
            } elseif ($request->input('template') == 'template-three' && count($categories) != 2) {
               $fail('عند اختيار قالب 3 يجب اختيار تصنيفين.');
            } elseif ($request->input('template') == 'template-four' && count($categories) != 2) {
               $fail('عند اختيار قالب 4 يجب اختيار تصنيفين.');
            } elseif ($request->input('template') == 'template-five' && count($categories) != 3) {
               $fail('عند اختيار قالب 5 يجب اختيار 3 تصنيفات.');
            }
         },
      ], []);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $row = Row::findOrFail($id);
            $row->template = $request->input('template');
            $row->save();
            $newCategories = is_array($request->input('categories')) ? $request->input('categories') : explode(',', $request->input('categories'));

            // حفظ المعرفات الحالية المرتبطة بالصف في مصفوفة
            $currentCategories = $row->categories->pluck('id')->toArray();

            // حذف المعرفات التي تم حذفها من القيم الجديدة
            $categoriesToDelete = array_diff($currentCategories, $newCategories);
            if (!empty($categoriesToDelete)) {
               $row->categories()->detach($categoriesToDelete);
            }

            // إضافة المعرفات الجديدة إلى العلاقة
            $row->categories()->sync($newCategories);

            DB::commit();
            return response()->json(['icon' => 'success', 'title' => 'تمت الإضافة بنجاح'], 200);
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
      //
   }
}
