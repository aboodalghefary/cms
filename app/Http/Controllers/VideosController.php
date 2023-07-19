<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index($id)
   {
      $this->authorize('viewAny', Videos::class);

      $library = Library::with('videos')->findOrFail($id);
      $videos = $library->videos;
      return view('cms.videos.index', compact('videos'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create($id)
   {
      $this->authorize('create', Videos::class);

      $library_id = $id;
      return view('cms.videos.create', compact('library_id'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->authorize('create', Videos::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'الإسم مطلوب',
         'title.min' => 'لا يقبل أقل من 3 حروف',
         'title.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $video = new Video();
            $video->title = $request->get('title');
            $video->library_id = $request->get('library_id');
            if (request()->hasFile('video_path')) {
               $videoFile = $request->file('video_path');
               $videotitle = time() . 'video.' . $videoFile->getClientOriginalExtension();
               $videoFile->move('storage/images/videos', $videotitle);
               $video->video_path = $videotitle;
            }

            $isSaved = $video->save();

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
      $this->authorize('update', Videos::class);

      $video = Video::findOrFail($id);
      return view('cms.videos.edit', compact('video'));
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
      $this->authorize('update', Videos::class);

      $validator = validator($request->all(), [
         'title' => 'required|string|min:3',
      ], [
         'title.required' => 'الإسم مطلوب',
         'title.min' => 'لا يقبل أقل من 3 حروف',
         'title.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      DB::beginTransaction();

      try {
         if (!$validator->fails()) {
            $video = Video::findOrFail($id);
            $video->title = $request->get('title');
            $video->library_id = $request->get('library_id');

            if (request()->hasFile('video_path')) {
               $videoFile = $request->file('video_path');
               $videotitle = time() . 'video.' . $videoFile->getClientOriginalExtension();
               $videoFile->move('storage/videos/videos', $videotitle);
               $video->video_path = $videotitle;
            }

            $isSaved = $video->save();

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
      $this->authorize('delete', Videos::class);

      $videos = Video::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $videos ? 200 : 400);
   }
}
