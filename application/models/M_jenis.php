<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis extends CI_Model {

  public function getJenis()
  {
    return $this->db->get('jenis_barang')->result();
  }

  public function add($kode,$name)
  {
    $data = [
      'KODE_JENIS' => $kode,
      'JENIS' => $name
    ];

    return $this->db->insert('jenis_barang',$data);
  }

  public function update($id, $nama)
  {
    $data = [
      'JENIS' => $nama
    ];
    $this->db->where('KODE_JENIS', $id);
    return $this->db->update('jenis_barang', $data);
  }
  public function delete($id)
  { 
    $kode = $this->getid($id)->ID_JENIS;
    $this->db->set('ID_JENIS', null);
    $this->db->where('ID_JENIS', $kode);
    $this->db->update('barang');
    $this->db->where('KODE_JENIS', $id);
    return $this->db->delete('jenis_barang');
  }

  public function getid($kode)
  {
    return $this->db->from('jenis_barang')->where('KODE_JENIS',$kode)->get()->row();
  }

}
?>
