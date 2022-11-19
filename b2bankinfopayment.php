<?

/**
 * ������� : ��������� ���������� � �������
 */
include "b2bankapi.php";

/**
 * ��������� ���� ������� HashId.
 * ������� �� ������ ���������� � ������� �����
 */
$my_hash_id = "__HASH_ID__";

/**
 * ������������� ����� ������� SiteID.
 * ������� �� ������ ���������� � ������� �����.
 * ���� ���������� �������� SiteID = 0, �� ������ ������� ����������� �� ���� ������ ���������
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
 * "m_ipayment" => "159" // ����� �������, ��� �������
 * );
 */

/**
 * ��� �������
 */
$my_payment = "278";

$myB2BankAPI->ar_params = array(
	"m_ipayment" => $my_payment
);

/**
 * ������ �������
 */
$myB2BankAPI->b2bankinfopayment();

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
		$myB2BankAPI->ar_response->ar_payments[$key]->m_ireestr . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_ireestr_record . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_ireestr_date . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_fiscal . "<br>" . 
		$myB2BankAPI->ar_response->ar_payments[$key]->m_ipayment_mode . "<br>" . 
		
		"<br>==================<br>";
	}
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>