<h2>How to make test data using Faker vender(database seed using Faker)/h2>

# start a initial laravel project by running below codes
```
$ composer global require laravel/installer
$ laravel new myapp
$ php artisan serve
```

# then make migration and models and migrate
In env file, add below code
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

## to create a model, run below code
```
php artisan make:model Article -m
```
## then add below code to up() method of Article migration
```
$table->string('title');
$table->text('body');
```

# At this point, you can make seeder file
```
php artisan make:seeder ArticlesTableSeeder
```
## Then update the ArticlesTableSeeder file like below
```
class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Article::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }
}
```
## Then run the code below to create a test data
```
php artisan db:seed --class=ArticlesTableSeeder
```

Good luck