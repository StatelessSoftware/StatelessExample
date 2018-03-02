# StatelessExample
Example Stateless Application

This example shows how to easily create a Stateless app.  We will use Bootswatch Sass for our styling, and webpack for Javascript

## Download

- Open up a blank folder on your computer (tip - make this your webserver document root!)
- In a command line in this folder, run `git clone https://github.com/StatelessSoftware/StatelessExample .`
- Tip - You can push this to your own git repository after running the installation step

## Installation

0. ### Install Prerequisites ( You should probably already have these! )

    - Git bash https://git-scm.com/
    - Composer https://getcomposer.org/
    - Nodejs https://nodejs.org/en/
    - PHP 7+
    - Database

1. ### Run the installation

    - Open a command line terminal in the folder
    - (Mac & Linux) - run `chmod 755 script/*` to grant permissions on the scripts
    - Run the create-app by running `./script/create-app.sh` (git bash required)
    - This will ask for a project name.  Make up a project name without any spaces or uppercase letters (e.g. `test-app`) and press enter.  The installation will continue.
    - You will see a message after the installation completes with some things you can try with your new app!
    - If you're running a local webserver, set the document root to `public/`

2. ### Build

    - You will need to run an initial build.  You can always run `npm run build` to build your sass and JS

3. ### Create a Database

    - Create a database and user, and put the info in `conf/app.conf.php`

## The files

Let's go over the files you should see.  The root project folder should like like this:

```

|- App
|- conf
|- node_modules
|- public
|- src
|- script
|- vendor
|- .gitignore
|- composer.json
|- composer.lock
|- package-lock.json
|- package.json
|- webpack.config.js

```

We'll go through each item one by one

### App

App houses all of your PHP code for your application server-side.  All of your functions and modules will go in here.  (You will learn more about Stateless modules later).

### conf

The `conf` folder houses your configuration files.  **You should put your database info in `app.conf.php` now if you haven't done so already**

### node_modules

This folder you won't have to worry about too much, it hold's your sass and js libraries.

### public

Public houses your compiled css and js, your application entry `index.php`, your `.htaccess`, and any public images (such as your logo and favicon).  This will be the folder which is the server root.

### script

The script folder has scripts to manage your website, such as `create-app.sh`

### src

The `src` (source) folder is where you will write your sass and JS, and running `npm run build` will automatically compile these files to `public/`

### vendor

Vendor holds your PHP libraries, such as StatelessCMS

### Loose files

The loose files in the root folder are configuration files.  You shouldn't need to play with these unless you know what you're doing as they have already been setup for you.
