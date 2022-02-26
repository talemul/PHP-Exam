<?php

class Transaction extends Controller
{

    public function __construct()
    {
        //new model instance
        $this->transactionModel = $this->model('Transactions');
    }

    public function index()
    {
        $_SESSION['startDate'] = isset($_SESSION['startDate']) ? $_SESSION['startDate'] : '';
        $_SESSION['endDate'] = isset($_SESSION['endDate']) ? $_SESSION['endDate'] : '';
        $_SESSION['userID'] = isset($_SESSION['userID']) ? $_SESSION['userID'] : '';
        $_SESSION['recordsLimit'] = isset($_SESSION['recordsLimit']) ? $_SESSION['recordsLimit'] : 5;

        if (isset($_GET['recordsLimit'])) {
            $_SESSION['recordsLimit'] = $_GET['recordsLimit'];
        }
        if (isset($_GET['startDate'])) {
            $_SESSION['startDate'] = $_GET['startDate'];
        }
        if (isset($_GET['endDate'])) {
            $_SESSION['endDate'] = $_GET['endDate'];
        }
        if (isset($_GET['userID']) && $this->checkNumber($_GET['userID'] ?? '')) {
            $_SESSION['userID'] = $_GET['userID'];
        } else {
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {

            } else {
                $_SESSION['userID'] = '';
            }

        }
        $limit = isset($_SESSION['recordsLimit']) ? $_SESSION['recordsLimit'] : 5;
        $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
        $paginationStart = ($page - 1) * $limit;
        $transactionData = $this->transactionModel->getData($limit, $paginationStart);
        $allRecrods = $this->transactionModel->getDataRowCount();
        // var_dump($allRecrods);
        // Calculate total pages
        $totoalPages = ceil($allRecrods / $limit);
        // Prev + Next
        $prev = $page - 1;
        $next = $page + 1;
        $data['transactionData'] = $transactionData;
        $data['limit'] = $limit;
        $data['page'] = $page;
        $data['paginationStart'] = $paginationStart;
        $data['allRecrods'] = $allRecrods;
        $data['totoalPages'] = $totoalPages;
        $data['prev'] = $prev;
        $data['next'] = $next;

        $this->view('transaction/index', $data);
    }

    //add new post
    public function add()
    {
        $data = [];
        $this->view('transaction/add', $data);
    }

    public function store()
    {
        $noError = true;
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'amount' => trim($_POST['amount']),
                'buyer' => trim($_POST['buyer']),
                'receipt_id' => trim($_POST['receipt_id']),
                'items' => trim($_POST['items']),
                'buyer_email' => trim($_POST['buyer_email']),
                'buyer_ip' => $this->getClientIP(),
                'note' => trim($_POST['note']),
                'city' => trim($_POST['city']),
                'phone' => trim($_POST['phone']),
                'hash_key' => hash("sha512", trim($_POST['receipt_id']) . SALT),
                'entry_at' => date('Y-m-d'),
                'entry_by' => trim($_POST['entry_by']),
            ];

            if (!$this->checkNumber($data['amount']) || strlen($data['amount']) > 10) {
                $data['err_amount'] = 'Please enter valid amount';
                $noError = false;
            }
            if (!$this->checkText($data['buyer'])) {
                $data['err_buyer'] = 'Please enter only text, spaces and numbers';
                $noError = false;
            }
            if (strlen($data['buyer']) > 20) {
                if (empty($data['err_buyer'])) {
                    $data['err_buyer'] = 'please do not enter more than 20 characters';
                } else {
                    $data['err_buyer'] .= ' and do not enter more than 20 characters';
                }
                $noError = false;
            }
            if (!$this->checkTextOnly($data['receipt_id']) || strlen($data['receipt_id']) > 20) {
                $data['err_receipt_id'] = 'Please enter valid receipt id';
                $noError = false;
            }
            if (!$this->checkTextOnly($data['items']) || strlen($data['items']) > 255) {
                $data['err_items'] = 'Please enter valid items';
                $noError = false;
            }
            if (!$this->checkEmail($data['buyer_email']) || strlen($data['buyer_email']) > 50) {
                $data['err_buyer_email'] = 'Please enter valid buyer email';
                $noError = false;
            }
            if (substr_count($data['note'], ' ') > 30) {
                $data['err_note'] = 'Please do not enter more than 30 words. You enter ' . substr_count($data['note'], ' ') . ' words.';
                $noError = false;
            }
            if (substr_count($data['note'], ' ') < 1) {
                $data['err_note'] = 'Please enter anything. You enter ' . substr_count($data['note'], ' ') . ' words.' . $data['note'];
                $noError = false;
            }
            if (!$this->checkTextOnlyWithSpace($data['city']) || strlen($data['city']) > 20) {
                $data['err_city'] = 'Please enter only text and spaces';
                $noError = false;
            }
            if (!$this->checkNumber($data['phone']) || strlen($data['phone']) > 20) {
                $data['err_phone'] = 'Please enter valid phone';
                $noError = false;
            }
            if (!$this->checkNumber($data['entry_by']) || strlen($data['entry_by']) > 10) {
                $data['err_entry_by'] = 'Please enter valid entry by';
                $noError = false;
            }


            //validate error free
            if ($noError) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $timestamp = $_SESSION['form_submitted_ts'] ?? null;
                    if (is_null($timestamp) || (time() - $timestamp) > 24 * 60 * 60) {
                        if ($this->transactionModel->addData($data)) {
                            $_SESSION['form_submitted_ts'] = time();
                            echo json_encode('Data have been added');
                        } else {
                            echo json_encode('something went wrong');
                        }
                    } else {
                        echo json_encode('Form submitted in last 24 hours.');
                    }
                }

            } else {
                //$this->view('transaction/add', $data);
                echo json_encode($data);
            }
        } else {
            echo json_encode('something went wrong');
        }
    }

    protected function checkText($value)
    {
        return preg_match('/^[a-zA-Z0-9 \s]+$/i', $value);
    }

    protected function checkTextOnly($value)
    {
        return preg_match('/^[a-zA-Z]+$/i', $value);
    }

    protected function checkTextOnlyWithSpace($value)
    {
        return preg_match('/^[a-zA-Z \s]+$/i', $value);
    }

    protected function checkNumber($value)
    {
        return preg_match('/^[0-9]+$/i', $value);
    }

    protected function checkEmail($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    protected function getClientIP()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    //show
    public function show($id)
    {

    }

    //edit
    public function edit($id)
    {

    }

    //delete
    public function delete($id)
    {
    }
}                            
                        