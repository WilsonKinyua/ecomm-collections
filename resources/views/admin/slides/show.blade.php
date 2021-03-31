@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.slide.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.id') }}
                        </th>
                        <td>
                            {{ $slide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.product_category') }}
                        </th>
                        <td>
                            {{ $slide->product_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.photo') }}
                        </th>
                        <td>
                            @if($slide->photo)
                                <a href="{{ $slide->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $slide->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection