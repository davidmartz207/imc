<?php
class Medida_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }
    public function listar()
    {
        //obtenemos el usuario de la sesión
        $usuario = $this->session->userdata('userdata')['id']; 
        
        $data = [];
        //consultamos los datos
        $this->db->select('altura, peso, imc, clasificacion, fecha');
        $this->db->from('medidas');
        $this->db->where('id_usuario', $usuario);
        $consulta = $this->db->get();
        $data = $consulta->result();
        
        //retornamos resultados en formato json
		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));

    }

    public function crear()
    {       
        //generamos array de datos del form
        $data = array(
            'id_usuario' => $this->session->userdata('userdata')['id'],
            'altura'   => $this->input->post('altura'),
            'peso' => $this->input->post('peso'),
            'imc' => $this->input->post('imc'),
            'clasificacion' =>  $this->input->post('clasificacion') 
        );
        
        //insertamos en BD
        return $this->db->insert('medidas', $data);
    }
}