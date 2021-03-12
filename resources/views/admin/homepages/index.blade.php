@extends('layouts.admin')
@section('content')
@can('homepage_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.homepages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.homepage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.homepage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Homepage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.working_days') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.twitter') }}
                        </th>
                        <th>
                            {{ trans('cruds.homepage.fields.instagram') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homepages as $key => $homepage)
                        <tr data-entry-id="{{ $homepage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $homepage->id ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->name ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->short_description ?? '' }}
                            </td>
                            <td>
                                @if($homepage->logo)
                                    <a href="{{ $homepage->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $homepage->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $homepage->phone ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->email ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->address ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->working_days ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->twitter ?? '' }}
                            </td>
                            <td>
                                {{ $homepage->instagram ?? '' }}
                            </td>
                            <td>
                                @can('homepage_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.homepages.show', $homepage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('homepage_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.homepages.edit', $homepage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('homepage_delete')
                                    <form action="{{ route('admin.homepages.destroy', $homepage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('homepage_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.homepages.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Homepage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection