```composer i```

```mv .env.example .env```

```php artisan migrate --seed```

```php artisan key:generate```

now you have 1 user, 3 task for yesterday, 3 task today and 3 task for Tomorrow

<hr/>

download mailhog for emails https://github.com/mailhog/MailHog/releases <br/>
you can see it in http://127.0.0.1:8025

<hr/>

if you need change configuration package <br/>
```php artisan vendor:publish --tag task-config```

if you need change migration package <br/>
```php artisan vendor:publish --tag task-migration```

if you need change access logged-in user to all todo package routes <br/>
```just create your custom middleware and add it to middleware key in config package file```

if you want run manually schedule you can run <br/>
``` php artisan schedule:tasks ```

<hr/>
