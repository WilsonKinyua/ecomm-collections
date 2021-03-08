@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blogPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPage.fields.id') }}
                        </th>
                        <td>
                            {{ $blogPage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPage.fields.title') }}
                        </th>
                        <td>
                            {{ $blogPage->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPage.fields.caption') }}
                        </th>
                        <td>
                            {{ $blogPage->caption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPage.fields.description') }}
                        </th>
                        <td>
                            {!! $blogPage->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPage.fields.photo') }}
                        </th>
                        <td>
                            @if($blogPage->photo)
                                <a href="{{ $blogPage->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $blogPage->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection