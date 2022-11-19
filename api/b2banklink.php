<?

/**
 * Функция : Получение ссылки на платежную форму для дальнейшей оплаты покупателем
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
$my_site_id = "__SITE_ID__";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * Входные параметры
 *
 *
 * Параметры корзины заказа
 *
 * Массив корзины заказа обязательный для оплаты в кредит.
 * При этом итоговая сумма в массиве корзины заказа должна совпадать с суммой выставляемого счета.
 * В случае оплата выполняется без использования кредита, заполнять массив корзины не обязательно
 *
 *
 * $mybags = array( array("m_items_name_1"=>"Игровой компьютер ARENA 5348 Ryzen 3 1200/8 ГБ/AMD Radeon RX 550 2 ГБ/Без HDD/120 ГБ SSD/DOS",
 * "m_items_quantity_1" =>1,
 * "m_items_price_1" =>"11890.01",
 * "m_items_articul_1" => "артикул 1123"
 * ),
 * array("m_items_name_2"=>"Игровой компьютер ARENA 8958 Intel Core i3-10100/8 ГБ/NVIDIA GeForce GTX 1050Ti 4 ГБ/Без HDD/М2 120 ГБ SSD/DOS",
 * "m_items_quantity_2" =>1,
 * "m_items_price_2" =>"11470.21",
 * "m_items_articul_2" => "артикул 1122"
 * ),
 * array("m_items_name_3"=>"Игровой компьютер ARENA 8061 Core i3-4170/16 ГБ/AMD Radeon RX 550 2 ГБ/Без HDD/120 ГБ SSD/DOS",
 * "m_items_quantity_3" =>1,
 * "m_items_price_3" =>"30920.27",
 * "m_items_articul_3" => "артикул 1122"
 * ),
 * array("m_items_name_4"=>"Игровой компьютер ARENA 3080 Intel Core i7-10700K/16 ГБ/NVIDIA GeForce RTX 3080 10 ГБ/1000 ГБ/240 ГБ SSD/DOS",
 * "m_items_quantity_4" =>1,
 * "m_items_price_4" =>"52000.21",
 * "m_items_articul_4" => "артикул 1122"
 * )
 * );
 *
 * Параметры запроса для формирования счета
 *
 * $myB2BankAPI->ar_params = array(
 * "m_invoice_number" => "12345", // Номер счета в Вашей базе данных. Не обязательный параметр.
 * "m_invoice_date" => "20-12-2020", // Дата счета для клиента в Вашей базе данных. Не обязательный параметр.
 * "m_invoice_sum" => $my_invoice_sum, // Сумма счета для клиента. Обязательный параметр.
 * "m_invoice_description" => $my_invoice_description, // Описание услуги для клиента. Обязательный параметр.
 * "m_invoice_mail" => $my_invoice_mail, // Адрес электронной почты для получения чека. Обязательный параметр.
 * "m_param1" => "", // Дополнительный параметр 1. Не обязательный параметр
 * "m_param2" => "", // Дополнительный параметр 2. Не обязательный параметр
 * "m_param3" => "", // Дополнительный параметр 3. Не обязательный параметр
 * "m_param4" => "", // Дополнительный параметр 4. Не обязательный параметр
 * "m_param5" => "", // Дополнительный параметр 5. Не обязательный параметр
 * 
 * );
 */

/**
 * Параметры корзины заказа для формирования счета
 */
$myB2BankAPI->ar_bags = array(
	array(
		"m_items_name_1" => "Игровой компьютер ARENA 5348 Ryzen 3 1200/8 ГБ/AMD Radeon RX 550 2 ГБ/Без HDD/120 ГБ SSD/DOS",
		"m_items_quantity_1" => 1,
		"m_items_price_1" => "11890.01",
		"m_items_articul_1" => "артикул 1123"
	),
	array(
		"m_items_name_2" => "Игровой компьютер ARENA 8958 Intel Core i3-10100/8 ГБ/NVIDIA GeForce GTX 1050Ti 4 ГБ/Без HDD/М2 120 ГБ SSD/DOS",
		"m_items_quantity_2" => 1,
		"m_items_price_2" => "11470.21",
		"m_items_articul_2" => "артикул 1122"
	),
	array(
		"m_items_name_3" => "Игровой компьютер ARENA 8061 Core i3-4170/16 ГБ/AMD Radeon RX 550 2 ГБ/Без HDD/120 ГБ SSD/DOS",
		"m_items_quantity_3" => 1,
		"m_items_price_3" => "30920.27",
		"m_items_articul_3" => "артикул 1121"
	),
	array(
		"m_items_name_4" => "Игровой компьютер ARENA 3080 Intel Core i7-10700K/16 ГБ/NVIDIA GeForce RTX 3080 10 ГБ/1000 ГБ/240 ГБ SSD/DOS",
		"m_items_quantity_4" => 1,
		"m_items_price_4" => "32000.21",
		"m_items_articul_4" => "артикул 1123"
	)
);

/**
 * Параметры запроса для формирования счета
 */
$my_invoice_sum = "86280.70";
$my_invoice_description = "Компьютерная техника на сумму 86280.70 руб";
$my_invoice_mail = "my@website.ru";

$myB2BankAPI->ar_params = array(
	"m_invoice_sum" => $my_invoice_sum,
	"m_invoice_description" => $my_invoice_description,
	"m_invoice_mail" => $my_invoice_mail
);

/**
 * Запрос функции
 */
$myB2BankAPI->b2banklink();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
	 */
	print $myB2BankAPI->ar_response->m_url . "<br>";
} else
{

	/**
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>