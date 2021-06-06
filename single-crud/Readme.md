<h2><b>Laravel One to Many relationship C(R)UD Guide</b></h2>

## Step 1. New project and Database
As always, fire up the project creation command.
```bash
laravel new laraCrud
```
Open your laravel project and change the below lines from .env file.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laracrud
DB_USERNAME=root
DB_PASSWORD=
```

## Step 2. Creating Heros Tables
Now let us create one table : heros
```
php artisan make:migration create_heros_table
```
Find up methods in migration files and add fields like sample.
Let's focus on code below.
```
    Schema::create('heros', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->text('work');
        $table->timestamps();
    });
```
Here, added 2 fields of name and work.
After this much coding, trigger the below command
```
php artisan migrate
```

## Step 3. Making a model and Controller
First of all, hit the below command
```
php artisan make:controller HerosController -r -m Hero
```
Running this command to create controller and model at once.
Now navigate to app->Models->Hero.php file and add below snippets
```
class Hero extends Model
{
    ...
    //
    public $table = "heros";
}
```
Here the "heros" is the real table name in database.
Then go to app->http->controllers->HerosController.php file.
Already created <b>index()</b>, <b>create()</b>, <b>store()</b>, <b>show()</b>, <b>edit()</b> funtions are created.
Change the functions content like samples.
## Step 4. Making routes
Navigate to routes->web.php and add codes below.
```
...
Route::resource('heros','HerosController');
```
If you add route using resource, you can check run command below
```
php artisan route:list
```
## Step 5. Making Blade View files
Index() function from the controller class is as the below
```
public function index()
{
    $heros = Hero::all();

    return view('heros.index',compact('heros'));
}
```
Here, $heros variable fetch data from Hero model and spread them to view.
However, we don't have heros.index file.
Make directory named heros in resources->views directory.
And then create file and name it "index.blade.php".
Change the content of this file like sample code.
Here, you use blade language. This convert blade to html.
And create layout.blade.php in resources->views->layout.blade.php like sample code.
- creating new Hero
Then, code for create method is as the below.
```
public function create()
{
    //dd('1');
    return view('heros.create');
}
```
And make "create.blade.php" file like sample.
- Edit and delete database records
Then, code for show method is as the below.
```
public function show($id)
{
    $hero = Hero::findOrFail($id);
    return view('heros.show',compact('hero')); 
}
```
And create show.blade.php under resources->views->heros directory and code like sample.
Similar to above, create edit function.
```
public function edit($id)
{
    //
    $heros = Hero::findOrFail($id);
    return view('heros.edit',compact('heros')); 
}
```
edit.blade.php like sample.
And add 2 buttons of Update Hero and Delete Hero.
```
public function update($id)
{
    //dd('grttt');
    
    $hero = Hero::findOrFail($id);

    $hero->name = request('name');
    $hero->work = request('work');

    $hero->save();

    return redirect('/heros');
}
```
Like above add destory function.
```
public function destroy($id)
{
    // dd('dele');
    Hero::findOrFail($id)->delete();
    return redirect('/heros');
}
```
Great you have done Laravel CRUD.