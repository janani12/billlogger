<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class VendorModel extends Model
{
     
    public function getVendor()
    {
        $builder = $this->db->table('vendor');
        $builder->select('*');
        return $builder->get();
    }
 
    public function saveVendor($data){
        $query = $this->db->table('vendor')->insert($data);
        return $query;
    }
 
    public function updateVendor($data, $id)
    {
        $query = $this->db->table('vendor')->update($data, array('id' => $id));
        return $query;
    }
 
    public function deleteVendor($id)
    {
        $query = $this->db->table('vendor')->delete(array('id' => $id));
        return $query;
    } 
 
   
}