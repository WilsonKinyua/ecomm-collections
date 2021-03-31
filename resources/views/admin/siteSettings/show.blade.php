@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.siteSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $siteSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.title') }}
                        </th>
                        <td>
                            {{ $siteSetting->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.caption') }}
                        </th>
                        <td>
                            {{ $siteSetting->caption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.logo') }}
                        </th>
                        <td>
                            @if($siteSetting->logo)
                                <a href="{{ $siteSetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $siteSetting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.open_hours') }}
                        </th>
                        <td>
                            {{ $siteSetting->open_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.support_phone_1') }}
                        </th>
                        <td>
                            {{ $siteSetting->support_phone_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.support_phone_2') }}
                        </th>
                        <td>
                            {{ $siteSetting->support_phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.location') }}
                        </th>
                        <td>
                            {{ $siteSetting->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $siteSetting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $siteSetting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.email') }}
                        </th>
                        <td>
                            {{ $siteSetting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.whatsapp') }}
                        </th>
                        <td>
                            {{ $siteSetting->whatsapp }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection