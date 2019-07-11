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
│   └── sys.log                             # → Is a file that records either events that occur in the system
├── public/                                 # → The public directory contains the index.php and HTACCESS
│   ├── .htaccess                           # → Configuration file for use on web servers running the Apache
│   └── index.php                           # → The front controller for all HTTP requests
├── system/                                 # → The system directory
│   ├── core/                               # → The core directory
│   │   ├── app.php                         # → Loads the modules with their controllers, models and views.
│   │   ├── controller.php                  # → Is the base controller
│   │   ├── database.php                    # → Provides functions to connect  from a MySQL database.
│   │   ├── model.php                       # → Is the base model
│   │   ├── navbar.php                      # → Generate the menu dynamically.
│   │   ├── session.php                     # → Provides the functions of the sessions.
│   │   └── view.php                        # → Is the base view
│   ├── helpers/                            # → Helper functions
│   │   ├── dates.php                       # → Formatting helper for outputting dates
│   │   └── form.php                        # → Contains functions that assist in working with forms.
│   ├── modules/                            # → It is the directory where our applications are located.
│   │   ├── empty/                          # → Empty module
│   │   │   ├── controllers/                # → Contains class files for the controllers
│   │   │   │   └── emptyController.php     # → Is the main controller of the application
│   │   │   ├── models/                     # → Contains class files for the models
│   │   │   │   └── emptyModel.php          # → Is the main model of the application
│   │   │   ├── resources/                  # → Contains the images, css, javascript of the module
│   │   │   ├── views/                      # → Contains the views of the module
│   │   │   │   └── empty/                  # → Main folder of the view
│   │   │   │       └── index.php           # → Is the main view of the application
│   │   │   └── config.php                  # → This file is used to configure the application
│   │   ├── login/                          # → Login form with sessions
│   │   └── main/                           # → Main module
│   ├── services/                           # → The services directory
│   │   └── syslog.php                      # → Connects with the library monolog to create the system logs.
│   └── autoload.php                        # → Is responsible for loading all lunium framework classes
├── themes/                                 # → It contains theme layout templates
│   └── klivox/                             # → klivox is the default template
│       ├── css/                            # → The css directory
│       │   └── klivox.css                  # → The stylesheet, klivox.css, holds all the CSS style rules
│       ├── config.php                      # → This file is used to configure the template
│       ├── footer.php                      # → Contains the closing of the html content
│       ├── header.php                      # → Contains all the information that needs to be at the top
│       └── index.html                      # → index.html output blank page
└── vendor/                                 # → Composer updates all packages from vendor directory
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