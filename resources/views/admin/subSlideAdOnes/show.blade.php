@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subSlideAdOne.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-slide-ad-ones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subSlideAdOne.fields.id') }}
                        </th>
                        <td>
                            {{ $subSlideAdOne->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subSlideAdOne.fields.product_category') }}
                        </th>
                        <td>
                            {{ $subSlideAdOne->product_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subSlideAdOne.fields.photo') }}
                        </th>
                        <td>
                            @if($subSlideAdOne->photo)
                                <a href="{{ $subSlideAdOne->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $subSlideAdOne->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-slide-ad-ones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection