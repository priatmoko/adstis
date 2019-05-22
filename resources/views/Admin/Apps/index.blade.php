@extends('layouts.master-admin')
@section('component')
    @component('layouts.elements.others.with-header', 
            ['title'=>'Application Management',
            'subtitle'=>'Application List',
            'desc'=>'Page for doing some operation like register, update, delete Application, manage menu',
            'breadcrumb'=> (isset($breadcrumb)?$breadcrumb:'')])
        @component('layouts.elements.others.card',
            ['title'=>'Application List'])   
            @slot('header_action')
                <a class="badge badge-primary" href="{{route('apps.create')}}">&nbsp;<i class="fa fa-plus"></i> Add&nbsp;</a>
            @endslot 

            <table class="table table-striped" id="sortable-table">
                <thead>
                    <tr>
                        <th class="text-center">
                            Icon
                        </th>
                        <th>Name</th>
                        <th>URL Link</th>
                        <th>Sorter</th>
                        <th>Desc</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
                    </tr>
                    <tr>
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
                    </tr>
                </tbody>
            </table>

            @slot('footer')@endslot
        @endcomponent
    @endcomponent
@endsection
@section('scripts')
    <script>
        
    </script>
@endsection