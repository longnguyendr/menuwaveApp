# menuwaveApp
For running locally:
First open in your command prompt (Windows) or Terminal (Unix):
$ vagrant up
$ vagrant ssd
And then navigate to your project folder:
$ cd /vagrant/menuwaveApp
Run composer install to install dependencies:
$ composer install
---
To stop vagrant:
Enter exit in your virtual machine and then halt or suspend your vagrant with:
$ vagrant halt
or
$ vagrant suspend
---
To use JS and CSS in Symfony project, inside /public in your root, add new folder named it 'build' and add css and your js files here.
More info: 
[Example of using webpack encore in symfony](https://symfony.com/doc/current/frontend/encore/simple-example.html)
[Medium link - how to use webpack in your symfony project](https://medium.com/@nioperas06/integrate-webpack-in-your-symfony-application-with-webpack-encore-ed338298a031)
