## Installation

Note: This setup is heavily based off of https://davidwinter.me/install-and-manage-wordpress-with-git/. 

Create a new project directory:
```
mkdir mysite && cd mysite
git init
touch README.md
git add README.md
git commit -m "Initial commit."
```

You now have a blank project to start with.

We’ll be using the Github WordPress mirror that is synced with the official SVN repository every 30 minutes. It includes all tags and branches.

We want to add this as a subrepository to our main project.

```
git submodule add git://github.com/WordPress/WordPress.git wordpress
```

WordPress is quite a big project if you haven’t already noticed, so it might take a while to make a clone. Once done, commit the new subrepository:

```
git commit -m "Add WordPress subrepository."
```

We want to ensure our project is using the current stable version. As of writing, this is 3.3.1.

```
cd wordpress
git checkout 4.4.1
cd..
```

This has now updated the WordPress repository to 4.4.1 - commit the changes to your main project.

```
git commit -am "Checkout WordPress 3.3.1"
```

The subrepository is now isolated, and we don’t want to make any changes to it, besides bumping version numbers. This means we can’t modify wp-config.php, themes or plugins. We’ll have to move things about a bit.

First up, we’ll create our config file. WordPress allows for this to be stored one directory up from the core WordPress files.

```
cp wordpress/wp-config-sample.php wp-config.php
git add wp-config.php
git commit -m "Adding default wp-config.php file"
```

Now that this is outside of the WordPress repository, we’ll be able to configure WordPress and commit the changes to our main project repository.

Now, in order to manage themes and plugins we need to make a copy of the wp-content directory:

```
cp -R wordpress/wp-content .
```

This will copy the directory and its contents into our main project repo.

Now, at this point you may like to tidy up that directory a little. This isn’t required, but will save you commiting themes and plugins you’ll probably never use.

```
rm wp-content/plugins/hello.php
rm -rf wp-content/themes/twentyten
```

If you plan on using the default WordPress theme, Twenty Eleven, don’t run the following command:

```
rm -rf wp-content/themes/twentyeleven
```

Repeat this process for any other unnecessary theme dir.

Now commit this directory:

```
git add wp-content
git commit -m "Adding default wp-content directory"
```

We now have a trimed down wp-content directory ready for only our themes and plugins.

To finish off the project structure, we need to copy the WordPress index.php file:

```
cp wordpress/index.php .
git add index.php
git commit -m "Adding index.php"
```

Now we need to configure these files and let WordPress know where to talk to everything.

## Configuring

Now into wp-config.php, open it up. Because we have the core WordPress files in a different directory to that of the index.php file, we need to let WordPress know about it. Add the following two constants to the file. I prefer just below the @package WordPress statement so my changes are near the top of the file:

```
 * @package WordPress
 */

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);
```

This lets WordPress know that the core files are in the wordpress directory, but that the site is to be served at the root of the project directory.

Because we moved the wp-content directory out of the core WordPress directory, we also have to let it know about this change. Add the following after the previous define statements:

```
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');
```

If you’re not using the a default theme, and want to specify the one WordPress should use instead:

```
define('WP_DEFAULT_THEME', 'mytheme');
```

Simply replace mytheme with the name of the theme you have. Be sure that you’ve placed it inside the wp-content/themes directory.

Now simply complete the database details as normal further down in the file, and then visit the project on your webhost and you’ll be up and running.

```
git commit -am "Update settings in wp-config.php"
```
Remove all of the WP files from `wordpress` **except** `wp-config.php`.