<?

/**
 * Функция : Получение списка реестров возврата средств на карту плательщика за период
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
 * Если установить значение SiteID = 0, то список платежей формируется по всем сайтам владельца
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
 * "m_date1" => "20-12-2020", // Дата периода платежей. Обязательный параметр.
 * "m_date2" => "22-12-2020" // Дата окончания платежей. Обязательный параметр.
 * );
 */

/**
 * Для примера
 */
$my_date1 = "02-09-2022";
$my_date2 = "28-09-2022";

$myB2BankAPI->ar_params = array(
	"m_date1" => $my_date1,
	"m_date2" => $my_date2
);

/**
 * Запрос функции
 */
$myB2BankAPI->b2bankbackreestrlisting();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
	 */
	foreach ($myB2BankAPI->ar_response->ar_reestr as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr_date . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_iowner_url . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_isum . "<br>" . "<br>==================<br>";
	}
	
	foreach ($myB2BankAPI->ar_response->ar_reestr_test as $key => $row)
	{
		print $myB2BankAPI->ar_response->ar_reestr_test[$key]->m_ireestr . "<br>" .
			$myB2BankAPI->ar_response->ar_reestr_test[$key]->m_ireestr_date . "<br>" .
			$myB2BankAPI->ar_response->ar_reestr_test[$key]->m_iowner_url . "<br>" .
			$myB2BankAPI->ar_response->ar_reestr_test[$key]->m_isum . "<br>" . "<br>======+++++++++++<br>";
	}
} else
{

	/**
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>