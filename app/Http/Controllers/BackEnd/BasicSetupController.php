<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\SpecificationRequest;
use App\Http\Requests\CityRequest;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\SizeRequest;
use App\Http\Requests\TagRequest;
use App\Http\Requests\SubCategoryDetailsRequest;
use App\Http\Requests\incomeExpenseHeadRequest;
use App\Services\BackEnd\BasicSetupService;
use App\Services\BackEnd\ProductService;

class BasicSetupController extends Controller{

//=======@@ Start Category Section  @@=======
    public function category(){
    	 $categories = BasicSetupService::getCategory();
    	return view('backend.basicSetup.category',compact('categories'));
    }

    public function saveCategory(CategoryRequest $request){
        $saveCategory = BasicSetupService::saveCategory($request->all());
    	if ($saveCategory === true) {
    		return redirect()->route('category')->with('success', 'Save Category Successfull.');
    	}elseif($saveCategory == 'tooLarge'){
    		return redirect()->route('category')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
    	}else{
    		return redirect()->route('category')->with('error', $saveCategory);
    	}
    }

     public function categoryEditModal($categoryId = null){
        $category = BasicSetupService::getCategoryByid($categoryId);
        return view('backend.basicSetup.categoryEditModal',compact('category'));
    }

    public function saveEditCategory(Request $request){
    	$saveEditCategory = BasicSetupService::saveEditCategory($request->all());
        /*
    	if ($saveEditCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Update Category Successfull."]);
    	}elseif($saveEditCategory == false){
    		 return response()->json(['error'   => true, 'status' => "No Change Occour."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $saveEditCategory]);
    	}
        */
         if ($saveEditCategory === true) {
            return redirect()->route('category')->with('success', 'Category Update Successfull.');
        }else if ($saveEditCategory === 'tooLarge'){
            return redirect()->route('category')->with('error', 'Image Too Large. Size Must Be 1024 Kb Bellow.');
        }elseif($saveEditCategory == 'false'){
            return redirect()->route('category')->with('error', 'No Change');
        }else{
            return redirect()->route('category')->with('error', $saveEditCategory);
        }

    }
    


     public function inactiveCategory($id = null){
    	$saveEditCategory = BasicSetupService::inactiveCategory($id);
    	if ($saveEditCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Category Inactive Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $saveEditCategory]);
    	}
    }

     public function activeCategory($id = null){
    	$activeCategory = BasicSetupService::activeCategory($id);
    	if ($activeCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Category Active Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $activeCategory]);
    	}
    }

//=======@@ End Category Section  @@=======

//=======@@ Start Sub Category Section  @@=====
    public function subCategory(){
    	$categories    = BasicSetupService::getActiveCategory();
    	$subCategories = BasicSetupService::getSubCategory();
    	return view('backend.basicSetup.subCategory',compact('categories','subCategories'));
    }

    public function saveSubCategory(SubCategoryRequest $request){
    	$subCategory = BasicSetupService::saveSubCategory($request->all());
    	if ($subCategory === true) {
    		return redirect()->route('subCategory')->with('success', 'Save Sub-Category Successfull.');
    	}elseif($subCategory == 'tooLarge'){
    		return redirect()->route('subCategory')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
    	}else{
    		return redirect()->route('subCategory')->with('error', $subCategory);
    	}
    }

    public function subCategoryEditModal($subCategoryId){
        $categories    = BasicSetupService::getActiveCategory();
        $subCategorie  = BasicSetupService::getSubCategoryByid($subCategoryId);
        return view('backend.basicSetup.subCategoryEditModal',compact('categories','subCategorie'));
    }

    public function saveEditSubCategory(Request $request){
    	 $editSubCategory = BasicSetupService::saveEditSubCategory($request->all());
    	if ($editSubCategory === true) {
            return redirect()->route('subCategory')->with('success', 'Sub-Category Update Successfull.');
        }else if ($editSubCategory === 'tooLarge'){
            return redirect()->route('subCategory')->with('error', 'Image Too Large. Size Must Be 1024 Kb Bellow.');
        }elseif($editSubCategory == 'false'){
            return redirect()->route('subCategory')->with('error', 'No Change');
        }else{
            return redirect()->route('subCategory')->with('error', $editSubCategory);
        }
    }

     public function inactiveSubCategory($id = null){
    	$inactiveSubCategory = BasicSetupService::inactiveSubCategory($id);
    	if ($inactiveSubCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Sub-Category Inactive Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $inactiveSubCategory]);
    	}
    }

     public function activeSubCategory($id = null){
    	$activeSubCategory = BasicSetupService::activeSubCategory($id);
    	if ($activeSubCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Sub-Category Active Successfull.", window.location('category')]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $activeSubCategory]);
    	}
    }
//=======@@ End Sub Category Section  @@=====

//=======@@ Start Sub Cetagory Details Section  @@======

    public function subCategoryDetails(){
        $categories    = BasicSetupService::getActiveCategory();
        $subCategories    = BasicSetupService::getActiveSubCategory();
        $subCategoriesDetail = BasicSetupService::getSubCategoryDetails();
        return view('backend.basicSetup.subCategoryDetails',compact('categories','subCategories','subCategoriesDetail'));
    }

    public function getCategoryWiseSubCategory($categoryId = null){
        return ProductService::getCategoryWiseSubCategory($categoryId);
    }

     public function subCategoryDetailsSave(SubCategoryDetailsRequest $request){

        $subCategory = BasicSetupService::subCategoryDetailsSave($request->all());

        
        if ($subCategory === true) {
            return redirect()->route('subCategoryDetails')->with('success', 'Save Sub-Category Details Successfull.');
            }
        else{
            return redirect()->route('subCategoryDetails')->with('error', $subCategory);
        }
    }

    public function saveEditSubCategoryDetails(Request $request){
        //return $request->all();
        $editDetails = BasicSetupService::saveEditSubCategoryDetails($request->all());
        if ($editDetails === true) {
             return response()->json(['success' => true, 'status' => "Update Sub Category Details Successfull."]);
        }elseif($editDetails == false){
             return response()->json(['error'   => true, 'status' => "No Change Occour."]);
        }else{
             return response()->json(['error'   => true, 'status' => $editDetails]);
        }
    }

     public function inactiveSubCategoryDetails($id = null){
        $inactiveSubCategoryDetails = BasicSetupService::inactiveSubCategoryDetails($id);
        if ($inactiveSubCategoryDetails === true) {
             return response()->json(['success' => true, 'status' => "Sub Category Details Inactive Successfull."]);
        }else{
             return response()->json(['error'   => true, 'status' => $inactiveSubCategoryDetails]);
        }
    }

     public function activeSubCategoryDetails($id = null){
        $activeSubCategoryDetails = BasicSetupService::activeSubCategoryDetails($id);
        if ($activeSubCategoryDetails === true) {
             return response()->json(['success' => true, 'status' => "Sub Category Details Active Successfull."]);
        }else{
             return response()->json(['error'   => true, 'status' => $activeSubCategoryDetails]);
        }
    }


//=======@@ End Sub Category Details Section  @@=======

//=======@@ Start Brand Section  @@=====
    public function brand(){
    	$brands    = BasicSetupService::getBrand();
    	return view('backend.basicSetup.brand',compact('brands'));
    }

    public function saveBrand(BrandRequest $request){
    	$brand = BasicSetupService::saveBrand($request->all());
    	if ($brand === true) {
    		return redirect()->route('brand')->with('success', 'Save Brand Successful.');
    	}else{
    		return redirect()->route('brand')->with('error', $brand);
    	}
    }

    public function brandEditModal($brandId){
        $brand    = BasicSetupService::getBrandById($brandId);
        return view('backend.basicSetup.brandEditModal',compact('brand'));
    }

    public function saveEditBrand(Request $request){
        //return $request->featured_image;
    	$editBrand = BasicSetupService::saveEditBrand($request->all());
    	if ($editBrand === true) {
            return redirect()->route('brand')->with('success', 'Brand Update Successful.');
        }else if ($editBrand === 'tooLarge'){
            return redirect()->route('subCategory')->with('error', 'Image Too Large. Size Must Be 1024 Kb Bellow.');
        }else if($editBrand === false){
            return redirect()->route('brand')->with('success', 'Nothing Change.');
        }else{
            return redirect()->route('brand')->with('error', $editBrand);
        }
    }

     public function inactiveBrand($id = null){
    	$inactiveBrand = BasicSetupService::inactiveBrand($id);
    	if ($inactiveBrand === true) {
    		 return response()->json(['success' => true, 'status' => "Brand Inactive Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $inactiveBrand]);
    	}
    }

     public function activeBrand($id = null){
    	$activeBrand = BasicSetupService::activeBrand($id);
    	if ($activeBrand === true) {
    		 return response()->json(['success' => true, 'status' => "Brand Active Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $activeBrand]);
    	}
    }
//=======@@ End Brand Section  @@=======

//=======@@ Start Color Section  @@=====
    public function color(){
    	$colors    = BasicSetupService::getColor();
    	return view('backend.basicSetup.color',compact('colors'));
    }

    public function saveColor(ColorRequest $request){
    	$color = BasicSetupService::saveColor($request->all());
    	if ($color === true) {
    		return redirect()->route('color')->with('success', 'Save Color Successfull.');
    	}else{
    		return redirect()->route('color')->with('error', $color);
    	}
    }

    public function saveEditColor(Request $request){
        //return $request->all();
    	$editSubCategory = BasicSetupService::saveEditColor($request->all());
    	if ($editSubCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Update Color Successfull."]);
    	}elseif($editSubCategory == false){
    		 return response()->json(['error'   => true, 'status' => "No Change Occour."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $editSubCategory]);
    	}
    }

     public function inactiveColor($id = null){
    	$inactiveSubCategory = BasicSetupService::inactiveColor($id);
    	if ($inactiveSubCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Color Inactive Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $inactiveSubCategory]);
    	}
    }

     public function activeColor($id = null){
    	$activeSubCategory = BasicSetupService::activeColor($id);
    	if ($activeSubCategory === true) {
    		 return response()->json(['success' => true, 'status' => "Color Active Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $activeSubCategory]);
    	}
    }

//=======@@ End Color Section  @@=======

//=======@@ Start Size Section  @@=======//
    public function size(){
            $sizes = BasicSetupService::getSize();
            return view('backend.basicSetup.size',compact('sizes'));
        }

    public function saveSize(SizeRequest $request){
        $saveSize = BasicSetupService::saveSize($request->all());
        if ($saveSize === true) {
            return redirect()->route('size')->with('success', 'Save Size Successfull.');
        }
        else{
            return redirect()->route('size')->with('error', $saveCategory);
        }
    }

    public function saveEditSize(SizeRequest $request){
        $saveEditSize = BasicSetupService::saveEditSize($request->all());
        if ($saveEditSize === true) {
             return response()->json(['success' => true, 'status' => "Update Category Successfull."]);
        }elseif($saveEditSize == false){
             return response()->json(['error'   => true, 'status' => "No Change Occour."]);
        }else{
             return response()->json(['error'   => true, 'status' => $saveEditSize]);
        }
    }



     public function inactiveSize($id = null){
        $inactiveSize = BasicSetupService::inactiveSize($id);
        if ($inactiveSize === true) {
             return response()->json(['success' => true, 'status' => "Category Inactive Successfull."]);
        }else{
             return response()->json(['error'   => true, 'status' => $inactiveSize]);
        }
    }

    public function activeSize($id = null){
        $activeSize = BasicSetupService::activeSize($id);
        if ($activeSize === true) {
             return response()->json(['success' => true, 'status' => "Size Active Successfull."]);
        }else{
             return response()->json(['error'   => true, 'status' => $activeSize]);
        }
    }

//=======@@ End Size Section  @@=======//


//=======@@ Start Specification Section  @@=====
    public function specification(){
    	$specifications    = BasicSetupService::getSpecification();
    	return view('backend.basicSetup.specification',compact('specifications'));
    }

    public function saveSpecification(SpecificationRequest $request){
    	$specification = BasicSetupService::saveSpecification($request->all());
    	if ($specification === true) {
    		return redirect()->route('specification')->with('success', 'Save Specification Successfull.');
    	}else{
    		return redirect()->route('specification')->with('error', $specification);
    	}
    }

    public function saveEditSpecification(Request $request){
    	$editSpecification = BasicSetupService::saveEditSpecification($request->all());
    	if ($editSpecification === true) {
    		 return response()->json(['success' => true, 'status' => "Update Specification Successfull."]);
    	}elseif($editSpecification == false){
    		 return response()->json(['error'   => true, 'status' => "No Change Occour."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $editSpecification]);
    	}
    }

     public function inactiveSpecification($id = null){
    	$inactiveSpecification = BasicSetupService::inactiveSpecification($id);
    	if ($inactiveSpecification === true) {
    		 return response()->json(['success' => true, 'status' => "Specification Inactive Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $inactiveSpecification]);
    	}
    }

     public function activeSpecification($id = null){
    	$activeSpecification = BasicSetupService::activeSpecification($id);
    	if ($activeSpecification === true) {
    		 return response()->json(['success' => true, 'status' => "Specification Active Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $activeSpecification]);
    	}
    }
//======= @@ End Specification Section @@=======

//=======@@ Start Tag Section  @@=====

    public function tag(){
        $tags    = BasicSetupService::getTag();
        return view('backend.basicSetup.tag',compact('tags'));
        return view("backend.basicSetup.tag");
        
    }

    public function saveTag(TagRequest $request){
        $tag = BasicSetupService::saveTag($request->all());
        if ($tag === true) {
            return redirect()->route('tag')->with('success', 'Save Tag Successfull.');
        }else{
            return redirect()->route('tag')->with('error', $tag);
        }
    }
    public function saveEditTag(Request $request){
        $editTag = BasicSetupService::saveEditTag($request->all());
        if ($editTag === true) {
             return response()->json(['success' => true, 'status' => "Update Specification Successfull."]);
        }elseif($editTag == false){
             return response()->json(['error'   => true, 'status' => "No Change Occour."]);
        }else{
             return response()->json(['error'   => true, 'status' => $editTag]);
        }
    }
    public function inactiveTag($id = null){
        $inactiveTag = BasicSetupService::inactiveTag($id);
        if ($inactiveTag === true) {
             return response()->json(['success' => true, 'status' => "Tag Inactive Successfull."]);
        }else{
             return response()->json(['error'   => true, 'status' => $inactiveTag]);
        }
    }
    public function activeTag($id = null){
        $activeTag = BasicSetupService::activeTag($id);
        if ($activeTag === true) {
             return response()->json(['success' => true, 'status' => "Tag Active Successfull."]);
        }else{
             return response()->json(['error'   => true, 'status' => $activeTag]);
        }
    }

//=======@@ End Tag Section  @@=======


//=======@@ Start City Section  @@=====
    public function city(){
    	$cities    = BasicSetupService::getCity();
    	return view('backend.basicSetup.city',compact('cities'));
    }

    public function saveCity(CityRequest $request){
    	$city = BasicSetupService::saveCity($request->all());
    	if ($city === true) {
    		return redirect()->route('city')->with('success', 'Save City Successfull.');
    	}else{
    		return redirect()->route('city')->with('error', $city);
    	}
    }

    public function saveEditCity(Request $request){
        //return $request->all();
    	$editCity = BasicSetupService::saveEditCity($request->all());
       // return $editCity;
    	if ($editCity === true) {
    		 return response()->json(['success' => true, 'status' => "Update City Successfull."]);
    	}elseif($editCity == false){
    		 return response()->json(['error'   => true, 'status' => "No Change Occour."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $editCity]);
    	}
    }

     public function inactiveCity($id = null){
    	$inactiveCity = BasicSetupService::inactiveCity($id);
    	if ($inactiveCity === true) {
    		 return response()->json(['success' => true, 'status' => "City Inactive Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $inactiveCity]);
    	}
    }

     public function activeCity($id = null){
    	$activeCity = BasicSetupService::activeCity($id);
    	if ($activeCity === true) {
    		 return response()->json(['success' => true, 'status' => "City Active Successfull."]);
    	}else{
    		 return response()->json(['error'   => true, 'status' => $activeCity]);
    	}
    }
//=======@@ End City Section  @@=======

//=======@@ Start IncomeExpenseHead Section  @@=====
     public function incomeExpenseHead(){
        $incomeExpenseHead    = BasicSetupService::getIncomeExpenseHead();
        return view('backend.basicSetup.incomeExpenseHead',compact('incomeExpenseHead'));
    }

    public function saveIncomeExpenseHead(incomeExpenseHeadRequest $request){
        $city = BasicSetupService::saveIncomeExpenseHead($request->all());
        if ($city === true) {
            return redirect()->route('incomeExpenseHead')->with('success', 'Save City Successfull.');
        }else{
            return redirect()->route('incomeExpenseHead')->with('error', $city);
        }
    }

    public function saveEditIncomeExpenseHead(incomeExpenseHeadRequest $request){
        $editCity = BasicSetupService::saveEditIncomeExpenseHead($request->all());
        if ($editCity === true) {
             return response()->json(['success' => true, 'status' => "Update Income Expense Head Successfull."]);
        }elseif($editCity == false){
             return response()->json(['error'   => true, 'status' => "No Change Occour."]);
        }else{
             return response()->json(['error'   => true, 'status' => $editCity]);
        }
    }
//=======@@ End IncomeExpenseHead Section  @@=======


    


}
