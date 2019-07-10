# lunium-framework
The Lunium framework for building web applications.

## Table of contents

- [Quick start](#quick-start)
- [What's included](#whats-included)
- [Bugs and feature requests](#bugs-and-feature-requests)
- [Documentation](#documentation)
- [Creator](#creator)
- [Copyright and license](#copyright-and-license)


## Quick start

Several quick start options are available:

- [Download the latest release.](https://github.com/rafaelcorro/lunium-framework/archive/master.zip)
- Clone the repo: `git clone https://github.com/rafaelcorro/lunium-framework.git`

## What's included

Within the download you'll find the following directories and files:

```shell
lunium-framework/                           # → The root directory
├── config/                                 # → Configuration directory
│   └── config.php                          # → This file is used to configure the framework
├── log/                                    # → Contains the system log
│   └── sys.log                             # → System log
├── public/                                 # → The public directory contains the index.php and HTACCESS
│   ├── .htaccess                           # → Is a configuration file for use on web servers running the Apache
│   └── index.php                           # → The front controller for all HTTP requests
├── system/                                 # → The system directory
│   ├── core/                               # → The core directory
│   │   ├── app.php                         # → The main class that loads the modules with their controllers, models and views.
│   │   ├── controller.php                  # → Is the base controller
│   │   ├── database.php                    # → Provides functions to connect and fetch records from a MySQL database
│   │   ├── model.php                       # → Is the base model
│   │   ├── navbar.php                      # → Generate the menu dynamically.
│   │   ├── session.php
│   │   └── view.php                        # → Is the base view
│   ├── helpers/                            # → Helper functions
│   │   ├── dates.php
│   │   └── form.php
│   ├── modules/                            # → It is the directory where our applications are located.
│   │   ├── empty/                          # → Empty module
│   │   │   ├── controllers/
│   │   │   │   └── emptyController.php
│   │   │   ├── models/
│   │   │   │   └── emptyModel.php
│   │   │   ├── resources/
│   │   │   ├── views/
│   │   │   │   └── empty/
│   │   │   │       └── index.php
│   │   │   └── config.php
│   │   ├── login/                          # → Login form with sessions
│   │   └── main/                           # → Main module
│   ├── services/                           # → The services directory
│   │   └── syslog.php
│   └── autoload.php
├── themes/
│   └── klivox/
│       ├── css/
│       │   └── klivox.css
│       ├── config.php
│       ├── footer.php
│       ├── header.php
│       └── index.html
└── vendor/
```

## Creator

**Rafael Corro Haba**

- <https://github.com/rafaelcorro>

## Bugs and feature requests

Have a bug or a feature request? Please open a new issue (https://github.com/rafaelcorro/lunium-framework/issues/new).

## Documentation

documentation in progress

## Copyright and license

Code and documentation copyright 2019 [Rafael Corro Haba]. Code released under the [MIT License](https://github.com/rafaelcorro/lunium-framework/blob/master/LICENSE). 