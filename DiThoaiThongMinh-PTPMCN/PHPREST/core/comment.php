<?php
    class comment {
        private $comn;
		private $table = 'product';
        public $user_ID;
        public $product_ID;;
        public $content_comment;
        public $time_comment;

        public function __construct($db) {
            $this -> comn = $db;
        }

        public function selectAllComment() {
            $query = 'SELECT * FROM '.$this->table;

            $stmt = $this->comn->prepare($query);

            $stmt->execute();
            return $stmt;
        }

        public function insertComment() {
            $query = 'INSERT INTO '.$this->table.
            ' SET user_id = :user_id,
             product_id = :product_id,
             content_comment = :content_comment,
             time_comment = :time_comment';

            $stmt = $this->comn->prepare($query);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
			$this->product_id = htmlspecialchars(strip_tags($this->product_id));
			$this->content_comment = htmlspecialchars(strip_tags($this->content_comment));
			$this->time_comment = htmlspecialchars(strip_tags($this->time_comment));
            //ràng buộc các tham số
            $stmt->bindParam(':user_id',$this->user_id);
			$stmt->bindParam(':product_id',$this->product_id);
			$stmt->bindParam(':content_comment',$this->content_comment);
			$stmt->bindParam(':time_comment',$this->time_comment);

            //execute query
            if($stmt->execute()){
				return true;
			}
			return false;
        }

        public function deleteComment() {
            $id = $this->id;
            $query = 'DELETE FROM '.$this->table.' WHERE id = '.$id;
            $stmt = $this->comn->prepare($query);
            $stmt-> bindParam(1,$this->id);

            $stmt->execute() ? return true: return false;
        }
    }
?>