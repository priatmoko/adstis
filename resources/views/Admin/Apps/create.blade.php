@extends('layouts.master-admin')
@section('component')
    @component('layouts.elements.others.with-header', 
        ['title'=>'Application Management',
        'subtitle'=>'Create / Update Menu',
        'desc'=>'Page for registering / updating application information',
        'breadcrumb'=> (isset($breadcrumb)?$breadcrumb:'')])
        <form id="app-form" method='POST' novalidate action="{{route('apps.ajax.store')}}">
            @csrf
            @component('layouts.elements.others.card',
                ['title'=>'Application / Menu Configuration'])
                <p class="text-muted">General settings such as name, photo profile, etc</p>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-md-3">
                        ID / Username
                        <a href="javascript:;"
                            data-html="true" 
                            data-toggle="popover" 
                            data-trigger="focus" 
                            data-content="
                                <b>Username</b>, it is your username. You can sign in using this username beside email <br/> 
                                <b>Database info</b> : Users.username">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="id" name="id"  
                            class="form-control {{ $errors->has('id') ? ' is-invalid' : '' }} text-center" 
                            required value="{{\Auth::user()->id}}"  tabindex=1 readonly/>
                        <div class="invalid-feedback">
                            @if ($errors->has('id'))
                                {{ $errors->first('id') }}</strong>
                            @else
                                {{__('Please fill in your username')}}
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="username" name="username"  
                            class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" 
                            required value="{{\Auth::user()->username}}"  tabindex=2 readonly/>
                        <div class="invalid-feedback">
                            @if ($errors->has('username'))
                                {{ $errors->first('username') }}</strong>
                            @else
                                {{__('Please fill in your username')}}
                            @endif
                        </div>
                    </div>
                </div>    
            @endcomponent
        </form>

    @endcomponent
@endsection