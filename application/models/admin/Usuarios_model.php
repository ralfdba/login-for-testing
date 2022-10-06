<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Usuarios_model
 *
 * @author ralf
 */
class Usuarios_model extends CI_Model{
    protected $table = array(
        'tabla'=>'users',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_total(){
        $qry = $this->db->count_all_results($this->table['tabla']);
        return $qry;
    }

    public function get_current_page_records($limit, $start){
        $this->db->select("users.id,users.company,users.email,users.first_name,users.last_name,users.rut,users.active,empresas.empresa");
        $this->db->join('empresas', 'empresas.rut = users.company', 'left');    
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table['tabla']);
        if ($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function selectbyid($params){
        $conditions = array(
            'id'=>$params['usuarios_id']
        );
        $qry = $this->db->get_where($this->table['tabla'], $conditions);
        $result = $qry->result_array();
        return $result;
    }

    public function search($params){
        $this->db->like('first_name', $params);
        $this->db->like('first_name', $params);
        $this->db->or_like('last_name', $params);
        $this->db->or_like('email', $params);
        $this->db->or_like('rut', $params);
        $this->db->or_like('company', $params); 
        $consulta = $this->db->get($this->table['tabla']);
        return $consulta->num_rows();

    }

    public function search_match($buscador, $limit, $start){
        $this->db->order_by('first_name', 'asc');
        $this->db->limit($limit, $start);
        $this->db->like('first_name', $buscador);
        $this->db->or_like('last_name', $buscador);
        $this->db->or_like('email', $buscador);
        $this->db->or_like('rut', $buscador);
        $this->db->or_like('company', $buscador); 
        $consulta = $this->db->get($this->table['tabla']);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }    

}
