<h1>Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action={{ route('posts.store') }} method="POST">   
   
    @csrf
    <div>
        Title <input type="text" name="title" value="{{ old('title') }}">
    </div>
    <div>
        Body: <textarea name="body">{{ old('body') }}</textarea>
    </div>
    <div>
        Author: <input type="text" name="author_name" value="{{ old('author_name') }}">
    </div>
    

    <input type="submit">

</form>