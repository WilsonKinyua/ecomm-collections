@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subSlideAdTwo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-slide-ad-twos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subSlideAdTwo.fields.id') }}
                        </th>
                        <td>
                            {{ $subSlideAdTwo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subSlideAdTwo.fields.product_category') }}
                        </th>
                        <td>
                            {{ $subSlideAdTwo->product_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subSlideAdTwo.fields.photo') }}
                        </th>
                        <td>
                            @if($subSlideAdTwo->photo)
                                <a href="{{ $subSlideAdTwo->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $subSlideAdTwo->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-slide-ad-twos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection