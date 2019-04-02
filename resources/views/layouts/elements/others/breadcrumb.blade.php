<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></div>
    <!-- Displaying the breadcrumb -->
    @if (isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)>0)
        @foreach($breadcrumb as $kb=>$kv)
        <div class="breadcrumb-item">
            @if ($kv !="")
                <a href="{{$kv}}">{{$kb}}</a>
            @else 
                {{$kb}}
            @endif
        </div>
        @endforeach
    @endif
</div>