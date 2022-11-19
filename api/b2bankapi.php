<?

class B2BankAPIClass
{

	private $m_apiurl = "";

	private $m_hash_id = "";

	private $m_site_id = "";

	var $ar_bags = array();

	var $ar_params = array();

	var $ar_response = array();

	public function b2bankbackreestrinfo()
	{
		$this->__b2bank_query("b2bankbackreestrinfo");
	}

	public function b2bankbackreestrlisting()
	{
		$this->__b2bank_query("b2bankbackreestrlisting");
	}

	public function b2bankreestrinfo()
	{
		$this->__b2bank_query("b2bankreestrinfo");
	}

	public function b2bankreestrlisting()
	{
		$this->__b2bank_query("b2bankreestrlisting");
	}

	public function b2bankinfopayment()
	{
		$this->__b2bank_query("b2bankinfopayment");
	}

	public function b2bankurls()
	{
		$this->__b2bank_query("b2bankurls");
	}

	public function b2banklisting()
	{
		$this->__b2bank_query("b2banklisting");
	}

	public function b2bankrequest()
	{
		$this->__b2bank_query("b2bankrequest");
	}

	public function b2banklink()
	{
		$this->__b2bank_query("b2banklink");
	}

	private function __b2bank_query($func)
	{
		if ($curl = curl_init())
		{
			$this->ar_params["m_hash_id"] = $this->m_hash_id;
			$this->ar_params["m_site_id"] = $this->m_site_id;
			$this->ar_params["func"] = $func;

			foreach (array_keys($this->ar_params) as $key)
				$this->ar_params[$key] = iconv('Windows-1251', 'UTF-8', $this->ar_params[$key]);

			foreach ($this->ar_bags as $key => $row)
				foreach ($row as $key1 => $row1)
					$this->ar_params[$key1] = iconv('Windows-1251', 'UTF-8', $row1);

			curl_setopt($curl, CURLOPT_URL, $this->m_apiurl);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->ar_params));
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json'
			));

			$this->ar_response = json_decode(curl_exec($curl));

			curl_close($curl);
		} else
		{
			throw new HttpException('Can not create connection to ' . $this->m_apiurl . ' with args ' . $this->ar_params, 404);
		}

		array_splice($this->ar_params, 0);
	}

	public function __construct($m_hash_id, $m_site_id)
	{
		$this->m_apiurl = "https://www.b2bank.ru/acquiring/api.php";

		$this->m_hash_id = $m_hash_id;
		$this->m_site_id = $m_site_id;
	}
}

?>