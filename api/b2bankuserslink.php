<?

/**
 * Функция : Формирование счетов для группы клиентов
 */
include "b2bankapi.php";

/**
 * Секретный ключ клиента HashId.
 * Берется на панели управления в разделе Сайты
 */
$my_hash_id = "__HASH_ID__";

/**
 * Идентификатор сайта клиента SiteID.
 */
$my_site_id = "182be0c5cdcd5072bb1864cdee4d3d6e";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * Входные параметры
 *
 * Параметры запроса для формирования счета
 *
 * $myB2BankAPI->ar_params = array(
 * "m_invoice_number" => "12345", // Номер счета в Вашей базе данных. Не обязательный параметр.
 * "m_invoice_date" => "20-12-2020", // Дата счета для клиента в Вашей базе данных. Не обязательный параметр.
 * "m_invoice_sum" => $my_invoice_sum, // Сумма счета для клиента. Обязательный параметр.
 * "m_invoice_description" => $my_invoice_description, // Описание услуги для клиента. Обязательный параметр.
 * "m_invoice_iuser_group" => $my_invoice_iuser_group, // Идентификатор группы клиентов.
 * "m_imailing" => $my_imailing, // 0- отправить счет на почту клиенту, 1 - не отправлять счет на почту клиента. Не обязательный параметр.
 * "m_param1" => "", // Дополнительный параметр 1. Не обязательный параметр
 * "m_param2" => "", // Дополнительный параметр 2. Не обязательный параметр
 * "m_param3" => "", // Дополнительный параметр 3. Не обязательный параметр
 * "m_param4" => "", // Дополнительный параметр 4. Не обязательный параметр
 * "m_param5" => "", // Дополнительный параметр 5. Не обязательный параметр
 * );
 */

/**
 * Параметры запроса для формирования счета
 */
$my_invoice_sum = "86280.70";
$my_invoice_description = "Компьютерная техника на сумму 86280.70 руб";
$my_invoice_iuser_group = 8;
$my_imailing = 1;

$myB2BankAPI->ar_params = array(
	"m_invoice_sum" => $my_invoice_sum,
	"m_invoice_description" => $my_invoice_description,
	"m_invoice_iuser_group" => $my_invoice_iuser_group,
	"m_imailing" => $my_imailing
);

/**
 * Запрос функции
 */
$myB2BankAPI->b2bankuserslink();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
	 */
	print $myB2BankAPI->ar_response->m_info . "<br>";
} else
{

	/**
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>