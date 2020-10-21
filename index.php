<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "db.php";

switch (filter_input( \INPUT_SERVER, 'REQUEST_METHOD', \FILTER_SANITIZE_SPECIAL_CHARS )) {
  case "POST":
    echo "Saving new clinic ...";
    $data = json_decode(file_get_contents("php://input"), true);
    switch($data["type"]) {
      case "clinic":
        $query = "INSERT INTO clinics(name) VALUES ('" . $data["name"] . "')";
        echo json_encode(array("id" => 6, "name" => $data["name"], "status" => true));
        //@todo: update id
        break;
      case "appointment":
        break;
    }
    break;
  case "GET":
    echo "Getting clinic ...";
    $data = json_decode(file_get_contents("php://input"), true);
    $query = "SELECT * from clinics WHERE id=" . $data["id"];
    //@todo: WHERE name
  case "PUT":
    echo "Updating clinic ...";
    $data = json_decode(file_get_contents("php://input"), true);
    $query = "UPDATE clinics SET name=" . $data["name"] . " WHERE id=" . $data["id"];
    //@todo: WHERE name
    break;
  case "DELETE":
    echo "Deleting clinic ...";
    $data = json_decode(file_get_contents("php://input"), true);
    $query = "DELETE FROM clinics WHERE id=" . $data["id"];
    //@todo: WHERE name
    break;
  default:
    //@todo: header 500
    echo "Unsupported method.";
    $query = ""; //see line 46
    break;
}


$result = $db->querySingle($query) or die("Query failed.");

if($result) {
  echo json_encode(["status" => true, "result" => $result]);
  //@todo: return explicit confirmation
}
else {
  //@todo: detailed error message
  echo json_encode(["message" => "Error", "status" => false]);
}

?>
