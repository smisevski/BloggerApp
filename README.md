
## Blogger App Challenge

## Steps Dev and Deploy

* For development environment I've used XAMPP stack on Windows 10 packaging PHP 8.2, MariaDB 10.^ version
* The XAMPP packed Apache server runs on localhost, and applications entry point is at http://localhost/BloggerApp/public 
* The auth functionality was installed with:
<code>php artisan ui bootstrap -auth</code>
* The welcome.blade and layouts/app.blade are my main layout views
* CRUD User/Author logic and UIs are available through the layouts/app.blade view, and the public domain can be seen on the welcome.blade
* For the backend logic I've user Service-Repository design pattern, registered by a specific Service Provider
* Main functionality is provided through the BloggerServiceProvider.php, that registers IUserRepository, IPostRepository, IBloggerService and IExternalBlogger
* In the authorized domain, posts are taken for the Authenticated User only, and in the public domain(homepage) all of the websites blog posts are shown.
* The user dashboard is at the Post resource root route ('/post')
* In routes/api.php I have registered a single GET route ('/api/posts') that gets a restfull json api for all the posts in the database
* The IExternalBlogger contract provides call method for the external api given in the task requirement (https://www.risklick.ch/api/v2/blogs/), and is implemented with Request made with GuzzleHttp/Client
* In Console/Commands CallExternalBlogger.php command is created and handles the ExternalBlogger service to fetch posts from api and the BloggerService to insert them in the database, although I couldn't get the responses format (fields, and etc), because the link returns 404 (resource not found), so this was not tested completely
## Steps to run the application
* git clone https://github.com/smisevski/BloggerApp.git
* In the root directory BloggerApp execute: <code>composer install</code> for downloading packagist dependencies
* In the root directory BloggerApp execute: <code>php artisan migrate</code> for the database migrations
* In the root directory BloggerApp execute: <code>npm run dev</code> for the vite assets compiler
* In the browser go to http://localhost/BloggerApp/public for the applications entry point/ homepage.
## Notes:
* I'm sorry for the poor layout design with Bootstrap, I was doing this part quickly for demonstration
* I'm sorry for being little late, I've had a sick leave for few days due to a minor health issue
* Also for Docker, I have some experience in using docker container environments with docker-compose, but I did not have it configured on my private local machine atm 'though, and chose my to go windows env (XAMPP)
* Thank you for your opportunity!



