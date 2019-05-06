<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends MY_Controller{

    public function __construct() {
        parent::__construct();
        $this->route = "web/reservation";
        $this->model = "Invoice_model";
        $this->template->title = "Reservasi";
        $this->template->javascript->add(site_url('assets/app/js/reservation.js'));
        $this->load->model("Category_room_model","categories");
    }

    public function create(){
		checkPermission($this->route,"create");
        $this->load->model($this->model, "mdl");
        $id = $this->mdl->createInvoice(0);
        redirect($this->route.'/edit/'.$id);
    }
    
    public function edit($id){
		checkPermission($this->route,"update");
		$this->load->model($this->model,"mdl");
		$data = $this->mdl->find($id);
        $items =[
            "data"=>$data,
            "categories"=>$this->categories->getAll(),
            "detail_rooms"=>$this->mdl->getDetailRoom($id),
            "detail_taxes"=>$this->mdl->getInvoiceTax($id, 0),
            "detail_discounts"=>$this->mdl->getInvoiceDiscount($id, 0)
        ];
		if(is_null($data)) show_error('Anda tidak diperkenankan mengakses halaman ini oleh administrator.', 403, 'Akses Ditolak'); 
		$this->template->content->view($this->route."/edit",$items);
        $this->template->publish();
    }
    
    public function update(){
        checkPermission($this->route,"update");
        $id = $this->input->post('id');
        $this->load->model($this->model, "mdl");
        $post = $this->input->post(NULL, TRUE);
        $this->mdl->updateReservation($post, $id);
        $this->session->set_flashdata('success', self::SUCCESS_MESSAGE_UPATED);
        redirect($this->route.'/edit/'.$id);
    }

}