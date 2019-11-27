@extends('layouts.admin')
@section('content')
@can('penjualan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.penjualans.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.penjualan.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Penjualan', 'route' => 'admin.penjualans.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.penjualan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Penjualan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.penjualan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.penjualan.fields.tengkulak') }}
                        </th>
                        <th>
                            {{ trans('cruds.penjualan.fields.tanggal_pengiriman') }}
                        </th>
                        <th>
                            {{ trans('cruds.penjualan.fields.jumlah_permintaan') }}
                        </th>
                        <th>
                            {{ trans('cruds.penjualan.fields.harga_penjualan') }}
                        </th>
                        <th>
                            {{ trans('cruds.penjualan.fields.pajak_penjualan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualans as $key => $penjualan)
                        <tr data-entry-id="{{ $penjualan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $penjualan->id ?? '' }}
                            </td>
                            <td>
                                {{ $penjualan->tengkulak->nama_tengkulak ?? '' }}
                            </td>
                            <td>
                                {{ $penjualan->tanggal_pengiriman ?? '' }}
                            </td>
                            <td>
                                {{ $penjualan->jumlah_permintaan ?? '' }}
                            </td>
                            <td>
                                {{ $penjualan->harga_penjualan ?? '' }}
                            </td>
                            <td>
                                {{ $penjualan->pajak_penjualan ?? '' }}
                            </td>
                            <td>

                                @can('penjualan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.penjualans.edit', $penjualan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('penjualan_delete')
                                    <form action="{{ route('admin.penjualans.destroy', $penjualan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('penjualan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.penjualans.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  $('.datatable-Penjualan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection