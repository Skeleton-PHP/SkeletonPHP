# THIS PROJECT IS STILL IN DEVELOPMENT

# Skeleton-PHP

![Current Version](https://img.shields.io/badge/version-v0.1-blue)
![GitHub contributors](https://img.shields.io/github/contributors/Skeleton-PHP/SkeletonPHP)
![GitHub stars](https://img.shields.io/github/stars/Skeleton-PHP/SkeletonPHP?style=social)
![GitHub forks](https://img.shields.io/github/forks/Skeleton-PHP/SkeletonPHP?style=social)
![Twitter Follow](https://img.shields.io/twitter/follow/vertanzil?style=social)

A PHP based framework for building PHP websites.

To download the latest release please use the Github [Releases](https://github.com/Skeleton-PHP/SkeletonPHP/releases)

## Table of Contents
- [Getting Started](#getting-started)
	- [Tools Required](#tools-required)
	- [Installation](#installation)
- [Development](#development)
    - [Part 1: Heading](#part-1-heading)
	  - [Step 1: Subheading](#step-1-subheading)
	  - [Step 2: Subheading](#step-2-subheading)
	- [Part 2: Heading](#part-2-heading)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [Versioning](#versioning)
- [Authors](#authors)
- [License](#license)

## Getting Started

The project might have multiple branches: `master`, `development`, etc. which can be explained here

* `master` contains aggregate code of all branches
* `development` contains code under development

Other details that need to be given while starting out with the project can be provided in this section. A project structure like below can also be included for the big projects:

```
SkeletonPHP
	├── 
	├── composer.json
	├── composer.lock
	├── .gitignore
	├── example.config.json (Will need to be renamed to config.json)
	├── README.md
	├── LICENSE.md
  ├── index.php
  ├── style.css
	├── assets
	├── auth
	│   ├── auth.php
	├── config
	│   ├── config.php
	├── database
	│   ├── db.php
	├── pages
	│   ├── dashboard.php
	├── public
	│   ├── index.php
	├── templates
	│   ├── footer.php
  │   ├── header.php
  │   ├── index.php
	├── vendor
	│   ├── composter
  │     ├── autoload_classmap.php
  │     ├── autoload_namespaces.php
  │     ├── autoload_psr4.php
  │     ├── autoload_real.php
  │     ├── autoload_static.php
  │     ├── ClassLoader.php
  │     ├── installed.json
  │     ├── installed.php
  │     ├── InstalledVersions.php
  │     ├── LICENSE
	│   ├── vertanzil
  │     ├── sql-builder
	│   ├── autoloader.php
  └── 
```

### Tools Required

All tools required go here. You would require the following tools to develop and run the project:

* Archive program  (7ZIp, Winzip or Winrar)
* A text editor (Notepad or notepad++ or similar edtior like vim for linux)

### Installation

Please use the steps below to get started.

* Installing a particular tool
  * Head to [Releases](https://github.com/Skeleton-PHP/SkeletonPHP/releases) & download the latest version
  * Use an archive program like 7Zip, Winrar or Winzip to unzip the content of the archieve.
  * Copy this to your desired web directory
  * Set up the database
  * Navigate to the desired location in your browser.
  
## Development
If you would like to contribute to the project, please see below regarding some general guidelines for contributing, this is also covered in Contribution.md

#### Issues:
* Please provide as much information as possible
  * Any relevant errors, or error codes
  * Screenshots if possible of the issue as this may help identify the issue
  
#### Pull requests
* Please push & base all pull requests to and from the development branch, as everything will need to be tested before it is pushed to the main branch which we will use for production.
* Can I please also ask that any pull requests are fully described and cover the relevant topic, any that do not meet this requirement may be denied.

## Deployment
If you would like to deploy this to a live web enviroment for testing or production, firstly go to [Releases](https://github.com/Skeleton-PHP/SkeletonPHP/releases) and download the latest version.
Unzip the content of the zip folder and then upload this to your desired web directory and set up the database, and naviage to the address of the folder on your webserver.

## Contributing

Mention what you expect from the people who want to contribute

We'd love to have your helping hand on `SkeletonPHP`! See [CONTRIBUTING.md] for more information on what we're looking for and how to get started.

## Versioning

For the available versions, see the [tags on this repository][tags]

## Authors

#### Vertanzil
* [GitHub]

You can also see the complete [list of contributors][contributors] who participated in this project.

## License
`SkletonPHP` is open source software [licensed as MIT][license].

[//]: # (HyperLinks)

[GitHub Repository]: https://github.com/Skeleton-PHP/SkeletonPHP
[CONTRIBUTING.md]: https://github.com/Skeleton-PHP/SkeletonPHP/blob/master/CONTRIBUTING.md
[tags]: https://github.com/Skeleton-PHP/SkeletonPHP/tags

[GitHub]: https://github.com/Skeleton-PHP/

[contributors]: https://github.com/Skeleton-PHP/SkeletonPHP/contributors
[license]: https://github.com/Skeleton-PHP/SkeletonPHP/blob/master/LICENSE.md
