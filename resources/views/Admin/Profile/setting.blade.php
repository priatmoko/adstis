@extends('layouts.master-admin')
@section('component')
    @component('layouts.elements.others.with-header', 
        ['title'=>'Setting User Profile',
        'subtitle'=>'Setting User Profile',
        'desc'=>'You can adjust all user setting here',
        'breadcrumb'=> (isset($breadcrumb)?$breadcrumb:'')])
        
            <div class="row">
                <div class="col-md-4">
                    @include('Admin.Profile.menu-setting')
                </div>
                <div class="col-md-8">
                    @include('Admin.Profile.form-setting')
                </div>
            </div>
    @endcomponent
@endsection    
@section('scripts')
    <script src="{{asset('js/bootValidate.js')}}"></script>
    <script src="{{asset('assets/Admin/Profile/form-setting.js')}}"></script>
    <script>
        //init setting
        fsettingInit();
    </script>
@endsection