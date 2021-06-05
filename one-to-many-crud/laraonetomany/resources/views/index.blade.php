<html>
<head>

</head>
<style>


</style>

<h1> Laravel One to Many C(R)UD Example </h1>

<h3> All Posts </h3>

@foreach ($allposts as $post)
<li>

    {{ $post->post_name}}

    <ul>
        @foreach ($post->comments as $comment)
        <li>

            {{ $comment->comment}}

        </li>
        @endforeach
    </ul>

</li>
@endforeach

</body>
</html>
