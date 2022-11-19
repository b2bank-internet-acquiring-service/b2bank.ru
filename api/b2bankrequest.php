<?

/**
 * Функция : Получение списка требований Третьих лиц
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
 * "m_date1" => "17-06-2020", // Дата начала периода требований. Обязательный параметр.
 * "m_date2" => "30-06-2020" // Дата окончания периода требований. Обязательный параметр.
 * );
 */

/**
 * Для примера
 */
$my_date1 = "01-09-2022";
$my_date2 = "28-09-2022";

$myB2BankAPI->ar_params = array(
	"m_date1" => $my_date1,
	"m_date2" => $my_date2
);

/**
 * Запрос функции
 */
$myB2BankAPI->b2bankrequest();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
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
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}
?>
