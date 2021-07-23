<?php
/**
 * How to use webmaster api.
 *
 * Add new host
 */

use yandex\webmaster\api\webmasterApi;
// Initializtion: get config and primary classes
require_once(dirname(__FILE__) . "/.init.php");
// Init webmaster api with your access token
echo '12asdasdada3';
//$token ='AQAAAAAIGkldAAKa14nVszX7vUswj9MSSKAe7co';
$token = $_SESSION['access_token'];
echo $token;
//$wmApi = new webmasterApi($token);
echo 'webmasterApi($token';
//array with errors (will used in form behind)
$postErrors = array();
//$url = 'http://r9dz.ru/';
echo '321';
$url = (isset($_POST['url'])) ? $_POST['url'] : '';
$url = trim($url);
if(!empty($url))
{
    $ret = $wmApi->addHost($url);

    if(!$ret)
    {
        webmaster_api_example_tpl::err500();
    }
    if(!empty($ret->error_code))
    {
        $postErrors[] = $ret->error_message;
    }elseif(empty($ret->host_id))
        webmaster_api_example_tpl::err500();

    else
    {
    echo 'host id: '.$ret->host_id;
        webmaster_api_example_tpl::redirect("./host.php?host_id=".$ret->host_id);
    }
}




// Let's show it
webmaster_api_example_tpl::init()->header('Add new host');
?>
<?php
if(count($postErrors))
{
    ?>
    <ul class="errorlist">
        <?php
        foreach ($postErrors as $error)
        {
            ?>
            <li>
                <?=htmlentities($error)?>
            </li>
            <?
        }
        ?>
    </ul>
    <?
}
?>
<form action="./new.php" method="post">
    <label for="url">URL:</label>
    <input type="text" name="url" value="<?=htmlentities($url)?>">
    <input type="submit" value="Add">
</form>