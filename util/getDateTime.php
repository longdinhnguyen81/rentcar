
<?php
	class getDateTime{
		private $datefrom;
		private $dateto;
		private $hcost;
		private $dcost;
		private $renttime;
		private $rentreturn;

		public function __construct($datefrom, $dateto, $hcost, $dcost, $renttime, $rentreturn){
			$this->datefrom 	= $datefrom;
			$this->dateto 		= $dateto;
			$this->hcost 		= $hcost;
			$this->dcost 		= $dcost;
			$this->renttime 	= $renttime;
			$this->rentreturn 	= $rentreturn;
		}
		public function numDate(){
			$datefrom1   = date("Y-m-d", strtotime($this->datefrom));
			$dateto1     = date("Y-m-d", strtotime($this->dateto));

			$datepart1  = explode('-', $datefrom1);//loai bo ki tu dac biet nhu '-' hoac '/'
			$datepart2  = explode('-', $dateto1);

			$start_date = gregoriantojd($datepart1[1], $datepart1[2], $datepart1[0]);//($thang,$ngay,$nam)
			$end_date   = gregoriantojd($datepart2[1], $datepart2[2], $datepart2[0]);
			return $end_date - $start_date;
		}
		public function getCost(){
			if((($this->rentreturn - $this->renttime) < 0) && ($this->numDate() != 0)){
				$date   = $this->numDate() - 1;
				$time   = $this->rentreturn - $this->renttime + 24;
			}else{
				$time   = $this->rentreturn - $this->renttime;
			}
			$costh  = $this->hcost * $time;
			$costd  = $this->numDate() * $this->dcost;
			return $costh + $costd;
		}
	}
?>