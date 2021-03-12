@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.homepage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.homepages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.id') }}
                        </th>
                        <td>
                            {{ $homepage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.name') }}
                        </th>
                        <td>
                            {{ $homepage->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.short_description') }}
                        </th>
                        <td>
                            {{ $homepage->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.logo') }}
                        </th>
                        <td>
                            @if($homepage->logo)
                                <a href="{{ $homepage->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $homepage->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.phone') }}
                        </th>
                        <td>
                            {{ $homepage->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.email') }}
                        </th>
                        <td>
                            {{ $homepage->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.address') }}
                        </th>
                        <td>
                            {{ $homepage->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.working_days') }}
                        </th>
                        <td>
                            {{ $homepage->working_days }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.facebook') }}
                        </th>
                        <td>
                            {{ $homepage->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.twitter') }}
                        </th>
                        <td>
                            {{ $homepage->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.instagram') }}
                        </th>
                        <td>
                            {{ $homepage->instagram }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.homepages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection