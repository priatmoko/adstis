<div class="section-header">
    <h1>
        @if(isset($title))
            {{$title}} 
        @else
            Add Title 
            <small>@ component('layouts.elements.others.with-header', ['title'=>'<b>Your title</b>'])</small>
        @endif
    </h1>
    @include('layouts.elements.others.breadcrumb')
</div>
<div class="section-body">
    @if (isset($subtitle))
        <h2 class="section-title">{{$subtitle}}</h2>
        <p class="section-lead">
            @if (isset($desc))
                {{$desc}}
            @endif
        </p>
    @endif

    {{$slot}}
</div>