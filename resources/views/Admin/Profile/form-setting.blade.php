@component('layouts.elements.others.card',
    ['title'=>'User Profile Setting'])
    <p class="text-muted">General settings such as name, photo profile, etc</p>
    <div class="form-group row align-items-center">
        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Name</label>
        <div class="col-sm-6 col-md-9">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Username</label>
        <div class="col-sm-6 col-md-9">
            <input type="text" class="form-control" id="username" name="username">
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email</label>
        <div class="col-sm-6 col-md-9">
            <input type="email" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Avatar</label>
        <div class="col-sm-6 col-md-9">
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input" id="avatar">
                <label class="custom-file-label">Choose File</label>
            </div>
        </div>
    </div>
    @slot('footer')
        <div class="float-md-right">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> &nbsp; Save</button>
        </div>
    @endslot
@endcomponent