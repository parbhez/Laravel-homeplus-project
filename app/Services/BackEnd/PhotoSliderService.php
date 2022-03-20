<?php
namespace App\Services\BackEnd;
use Illuminate\Http\Request;


use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;

class PhotoSliderService
{
    public static function getPhotoSlider()
    {
        return DB::table('photo_sliders')
            ->join('categories','photo_sliders.fk_category_id','=','categories.id')
            ->leftJoin('sub_categories as sc','photo_sliders.fk_sub_category_id','=','sc.id')
            ->orderBy('photo_sliders.status', 'DESC')
            ->orderBy('photo_sliders.id', 'DESC')
            ->get([
                'photo_sliders.id as photo_slider_id',
                'photo_sliders.*',
                'categories.category_name_lang1',
                'categories.category_name_lang2',
                'sc.sub_category_name_lang1',
                'sc.sub_category_name_lang2'
            ]);
    }
    public static function getActiveCategory()
    {
        return DB::table('categories')
            ->where('categories.status', 1)
            ->orderBy('categories.id', 'ASC')
            ->get([
                'categories.id as category_id',
                'categories.*'
            ]);
    }

    public static function savePhotoSlider(Request $request)
    {
        $subCategory = (isset($request->sub_category_name_id)) ? $request->sub_category_name_id : '' ;
        try {
            $photoId = DB::table('photo_sliders')
                ->insertGetId([
                    'fk_category_id'     => $request->category_id,
                    'fk_sub_category_id' => $subCategory,
                    'image_path'         => '',
                    'image_caption'      => $request->image_caption,
                    'status'             => 1,
                    'created_at'         => date('Y-m-d h:i:s'),
                    'created_by'         => Session::get('admin.id'),
                ]);

            if ($photoId) {
                $fileName = Helper::imageUpload($photoId, $request->image, '/images/photoSlider/',211,848);
                $status = DB::table('photo_sliders')
                    ->where('id', $photoId)
                    ->update(['image_path' => $fileName]);
            }
            return true;
        } catch (\Exception $e) {
            return $e;
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getPhotoSliderById($photoSliderId = null)
    {
        return  DB::table('photo_sliders as ps')
            ->leftJoin('sub_categories as sc','ps.fk_sub_category_id','=','sc.id')
            ->where('ps.id', $photoSliderId)
            ->first([
                'ps.*','sc.sub_category_name_lang1'
            ]);
    }

    public static function saveEditPhotoSlider(Request $request)
    {
        $subCategory = (isset($request->sub_category_name_id)) ? $request->sub_category_name_id : '' ;
        try {
            $status = DB::table('photo_sliders')
                ->where('id', $request->photo_slider_id)
                ->update([
                    'fk_category_id'       => $request->category_id,
                    'fk_sub_category_id' => $subCategory,
                    'image_caption' => $request->image_caption,
                    'updated_at'    => date('Y-m-d h:i:s'),
                    'updated_by'    => Session::get('admin.id'),
                ]);
            $photoSliderId = $request->photo_slider_id;
            $photoSlider   = self::getPhotoSliderById($photoSliderId);

            $imageUpdateFlag = null;
            if (isset($request->image)) {
                $fileName = Helper::imageUpload($photoSliderId,$request->image,'/images/photoSlider/',211,848);
                if ($fileName == null) {
                    $fileName = $photoSlider->image_path;
                }else if($fileName == 'tooLarge'){
                    return 'tooLarge';
                }else{
                    $imageUpdateFlag = 1;
                }
            }else{
                $fileName = $photoSlider->image_path;
            }
            $status = DB::table('photo_sliders')
                ->where('id',$photoSlider->id)
                ->update(['image_path' => $fileName,]);
            if ($status) {
                if ($imageUpdateFlag == 1 && $photoSlider->image_path && file_exists(public_path('images/photoSlider/'.$photoSlider->image_path))) {
                    unlink(public_path('images/photoSlider/'.$photoSlider->image_path));
                }
            }
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactivePhotoSlider($id = null)
    {
        try {
            DB::table('photo_sliders')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activePhotoSlider($id = null)
    {
        try {
            DB::table('photo_sliders')
                ->where('id', $id)
                ->update([
                    'status' => 1,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

}