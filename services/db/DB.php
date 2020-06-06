<?php 

class DB {
    public $link;

    public function __construct(){
        $this->link = mysqli_connect('localhost', 'root', '', 'epignosis');
    }

    public function checkUser($uemail, $upassword){
        $query = "SELECT * FROM `users` WHERE 
            `password` = '" . $upassword . "' AND `email` = '" . $uemail . "'";
        $res = mysqli_query($this->link, $query);
        if ($res){
            while($row = mysqli_fetch_array($res)){
                $data[] = array(
                    'id' => $row['id'],
                    'first' => $row['firstname'],
                    'last' => $row['lastname'],
                    'email' => $row['email'],
                    'creation' => $row['created_at'],
                    'type' => $row['type']
                );
            }
            return $data;
        } else {
            return [];
        }
    }

    public function publishRequest($start, $end, $reason, $submitted, $id){
        $query = "INSERT INTO `requests` VALUES (null, '" . $submitted . "', '" . $start . "', '" . $end . "', '" . $id . "', '".$reason."', 'pending')";
        $res = mysqli_query($this->link, $query);
        return ($res) ? 1 : 0;
    }

    public function getApplicationsPerUser($id){
        $query = "SELECT * FROM `requests` WHERE `user_id` = '" . $id . "' ORDER BY `req_submitted` DESC";
        $res = mysqli_query($this->link, $query);
        if ($res->num_rows > 0){
            while($row = mysqli_fetch_array($res)){
                $start = strtotime($row['req_start']);
                $end = strtotime($row['req_end']);
                $days = $end - $start;
                $days = round($days / (60 * 60 * 24));
                $requests[] = array(
                    'date_submitted' => $row['req_submitted'],
                    'dates_requested' => array($row['req_start'], $row['req_end']),
                    'days_requested' => $days,
                    'status' => $row['req_status']
                );
            }
            return $requests;
        } 
        return [];
    }

    public function getAllUsers(){
        $query = "SELECT * FROM `users`";
        $res = mysqli_query($this->link, $query);
        if ($res->num_rows > 0){
            while($row = mysqli_fetch_array($res)){
                $users[] = array(
                    'uid' => $row['id'],
                    'firstname' => $row['firstname'],
                    'lastname' => $row['lastname'],
                    'email' => $row['email'],
                    'type' => $row['type']
                );
            }
            return $users;
        } 
        return [];
    }

    public function updateUser($id, $first, $last, $mail, $tp){
        $query = "UPDATE `users` SET  `firstname` = '" . $first . "', `lastname` = '" . $last . "',
                 `email` = '" . $mail . "', `type` = '" . $tp . "' WHERE `id` = " . $id . "";
        $res = mysqli_query($this->link, $query);
        return ($res) ? 1 : 0;
    }

    public function getAllRequests($id){
        $query = "SELECT * FROM `requests` ORDER BY `req_submitted` DESC";
        $res = mysqli_query($this->link, $query);
        if ($res->num_rows > 0){
            while($row = mysqli_fetch_array($res)){
                $start = strtotime($row['req_start']);
                $end = strtotime($row['req_end']);
                $days = $end - $start;
                $days = round($days / (60 * 60 * 24));
                $user = $this->fetchOne($row['user_id']);
                $requests[] = array(
                    'rid' => $row['req_id'],
                    'date_submitted' => $row['req_submitted'],
                    'dates_requested' => array($row['req_start'], $row['req_end']),
                    'days_requested' => $days,
                    'status' => $row['req_status'],
                    'employee' => $user['firstname'] . ' ' . $user['lastname'],
                    'emp_id' => $user['id']
                );
            }
            return $requests;
        } 
        return [];
    }

    public function fetchOne($id){
        $query = "SELECT * FROM `users` WHERE `id` = " . $id . "";
        $res = mysqli_query($this->link, $query);
        if (!empty($res)){
            $data = mysqli_fetch_array($res);
            return $data;
        }
        return [];
    }

    public function updateRequest($action, $req, $user){
        $type = ($action) ? 'approved' : 'rejected';
        $query = "UPDATE `requests` SET `req_status` = '" . $type . "' WHERE `user_id` = " . $user . " AND `req_id` = " . $req . "";
        $res = mysqli_query($this->link, $query);
        return ($res) ? 1 : 0;
    }

    public function createUser($data){
        $name = $data['name']; 
        $surname = $data['surname'];
        $mail = $data['mail']; 
        $user_type = $data['user_type'];
        $pass = $data['pass'];
        $created = date('Y-m-d');
        $query = "INSERT INTO `users` 
            VALUES (null, '" . $name . "', '" . $surname . "','" . $pass . "', 
                '" . $user_type . "', '" . $created . "', '" . $mail . "')";
        $res = mysqli_query($this->link, $query);
        return ($res) ? 1 : 0;
    }
}

$db = new DB();













