<form id="user-profile" method='POST' novalidate action="{{url('profile/store')}}">
    @component('layouts.elements.others.card',
        ['title'=>'User Profile Setting'])
            @csrf
            <p class="text-muted">General settings such as name, photo profile, etc</p>
            <div class="form-group row align-items-center">
                <label for="name" class="form-control-label col-md-3">
                    Name
                    <a href="javascript:;"
                        data-html="true" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        data-content="
                            <b>Name</b>, it is your name. <br/> 
                            <b>Database info</b> : Users.name">
                        <i class="far fa-question-circle"></i>
                        </a>
                </label>
                <div class="col-md-9">
                    <input type="text" id="name" name="name" 
                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                        required 
                        value="{{\Auth::user()->name}}" tabindex=1>
                    <div class="invalid-feedback">
                        @if ($errors->has('email'))
                            {{ $errors->first('name') }}</strong>
                        @else
                            {{__('Please fill in your name')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="site-title" class="form-control-label col-md-3">
                    Username / ID
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
                <div class="col-md-3">
                    <input type="text" id="id" name="id"  
                        class="form-control {{ $errors->has('id') ? ' is-invalid' : '' }} text-center" 
                        required value="{{\Auth::user()->id}}"  tabindex=2 readonly/>
                    <div class="invalid-feedback">
                        @if ($errors->has('id'))
                            {{ $errors->first('id') }}</strong>
                        @else
                            {{__('Please fill in your username')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="site-title" class="form-control-label col-md-3">
                    Email Address
                    <a href="javascript:;"
                        data-html="true" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        data-content="
                            <b>Email</b>, it is your Email Address. You can sign in using email beside username <br/> 
                            <b>Database info</b> : Users.email">
                        <i class="far fa-question-circle"></i>
                        </a>
                </label>
                <div class="col-md-9">
                    <input type="email" id="email" name="email" 
                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required 
                        value="{{\Auth::user()->email}}" tabindex=3/>
                    <div class="invalid-feedback">
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}</strong>
                        @else
                            {{__('Please fill in your email address')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="site-title" class="form-control-label col-md-3">
                    Avatar
                    <a href="javascript:;"
                        data-html="true" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        data-content="
                            <b>Avatar</b>, it is your photo profile. <br/> 
                            <b>Database info</b> : Users.avatar">
                        <i class="far fa-question-circle"></i>
                        </a>
                </label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="avatar" tabindex=4>
                        <label class="custom-file-label">Choose File</label>
                    </div>
                </div>
            </div>
            @slot('footer')
                <div class="float-md-right">
                    <button type="submit" class="btn btn-icon icon-right btn-outline-primary"  tabindex=5> <i class="fa fa-save"></i> &nbsp; Save</button>
                </div>
            @endslot
    @endcomponent
</form>