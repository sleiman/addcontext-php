<?
// Example 
// Include the script 
require 'Addcontext.php';

// Initialize the class
use \TANIOS\Addcontext\Addcontext;

$addcontext = new Addcontext( array("access_token"=>"ACCESS_TOKEN"));


// Add any metadata to an array 
$metadata['text_main_entity']   = 'russia';
$metadata['sent_from']   = 'iphone';
$metadata['tweet_id'] = '123213213';
$metadata['tweet_content']    = 'messsage text';

// Add all the information you have to an array (email, datetime and rule are mandatory)
// Add the metada array to the fields array

$fields = array(
	'email' => "sleiman@tanios.ca",
	'datetime'=> "2018-03-01 19:08:00",
    'rule' => 'trump tweeted',
    'metadata'=> $metadata
);

// Create the snapshot 
$new_snapshot = $addcontext->createSnapshotRequest($fields);

// view the results
var_dump($new_snapshot);