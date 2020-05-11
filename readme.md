## About Esam's blog

Esam's blog is a simple web application that can an admin to create a post and regular users can see it and can leave a comment but each comment must activate by admin to show it in public. There is a small dashboard for admins that show all users, edit users and delete users, same thing with posts, categories and multimedia images. This blog build for practising purpose by using html, css, jQuery, bootstrap and laravel framework.

## Getting Started

- Clone the repository `git clone https://github.com/esamdaghreri/Blog-Application.git`.
- Make a copy of `.env.example` as `.env`
- Run the following the project folder `docker-compose up`
- then run the following commands
```
$ docker exec -it blog-application_php_1 sh
$ php artisan migrate --seed
```

After that, you can navigate to http://localhost:5555.