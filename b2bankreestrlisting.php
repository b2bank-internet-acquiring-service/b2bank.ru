<?

/**
 * ������� : ��������� ������ �������� ���������� �� ������
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
 * "m_date2" => "22-12-2020" // ���� ��������� ��������. ������������ ��������.
 * );
 */

/**
 * ��� �������
 */
$my_date1 = "25-06-2022";
$my_date2 = "22-07-2022";

$myB2BankAPI->ar_params = array(
	"m_date1" => $my_date1,
	"m_date2" => $my_date2
);

/**
 * ������ �������
 */
$myB2BankAPI->b2bankreestrlisting();

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
		print $myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr . "<br>" . $myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr_date . "<br>" . $myB2BankAPI->ar_response->ar_reestr[$key]->m_iowner_url . "<br>" . $myB2BankAPI->ar_response->ar_reestr[$key]->m_invoice_sum . "<br>" . $myB2BankAPI->ar_response->ar_reestr[$key]->m_invoice_client . "<br>" . $myB2BankAPI->ar_response->ar_reestr[$key]->m_invoice_comission . "<br>" . "<br>==================<br>";
	}

	foreach ($myB2BankAPI->ar_response->ar_reestr_test as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_ireestr . "<br>" . $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_ireestr_date . "<br>" . $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_iowner_url . "<br>" . $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_invoice_sum . "<br>" . $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_invoice_client . "<br>" . $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_invoice_comission . "<br>" . "<br>==================<br>";
	}
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>