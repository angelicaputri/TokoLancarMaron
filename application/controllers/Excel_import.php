<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->model(
    array(
      'profile_model',
      'inventory_model',
      'categories_model',
      'locations_model',
      'status_model',
      'color_model',
      'logs_model',
      'excel_import_model'
    )
  );
  $this->load->library('excel');

  if ($this->ion_auth->logged_in()) {
      // user detail
    $loggedinuser = $this->ion_auth->user()->row();
    $this->data['user_full_name'] = $loggedinuser->first_name . " " . $loggedinuser->last_name;
    $this->data['user_photo']     = $this->profile_model->get_user_photo($loggedinuser->username)->row();
  }
}

function index()
{
  // Not logged in, redirect to home
  if (!$this->ion_auth->logged_in()){
    redirect('auth/login/inventory', 'refresh');
  }
    // Logged in
  else{
      // set the flash data error message if there is one
    $this->data['message']    = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
    $this->data['cat_list']   = $this->categories_model->get_categories('','','','asc');
    $this->data['stat_list']  = $this->status_model->get_status('','','','asc');
    $this->data['loc_list']   = $this->locations_model->get_locations('','','','asc');
    $this->data['col_list']   = $this->color_model->get_color('','','','asc');
    $this->data['brand_list'] = $this->inventory_model->get_brands();

      // $this->data['last_query'] = $this->db->last_query();

    $this->load->view('partials/_alte_header', $this->data);
    $this->load->view('partials/_alte_menu');
    $this->load->view('inv_data/index');
    $this->load->view('partials/_alte_footer');
    $this->load->view('inv_data/js');
    $this->load->view('js_script');
  }
}

function fetch($page="")
{
  $data = $this->excel_import_model->select();
  // Not logged in, redirect to home
  if (!$this->ion_auth->logged_in()){
    redirect('auth/login/inventory', 'refresh');
  }
    // Logged in
  else{
    $this->data['data_list']  = $this->inventory_model->get_inventory();

    // Set pagination
    $config['base_url']         = base_url('inventory/all');
    $config['use_page_numbers'] = TRUE;
    $config['total_rows']       = count($this->data['data_list']->result());
    $config['per_page']         = 15;
    $this->pagination->initialize($config);

      // Get datas and limit based on pagination settings
    if ($page=="") { $page = 1; }
    $this->data['data_list'] = $this->inventory_model->get_inventory("",
      $config['per_page'],
      ( $page - 1 ) * $config['per_page']
    );
      // $this->data['last_query'] = $this->db->last_query();
    $this->data['pagination'] = $this->pagination->create_links();

      // set the flash data error message if there is one
    $this->data['message']    = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
    $this->data['cat_list']   = $this->categories_model->get_categories('','','','asc');
    $this->data['stat_list']  = $this->status_model->get_status('','','','asc');
    $this->data['loc_list']   = $this->locations_model->get_locations('','','','asc');
    $this->data['col_list']   = $this->color_model->get_color('','','','asc');
    $this->data['brand_list'] = $this->inventory_model->get_brands();

      // $this->data['last_query'] = $this->db->last_query();

    $this->load->view('partials/_alte_header', $this->data);
    $this->load->view('partials/_alte_menu');
    $this->load->view('inv_data/all_data');
    $this->load->view('partials/_alte_footer');
    $this->load->view('inv_data/js');
    $this->load->view('js_script');
  }
}

function fetchSS($page="")
{
  $data = $this->excel_import_model->selectSS();
  // Not logged in, redirect to home
    if (!$this->ion_auth->logged_in()){
      redirect('auth/login/categories', 'refresh');
    }
    // Logged in
    else{
      $this->data['data_list'] = $this->categories_model->get_categories();

      // Set pagination
      $config['base_url']         = base_url('categories/index');
      $config['use_page_numbers'] = TRUE;
      $config['total_rows']       = count($this->data['data_list']->result());
      $config['per_page']         = 15;
      $this->pagination->initialize($config);

      // Get datas and limit based on pagination settings
      if ($page=="") { $page = 1; }
      $this->data['data_list'] = $this->categories_model->get_categories("",
        $config['per_page'],
        ( $page - 1 ) * $config['per_page']
      );
      // $this->data['last_query'] = $this->db->last_query();
      $this->data['pagination'] = $this->pagination->create_links();

      // set the flash data error message if there is one
      $this->data['message']   = (validation_errors()) ? validation_errors() :
      $this->session->flashdata('message');

      $this->load->view('partials/_alte_header', $this->data);
      $this->load->view('partials/_alte_menu');
      $this->load->view('inv_category/index');
      $this->load->view('partials/_alte_footer');
      $this->load->view('inv_category/js');
      $this->load->view('js_script');
    }
}


function import()
{
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $code = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $sales = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $brand = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $satuan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $dasar = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $grosir = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
     $ecer = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
     $awal = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
     $masuk = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
     $keluar = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
     $hitung = floatval($awal) + floatval($masuk) - floatval($keluar);
     $data[] = array(
      'code'              => $code,
      'category_id'       => $sales,
      'brand'             => $brand,
      'satuan'            => $satuan,
      'dasar'             => $dasar,
      'grosir'            => $grosir,
      'ecer'              => $ecer,
      'awal'              => $awal,
      'masuk'             => $masuk,
      'keluar'            => $keluar,
      'akhir'             => $hitung,
      'deleted'           => '0',
    );
   }
 }

 $data_location_log = array(
  'code'        => $this->input->post('code')
);
 $data_status_log = array(
  'code'      => $this->input->post('code')
);
   // check to see if we are inserting the data
 if ($this->excel_import_model->insert($data)) {
            // Insert logs
  $this->logs_model->insert_location_log($data_location_log);
  $this->logs_model->insert_status_log($data_status_log);

            // Set message
  $this->session->set_flashdata('message',
    $this->config->item('message_start_delimiter', 'ion_auth')
    ."Import Data Sukses!".
    $this->config->item('message_end_delimiter', 'ion_auth')
  );
}
else {
            // Set message
  $this->session->set_flashdata('message',
    $this->config->item('error_start_delimiter', 'ion_auth')
    ."Beberapa Data Gagal Diimport!".
    $this->config->item('message_end_delimiter', 'ion_auth')
  );
}
redirect('Excel_import/fetch', 'refresh');
} 
}

function importSS()
{
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $code = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $sales = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $telepon = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $data[] = array(
      'code'              => $code,
      'name'              => $name,
      'sales'             => $sales,
      'telepon'           => $telepon,
      'deleted'           => '0',
    );
   }
 }

 $data_location_log = array(
  'code'        => $this->input->post('code')
);
 $data_status_log = array(
  'code'      => $this->input->post('code')
);
   // check to see if we are inserting the data
 if ($this->excel_import_model->insertSS($data)) {
            // Insert logs
  $this->logs_model->insert_location_log($data_location_log);
  $this->logs_model->insert_status_log($data_status_log);

            // Set message
  $this->session->set_flashdata('message',
    $this->config->item('message_start_delimiter', 'ion_auth')
    ."Import Data Sukses!".
    $this->config->item('message_end_delimiter', 'ion_auth')
  );
}
else {
            // Set message
  $this->session->set_flashdata('message',
    $this->config->item('error_start_delimiter', 'ion_auth')
    ."Import Data Gagal!".
    $this->config->item('error_end_delimiter', 'ion_auth')
  );
}
redirect('Excel_import/fetchSS', 'refresh');
} 
}

//end of all
}
?>