@extends('layouts.master-admin')
@section('component')
    @component('layouts.elements.others.with-header', 
            ['title'=>'Application Management',
            'subtitle'=>'Application List',
            'desc'=>'Page for doing some operation like register, update, delete Application, manage menu',
            'breadcrumb'=> (isset($breadcrumb)?$breadcrumb:'')])
        @component('layouts.elements.others.card',
            ['title'=>'Application List'])   
            <p class="text-muted">Write the keywords bellow and enter / submit to display list of registered application</p>
            @slot('header_action')
                <a class="badge badge-primary" href="{{route('apps.create')}}">&nbsp;<i class="fa fa-plus"></i> Add&nbsp;</a>
            @endslot 
            <form id="app-index" method='POST' novalidate action="{{route('apps.ajax.getList')}}">
                @csrf
                <div class="form-group row align-items-center">
                    <label for="name" class="form-control-label col-md-2">
                        Name 
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="name" name="name" class="form-control" />
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="name" class="form-control-label col-md-2">
                        &nbsp; 
                    </label>
                    <div class="col-md-3">
                        <button class="btn btn-primary">Display</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-apps">
                    <thead>
                        <tr>
                            <th class="text-center" data-field="icon">
                                Icon
                            </th>
                            <th data-field="name">Name</th>
                            <th data-field="url">URL Link</th>
                            <th data-field="sorter">Sorter</th>
                            <th data-field="desc">Desc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                Empty
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <!-- <tr>
                            <td class="text-center">
                                <div class="badge badge-info"><i class="fas fa-th"></i></div>
                            </td>
                            <td>Redesign homepage</td>
                            <td class="align-middle">
                                Apps/test
                            </td>
                            <td>
                                1
                            </td>
                            <td>2018-04-10</td>
                        </tr> -->
                    </tbody>
                </table>

                    </div>

            @slot('footer')@endslot
        @endcomponent
    @endcomponent
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('scripts')

<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/postAjax.js')}}"></script>
<script src="{{asset('assets/Admin/Apps/index.js')}}"></script>
<script>
    $(document).ready(function(){
        init();
    });
    
</script>
@endsection