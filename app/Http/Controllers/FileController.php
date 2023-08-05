<?php

namespace App\Http\Controllers;

use App\Models\File;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class FileController extends Controller
{
   public function index()
   {
      $files = File::orderBy('id', 'desc')->limit(50)->get();
      return response()->json(['files' => $files]);
   }

   public function upload(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'file' => 'required',
      ]);

      if ($validator->fails()) {
         return back()->withErrors($validator)->withInput();
      }

      $file = new File();
      $request_file = $request->file('file');
      $fileType = $request_file->getClientOriginalExtension();

      if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
         $image = Image::make($request_file)->encode('jpg', 75);
         $imageName = time() . Str::slug($request_file->getClientOriginalName());
         $image->save('storage/files/image/' . $imageName);
         $file->file = $imageName;
         $file->fileType = 'image';
      } elseif (in_array($fileType, ['mp4', 'avi', 'mov', 'wmv'])) {
         $video = $request_file;
         $compressedVideoName = time() . Str::slug($request_file->getClientOriginalName()) . 'video.' . $video->getClientOriginalExtension();
         $ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => 'C:\ffmpeg\bin\ffmpeg.exe',
            'ffprobe.binaries' => 'C:\ffmpeg\bin\ffprobe.exe'
         ]);
         $videoPath = $video;
         $compressedVideoPath = 'storage/files/video/' . $compressedVideoName;
         $video = $ffmpeg->open($videoPath);
         $format = new X264('libmp3lame', 'libx264');
         $video->save($format, $compressedVideoPath);
         $file->fileType = 'video';
         $file->file = $compressedVideoName;
      } elseif (in_array($fileType, ['pdf', 'doc', 'docx', 'txt'])) {
         $document = $request_file;
         $documentName = time() . Str::slug($request_file->getClientOriginalName()) . 'document.' . $document->getClientOriginalExtension();;
         $document->move('storage/files/document/', $documentName);
         $file->fileType = 'document';
         $file->file = $documentName;
      } else {
         $not_supported = $request_file;
         $not_supportedName = time() . Str::slug($request_file->getClientOriginalName());
         $not_supported->move('storage/files/not_supported/', $not_supportedName);
         $file->fileType = 'not_supported';
         $file->file = $not_supportedName;
      }

      $isSaved = $file->save();
      if ($isSaved) {
         return new JsonResponse(['icon' => 'success', 'title' => "تمت الإضافة بنجاح"], 200);
      } else {
         $errors = $validator->errors();
         return new JsonResponse(['icon' => 'error', 'title' => 'فشلت عملية التخزين', 'errors' => $errors], 400);
      }
   }

   public function destroy($id)
   {
      $files = File::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $files ? 200 : 400);
   }

   public function search_For_FileHas($text)
   {
      $files = File::where('file', 'LIKE', '%' . $text . '%')->get();

      return response()->json(['files' => $files]);
   }
}
