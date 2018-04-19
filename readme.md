# AddContext PHP Wrapper
A PHP wrapper for the [ AddContext API](https://addcontext.io/" AddContext API"). Feedback or bug reports are appreciated.


## Get started

### Installation

If you're using Composer, you can run the following command:
```
composer require sleiman/addcontext-php
```
You can also download them directly and extract them to your web directory.


### Add the wrapper to your project
If you're using Composer, run the autoloader
```php
require 'vendor/autoload.php';
```
Or include the Addcontext.php file

```php
include('../src/Addcontext.php');

```
### Initialize the class
```php
use \TANIOS\Addcontext\Addcontext;
$addcontext = new Addcontext(array(
    'access_token' => 'ACCESS_TOKEN',
));
```

### Create new snapshot request
We want to create a new entry in the system via the API

// Add any metadata you want to associate to that snapshopt to an array 
```php
$metadata['text_main_entity']   = 'russia';
$metadata['sent_from']   = 'iphone';
$metadata['tweet_id'] = '123213213';
$metadata['tweet_content']    = 'messsage text';

// Add all the information you have to an array (email, datetime and rule are mandatory)
// Add the metada array to the fields array

$fields = array(
    'email' => "someletters@youcanread.com",
    'datetime'=> "2018-03-01 19:08:00",
    'rule' => 'trump tweeted',
    'metadata'=> $metadata
);

// Create the snapshot 
$new_snapshot = $addcontext->createSnapshotRequest($fields);
```
## Credits

Copyright (c) 2018 - Programmed by Sleiman Tanios