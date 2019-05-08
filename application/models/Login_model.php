<?php
class Login_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function login() {
        //obtenemos datos del form
        $email = $this->input->post('email');
        $password =  $this->input->post('password') ;
        $facebook= $this->input->post('facebook');

        //consultaremos la existencia del email que entra en la BD
        $query = $this->db->get_where('usuarios', array('email' => $email));

        if(!$facebook){
            //si encontramos datos
            if($query->num_rows() == 1)
            {
                $row=$query->row();
                //verificamos que la contraseña sea identica
                if( password_verify($password, $row->password) )
                {
                    $data=array('userdata'=>array(
                        'nombre'=>$row->nombre,
                        'apellido'=>$row->apellido,
                        'id'=>$row->id,
                        'email'=>$row->email)
                    );
                    //seteamos la variable de sesion
                    $this->session->set_userdata($data);
                    return true;
                }
            }
            //eliminamos la variable de sesión
            $this->session->unset_userdata('userdata');
            //retornamos resultados en formato json
    		return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(["message"=>"Email o contraseña incorrectos"]));

        }else{
            //si el correo logueado con facebook ya existe
            if($query->num_rows() == 1)
            {

                $row=$query->row();
                $data=array('userdata'=>array(
                            'nombre'=>$row->nombre,
                            'apellido'=>$row->apellido,
                            'id'=>$row->id,
                            'email'=>$row->email)
                );
                //seteamos la variable de sesion
                $this->session->set_userdata($data);
                return true;
                
            }else{
                //si el correo no existe, debemos dejarlo pasar creando un registro
                //generamos array de campos que me da facebook
                $data = array(
                        'nombre'   => $this->input->post('nombre'),
                        'apellido' => $this->input->post('apellido'),
                        'email' => $email,
                        //encriptamos la contraseña
                        'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT) 
                );
        
                //insertamos en bd
                $this->db->insert('usuarios', $data);
                //ubicamos el id de usuario para crear la variable de sesión
                $data['id']= $this->db->insert_id() ;
                //creamos la variable de sesión
                $this->session->set_userdata(['userdata'=>$data]);
                return true;
            }
            
        }

    }

    public function logout()
    {
        //eliminamos la variable de sesión
        $this->session->unset_userdata('userdata');
        return true;
    }
    
    //función para crear un registro de usuario
    public function create()
    {  
        //primero debemos consultar que el email no exista
        $email = $this->input->post('email');
        $password =  $this->input->post('password') ;
 
        $query = $this->db->get_where('usuarios', array('email' => $email));
        //si encontramos datos
        if($query->num_rows() == 1)
        {
            //retornamos una salida en formato json
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(["message"=>"El email no puede ser registrado"]));
        }

        //generamos array de campos del form
        $data = array(
            'nombre'   => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'email' => $email,
            //encriptamos la contraseña
            'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT) 
        );
        
        //insertamos en bd
        return $this->db->insert('usuarios', $data);
    }
}