<?


/**
 * Addcontext API Class
 *
 * @author Sleiman Tanios
 * @copyright Sleiman Tanios - TANIOS 2018
 * @version 1.0
 */



namespace TANIOS\Addcontext;




class Addcontext 
{
    
    private $_key;

    private $_url;

    
    public function __construct($config)
    {
        if (is_array($config)) {
            $this->setKey($config['access_token']);
            $this->setUrl($config['api_url']);
        } else {
            echo 'Error: __construct() - Configuration data is missing.';
        }
    }

    public function setKey($key)
    {
        $this->_key = $key;
    }

    public function getKey()
    {
        return $this->_key;
    }

    public function setUrl($url)
    {
        $this->_url = $url;
    }

    public function getUrl()
    {
        return $this->_url;
    }


    function createSnapshotRequest($fields){

        $fields_string = "";
        $api_url = $this->getUrl()."/snapshot_requests";

    
    
        $fields_string = json_encode($fields);
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->getKey()
        ];


        $post = $this->curlPost($api_url,$fields,$fields_string,$headers);
        return $post;

    }

    function curlPost($api_url,$fields,$fields_string,$headers){

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $api_url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $result = curl_exec($ch);

        curl_close($ch);
        $result = json_decode($result);
        return $result;
    }

}