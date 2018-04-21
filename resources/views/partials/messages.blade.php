@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
@elseif (session()->get('success'))
    <div class="alert alert-success">
        @if(is_array(json_decode(session()->get('success'), true)))
            {!! implode('', session()->get('success')->all(':message<br/>')) !!}
        @else
            {!! session()->get('success') !!}
        @endif
    </div>
@elseif (session()->get('warning'))
    <div class="alert alert-warning">
        @if(is_array(json_decode(session()->get('warning'), true)))
            {!! implode('', session()->get('warning')->all(':message<br/>')) !!}
        @else
            {!! session()->get('warning') !!}
        @endif
    </div>
@elseif (session()->get('info'))
    <div class="alert alert-info">
        @if(is_array(json_decode(session()->get('info'), true)))
            {!! implode('', session()->get('info')->all(':message<br/>')) !!}
        @else
            {!! session()->get('info') !!}
        @endif
    </div>
@elseif (session()->get('danger'))
    <div class="alert alert-danger">
        @if(is_array(json_decode(session()->get('danger'), true)))
            {!! implode('', session()->get('danger')->all(':message<br/>')) !!}
        @else
            {!! session()->get('danger') !!}
        @endif
    </div>
@elseif (session()->get('message'))
    <div class="alert alert-info">
        @if(is_array(json_decode(session()->get('message'), true)))
            {!! implode('', session()->get('message')->all(':message<br/>')) !!}
        @else
            {!! session()->get('message') !!}
        @endif
    </div>
@endif