<?php
/**
 * for flickr 
 */
class Flickr
{

  protected $app_key='';
  protected $app_secret='';
  protected $token='';

  function __construct($app_key,$app_secret,$token='')
  {

    if($app_key == false )
    {
      throw new Exception("invalid  flickr app key"); 
    }

    if( $app_secret == false)
    {
      throw new Exception("invalid  flickr app secret"); 
    }

    $this->app_key=$app_key;
    $this->app_secret=$app_secret;
    $this->token=$token;

  }
  /* flickr functions */
  /*
   * the token must be valid
   * so for user ,it does not auth ,
   * because we have already did the auth
   *
   * @return image id
   */
  function flickr_upload($filename,$title,$description)
  {
    $global=Frd::getGlobal();

    if( $this->token == false)
    {
      throw new Exception("invalid  flickr token"); 
    }

    $f = new phpFlickr($this->app_key,$this->app_secret);

    $f->setToken($this->token);
    $f->auth('write');


    $photo_id=$f->sync_upload ($filename, $title,$description);

    if($photo_id != false)
    {
      $photo=$f->photos_getInfo ($photo_id) ;
      $photo=$photo['photo'];

      //var_dump($photo);

      $url=$f->buildPhotoURL($photo, "square");
      $original_url=$f->buildPhotoURL($photo, "large");
    }
    else
    {
      $url=""; 
      $original_url='';
    }

    return array($url,$original_url);
  }

}
