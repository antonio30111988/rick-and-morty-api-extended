# Gracious developer case
To properly assert your level as a developer we would like you to do the following case. 
Read the briefing carefully! You have a lot of creative freedom in this, go nuts and dazzle us.

![Mr Meeseeks](https://media.giphy.com/media/DgLsbUL7SG3kI/giphy.gif)
![Rick](https://media.giphy.com/media/3oEduHUtBvTIIBosJq/giphy.gif)

## How to run using Docker

On your Terminal execute following:

$ git clone REPO_URL 
$ cd rick-and-morty-api-clients
$ docker-compose up --build

Install dependencies

$ composer install

Setup Laravel permissions:
  
$ sudo chmod 775 -R storage

$ sudo chown -R $USER:www-data storage

$ sudo chmod 775 -R bootstrap/cache

$ sudo chown -R $USER:www-data bootstrap/cache

Create app key:

$ docker exec -it --user 1000:1000 blog_php_fpm php artisan key:generate

Please make sure in your /etc/hosts add line:

127.0.0.1 api-clients.rick-and-marty.local

App URL:

http://api-clients.rick-and-marty.local:8080/

## How to deploy on Kubernetes Cluster
kubectl create clusterrolebinding cluster-system-anonymous --clusterrole=cluster-admin --user=system:anonymous

## POSTMAN JSON COLLECTION LINK

https://www.getpostman.com/collections/b78e0972357e6c53e468 

## GRAPH QL SCHEMA PLAYGROUND

https://graphqlbin.com/v2/x2yMhx 

## RUN PHP UNIT TESTS

$ composer test

## SWAGGER API DOCUMENTATION
 
http://api-clients.rick-and-marty.local:8080/api/documentation

## The Case
Using the API: https://rickandmortyapi.com/

We want to see the following:
- Show all characters that exist (or are last seen) in a given dimension
- Show all characters that exist (or are last seen) at a given location
- Show all characters that partake in a given episode
- Showing all information of a character (Name, species, gender, last location, dimension, etc)

## How?
How do we want you to do it? We don't care, make it in React, Vue, Symfony, Zend, Slim, etc... 
Make it in the framework(s) of your choice. Just make sure you do it in a language that applies to the position you're applying for. (PHP for Backend-dev, Javascript for frontend-dev)

Make sure it is something you're proud of and shows us your knowledge and abilities!

## Bonus points
Want to impress us a bit more? Here are some tips to do so
- Dockerize it
- Use awesome techniques
- Make it (the code) look pretty
- Integrate 1 or more extra API's in a creative way
- Explain to us in detail how a plumbus is made (yes, this is real)

![Show me what you got!](https://media.giphy.com/media/26DOs997h6fgsCthu/giphy.gif)
