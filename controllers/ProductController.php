<?php 

require_once 'DBController.php';
class ProductController
{
    protected $db;

    public function getbanks()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from bank";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

}

?>