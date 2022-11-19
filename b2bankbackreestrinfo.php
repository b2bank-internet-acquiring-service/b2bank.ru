<?

/**
 * ������� : ��������� ����������� ������� ����������
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
 * "m_ireestr" => "8" // ����� ������� ����������. ������������ ��������.
 * );
 */

/**
 * ��� �������
 */
$my_ireestr = "70";

$myB2BankAPI->ar_params = array(
	"m_ireestr" => $my_ireestr
);

/**
 * ������ �������
 */
$myB2BankAPI->b2bankbackreestrinfo();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	foreach ($myB2BankAPI->ar_response->ar_reestr as $key => $row)
	{
		print 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr_record . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr_date . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_iowner_url . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_idate_payment . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_isum . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_description . "<br>" . 	
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ipayment . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ipayment_date . "<br>" . 			
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_fiscal . "<br>".
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ipayment_mode . "<br>".
			
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