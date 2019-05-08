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
                    <label for="site-title" class="form-control-label text-md-right col-md-3">
                        Name / ID
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
                    <div class="col-md-7">
                        <input type="text" id="name" name="name"  
                            class="form-control {{ $errors->has('id') ? ' is-invalid' : '' }}" 
                            required  tabindex=1/>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}</strong>
                            @else
                                {{__('Please fill in application / menu name')}}
                            @endif
                        </div>
                    </div>
                    <div class="col-md-1">
                        <input type="text" id="id" name="id"  
                            class="form-control {{ $errors->has('id') ? ' is-invalid' : '' }}" readonly/>
                        <div class="invalid-feedback">
                            @if ($errors->has('id'))
                                {{ $errors->first('id') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="parent" class="form-control-label text-md-right col-md-3">
                        Menu Parent
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
                    <div class="col-md-8">
                        <input type="text" id="parent" name="parent"  
                            class="form-control {{ $errors->has('parent') ? ' is-invalid' : '' }}" 
                            required  tabindex=1/>
                        <div class="invalid-feedback">
                            @if ($errors->has('parent'))
                                {{ $errors->first('parent') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="parent" class="form-control-label text-md-right col-md-3">
                        Node Name
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
                    <div class="col-md-8">
                        <input type="text" id="parent" name="parent"  
                            class="form-control {{ $errors->has('parent') ? ' is-invalid' : '' }}" 
                            required  tabindex=1/>
                        <div class="invalid-feedback">
                            @if ($errors->has('parent'))
                                {{ $errors->first('parent') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
            @endcomponent
        </form>

    @endcomponent
@endsection