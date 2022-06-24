<?php 

    class Buyer extends Framework{

        public function __construct()
        {
            $this->helper('link');
            $this->buyerInfo = $this->model('BuyerInfo');
        }

        public function index(){  
            $this->view('index');
        }

        public function reports(){
            $data = $this->buyerInfo->reports();
            $this->view('reports', $data);
        }

       
        public function formSubmit(){

            $errorData = [
                'amount' => '',
                'buyer' => '',
                'receipt_id' => '',
                'note' => '',
                'city' => '',
                'phone' => '',
                'entry_by' => '',
            ];
            $itemsData = "";
            if(is_array($this->input('items'))){
                foreach($this->input('items') as $row){ 
                    $itemsData = $itemsData?$itemsData.','.$row:$row;
                }
            }
             
            $data = [
                'amount' => $this->input('amount'),
                'buyer' => $this->input('buyer'),
                'receipt_id' => $this->input('receipt_id'),
                'items' => $itemsData,
                'buyer_email' => $this->input('buyer_email'),
                'buyer_ip' => $this->getIPAddress(),
                'note' => $this->input('note'),
                'city' => $this->input('city'),
                'phone' =>  $this->input('phone'),
                'hash_key' => hash('sha512', $this->input('receipt_id')),
                'entry_at' => $this->getDate(),
                'entry_by' => $this->input('entry_by'),
            ];

            //amount validation
            if( !$data['amount']){
                $errorData['amount'] =  "Required field.";
            }else if (!preg_match("/^(?=.*\d).{1,10}$/", $data['amount'])) {
                $errorData['amount'] =  "should be numbers only";
            }

            //buyer validation
            if( !$data['buyer']){
                $errorData['buyer'] =  "Required field.";
            }else if(strlen($data['buyer'])>20){
                $errorData['buyer'] =  "max length is 20";
            }else if (!preg_match("/([A-Za-z0-9\s]+)/", $data['buyer'])) {
                $errorData['buyer'] =  "should be numbers and letters only.";
            }

             //note validation
            if( !$data['note']){
                $errorData['note'] =  "Required field.";
            }else if (!preg_match("/([A-Za-z0-9\s]+)/", $data['note'])) {
                $errorData['note'] =  "should be numbers and letters only.";
            }

             //city validation
            if( !$data['city']){
                $errorData['city'] =  "Required field.";
            }else if (!preg_match("/([A-Za-z0-9\s]+)/", $data['city'])) {
                $errorData['city'] =  "should be numbers and letters only.";
            }
            //phone validation
            if( !$data['phone']){
                $errorData['phone'] =  "Required field.";
            }else if(strlen($data['phone']) > 10){
                $errorData['phone'] =  "max length is 10";
            }else if (!preg_match("/^(?=.*\d).{1,10}$/", $data['phone'])) {
                $errorData['phone'] =  "should be numbers";
            }

            //entry by validation
            if( !$data['entry_by']){
                $errorData['entry_by'] =  "Required field.";
            }else if (!preg_match("/[^a-zA-Z]/", $data['entry_by'])) {
                $errorData['entry_by'] =  "should be letters only.";
            }
            if (!filter_var($data['buyer_email'], FILTER_VALIDATE_EMAIL)) {
                $errorData['email'] =  "should be email only.";
            }              
 
            if($errorData['amount'] && $errorData['buyer'] && $errorData['note'] && $errorData['city'] && $errorData['phone'] && $errorData['entry_by']){
                
                echo '<div class="alert alert-warning">Data not inserted</div>';

            }else if($errorData['amount'] ||  $errorData['buyer'] ||  $errorData['note'] ||  $errorData['city'] ||  $errorData['phone'] ||  $errorData['entry_by']){
               
                echo '<div class="alert alert-warning">Data not inserted</div>';

            }else{
                $data = [$data['amount'], $data['buyer'], $data['receipt_id'], $data['items'], $data['buyer_email'], $data['buyer_ip'],
                $data['note'], $data['city'], "880".$data['phone'], $data['hash_key'],  $data['entry_at'],  $data['entry_by']];
                
                if($this->buyerInfo->create($data)){  
                    // $this->redirect('Home/reports');
                    echo '<div class="alert alert-success">Data successfully inserted</div>';

                }else{
                    echo '<div class="alert alert-warning">Data not inserted</div>';
                }
            }

        }

        public function search(){
            $entry_by_id = "";
            $start_date = "";
            $end_date = "";
            $entry_by_id = $_GET['entry_by_id'];
            $dates = $_GET['dates'];
            $itemssArray = explode("-", $dates);
            $start_date = $itemssArray[0];
            $end_date = $itemssArray[1];
            
            $data = [
                'entry_by' => $entry_by_id,
                'start_date' => date("Y-m-d", strtotime($start_date)),
                'end_date' => date("Y-m-d", strtotime($end_date)),
            ];
            $data = $this->buyerInfo->search($data);
            
            $this->view('reports', $data);
        }
    }
?>