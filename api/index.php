<?php

require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/login', 'login'); /* User login */
$app->post('/signup', 'signup'); /* User Signup  */
$app->get('/getFeed', 'getFeed'); /* User Feeds  */
$app->post('/feed', 'feed'); /* User Feeds  */
$app->post('/feedUpdate', 'feedUpdate'); /* User Feeds  */
$app->post('/feedDelete', 'feedDelete'); /* User Feeds  */
$app->post('/getImages', 'getImages');
$app->post('/getLogin', 'getLogin');
$app->post('/getMens', 'getMens');
$app->post('/getPants', 'getPants');
$app->post('/getSkirts', 'getSkirts');
$app->post('/getUsers', 'getUsers');
$app->post('/getWomens', 'getWomens');
$app->post('/getOrderList', 'getOrderList');
$app->post('/getAllOrderList', 'getAllOrderList');
$app->post('/getBasket', 'getBasket');

$app->post('/getWomenById', 'getWomenById');
$app->post('/getMenById', 'getMenById');
$app->post('/getPantById', 'getPantById');
$app->post('/getSkirtById', 'getSkirtById');
$app->post('/getUserById', 'getUserById');

$app->post('/deleteWomen', 'deleteWomen');
$app->post('/deleteMen', 'deleteMen');
$app->post('/deletePant', 'deletePant');
$app->post('/deleteSkirt', 'deleteSkirt');
$app->post('/deleteUser', 'deleteUser');
$app->post('/deleteProduct', 'deleteProduct');
$app->post('/deleteFromBasket', 'deleteFromBasket');

$app->post('/addWomen', 'addWomen');
$app->post('/addMen', 'addMen');
$app->post('/addPant', 'addPant');
$app->post('/addSkirt', 'addSkirt');
$app->post('/addUser', 'addUser');
$app->post('/addToBasket', 'addToBasket');
$app->post('/addToOrderList', 'addToOrderList');

$app->post('/updateWomen', 'updateWomen');
$app->post('/updateMen', 'updateMen');
$app->post('/updatePant', 'updatePant');
$app->post('/updateSkirt', 'updateSkirt');
$app->post('/updateUser', 'updateUser');
$app->post('/updateProduct', 'updateProduct');

$app->run();

/************************* USER LOGIN *************************************/
/* ### User login ### */
function updateProduct()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;
    $id_user = $data->id_user;
    $product_name = $data->product_name;
    $order_name = $data->order_name;
    $status_order = $data->status_order;
    $payment = $data->payment;
    $paid = $data->paid;
    $price = $data->price;
    $size = $data->size;
    $product_type = $data->product_type;
    $date_order = $data->date_order;
    $time_order = $data->time_order;
    $date_sender = $data->date_sender;
    $time_sender = $data->time_sender;
    try {
        $sql_query = "UPDATE orderlist set id_user='$id_user',product_name='$product_name',order_name='$order_name',status_order='$status_order',  
        payment='$payment',paid='$paid',size='$size',product_type='$product_type',date_order='$date_order', 
        time_order='$time_order',date_sender='$date_sendet',time_sender='$time_sender' WHERE id='$id'";
        $conn = getDB();
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"update" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function updateUser()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;
    $name = $data->name;
    $lastname = $data->lastname;
    $email = $data->email;
    $tel = $data->tel;
    try {
        $sql_query = "UPDATE users set name='$name', lastname='$lastname', email='$email', tel='$tel'  WHERE id='$id'";
        $conn = getDB();
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"update" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function updateSkirt()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;

    try {
        $sql_query = "UPDATE skirt set name='$name', price='$price', picture='$picture' WHERE id='$id'";
        $conn = getDB();
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"update" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function updatePant()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;

    try {
        $sql_query = "UPDATE pant set name='$name', price='$price', picture='$picture' WHERE id='$id'";
        $conn = getDB();
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"update" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function updateMen()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;

    try {
        $sql_query = "UPDATE men set name='$name', price='$price', picture='$picture' WHERE id='$id'";
        $conn = getDB();
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"update" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function updateWomen()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;

    try {
        $sql_query = "UPDATE women set name='$name', price='$price', picture='$picture' WHERE id='$id'";
        $conn = getDB();
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"update" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getUserById()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;
    try {
        $userData = array();
        $sql_query = "SELECT * from users where id=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);
        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getSkirtById()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;
    try {
        $userData = array();
        $sql_query = "SELECT * from skirt where id=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);
        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getPantById()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;
    try {
        $userData = array();
        $sql_query = "SELECT * from pant where id=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);
        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getMenById()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;
    try {
        $userData = array();
        $sql_query = "SELECT * from men where id=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);
        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getWomenById()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;
    try {
        $userData = array();
        $sql_query = "SELECT * from women where id=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);
        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function addToOrderList()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id_user = $data->id_user;
    $product_name = $data->product_name;
    $order_name = $data->order_name;
    $status_order = $data->status_order;
    $payment = $data->payment;
    $paid = $data->paid;
    $price = $data->price;
    $size = $data->size;
    $product_type = $data->product_type;
    $date_order = $data->date_order;
    $time_order = $data->time_order;
    $date_sender = $data->date_sender;
    $time_sender = $data->time_sender;
    try {
        $sql1 = "INSERT INTO orderlist (id_user,product_name,order_name,status_order,payment,paid,
    price,size,product_type,date_order,time_order,date_sender,time_sender)
            VALUES('$id_user','$product_name','$order_name','$status_order','$payment','$paid','$price','$size','$product_type','$date_order','$time_order','$date_serder','$time_sender')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "CompleteToAddToOrderList"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function addToBasket()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id_user = $data->id_user;
    $product_name = $data->product_name;
    $order_name = $data->order_name;
    $status_order = $data->status_order;
    $payment = $data->payment;
    $paid = $data->paid;
    $price = $data->price;
    $size = $data->size;
    $product_type = $data->product_type;
    $date_order = $data->date_order;
    $time_order = $data->time_order;
    $date_sender = $data->date_sender;
    $time_sender = $data->time_sender;
    try {
        $sql1 = "INSERT INTO basket (id_user,product_name,order_name,status_order,payment,paid,
    price,size,product_type,date_order,time_order,date_sender,time_sender)
            VALUES('$id_user','$product_name','$order_name','$status_order','$payment','$paid','$price','$size','$product_type','$date_order','$time_order','$date_serder','$time_sender')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "insertsymptoms"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function addUser()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $username = $data->username;
    $password = $data->password;
    $name = $data->name;
    $lastname = $data->lastname;
    $email = $data->email;
    $tel = $data->tel;
    $status = $data->status;
    try {
        $sql1 = "INSERT INTO users (username,password,name,lastname,email,tel,status)
            VALUES('$username','$password','$name','$lastname','$email','$tel','$status')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "insertsymptoms"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function addSkirt()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;
    try {
        $sql1 = "INSERT INTO skirt (name,price,picture)
            VALUES('$name','$price','$picture')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "insertsymptoms"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function addPant()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;
    try {
        $sql1 = "INSERT INTO pant (name,price,picture)
            VALUES('$name','$price','$picture')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "insertsymptoms"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function addMen()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;
    try {
        $sql1 = "INSERT INTO men (name,price,picture)
            VALUES('$name','$price','$picture')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "insertsymptoms"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function addWomen()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $name = $data->name;
    $price = $data->price;
    $picture = $data->picture;
    try {
        $sql1 = "INSERT INTO women (name,price,picture)
            VALUES('$name','$price','$picture')";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql1);
        echo '{ "sucess": "insertsymptoms"}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function deleteFromBasket()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;

    try {
        $sql_query = "DELETE from basket WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function deleteProduct()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;

    try {
        $sql_query = "DELETE from basket WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function deleteUser()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;

    try {
        $sql_query = "DELETE from users WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function deleteSkirt()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;

    try {
        $sql_query = "DELETE from skirt WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function deletePant()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;

    try {
        $sql_query = "DELETE from pant WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function deleteMen()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;

    try {
        $sql_query = "DELETE from men WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function deleteWomen()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data->id;

    try {
        $sql_query = "DELETE from women WHERE id='$id'";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        echo '{ "sucess":"delete" }';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getAllOrderList()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    // $id = $data;

    try {
        $userData = array();
        $sql_query = 'SELECT * from orderlist ';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getOrderList()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;

    try {
        $userData = array();
        $sql_query = "SELECT * from orderlist where id_user=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getBasket()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $data;

    try {
        $userData = array();
        $sql_query = "SELECT * from basket where id_user=$id";
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getUsers()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try {
        $userData = array();
        $sql_query = 'SELECT * from users';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getSkirts()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try {
        $userData = array();
        $sql_query = 'SELECT * from skirt';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getPants()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try {
        $userData = array();
        $sql_query = 'SELECT * from pant';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getWomens()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    // $id_user = $data->id_user;

    try {
        $userData = array();
        $sql_query = 'SELECT * from women';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getMens()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    // $id_user = $data->id_user;
    // $id_patient = $data->id_patient;

    try {
        $userData = array();
        $sql_query = 'SELECT * from men';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"data": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
function getLogin()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    // $id_doctor = $data->id_doctor;
    // $id_patient = $data->id_patient;

    try {
        $userData = array();
        $sql_query = 'SELECT * from users';
        $conn = getDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rst = $conn->query($sql_query);
        $userData = $rst->fetchAll(PDO::FETCH_OBJ);

        $userData = json_encode($userData);
        echo '{"pattient": '.$userData.'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function login()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try {
        $db = getDB();
        $userData = '';
        $sql = 'SELECT user_id, name, email, username FROM users WHERE (username=:username or email=:username) and password=:password ';
        $stmt = $db->prepare($sql);
        $stmt->bindParam('username', $data->username, PDO::PARAM_STR);
        $password = hash('sha256', $data->password);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount = $stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($userData)) {
            $user_id = $userData->user_id;
            $userData->token = apiToken($user_id);
        }

        $db = null;
        if ($userData) {
            $userData = json_encode($userData);
            echo '{"userData": '.$userData.'}';
        } else {
            echo '{"error":{"text":"Bad request wrong username and password"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

/* ### User registration ### */
function signup()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email = $data->email;
    $name = $data->name;
    $username = $data->username;
    $password = $data->password;

    try {
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

        echo $email_check.'<br/>'.$email;

        if (strlen(trim($username)) > 0 && strlen(trim($password)) > 0 && strlen(trim($email)) > 0 && $email_check > 0 && $username_check > 0 && $password_check > 0) {
            echo 'here';
            $db = getDB();
            $userData = '';
            $sql = 'SELECT user_id FROM users WHERE username=:username or email=:email';
            $stmt = $db->prepare($sql);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindParam('email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $mainCount = $stmt->rowCount();
            $created = time();
            if ($mainCount == 0) {
                /*Inserting user values*/
                $sql1 = 'INSERT INTO users(username,password,email,name)VALUES(:username,:password,:email,:name)';
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam('username', $username, PDO::PARAM_STR);
                $password = hash('sha256', $data->password);
                $stmt1->bindParam('password', $password, PDO::PARAM_STR);
                $stmt1->bindParam('email', $email, PDO::PARAM_STR);
                $stmt1->bindParam('name', $name, PDO::PARAM_STR);
                $stmt1->execute();

                $userData = internalUserDetails($email);
            }

            $db = null;

            if ($userData) {
                $userData = json_encode($userData);
                echo '{"userData": '.$userData.'}';
            } else {
                echo '{"error":{"text":"Enter valid data"}}';
            }
        } else {
            echo '{"error":{"text":"Enter valid data"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function email()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email = $data->email;

    try {
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);

        if (strlen(trim($email)) > 0 && $email_check > 0) {
            $db = getDB();
            $userData = '';
            $sql = 'SELECT user_id FROM emailUsers WHERE email=:email';
            $stmt = $db->prepare($sql);
            $stmt->bindParam('email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $mainCount = $stmt->rowCount();
            $created = time();
            if ($mainCount == 0) {
                /*Inserting user values*/
                $sql1 = 'INSERT INTO emailUsers(email)VALUES(:email)';
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam('email', $email, PDO::PARAM_STR);
                $stmt1->execute();
            }
            $userData = internalEmailDetails($email);
            $db = null;
            if ($userData) {
                $userData = json_encode($userData);
                echo '{"userData": '.$userData.'}';
            } else {
                echo '{"error":{"text":"Enter valid dataaaa"}}';
            }
        } else {
            echo '{"error":{"text":"Enter valid data"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

/* ### internal Username Details ### */
function internalUserDetails($input)
{
    try {
        $db = getDB();
        $sql = 'SELECT user_id, name, email, username FROM users WHERE username=:input or email=:input';
        $stmt = $db->prepare($sql);
        $stmt->bindParam('input', $input, PDO::PARAM_STR);
        $stmt->execute();
        $usernameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $usernameDetails->token = apiToken($usernameDetails->user_id);
        $db = null;

        return $usernameDetails;
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function getFeed()
{
    try {
        if (1) {
            $feedData = '';
            $db = getDB();

            $sql = 'SELECT * FROM feed  ORDER BY feed_id DESC LIMIT 15';
            $stmt = $db->prepare($sql);
            $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam('lastCreated', $lastCreated, PDO::PARAM_STR);

            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);

            $db = null;

            if ($feedData) {
                echo '{"feedData": '.json_encode($feedData).'}';
            } else {
                echo '{"feedData": ""}';
            }
        } else {
            echo '{"error":{"text":"No access"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function feed()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $lastCreated = $data->lastCreated;
    $systemToken = apiToken($user_id);

    try {
        if ($systemToken == $token) {
            $feedData = '';
            $db = getDB();
            if ($lastCreated) {
                $sql = 'SELECT * FROM feed WHERE user_id_fk=:user_id AND created < :lastCreated ORDER BY feed_id DESC LIMIT 5';
                $stmt = $db->prepare($sql);
                $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam('lastCreated', $lastCreated, PDO::PARAM_STR);
            } else {
                $sql = 'SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 5';
                $stmt = $db->prepare($sql);
                $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);

            $db = null;

            if ($feedData) {
                echo '{"feedData": '.json_encode($feedData).'}';
            } else {
                echo '{"feedData": ""}';
            }
        } else {
            echo '{"error":{"text":"No access"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function feedUpdate()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $feed = $data->feed;

    $systemToken = apiToken($user_id);

    try {
        if ($systemToken == $token) {
            $feedData = '';
            $db = getDB();
            $sql = 'INSERT INTO feed ( feed, created, user_id_fk) VALUES (:feed,:created,:user_id)';
            $stmt = $db->prepare($sql);
            $stmt->bindParam('feed', $feed, PDO::PARAM_STR);
            $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
            $created = time();
            $stmt->bindParam('created', $created, PDO::PARAM_INT);
            $stmt->execute();

            $sql1 = 'SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 1';
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam('user_id', $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $feedData = $stmt1->fetch(PDO::FETCH_OBJ);

            $db = null;
            echo '{"feedData": '.json_encode($feedData).'}';
        } else {
            echo '{"error":{"text":"No access"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

function feedDelete()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $feed_id = $data->feed_id;

    $systemToken = apiToken($user_id);

    try {
        if ($systemToken == $token) {
            $feedData = '';
            $db = getDB();
            $sql = 'Delete FROM feed WHERE user_id_fk=:user_id AND feed_id=:feed_id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam('feed_id', $feed_id, PDO::PARAM_INT);
            $stmt->execute();

            $db = null;
            echo '{"success":{"text":"Feed deleted"}}';
        } else {
            echo '{"error":{"text":"No access"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
$app->post('/userImage', 'userImage'); /* User Details */
function userImage()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $imageB64 = $data->imageB64;
    $systemToken = apiToken($user_id);
    try {
        if (1) {
            $db = getDB();
            $sql = 'INSERT INTO imagesData(b64,user_id_fk) VALUES(:b64,:user_id)';
            $stmt = $db->prepare($sql);
            $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam('b64', $imageB64, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            echo '{"success":{"status":"uploaded"}}';
        } else {
            echo '{"error":{"text":"No access"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}

$app->post('/getImages', 'getImages');
function getImages()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;

    $systemToken = apiToken($user_id);
    try {
        if (1) {
            $db = getDB();
            $sql = 'SELECT b64 FROM imagesData';
            $stmt = $db->prepare($sql);

            $stmt->execute();
            $imageData = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"imageData": '.json_encode($imageData).'}';
        } else {
            echo '{"error":{"text":"No access"}}';
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
