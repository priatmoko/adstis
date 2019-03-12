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
    </div>
    <div class="card-body">
        {{$slot}}
    </div>
    @if (isset($footer))
    <div class="card-footer">
        {{$footer}}
    </div>
    @endif
    
</div>