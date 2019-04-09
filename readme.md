## ADSTIS

<img src="https://raw.githubusercontent.com/priatmoko/image-repo/master/g115.png?token=AErIt4uMQxWfjP2IxZj5XhRYhDbzkEjwks5crDcuwA%3D%3D">

Adstis is an opensource admin panel (dashboard) built in laravel and template stisla. It is modified laravel default authentication page. The Customization includes templates (dashboard design based on stisla), add username field, user profile management, change password, etc. Beside that there are some palnned customization to make us ease in web development like user authorization management, user menu management, etc, but it is still on progress. I imagine in building the foundation of admin panel, so if we have a project, we just need to make minor changing and focus on main features.

## Source
Laravel framework www.laravel.com <br/>
Stisla Admin panel www.getstisla.com

## Installation

Installing adstis admin panel is like installing other laravel project, it is the same. \
<br/>Here are the steps: <br/>
1. Clonning from github git@github.com:priatmoko/adstis.git
```
git clone git@github.com:priatmoko/adstis.git your_directory
```
2. Enter to your clonned direcotory
```
cd your_directory
```
3. Don't forget to create database and setup database configuration on .env (username, password, database name)
```
Example
....
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adstis
DB_USERNAME=root
DB_PASSWORD=your_password
....
```
4. Run command composer install on your directory
```
composer install
```
5. Run command php artisan serve to run the result on your browser
```
php artisan serve
```
### Help

1. Directory structure
