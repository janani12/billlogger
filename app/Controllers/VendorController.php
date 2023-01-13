<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\VendorModel;
 
class VendorController extends Controller
{
    public function index()
    {
        $model = new VendorModel();
        $data['vendor']  = $model->getVendor()->getResult();
        echo view('vendor', $data);
    }
 
    public function save()
    {
        $model = new VendorModel();
        $data = array(
            'name'        => $this->request->getPost('name'),
            'gst'       => $this->request->getPost('gst'),
            'address'       => $this->request->getPost('address'),
            'phone'       => $this->request->getPost('phone'),
            'updated_at' => date('y-m-d h:i:s'),
            'created_by' => session()->get('id'),
            'updated_by' => session()->get('id')
        );
        $model->saveVendor($data);
        return redirect()->to('/vendor');
    }
 
    public function update()
    {
        $model = new VendorModel();
        $id = $this->request->getPost('id');
        $data = array(
            'name'        => $this->request->getPost('name'),
            'gst'       => $this->request->getPost('gst'),
            'address'       => $this->request->getPost('address'),
            'phone'       => $this->request->getPost('phone'),
            'updated_at' => date('y-m-d h:i:s'),
            'updated_by' => session()->get('id')
        );
        $model->updateVendor($data, $id);
        return redirect()->to('/vendor');
    }
 
    public function delete()
    {
        $model = new VendorModel();
        $id = $this->request->getPost('id');
        echo $id;exit;
        $model->deleteVendor($id);
        return redirect()->to('/vendor');
    }
 
}
 