<?php
$msg = '';
require('../vendor/autoload.php');
if(isset($_REQUEST['submit']))
{
	
$msg = "Name:".$_REQUEST['name'];
$msg .= "Name:".$_REQUEST['phone'];
$msg .= "Name:".$_REQUEST['email'];

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail("hadden@simplemedia.co","Contact Email",$msg))
{
?>
<script type="text/javascript">
alert("Email Sent Successfully");

</script>
<?php } 

$msg = "Email Sent Successfully.";
}
$config = new stdClass();
$config->bucket_slug = "infinitebound"; // bucket slug
$config->object_slug = 'sbirthday-parties';
$config->object_type = 'sliders';
$config->read_key = "DurWsN72RuS5Jd2AExOdvqVDQNGv1jBY0aHexPvXCjiNhwqFUL"; // leave empty if not required
$config->write_key = "8u5THNrcyi4lWoYPsV67HkAShlyWdAEuSPS30gZiZJjTJn7BUa"; // leave empty if not required

$config->url = "https://api.cosmicjs.com/v1/" . $config->bucket_slug;
$config->objurl = "https://api.cosmicjs.com/v1/".$config->bucket_slug."/object-type/";
https://api.cosmicjs.com/v1/infinitebound/object-type/sliders?pretty=true
$config->objects_url = $config->url . "/objects";
$config->media_url = $config->url . "/media";
$config->add_object_url = $config->url . "/add-object";
$config->edit_object_url = $config->url . "/edit-object";
$config->delete_object_url = $config->url . "/delete-object";

include("cosmicjs.php");
$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});
//$url = $_SERVER['REQUEST_URI'];

$slu =  $_SERVER['REQUEST_URI'];
echo $slu;
//$sl =explode("/",$url);


$app->get($slu, function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('page.twig');
});
$app->run();