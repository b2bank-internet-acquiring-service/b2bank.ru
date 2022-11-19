<?

/**
 * ������� : ������������ ������ ��� ������ ��������
 */
include "b2bankapi.php";

/**
 * ��������� ���� ������� HashId.
 * ������� �� ������ ���������� � ������� �����
 */
$my_hash_id = "__HASH_ID__";

/**
 * ������������� ����� ������� SiteID.
 */
$my_site_id = "182be0c5cdcd5072bb1864cdee4d3d6e";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * ������� ���������
 *
 * ��������� ������� ��� ������������ �����
 *
 * $myB2BankAPI->ar_params = array(
 * "m_invoice_number" => "12345", // ����� ����� � ����� ���� ������. �� ������������ ��������.
 * "m_invoice_date" => "20-12-2020", // ���� ����� ��� ������� � ����� ���� ������. �� ������������ ��������.
 * "m_invoice_sum" => $my_invoice_sum, // ����� ����� ��� �������. ������������ ��������.
 * "m_invoice_description" => $my_invoice_description, // �������� ������ ��� �������. ������������ ��������.
 * "m_invoice_iuser_group" => $my_invoice_iuser_group, // ������������� ������ ��������.
 * "m_imailing" => $my_imailing, // 0- ��������� ���� �� ����� �������, 1 - �� ���������� ���� �� ����� �������. �� ������������ ��������.
 * "m_param1" => "", // �������������� �������� 1. �� ������������ ��������
 * "m_param2" => "", // �������������� �������� 2. �� ������������ ��������
 * "m_param3" => "", // �������������� �������� 3. �� ������������ ��������
 * "m_param4" => "", // �������������� �������� 4. �� ������������ ��������
 * "m_param5" => "", // �������������� �������� 5. �� ������������ ��������
 * );
 */

/**
 * ��������� ������� ��� ������������ �����
 */
$my_invoice_sum = "86280.70";
$my_invoice_description = "������������ ������� �� ����� 86280.70 ���";
$my_invoice_iuser_group = 8;
$my_imailing = 1;

$myB2BankAPI->ar_params = array(
	"m_invoice_sum" => $my_invoice_sum,
	"m_invoice_description" => $my_invoice_description,
	"m_invoice_iuser_group" => $my_invoice_iuser_group,
	"m_imailing" => $my_imailing
);

/**
 * ������ �������
 */
$myB2BankAPI->b2bankuserslink();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	print $myB2BankAPI->ar_response->m_info . "<br>";
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>