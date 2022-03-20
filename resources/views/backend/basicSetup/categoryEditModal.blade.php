@if(isset($category))
<div class="row">
	<div class="col-md-8">
		{!!Form::open(array('route'=>'saveEditCategory.post','class'=>'form-horizontal form-wrp','files'=>true))!!}
			<div class="form-group">
				<label class="col-md-4"> Category Name English </label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="category_name_lang1" value="{{$category->category_name_lang1}}">
					<input type="text" class="form-control" name="category_name_id" style="display: none;" value="{{$category->id}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> Category Name Bangla </label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="category_name_lang2" value="{{$category->category_name_lang2}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> Featured Image </label>
				<div class="col-md-8">
					<input type="file" class="" name="featured_image">
					<label>Image Must be 848 X 211 pixel</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> Icon Image </label>
				<div class="col-md-8">
					<input type="file" class="" name="icon_image">
					<label>Image Must be 20 X 20 pixel</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> Is Selected </label>
				<div class="col-md-8">
					<select name="is_selected" class="form-control">
						<option value="0" @if($category->is_selected == 0){{'Selected'}} @endif>Not Selected</option>
						<option value="1" @if($category->is_selected == 1){{'Selected'}} @endif>Selected</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4"> View Order </label>
				<div class="col-md-8">
					<input type="number" class="form-control" name="view_order" value="{{$category->view_order}}">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-8">
					<input type="submit" class="btn btn-success btn-md" value="Save">
				</div>
			</div>
		{!!Form::close()!!}
	</div>
	<div class="col-md-4">
		<div class="row">
			{!! HTML::image("public/images/category/featured_image/$category->featured_image", "Logo",array('class' => 'img img-thumbnail','title'=>'Featured Image','style'=>'width:100px;height:100px;padding:0px')) !!}<br>
		</div>
		<div class="row" style="margin-top:10px">
			{!! HTML::image("public/images/category/icon/$category->icon", "Logo",array('class' => 'img img-thumbnail','title'=>'icon','style'=>'width:100px;height:100px;padding:0px')) !!}
		</div>
	</div>
</div>
@endif
