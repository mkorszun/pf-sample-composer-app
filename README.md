## Composer Tutorial

This guide will step you through adding the Composer package manager to a sample application. The following document will show you how to:

* Download and install Composer locally
* Create a Composer manifest
* Fetch dependencies
* Including and using dependencies
* Updating dependencies
* Deploying to PHP Fog

#### Sample Code

You can find a sample project using composer here: <https://github.com/phpfog/pf-sample-composer-app>

#### Limitations

Please note that dependancies that have binaries may not work once deployed. PHP Fog does not support Composer libraries that include binary executables.

### Install Composer Locally

Composer is a command line package management tool that can be run directly directly from the root project folder or installed using [Homebrew](https://github.com/mxcl/homebrew). 

Download it to the project folder:

`curl http://getcomposer.org/composer.phar -O composer.phar`

`wget http://getcomposer.org/composer.phar`

Or install with brew

`brew install composer`

### Create the Manifest

In the root project folder, create a `composer.json` manifest file:


	{
    	"require": {
        	"symfony/yaml": ">=2.0.6",
        	"imagine/Imagine": ">=0.2.8"
    	}
	}

The above sample manifest file defines Yaml and Imagine as dependencies in the required section. The ">=VERSION" rule tells Composer to fetch the newest version of the library greater or equal to the specified version number.

### Install Dependencies

From the console navigate to the same folder where the composer.json file is located and run the following command:

	composer.phar install

Composer will create a `vendor` folder and proceed to download the required libraries into it. The install command must be used again whenever a new library is added. Composer records the version numbers of the libraries it fetches in the composer.lock file. It does this to maintain project stability by guaranteeing than Composer only fetches the library versions the project was developed and tested with.

Below is what a simple project folder might look like after running the install command:

	├── composer.json     <- Manifest created above
	├── composer.lock     <- Generated lock file preserves current dependency versions
	├── index.php
    ├── .composer
    │   └── autoload.php  <- Auto loader to be required in code files.
	└── vendor
	    ├── bin
	    ├── imagine
	    │   └── Imagine 
	    └── symfony
	        └── yaml
	          

### Using the Installed Libraries

To start using the Composer installed libraries, add the following autoloader line to index.php files in the project: 

	require "vendor/.composer/autoload.php";

**Note**: Most PHP frameworks will have single place for adding this autoloader.

Composer uses lazy loading so only the necessary libraries will be loaded on each request.  

### Updating Dependencies

To fetch the latest library versions run the following command:

	composer.phar update

This will download the newest available libraries using the version rules specified in the manifest. The composer.lock file will be updated to reflect the new version numbers.


### Deploying to PHP Fog

Once the dependencies are installed, tested, and the app is ready for release, commit and push the project, **including the vendor folder**, to the app's PHP Fog git repo. 

	git add .
    git commit -m "Added Composer and dependencies"
	git push

**Please note** that dependancies that have binaries may not work once deployed. PHP Fog does not support Composer libraries that include binary executables. 


### References

* <https://github.com/composer/composer>
* <http://packagist.org>
