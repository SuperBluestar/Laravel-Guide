<h2><b>Laravel One to Many relationship C(R)UD Guide</b></h2>

## Step 1. New project and Database
As always, fire up the project creation command.
```bash
laravel new laraonetomany
```
Open your laravel project and change the below lines from .env file.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laraonetomany
DB_USERNAME=root
DB_PASSWORD=
```

## Step 2. Creating Post and Comment Tables
Now let us create two tables : posts and comments
```
php artisan make:migration create_posts_table
php artisan make:migration create_comments_table
```
Find up methods in migration files and add fields like sample.
Let's focus on code below.
```
$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
```
This tells compiler that post_id from comments table is referencing the id column from posts table.

After this much coding, trigger the below command
```
php artisan migrate
```

## Step 3. Making Required Model Files
Run the following command to create models
```
php artisan make:model Post
php artisan make:model Comment
```
The models are created.
Now navigate to app->Models->Post.php file and add below snippets
```
class Post extends Model
{
    ...
    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```
Here, the "hasMany()" function fetch many records from comments table.
Then, add reverse method "belongsTo()" to Comment model.
```
class Comment extends Model
{
    ...
    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```
## Step 4. Manually adding records in database
Manually add database to mysql db using SLQyog or phpmyadmin.
## Step 5. Route and Controller Works
First, navigate to routes->web.php and add below code.
```
Route::get('posts', [PostsController::class, 'index']);
```
This router means "http://{domail}/posts" in web browser.
run the below code to create controller
```
php artisan make:controller PostsController
```
You can see the created app->Http->Controllers->PostsController.php
add some codes like below
```
class PostsController extends Controller
{
    // Test
    public function index()
    {

        $allposts = Post::with('comments')->get();
     
        return view('posts/index',compact('allposts'));
       
    }
}
```
## Step 6. Last View Index File
navigate to resources->views->posts->index.blade.php.
if not exist, create it.
change the content like sample.

You can your code using your local server.


<h2><b>Laravel One to Many relationship (C)RUD Guide</b></h2>
This is time to insert data to database in laravel.

We have already installed model and relationships.
## Step 1. Add route like below
```
Route::get('posts/create', [PostsController::class, 'create']);
Route::post('posts', [PostsController::class, 'store']);
```

## Step 2. Add contoller handler functions and views
Controller functions.
```
    public function create()
    {
        return view('posts/create');
    }
```