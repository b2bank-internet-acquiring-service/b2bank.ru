<?

/**
 * Функция : Получение списка сайтов
 */
include_once "b2bankapi.php";

/**
 * Секретный ключ клиента HashId.
 * Берется на панели управления в разделе Сайты
 */
$my_hash_id = "__HASH_ID__";

/**
 * Идентификатор сайта клиента SiteID.
 * Берется на панели управления в разделе Сайты.
 * Если установить значение SiteID = 0, то возвращается список всех сайтов владельца
 */
$my_site_id = "0";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * Входные параметры
 *
 * Нет
 */

$myB2BankAPI->ar_params = array();

/**
 * Запрос функции
 */
$myB2BankAPI->b2bankurls();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
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
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>