<div class="card">
    <div class="card-header">
        <h4>
            @if(isset($title))
                {{$title}}
            @else
                Add Title 
                <small>@ component('layouts.elements.others.card', ['title'=>'<b>Your Title</b>'])</small>
            @endif
        </h4>
        @if (isset($header_action))
        <div class="card-header-action">
            {{$header_action}}
        </div>
        @endif
    </div>
    <div class="card-body @if(isset($body_class)) {{$body_class}} @endif">
        {{$slot}}
    </div>
    @if (isset($footer))
    <div class="card-footer">
        {{$footer}}
    </div>
    @endif
    
</div>