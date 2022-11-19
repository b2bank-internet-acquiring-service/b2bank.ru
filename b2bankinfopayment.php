<?

/**
 * Функция : Получение информации о платеже
 */
include "b2bankapi.php";

/**
 * Секретный ключ клиента HashId.
 * Берется на панели управления в разделе Сайты
 */
$my_hash_id = "__HASH_ID__";

/**
 * Идентификатор сайта клиента SiteID.
 * Берется на панели управления в разделе Сайты.
 * Если установить значение SiteID = 0, то запрос платежа формируется по всем сайтам владельца
 */
$my_site_id = "0";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * Входные параметры
 *
 * Пример оформления массива запроса
 * 
 * $myB2BankAPI->ar_params = array(
 * "m_ipayment" => "159" // Номер платежа, для примера
 * );
 */

/**
 * Для примера
 */
$my_payment = "278";

$myB2BankAPI->ar_params = array(
	"m_ipayment" => $my_payment
);

/**
 * Запрос функции
 */
$myB2BankAPI->b2bankinfopayment();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
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
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>