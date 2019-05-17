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
                    <label for="name" class="form-control-label text-md-right col-md-3">
                        Name / ID
                        <a href="javascript:;"
                            data-html="true" 
                            data-toggle="popover" 
                            data-trigger="focus" 
                            data-content="
                                <b>Name</b>, Write the menu or application name here. It will represent Application <br/> 
                                <b>Database info</b> : Apps.name">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="name" name="name"  
                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                            required  tabindex='1'/>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}</strong>
                            @else
                                {{__('Please fill in application / menu name')}}
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
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
                                <b>Menu Parent</b>, Grouping the menu <br/> 
                                <b>Database info</b> : Apps.parent">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="parent" name="parent"  
                            class="form-control {{ $errors->has('parent') ? ' is-invalid' : '' }}" 
                            tabindex='2'/>
                        <div class="invalid-feedback">
                            @if ($errors->has('parent'))
                                {{ $errors->first('parent') }}</strong>
                            @else
                                {{__('Please fill in menu parent')}}
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="node_name" class="form-control-label text-md-right col-md-3">
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
                        <input type="text" id="node_name" name="node_name"  
                            class="form-control {{ $errors->has('node_name') ? ' is-invalid' : '' }}" 
                            tabindex='3'/>
                        <div class="invalid-feedback">
                            @if ($errors->has('node_name'))
                                {{ $errors->first('node_name') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="url" class="form-control-label text-md-right col-md-3">
                        Url / Link Application
                        <a href="javascript:;"
                            data-html="true" 
                            data-toggle="popover" 
                            data-trigger="focus" 
                            data-content="
                                <b>Url / Link Application</b>, Prefix URL Link direction to application <br/> 
                                <b>Database info</b> : Apps.url">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="url" name="url"  
                            class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" 
                            required  tabindex='4'/>
                        <div class="invalid-feedback">
                            @if ($errors->has('url'))
                                {{ $errors->first('url') }}</strong>
                            @else
                                {{__('Please fill in Url / Link Application')}}
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="color" class="form-control-label text-md-right col-md-3">
                        Color
                        <a href="javascript:;"
                            data-html="true" 
                            data-toggle="popover" 
                            data-trigger="focus" 
                            data-content="
                                <b>Color</b>, Color represent application <br/> 
                                <b>Database info</b> : Apps.color">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="color" name="color"  
                            class="form-control {{ $errors->has('color') ? ' is-invalid' : '' }}" 
                            tabindex='5'/>
                        <div class="invalid-feedback">
                            @if ($errors->has('color'))
                                {{ $errors->first('color') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="icon" class="form-control-label text-md-right col-md-3">
                        Icon
                        <a href="javascript:;"
                            data-html="true" 
                            data-toggle="popover" 
                            data-trigger="focus" 
                            data-content="
                                <b>Icon</b>, Icon represent application <br/> 
                                <b>Database info</b> : Apps.icon">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="icon" name="icon"  
                            class="form-control {{ $errors->has('icon') ? ' is-invalid' : '' }}" 
                            tabindex='6'/>
                        <div class="invalid-feedback">
                            @if ($errors->has('icon'))
                                {{ $errors->first('icon') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
                <div class="form-group row align-items-center">
                    <label for="desc" class="form-control-label text-md-right col-md-3">
                        Description
                        <a href="javascript:;"
                            data-html="true" 
                            data-toggle="popover" 
                            data-trigger="focus" 
                            data-content="
                                <b>Description</b>, Describe the usage of application or everything relevant <br/> 
                                <b>Database info</b> : Users.username">
                            <i class="far fa-question-circle"></i>
                            </a>
                    </label>
                    <div class="col-md-8">
                        <textarea id="desc" name="desc"  
                            class="form-control {{ $errors->has('desc') ? ' is-invalid' : '' }}" 
                            tabindex='7'></textarea>
                        <div class="invalid-feedback">
                            @if ($errors->has('desc'))
                                {{ $errors->first('desc') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>    
                @slot('footer')
                    <div class="float-md-right">
                        <button type="submit" class="btn btn-icon icon-right btn-info"  tabindex='8'> <i class="fa fa-save"></i> &nbsp; Save</button>
                    </div>
                @endslot
            @endcomponent
        </form>

    @endcomponent
@endsection
@section('scripts')
    <script src="{{asset('js/postAjax.js')}}"></script>
    <script src="{{asset('assets/Admin/Apps/create.js')}}"></script>
    <script>
        $(document).ready(function(){
            init();
        });
    </script>
@endsection