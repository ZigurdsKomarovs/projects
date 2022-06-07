<h1>Edit post</h1>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action={{ route('posts.update', ['post' => $post->id]) }} method="POST">   
   
    @csrf
    <input type="hidden" name="id" value="{{ $post->id}}"
    <div>
        Title <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        Body: <textarea name="body">{{ $post->body }}</textarea>
    </div>
    <div>
        Author: <input type="text" name="author_name" value="{{ $post->author_name }}">
    </div>
    

    <input type="submit">

</form>