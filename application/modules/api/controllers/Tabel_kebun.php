<?php

/**

 *

 */



 class tabel_kebun extends MY_Controller{

   //  function getdata($from,$where=null,$limit=9,$offset=0){

   public function __construct()

   {

     parent::__construct();

     //Codeigniter : Write Less Do More

     $this->load->model(array('Dbs'));

   }



   function getdata(){

     header('Content-Type: application/json');
 if(isset($_GET['nama_tanaman'])){

       $nama=$_GET['nama_tanaman'];

       $loadDb=$this->db->query("SELECT * FROM tabel_kebun WHERE nama_tanaman LIKE '%$nama%' ORDER BY nama_tanaman ASC");

       //database yang akan di load

     }else{

       $loadDb=$this->db->query("SELECT * FROM tabel_kebun ORDER BY nama_tanaman ASC");

     }



     // if(isset($_GET['params'])){//params yang akan dicek



       //default fungsi dari : getdata($table,$where=null,$limit=9,$offset=0){

       // $table='pahlawan';

       // $loadDb=$this->Dbs->getdata($table,null,100);//database yang akan di load

       $check=$loadDb->num_rows();

       if($check>0){

         $get=$loadDb->result(); //Uncomment ini untuk contoh

         $data=array(

           'status'=>'success',

           'message'=>'found',

           'total_result'=>$check,

           // 'results'=>"ISI DARI RESULT DATABASE",

           'results'=>$get //Uncomment ini untuk contoh

         );

       }else{

         $data=array(

           'status'=>'success',

           'total_result'=>$check,

           'message'=>'not found'

         );

       }

     // }else{

     //   $data=array(

     //     'status'=>'failed',

     //     'message'=>'parameter is invalid'

     //   );

     // }

     $json=json_encode($data,JSON_PRETTY_PRINT);

     echo $json;

   }



}

 ?>
