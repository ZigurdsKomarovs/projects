this is show
<br>
{{ $post->title }}
<br>
{{ $post->body }}
<br>
{{ $post->author_name }}

<h2>Comments</h2>

 <ul>
     @foreach ($post->comments as $comment)
        <li>{{ $comment->author_name . ': ' . $comment->body}}</li>
    @endforeach
 </ul>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <div>
        Author : <input type="text" name="author_name" value="{{ old('author_name') }}">
    </div>
    <div>
        Body : <input type="text" name="body" value="{{ old('body') }}">
    </div>
    <input type="hidden" name="commentable_id" value="{{ $post->id }}"> 
    <input type="hidden" name="commentable_type" value="{{ get_class($post); }}"> 

    <input type="submit">
</form>