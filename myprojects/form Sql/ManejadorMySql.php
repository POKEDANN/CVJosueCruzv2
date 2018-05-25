<?php
	class ManejadorMySql{
		private $host= "localhost";
		private $user= "root";
		private $pass= "";
		private $bd= "depilacion_clientes";
		private $port= "3306";
		private $mysqli;

		public function abrirConexion(){
			$this->mysqli= new mysqli($this->host, $this->user, $this->pass, $this->bd, $this->port);
			if(mysqli_connect_errno()){
				return "Falló la conexión: ". mysqli_connect_error();
			}
			return true;
		}

		private function realizarConsulta($sql){
			$this->mysqli->set_charset("utf8");
			return $this->mysqli->query($sql);
		}

		public function saveData($sql) {
			$done = true;
			$result = $this->realizarConsulta($sql);

			if(!$result) {
				$done = "Error: " . $this->mysqli->error;
			}

			return $done;
		}

		public function getarrayOf($sql) {
			$data = [];
			$result = $this->realizarConsulta($sql);

			if($result) {
		    while ($row = $result->fetch_object()){
		        $data[] = $row;
		    }
				$result->close();
			}

			return $data;
		}

		public function cerrarConexion(){
			$this->mysqli->close();
		}
	}
?>
