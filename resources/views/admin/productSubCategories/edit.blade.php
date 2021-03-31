@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productSubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-sub-categories.update", [$productSubCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="main_category_id">{{ trans('cruds.productSubCategory.fields.main_category') }}</label>
                <select class="form-control select2 {{ $errors->has('main_category') ? 'is-invalid' : '' }}" name="main_category_id" id="main_category_id" required>
                    @foreach($main_categories as $id => $main_category)
                        <option value="{{ $id }}" {{ (old('main_category_id') ? old('main_category_id') : $productSubCategory->main_category->id ?? '') == $id ? 'selected' : '' }}>{{ $main_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('main_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('main_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productSubCategory.fields.main_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productSubCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $productSubCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productSubCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection