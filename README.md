A collection of bulk drush operations.
======================================

## Prerequisites

* PHP and Drush installed in your path.
* A number of drush aliases you want to perform bulk operations on.

## Setup

* Clone repo to local machine.
* Copy `alias.example.php` to `alias.php`.
* Edit, adding your aliases.

## Run a task

The following will rebuild the cache on all aliases in the `my-group` group listed in `config/aliases.php`:

```bash
php -f index.php my-group cache-rebuild
```

