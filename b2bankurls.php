<?

/**
 * ������� : ��������� ������ ������
 */
include_once "b2bankapi.php";

/**
 * ��������� ���� ������� HashId.
 * ������� �� ������ ���������� � ������� �����
 */
$my_hash_id = "__HASH_ID__";

/**
 * ������������� ����� ������� SiteID.
 * ������� �� ������ ���������� � ������� �����.
 * ���� ���������� �������� SiteID = 0, �� ������������ ������ ���� ������ ���������
 */
$my_site_id = "0";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * ������� ���������
 *
 * ���
 */

$myB2BankAPI->ar_params = array();

/**
 * ������ �������
 */
$myB2BankAPI->b2bankurls();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	foreach ($myB2BankAPI->ar_response->ar_urls as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_urls[$key]->m_iowner_url . "<br>" .
			$myB2BankAPI->ar_response->ar_urls[$key]->m_url . "<br>" .
			$myB2BankAPI->ar_response->ar_urls[$key]->m_url_ok . "<br>" .
			$myB2BankAPI->ar_response->ar_urls[$key]->m_url_false . "<br>" .
			$myB2BankAPI->ar_response->ar_urls[$key]->m_istatus . "<br>=================<br>" ;
	}
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>