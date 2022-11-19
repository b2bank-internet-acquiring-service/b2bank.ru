<?

/**
 * ������� : ��������� ������ �������� �� ������
 */
include "b2bankapi.php";

/**
 * ��������� ���� ������� HashId.
 * ������� �� ������ ���������� � ������� �����
 */
$my_hash_id = "HASH_ID";


/**
 * ������������� ����� ������� SiteID.
 * ������� �� ������ ���������� � ������� �����.
 * ���� ���������� �������� SiteID = 0, �� ������ �������� ����������� �� ���� ������ ���������
 */
$my_site_id = "0";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * ������� ���������
 * 
 * ������ ���������� ������� �������
 *
 * $myB2BankAPI->ar_params = array(
 * "m_date1" => "20-12-2020", // ���� ������� ��������. ������������ ��������. 
 * "m_date2" => "22-12-2020" 	// ���� ��������� ��������. ������������ ��������. 
 * );
 */

/**
 * ��� �������
 */
$my_date1 = "12-07-2022";
$my_date2 = "18-07-2022";

$myB2BankAPI->ar_params = array(
	"m_date1" => $my_date1,
	"m_date2" => $my_date2
);

/**
 * ������ �������
 */
$myB2BankAPI->b2banklisting();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	foreach ($myB2BankAPI->ar_response->ar_payments as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_payments[$key]->m_ipayment . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_iowner_url . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_idate . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_idate_payment . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_istatus . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_date . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_sum . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_number . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_description . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_param1 . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_param2 . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_param3 . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_param4 . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_param5 . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_client . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_comission . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_invoice_percent . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_fiscal . "<br>".
		$myB2BankAPI->ar_response->ar_payments[$key]->m_ipayment_mode . "====<br>".
		
		"==================<br>";
	}
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>