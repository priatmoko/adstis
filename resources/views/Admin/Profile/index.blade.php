@extends('layouts.master-admin')
@section('component')
    @component('layouts.elements.others.with-header', 
        ['title'=>'User Profile',
        'subtitle'=>'User Profile',
        'desc'=>'Page for managing user profile',
        'breadcrumb'=> (isset($breadcrumb)?$breadcrumb:'')])

        @component('layouts.elements.others.card',
            ['title'=>'User Detail'])
            percobaan
            @slot('footer')
                <button type="submit" class="btn btn-primary">Save</button>
            @endslot
        @endcomponent

    @endcomponent
@endsection