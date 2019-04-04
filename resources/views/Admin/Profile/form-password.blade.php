<form id="form-user-pwd" method='POST' novalidate action="{{url('profile/password')}}">
    @component('layouts.elements.others.card',
        ['title'=>'User Profile Change Password'])
            @csrf
            <p class="text-muted">Update your current password to the safer new password.</p>
            <div class="form-group row align-items-center">
                <label for="password" class="form-control-label col-md-3">
                    New Password
                    <a href="javascript:;"
                        data-html="true" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        data-content="
                            <b>New Password</b>, write your new password here <br/> 
                            <b>Database info</b> : Users.password">
                        <i class="far fa-question-circle"></i>
                        </a>
                </label>
                <div class="col-md-9">
                    <input type="password" id="password" name="password" class="form-control" required tabindex=1>
                    <div class="invalid-feedback">
                        @if ($errors->has('password'))
                            {{ $errors->first('password') }}</strong>
                        @else
                            {{__('Please fill in your New Password')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="password_confirmation" class="form-control-label col-md-3">
                    Password Conf.
                    <a href="javascript:;"
                        data-html="true" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        data-content="<b>Password Confiormation</b>, confirm your new password <br/>"> 
                        <i class="far fa-question-circle"></i>
                    </a>
                </label>
                <div class="col-md-9">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required tabindex=1>
                    <div class="invalid-feedback">
                        @if ($errors->has('password_confirmation'))
                            {{ $errors->first('password_confirmation') }}</strong>
                        @else
                            {{__('Please fill in your Password Confirmation')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="password_current" class="form-control-label col-md-3">
                    Current Password
                    <a href="javascript:;"
                        data-html="true" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        data-content="<b>Password Confiormation</b>, confirm your new password <br/>"> 
                        <i class="far fa-question-circle"></i>
                    </a>
                </label>
                <div class="col-md-9">
                    <input type="password" id="password_current" name="password_current" class="form-control" required tabindex=1>
                    <div class="invalid-feedback">
                        @if ($errors->has('password_current'))
                            {{ $errors->first('password_current') }}</strong>
                        @else
                            {{__('Please fill in your Current Password')}}
                        @endif
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