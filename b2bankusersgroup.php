<?

/**
 * ������� : ��������� ������ ��������������� ����� ��������
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
$myB2BankAPI->b2bankusersgroup();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	foreach ($myB2BankAPI->ar_response->ar_users_group as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_users_group[$key]->m_iuser_group . "<br>" .
			$myB2BankAPI->ar_response->ar_users_group[$key]->m_user_group . "<br>=================<br>" ;
	}
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>