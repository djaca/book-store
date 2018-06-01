# Book store

This is a project made in Laravel

## Installation

### Prerequisites

* To run this project, you must have PHP 7 installed.
* You should setup a host on your web server for your local domain. For this you could also configure Laravel Homestead or Valet.

### Step 1

Begin by cloning this repository to your machine, and installing all Composer.

```bash
git clone git@github.com:djaca/book-store.git
cd book-store && composer install
```

### Step 2

Next, boot up a server. If using a tool like Laravel Valet, of course the URL will default to `http://book-store.test`. 

1. Visit: `http://book-store.test/register` to register new account.
2. Edit `config/bookstore.php`, and add any email address that should be marked as an administrator.
3. Visit: `http://book-store.test/admin/` to visit Admin Area.
