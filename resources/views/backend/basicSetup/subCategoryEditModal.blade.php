@if(isset($subCategorie))
<div class="row">
	<div class="col-md-8">
		{!!Form::open(array('route'=>'saveEditSubCategory.post','class'=>'form-horizontal form-wrp','files'=>true))!!}
			<div class="form-group">
				<label class="col-md-4"> Select Category </label>
				<div class="col-md-8">
					<select class="form-control" name="category_name_id">
						@if(isset($categories))
								<option disabled>Select Category</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}" @if($category->id == $subCategorie->category_id) selected @endif >{{$category->category_name_lang1}}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> Sub Category English </label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="sub_category_name_lang1" value="{{$subCategorie->sub_category_name_lang1}}">
					<input type="text" style="display: none;" class="form-control" name="sub_category_name_id" value="{{$subCategorie->id}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> Sub Category Name Bangla </label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="sub_category_name_lang2" value="{{$subCategorie->sub_category_name_lang2}}">
				</div>
			</div>
			<div class="form-group" style="">
				<label class="col-md-4"> View Order </label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="view_order" value="{{$subCategorie->view_order}}">
				</div>
			</div>
			<div class="form-group" style="display: none">
				<label class="col-md-4"> Featured Image </label>
				<div class="col-md-8">
					<input type="file" class="" name="icon_image">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-4 col-md-8">
					<input type="submit" class="btn btn-success btn-md" value="Save">
				</div>
			</div>
		{!!Form::close()!!}
	</div>
	<div class="col-md-4">
		{!! HTML::image("public/images/subCategory/$subCategorie->featured_image", "Logo",array('class' => 'img img-thumbnail','style'=>'display:none;width:100%;padding:0px')) !!}
	</div>
</div>
@endif
