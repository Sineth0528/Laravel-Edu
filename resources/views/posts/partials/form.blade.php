<div><input type="text" name="title" value="{{ old('title') }}"></div>
@error('title')
<div>{{ $message }}</div>
@enderror

<div><textarea name="content" value="{{ old('content') }}"></textarea></div>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

