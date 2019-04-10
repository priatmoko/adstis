## ADSTIS

<img src="https://github.com/priatmoko/image-repo/blob/master/g115.png?raw=true">

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
5. Run command php artisan migrate to create database
```
php artisan migrate
```
6. Run command php artisan serve to run the result on your browser
```
php artisan serve
```
### Help

1. Directory structure
<img src="https://github.com/priatmoko/image-repo/blob/master/directory.png?raw=true">

2. Codes
<p>
    Controller method calling blade template
</p>

```
 /**
     * Display main panel of user profile
     * @return void
     */
    public function index()
    {
        $breadcrumb = ['User profile'=>''];
        $title = 'User Profile';
        return view('Admin.Profile.index')
                ->with('breadcrumb', $breadcrumb);
    }
```
Inside blade template, main template on blade, It will generate main page. 

```
@extends('layouts.master-admin')
@section('component')
<!-- your code here-->
@endsection
```

Generate page like this 
<img style="width:200" src="https://github.com/priatmoko/image-repo/blob/master/home%201.png?raw=true">

Inside blade template, calling component card, It will generate bootstrap card component

```
@component('layouts.elements.others.card',
            ['title'=>'User Detail'])
@endcomponent            
```
Generate page like this, card Jump to, card User Profile Setting 
<img style="width:200" src="https://github.com/priatmoko/image-repo/blob/master/setting%20user.png?raw=true">
