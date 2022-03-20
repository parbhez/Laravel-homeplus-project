<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PhotoSliderRequest;
use App\Services\BackEnd\PhotoSliderService;

class PhotoSliderController extends Controller

{
    public function photoSlider()
    {
        $sliders = PhotoSliderService::getPhotoSlider();
        $getActiveCategory = PhotoSliderService::getActiveCategory();
        return view('backend.photoSlider.photoSlider', compact('sliders','getActiveCategory'));
    }

    public function savePhotoSlider(PhotoSliderRequest $request)
    {
        $saveStatus = PhotoSliderService::savePhotoSlider($request);
        if ($saveStatus === true) {
            return redirect()->route('photoSlider')->with('success', 'Save Image Successfull.');
        } elseif ($saveStatus == 'tooLarge') {
            return redirect()->route('photoSlider')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('photoSlider')->with('error', $saveStatus);
        }
    }

    public function editPhotoSlider($photoSliderId)
    {
        $categories = PhotoSliderService::getActiveCategory();
        $slider = PhotoSliderService::getPhotoSliderById($photoSliderId);
        return view('backend.photoSlider.photoSliderEditLoad', compact('slider','categories'));
    }

    public function saveEditPhotoSlider(Request $request)
    {
        $updateStatus = PhotoSliderService::saveEditPhotoSlider($request);
        if ($updateStatus === true) {
            return redirect()->route('photoSlider')->with('success', 'Save Category Successfull.');
        } elseif ($updateStatus == 'tooLarge') {
            return redirect()->route('photoSlider')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('photoSlider')->with('error', $updateStatus);
        }
    }

    public function activePhotoSlider($id = null)
    {
        $inactivePhotoGallery = PhotoSliderService::activePhotoSlider($id);
        if ($inactivePhotoGallery === true) {
            return response()->json(['success' => true, 'status' => "Category Inactive Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $inactivePhotoGallery]);
        }
    }

    public function inactivePhotoSlider($id = null)
    {
        $activePhotoGallery = PhotoSliderService::inactivePhotoSlider($id);
        if ($activePhotoGallery === true) {
            return response()->json(['success' => true, 'status' => "Category Active Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $activePhotoGallery]);
        }
    }

    // Photo Gallery




    public function viewPhotoGallery()
    {
        $galleryDatas = PhotoSliderService::getPhotoGallery();
        $getSisterConcerns = $this->photoSlider()->sisterConcerns;
        return view('backend.photoGallery.viewPhotoGallery',compact('galleryDatas','getSisterConcerns'));
    }
    
    public function getGalleryMenuBySysterConcern($sisterConcernId = null)
    {
        return PhotoSliderService::getGalleryMenuBySysterConcern($sisterConcernId);
    }

    public function getGallerySubMenu($menuId = null)
    {
        return PhotoSliderService::getGallerySubMenu($menuId);
    }

    public function savePhotoGalery(Request $request)
    {
        $updateStatus = PhotoSliderService::savePhotoGalery($request->all());
        if ($updateStatus === true) {
            return redirect()->route('viewPhotoGallery')->with('success', 'Photo Gallery Save Successfull.');
        } elseif ($updateStatus == 'tooLarge') {
            return redirect()->route('viewPhotoGallery')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('viewPhotoGallery')->with('error', $updateStatus);
        }
    }

    public function loadPhotoGalleryEdit($galleryId = null)
    {
        $gallery = PhotoSliderService::loadPhotoGalleryEdit($galleryId);
        return view('backend.photoGallery.photoGalleryModal',compact('gallery'));
    }

    public function savePhotoGallery(Request $request)
    {
        $updateStatus = PhotoSliderService::saveEditPhotoGallery($request->all());
        if ($updateStatus === true) {
            return redirect()->route('viewPhotoGallery')->with('success', 'Photo Gallery Save Successfull.');
        } elseif ($updateStatus == 'tooLarge') {
            return redirect()->route('viewPhotoGallery')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('viewPhotoGallery')->with('error', $updateStatus);
        }
    }

    public function activePhotoGalleryMenues($galleryId = null)
    {
        $status = PhotoSliderService::activePhotoGalleryMenues($galleryId);
        if ($status == true){
            return redirect()->back()->with('flash_success','Active Successfully Done.');
        }else{
            return redirect()->back()->with('flash_success','Active Fail...!!');
        }
    }

    public function inActivePhotoGalleryMenues($galleryId = null)
    {
        $status = PhotoSliderService::inActivePhotoGalleryMenues($galleryId);
        if ($status == true){
            return redirect()->back()->with('flash_success','Inactive Successfully Done.');
        }else{
            return redirect()->back()->with('flash_success','Inactive Fail...!!');
        }
    }
}
