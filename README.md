<h1> Follow these steps is your IDE after pulling miniCRM project on your local machine </h1>
<ol>
    <li><h3> Create database called minicrm </h3></li>
    <li><h3> Migrate tables using php artisan migrate </h3></li>
    <li><h3> Run seeder using php artisan db:seed --class=UsersTableSeeder </h3></li>
    <li><h3> Require passport package for auth using composer require laravel/passport -w </h3></li>
    <li><h3> Install passport package for auth using php artisan passport:install </h3></li>
    <li><h3> run server using php artisan storage:link to save logo in app\public </h3></li>
    <li><h3> Start your server using php artisan serve </h3></li>
    <li><h3> You must run http://localhost:8000/api/login on postman to get token and put it on every request you send in header key: authorization value: (token)
                if not it will return message : unauthenticated </h3></li>
    
</ol>


