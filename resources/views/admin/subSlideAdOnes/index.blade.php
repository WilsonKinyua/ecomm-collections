@extends('layouts.admin')
@section('content')
@can('sub_slide_ad_one_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sub-slide-ad-ones.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.subSlideAdOne.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.subSlideAdOne.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SubSlideAdOne">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.subSlideAdOne.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.subSlideAdOne.fields.product_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.subSlideAdOne.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subSlideAdOnes as $key => $subSlideAdOne)
                        <tr data-entry-id="{{ $subSlideAdOne->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subSlideAdOne->id ?? '' }}
                            </td>
                            <td>
                                {{ $subSlideAdOne->product_category->name ?? '' }}
                            </td>
                            <td>
                                @if($subSlideAdOne->photo)
                                    <a href="{{ $subSlideAdOne->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $subSlideAdOne->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('sub_slide_ad_one_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sub-slide-ad-ones.show', $subSlideAdOne->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sub_slide_ad_one_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sub-slide-ad-ones.edit', $subSlideAdOne->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sub_slide_ad_one_delete')
                                    <form action="{{ route('admin.sub-slide-ad-ones.destroy', $subSlideAdOne->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sub_slide_ad_one_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sub-slide-ad-ones.massDestroy') }}",
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
  let table = $('.datatable-SubSlideAdOne:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection