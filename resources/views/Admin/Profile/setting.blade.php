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
                    <div class="tab-content no-padding" id="user-tabs">
                        <div class="tab-pane fade show active" id="setting-user" role="tabpanel" aria-labelledby="Setting User Profile">
                            @include('Admin.Profile.form-setting')
                        </div>
                        <div class="tab-pane fade" id="setting-password" role="tabpanel" aria-labelledby="Setting User Password">
                            @include('Admin.Profile.form-password')
                        </div>
                    </div>
                </div>
            </div>
    @endcomponent
@endsection    
@section('scripts')
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
    <script src="{{asset('js/postAjax.js')}}"></script>
    <script src="{{asset('assets/Admin/Profile/setting.js')}}"></script>
    <script>
        //init setting
        initProfile();
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}" />
@endsection