<?php

class Transactions
{
    private $db;
    private $tableName = 'transactions';

    /**
     *
     */
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @param int $limit
     * @param int $start
     * @return mixed
     */
    public function getData($limit = 1000, $start = 0)
    {
        $query = 'SELECT * FROM ' . $this->tableName;

        $from = $this->checkValidDate($_SESSION['startDate']);
        $to = $this->checkValidDate($_SESSION['endDate']);
        $entry_by = $_SESSION['userID'];
        $entry_by = ((int)$entry_by);

        if ($from && $to) {
            $query .= ' where entry_at >= :from and entry_at <= :to ';
            if ($entry_by >= 1) {
                $query .= ' and entry_by = :entry_by ';
            }
        } elseif ($to) {
            $query .= ' where entry_at <= :to ';
            if ($entry_by >= 1) {
                $query .= ' and entry_by = :entry_by ';
            }
        } elseif ($from) {
            $query .= ' where entry_at >= :from ';
            if ($entry_by >= 1) {
                $query .= ' and entry_by = :entry_by ';
            }
        } else {
            if ($entry_by >= 1) {
                $query .= ' where entry_by = :entry_by ';
            }
        }
        $query .= ' ORDER BY id DESC limit ' . $start . ', ' . $limit;
        $this->db->query($query);
        if ($from)
            $this->db->bind(':from', $from);
        if ($to)
            $this->db->bind(':to', $to);
        if ($entry_by >= 1)
            $this->db->bind(':entry_by', $entry_by);
        $result = $this->db->resultSet();
        return $result;
    }
    /**
     * @param int $limit
     * @param int $start
     * @return mixed
     */
    public function getDataRowCount()
    {
        $query = 'SELECT count(*) as id FROM ' . $this->tableName;
        $from = $this->checkValidDate($_SESSION['startDate']);
        $to = $this->checkValidDate($_SESSION['endDate']);
        $entry_by = $_SESSION['userID'];
        $entry_by = ((int)$entry_by);

        if ($from && $to) {
            $query .= ' where entry_at >= :from and entry_at <= :to ';
            if ($entry_by >= 1) {
                $query .= ' and entry_by = :entry_by ';
            }
        } elseif ($to) {
            $query .= ' where entry_at <= :to ';
            if ($entry_by >= 1) {
                $query .= ' and entry_by = :entry_by ';
            }
        } elseif ($from) {
            $query .= ' where entry_at >= :from ';
            if ($entry_by >= 1) {
                $query .= ' and entry_by = :entry_by ';
            }
        } else {
            if ($entry_by >= 1) {
                $query .= ' where entry_by = :entry_by ';
            }
        }
        $this->db->query($query);
        if ($from)
            $this->db->bind(':from', $from);
        if ($to)
            $this->db->bind(':to', $to);
        if ($entry_by >= 1)
            $this->db->bind(':entry_by', $entry_by);
        $result = $this->db->resultSet();
        $count=0;
        foreach ($result as $val){
            $count=$val->id;
            break;
        }
        return $count;
    }
    public function checkValidDate($date)
    {
        $test_arr = explode('/', $date);
        if (count($test_arr) == 3) {
            if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
                $date = date('Y-m-d H:i:s', strtotime($test_arr[2] . '-' . $test_arr[0] . '-' . $test_arr[1]));
                return $date;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function addData($data)
    {
        $this->db->query('INSERT INTO ' . $this->tableName . '(amount , buyer , receipt_id,items, buyer_email, buyer_ip, note, city, phone,hash_key,entry_at,entry_by   ) VALUES (:amount, :buyer, :receipt_id,:items,:buyer_email, :buyer_ip, :note, :city, :phone, :hash_key, :entry_at, :entry_by )');
        $this->db->bind(':amount', $data['amount'] ?? '');
        $this->db->bind(':buyer', $data['buyer'] ?? '');
        $this->db->bind(':receipt_id', $data['receipt_id'] ?? '');
        $this->db->bind(':items', $data['items'] ?? '');
        $this->db->bind(':buyer_email', $data['buyer_email'] ?? '');
        $this->db->bind(':buyer_ip', $data['buyer_ip'] ?? '');
        $this->db->bind(':note', $data['note'] ?? '');
        $this->db->bind(':city', $data['city'] ?? '');
        $this->db->bind(':phone', $data['phone'] ?? '');
        $this->db->bind(':hash_key', $data['hash_key'] ?? '');
        $this->db->bind(':entry_at', $data['entry_at'] ?? date('Y-m-d'));
        $this->db->bind(':entry_by', $data['entry_by'] ?? '1');

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

//    /**
//     * @param $id
//     * @return mixed
//     */
//    public function getDataById($id)
//    {
//        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE id = :id');
//        $this->db->bind(':id', $id);
//        $row = $this->db->single();
//
//        return $row;
//    }
//
//    /**
//     * @param $data
//     * @return bool
//     */
//    public function updateData($data)
//    {
//        $this->db->query('UPDATE ' . $this->tableName . ' SET amount = :amount, buyer = :buyer WHERE id = :id');
//        $this->db->bind(':id', $data['id']);
//        $this->db->bind(':amount', $data['amount']);
//        $this->db->bind(':buyer', $data['buyer']);
//        $this->db->bind(':receipt_id', $data['receipt_id']);
//        $this->db->bind(':items', $data['items']);
//        $this->db->bind(':buyer_email', $data['buyer_email']);
//        $this->db->bind(':buyer_ip', $data['buyer_ip']);
//        $this->db->bind(':note', $data['note']);
//        $this->db->bind(':city', $data['city']);
//        $this->db->bind(':phone', $data['phone']);
//        $this->db->bind(':hash_key', $data['hash_key']);
//        $this->db->bind(':entry_at', $data['entry_at']);
//        $this->db->bind(':entry_by', $data['entry_by']);
//
//        //execute
//        if ($this->db->execute()) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    /**
//     * @param $id
//     * @return bool
//     */
//    public function deleteData($id)
//    {
//        $this->db->query('DELETE FROM ' . $this->tableName . ' WHERE id = :id');
//        $this->db->bind(':id', $id);
//
//        if ($this->db->execute()) {
//            return true;
//        } else {
//            return false;
//        }
//    }
}