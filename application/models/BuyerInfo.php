<?php 

    class BuyerInfo extends Database{

        public function create($data){
            if($this->query("INSERT INTO buyer_info (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_at, entry_by) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", $data)){
                return true;
            }else{
                return false;
            }
        }   
        
        
        public function reports(){
            if($this->query("SELECT * FROM buyer_info")){ 
                return $this->fetchAll();
            }
        }

        public function search($data){
            if($data['entry_by'] && $data['start_date']  && $data['end_date']){
                if($this->query("SELECT * FROM buyer_info WHERE entry_by = ? AND  entry_at  between  ? AND  ?", [$data['entry_by'], $data['start_date'], $data['end_date']])){
                    return $this->fetchAll();
                }
            }else if($data['entry_by']){                 
                if($this->query("SELECT * FROM buyer_info WHERE entry_by = ?", [$data['entry_by']])){
                    return $this->fetchAll();
                }
            }else{                 
                if($this->query("SELECT * FROM buyer_info WHERE entry_at  between  ? AND  ?", [$data['start_date'], $data['end_date']])){
                    return $this->fetchAll();
                }
            }
        }
             
    }

?>