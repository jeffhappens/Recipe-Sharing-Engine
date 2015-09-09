@extends('layouts.master')
@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-plus-circle"></i> Share a Recipe</h2>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
					{!! Form::open(['role' => 'form', 'files' => true]) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="form-group">
							<label for="recipe_title">Recipe Title</label>
							<input type="text" name="recipe_title" class="form-control" placeholder="My Delicious Recipe" />
						</div>
						<div class="form-group">
							<label for="recipe_description">Recipe Description</label>
							<textarea name="recipe_description" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="recipe_categoryid">Recipe Category</label>
							<select name="recipe_categoryid" class="form-control">
								@foreach($categories as $category)
								<option value="{{ $category->id }}">
									{{ $category->category_title }}
								</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="recipe_image">Recipe Image</label>
							<input type="file" name="recipe_image" class="form-control" />
						</div>


						<div class="form-group">
							<label for="recipe_ingredients">Recipe Ingredients</label>
							<textarea name="recipe_ingredients" class="form-control editor">
							</textarea>
						</div>

						<div class="form-group">
							<label for="recipe_instruction">Recipe Instructions</label>
							<textarea name="recipe_instructions" class="form-control editorOrdered">
							</textarea>
						</div>
						<div class="form-group">
							<label>
								<input type="checkbox" name="enable_comments[]" /> Allow comments for this recipe
							</label>
						</div>
						<div class="form-group">
							<button type="submit" name="submit_share" class="btn btn-default">Share Recipe</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</section>
@stop