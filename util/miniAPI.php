<?php
class miniAPI {
    private $dbConnection;
    private $RESULT = null; 
    private $body;
    private $method;
    
    public function __construct() {
        // echo "attempting construction";
        require_once("config.php");
        // echo "attempting construction2";
        $this->dbConnection = $connection;
        // echo "Successfully established connection";
        header("Access-Control-Allow-Origin: *");
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->body = file_get_contents('php://input');
        // echo "<br>" . $this->method;
        // echo "<br>" . $this->body;
    }

    public static function instance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new miniAPI;
        }
        return $instance;
    }

    public function __destruct() {
        $this->dbConnection->close();
    }
    
    public function errorReporting($error) {
        $RESULT = array();
        $RESULT['status'] = "error";
        $RESULT['timestamp'] = time();
        $RESULT['data'] = $error;
        
        $this->RESULT = json_encode($RESULT);
        print_r($this->RESULT);
    }

    public function processRequest() {
        if ($this->method != "POST") {
            // echo $this->method;
            $this->errorReporting("Invalid request method. Must be POST");
            return;
        }
        if ($this->body == null or $this->body == "") {
            $this->errorReporting("Invalid request body. Must be JSON");
            return;
        }
        $req_body = json_decode($this->body, true);
        $sql = $req_body['sql'];
        // echo $sql;
        $result = $this->dbConnection->query($sql);

        if ($result->num_rows > 0) {
            $this->buildJSON($result);
        }
        else {
            $this->errorReporting("No results found");
            return;
        }

        print_r($this->RESULT);
    }

    public function buildJSON($query) {
        // $result = $this->dbConnection->query($query);

        // if ($result->num_rows <= 0) {
        //     $this->errorReporting("No results found");
        // }

        $RESULT = array();
        $RESULT['status'] = "success";
        $RESULT['timestamp'] = time();
        $RESULT['data'] = array();

        $rows = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $rows[] = $row;
        }
        $RESULT['data'] = $rows;
        $this->RESULT = json_encode($RESULT);
        // return $this->RESULT;

        // echo "<pre>";
        // print_r($this->RESULT);
        // echo "</pre";
    }    
}

$apiReq = miniAPI::instance()->processRequest();

?>


