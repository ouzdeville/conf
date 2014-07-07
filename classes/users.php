<?php
 require_once("Database.php");
class User {
        private static $base;//=new Database();     
		public $IDPROFIL=0;
		public $IDUSERS=0;
		public $IDSOCIETE=0;		
		public $PRENOM;		
		public $NOM;		
		public $LOGIN;
		public $PASSWORD;		
		public $EMAIL;		
		public $TEL;		
	public function __construct($IDUSERS,$IDPROFIL,$IDSOCIETE,$PRENOM,$NOM,$LOGIN,$PASSWORD,$EMAIL,$TEL) {
	    
	    $this->IDUSERS=$IDUSERS;
	    $this->IDPROFIL=$IDPROFIL;
		$this->IDSOCIETE=$IDSOCIETE;
	    $this->PRENOM=$PRENOM;
	    $this->NOM=$NOM;
	    $this->LOGIN=$LOGIN;
		$this->PASSWORD=$PASSWORD;		
		$this->EMAIL=$EMAIL;		
		$this->TEL=$TEL;
		}
	function findByValue(){
	self::$base = new Database(); //instantiate this class to open data base
	  $string1 ="select * from `users` ";
	  $string="";
	  if($this->IDUSERS!=0)$string =$string." AND `IDUSERS`=".$this->IDUSERS;
	  if($this->IDPROFIL!=0)$string =$string." AND `IDPROFIL`=".$this->IDPROFIL;
	  if($this->IDSOCIETE!=0)$string =$string." AND `IDSOCIETE`=".$this->IDSOCIETE;
	  if($this->PRENOM!="")$string =$string." AND `PRENOM`='".$this->PRENOM."'";
	  if($this->NOM!="")$string =$string." AND `NOM`='".$this->NOM."'";
	  if($this->LOGIN!="")$string =$string." AND `LOGIN`='".$this->LOGIN."'";
	  if($this->PASSWORD!="")$string =$string." AND `PASSWORD`='".$this->PASSWORD."'";
	  if($this->EMAIL!="")$string =$string." AND `EMAIL`='".$this->EMAIL."'";
	  if($this->TEL!="")$string =$string." AND `TEL`='".$this->TEL."'";
	  $string1=$string1.preg_replace('/AND/', 'WHERE', $string, 1);
	  return self::populate(self::$base->query($string1));
	}
	static function findAll(){
	  self::$base=new Database();
	  return self::populate(self::$base->query("select * from `users`"));
	}
	static function populate($resutset){
	    $user=array();
		$i=0;
	    foreach ($resutset as $row) {
				$user[$i]=new User($row['IDUSERS'],$row['IDPROFIL'],$row['IDSOCIETE'],$row['PRENOM'],$row['NOM'],$row['LOGIN'],$row['PASSWORD'],$row['EMAIL'],$row['TEL']);		
			$i++;				
        }
		self::$base=null;
		return $user;
	}
	static function findBykey($key){
	  self::$base=new Database();
	  $tab=self::populate(self::$base->query("select * from `users` WHERE `IDUSERS`=".$key));
	  return $tab[0];
		
	}
	public function delete(){
	self::$base = new Database(); //instantiate this class to open data base
	self::$base->delete('users', 'IDUSERS', $this->IDUSERS);
	self::$base =null;
	}
	public function update(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
				'IDUSERS'=>$this->IDUSERS,
				'IDPROFIL'=>$this->IDPROFIL,
				'IDSOCIETE'=>$this->IDSOCIETE,
				'PRENOM'=>$this->PRENOM,
				'NOM'=>$this->NOM,
				'LOGIN'=>$this->LOGIN,
				'PASSWORD'=>$this->PASSWORD,		
				'EMAIL'=>$this->EMAIL,		
				'TEL'=>$this->TEL,
				);
		self::$base->update('users', $values, 'IDUSERS', $this->IDUSERS);
		self::$base = null;
	}
	
}

?>