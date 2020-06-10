## About Esam's blog

Esam's blog is a simple web application that can admin to create a post, and regular users can see it and can leave a comment, but each comment must activate by admin to show it in public. There is a small dashboard for admins that show all users, edit users, and delete users, the same thing with posts, categories, and multimedia images. This blog build for practicing purpose by using HTML, CSS, jQuery, bootstrap and Laravel framework.

## Getting Started

- Clone the repository `git clone https://github.com/esamdaghreri/Blog-Application`.
- Make a copy of `.env.example` as `.env`
- Run the following the project folder `docker-compose up`
- then run the following commands
    ```
    $ docker exec -it blog-application_php_1 sh
    $ php artisan migrate --seed
    ```

After that, you can navigate to http://localhost:5555

**Note:** Use this account to get all privileges

Email `admin@gmail.com`

Password `AdminBlog`

## Snapshots of the web application

## Main page
Any user can see all posts without a comment on post until he has an account.

![User Dashboard](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/homePage.png)

Show a post

![Show Post](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/showPost.png)

### For admin

Admins can see all users, add a new user, and update each one of them.

![User Dashboard](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/showUsers.png)

![Show a user in detail](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/showUser.png)

Only admins can create a post

![Create a post](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/createPost.png)

Each comment must be approved to show on the public and same thing to reply

![Approve comment](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/approveComment.png)

![Approve reply](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/viewReplayComment.png)

Can create, update, and delete a category for posts

![Category Dashboard](https://github.com/esamdaghreri/Blog-Application/blob/master/screenshots/showCategory.png)
