<?

/**
 * ������� : ��������� ������ �� ��������� ����� ��� ���������� ������ �����������
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
$my_site_id = "__SITE_ID__";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * ������� ���������
 *
 *
 * ��������� ������� ������
 *
 * ������ ������� ������ ������������ ��� ������ � ������.
 * ��� ���� �������� ����� � ������� ������� ������ ������ ��������� � ������ ������������� �����.
 * � ������ ������ ����������� ��� ������������� �������, ��������� ������ ������� �� �����������
 *
 *
 * $mybags = array( array("m_items_name_1"=>"������� ��������� ARENA 5348 Ryzen 3 1200/8 ��/AMD Radeon RX 550 2 ��/��� HDD/120 �� SSD/DOS",
 * "m_items_quantity_1" =>1,
 * "m_items_price_1" =>"11890.01",
 * "m_items_articul_1" => "������� 1123"
 * ),
 * array("m_items_name_2"=>"������� ��������� ARENA 8958 Intel Core i3-10100/8 ��/NVIDIA GeForce GTX 1050Ti 4 ��/��� HDD/�2 120 �� SSD/DOS",
 * "m_items_quantity_2" =>1,
 * "m_items_price_2" =>"11470.21",
 * "m_items_articul_2" => "������� 1122"
 * ),
 * array("m_items_name_3"=>"������� ��������� ARENA 8061 Core i3-4170/16 ��/AMD Radeon RX 550 2 ��/��� HDD/120 �� SSD/DOS",
 * "m_items_quantity_3" =>1,
 * "m_items_price_3" =>"30920.27",
 * "m_items_articul_3" => "������� 1122"
 * ),
 * array("m_items_name_4"=>"������� ��������� ARENA 3080 Intel Core i7-10700K/16 ��/NVIDIA GeForce RTX 3080 10 ��/1000 ��/240 �� SSD/DOS",
 * "m_items_quantity_4" =>1,
 * "m_items_price_4" =>"52000.21",
 * "m_items_articul_4" => "������� 1122"
 * )
 * );
 *
 * ��������� ������� ��� ������������ �����
 *
 * $myB2BankAPI->ar_params = array(
 * "m_invoice_number" => "12345", // ����� ����� � ����� ���� ������. �� ������������ ��������.
 * "m_invoice_date" => "20-12-2020", // ���� ����� ��� ������� � ����� ���� ������. �� ������������ ��������.
 * "m_invoice_sum" => $my_invoice_sum, // ����� ����� ��� �������. ������������ ��������.
 * "m_invoice_description" => $my_invoice_description, // �������� ������ ��� �������. ������������ ��������.
 * "m_invoice_mail" => $my_invoice_mail, // ����� ����������� ����� ��� ��������� ����. ������������ ��������.
 * "m_param1" => "", // �������������� �������� 1. �� ������������ ��������
 * "m_param2" => "", // �������������� �������� 2. �� ������������ ��������
 * "m_param3" => "", // �������������� �������� 3. �� ������������ ��������
 * "m_param4" => "", // �������������� �������� 4. �� ������������ ��������
 * "m_param5" => "", // �������������� �������� 5. �� ������������ ��������
 * 
 * );
 */

/**
 * ��������� ������� ������ ��� ������������ �����
 */
$myB2BankAPI->ar_bags = array(
	array(
		"m_items_name_1" => "������� ��������� ARENA 5348 Ryzen 3 1200/8 ��/AMD Radeon RX 550 2 ��/��� HDD/120 �� SSD/DOS",
		"m_items_quantity_1" => 1,
		"m_items_price_1" => "11890.01",
		"m_items_articul_1" => "������� 1123"
	),
	array(
		"m_items_name_2" => "������� ��������� ARENA 8958 Intel Core i3-10100/8 ��/NVIDIA GeForce GTX 1050Ti 4 ��/��� HDD/�2 120 �� SSD/DOS",
		"m_items_quantity_2" => 1,
		"m_items_price_2" => "11470.21",
		"m_items_articul_2" => "������� 1122"
	),
	array(
		"m_items_name_3" => "������� ��������� ARENA 8061 Core i3-4170/16 ��/AMD Radeon RX 550 2 ��/��� HDD/120 �� SSD/DOS",
		"m_items_quantity_3" => 1,
		"m_items_price_3" => "30920.27",
		"m_items_articul_3" => "������� 1121"
	),
	array(
		"m_items_name_4" => "������� ��������� ARENA 3080 Intel Core i7-10700K/16 ��/NVIDIA GeForce RTX 3080 10 ��/1000 ��/240 �� SSD/DOS",
		"m_items_quantity_4" => 1,
		"m_items_price_4" => "32000.21",
		"m_items_articul_4" => "������� 1123"
	)
);

/**
 * ��������� ������� ��� ������������ �����
 */
$my_invoice_sum = "86280.70";
$my_invoice_description = "������������ ������� �� ����� 86280.70 ���";
$my_invoice_mail = "my@website.ru";

$myB2BankAPI->ar_params = array(
	"m_invoice_sum" => $my_invoice_sum,
	"m_invoice_description" => $my_invoice_description,
	"m_invoice_mail" => $my_invoice_mail
);

/**
 * ������ �������
 */
$myB2BankAPI->b2banklink();

/**
 * ��������� ������ �������
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * ��� �������� ���������� ����������� ��������� ������ ������ �������
	 */
	print $myB2BankAPI->ar_response->m_url . "<br>";
} else
{

	/**
	 * ��� ��������� ���������� ������� ������������ ��� ������ � ��������� �������� ���� ������
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>