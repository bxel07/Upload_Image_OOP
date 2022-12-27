<?php 
    class save {
        public $fileName;
        public $fileTmpName;
        public $fileSize;
        public $fileError;
        public $fileType;
        public $fileExt;
        public $fileActualExt;
        public $allow = array('jpg', 'png', 'jpeg', 'svg', 'pdf'); 


        public function __construct($fileName,$fileTmpName,$fileSize,$fileError, $fileType)
        {
            $this->fileName = $fileName;
            $this->fileTmpName = $fileTmpName;
            $this->fileSize = $fileSize;
            $this->fileError = $fileError;
            $this->fileType = $fileType;
            
            $this->fileExt = explode('.',$this->fileName);
            $this->fileActualExt = strtolower(end($this->fileExt));
        } 

        /* public function __construct($args){
            $this->fileName = $args['file']['name'];
            $this->fileTmpName = $args['file']['tmp_name'];
            $this->fileSize = $args['size'];
            $this->fileError = $args['error'];
            $this->fileType = $args['type'];
        } */

        //melakukan exploding data yang dikirim untuk memisahkan data nama 
        //dengan data ekstensi gambar
     

        //melakukan validasi data

        //membuat function validate 
        public function validate() {

            if (in_array($this->fileActualExt,$this->allow)) {
                if ($this->fileError === 0) {
                  if ($this->fileSize < 10000000) {
                    $fileNameNew = uniqid('', true).".".$this->fileActualExt;
                    $loc = dirname(__FILE__);
                    $bind = str_replace("classes", "",$loc);
                    $act = $bind."upload\'$fileNameNew'";
                    $bind2 = str_replace("'", "", $act);
                    move_uploaded_file($this->fileTmpName, $bind2);
                   
                  } else {
                    echo "Your size is to big!!";
                  }

                } else {
                    echo "error!!";
                }

            } else {
                echo "error!!you cant upload image with this extension";
                var_dump($this->fileExt);
                
            
                
            }
        }
       
    }
?>