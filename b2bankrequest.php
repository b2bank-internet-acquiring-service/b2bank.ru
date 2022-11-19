<?

/**
 * ������� : ��������� ������ ���������� ������� ���
 */
include "b2bankapi.php";

/**
 * ��������� ���� ������� HashId.
 * ������� �� ������ ���������� � ������� �����
 */
$my_hash_id = "HASH_ID";

/**
 * ������������� ����� ������� SiteID.
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
 * "m_date1" => "17-06-2020", // ���� ������ ������� ����������. ������������ ��������.
 * "m_date2" => "30-06-2020" // ���� ��������� ������� ����������. ������������ ��������.
 * );
 */

/**
 * ��� �������
 */
$my_date1 = "12-06-2022";
$my_date2 = "30-06-2022";

$myB2BankAPI->ar_params = array(
	"m_date1" => $my_date1,
	"m_date2" => $my_date2
);

/**
 * ������ �������
 */
$myB2BankAPI->b2bankrequest();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	foreach ($myB2BankAPI->ar_response->ar_request as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_request[$key]->m_irequest . "<br>" . 
			$myB2BankAPI->ar_response->ar_request[$key]->m_idate . "<br>" .  
			$myB2BankAPI->ar_response->ar_request[$key]->m_sum . "<br>" . 
			$myB2BankAPI->ar_response->ar_request[$key]->m_description . "<br>" . 
			$myB2BankAPI->ar_response->ar_request[$key]->m_istatus . "<br>" . 
			$myB2BankAPI->ar_response->ar_request[$key]->m_date_payment . "<br>" . 
			$myB2BankAPI->ar_response->ar_request[$key]->m_date_stop . "<br>" . "<br>==================<br>";
	}
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}
?>