<?php
/* Last updated with phpFlickr 1.3.2
 *
 * This example file shows you how to call the 100 most recent public
 * photos.  It parses through them and prints out a link to each of them
 * along with the owner's name.
 *
 * Most of the processing time in this file comes from the 100 calls to
 * flickr.people.getInfo.  Enabling caching will help a whole lot with
 * this as there are many people who post multiple photos at once.
 *
 * Obviously, you'll want to replace the "<api key>" with one provided 
 * by Flickr: http://www.flickr.com/services/api/key.gne
 */

ini_set('display_errors',1);
require_once("phpFlickr.php");
$f = new phpFlickr("f14f107f4b92c929dbd5643456a4b802",'eb175a427cad288c');
$f->auth('write','http://frd.frd.info/phpflicker/auth.php');
$f->setToken('72157626207670653-115540d580350420');

$photo="1.jpg";
$f->sync_upload ($photo, 'test', 'tet' );

