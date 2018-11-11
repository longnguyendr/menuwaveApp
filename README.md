# Menu Wave

### The section below is for development
---
#### This should be done after cloning/pulling:
```
composer install
```
```
npm install & npm run dev
```
---
#### For running locally:

First open in your command prompt (Windows) or Terminal (Unix):
```
$ vagrant up
```
```
$ vagrant ssh
```
And then navigate to your project folder:
```
$ cd /vagrant/menuwaveApp
```
Run composer install to install dependencies:
```
$ composer install
```
Here you can go to the application with  
````
localhost:1234
````
---

#### To stop vagrant:

Enter exit in your virtual machine and then halt or suspend your vagrant with:
```
$ vagrant halt
```
or
```
$ vagrant suspend
```
---
#### To use JS and CSS in Symfony project

In root, find /assets folder, then add css file and js file.


In ``webpack.config.js`` , 

Add ``.addEntry('<name of entry>', '<link to entry>')`` or ``.addStyleEntry('<name of entry>', '<link to entry>')`` where the link is the link to files in assets folder.


Run the command below to generate file css and js to public/build (This should be run everytime you edit ``webpack.config.js`` )

```
npm install
npm run dev 
```

Then add new file to your html.twig template.

---

#### More info: 

[Example of using webpack encore in symfony](https://symfony.com/doc/current/frontend/encore/simple-example.html)

[Medium link - how to use webpack in your symfony project](https://medium.com/@nioperas06/integrate-webpack-in-your-symfony-application-with-webpack-encore-ed338298a031)
