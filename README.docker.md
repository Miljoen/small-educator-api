# Running the small-educator-api from Docker

## Introduction

This project is capable of running in a Docker container, thanks to
preliminary efforts of the Composer and MariaDB contributors.

## Prerequisites

Before running this project in Docker, it's necessary to compile
JavaScript assets using NPM, Yarn or another package manager.

Another prerequisite to run this project, is to have a Docker
environment setup. Please refer to the Docker documentation on how
to set this up for your specific operating system. It might also be
necessary to install docker-compose, Docker Desktop for Windows
should come equipped however.

## Setup

When deploying this project in a Docker environment, two different
containers will be created.

- app: contains the project files and runs the Laravel framework
- mariadb: runs the database that the app will interact with to store data

Using the docker-compose command and the docker-compose.yml file,
the containers for these functions will be created and run.
Because they're set up using docker-compose, they will be added
to their own distinct virtual network. This will allow easier
domain name resolution and finding each other.

## Building the image

Building the image is as simple as executing the following command:

```
docker-compose build
```

## Running the containers

To let Docker start both containers and assign them to their own network,
execute the following command.

```
docker-compose up
```

If you want to run the containers in the background, run the following
command instead:

```
docker-compose up -d
```

After the containers have been setup for the first time, note that
the database still doesn't have any tables or data. For the application
to run as expected, run the following commands. Make sure that both
containers are running!

```
docker exec small-educator-api_app_1 php artisan migrate
docker exec small-educator-api_app_1 php artisan db:seed
```