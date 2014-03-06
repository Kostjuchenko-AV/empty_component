<? // ��������� �������� ���������� ���: http://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2132&LESSON_PATH=3913.4565.2132
CModule::IncludeModule("iblock");

$dbIBlockType = CIBlockType::GetList(
	array("sort" => "asc"),
	array("ACTIVE" => "Y")
);
while ($arIBlockType = $dbIBlockType->Fetch())
{
	if ($arIBlockTypeLang = CIBlockType::GetByIDLang($arIBlockType["ID"], LANGUAGE_ID))
		$arIblockType[$arIBlockType["ID"]] = "[".$arIBlockType["ID"]."] ".$arIBlockTypeLang["NAME"];
}

$arComponentParameters = array(
	/*"��� ������" => array(
		"NAME" => "�������� ������ �� ������� �����"
		"SORT" => "����������",
	)*/
	"GROUPS" => array(
		"SETTINGS" => array(
			"NAME" => GetMessage("SETTINGS_GROUP")
		),
		"PARAMS" => array(
			"NAME" => GetMessage("PARAMS_GROUP")
		),
	),

	/*"��� ���������" => array(
		"PARENT" => "��� ������",  // ���� ��� - �������� ADDITIONAL_SETTINGS
		"NAME" => "�������� ��������� �� ������� �����",

		"TYPE" => "��� �������� ����������, � ������� ����� ��������������� ��������",
			��������� �������� TYPE:
			LIST - ����� �� ������ ��������. ��� ���� LIST ���� VALUES �������� ������ �������� ���������� ����:
				VALUES => array(
				   "ID ��� ���, ����������� � ���������� ����������" => "�������������� ��������",
				),
			STRING - ��������� ���� �����.
			CHECKBOX - ��/���.
			CUSTOM - ��������� ��������� ��������� �������� ����������.

		"REFRESH" => "����������� ��������� ��� ��� ����� ������ (N/Y)",
		"MULTIPLE" => "���������/������������� �������� (N/Y)",
		"VALUES" => "������ �������� ��� ������ (TYPE = LIST)",
		"ADDITIONAL_VALUES" => "���������� ���� ��� ��������, �������� ������� (Y/N)",
		"SIZE" => "����� ����� ��� ������ (���� ����� �� ���������� ������)",
		"DEFAULT" => "�������� �� ���������",
		"COLS" => "������ ���� � ��������",
	),*/
	"PARAMETERS" => array(
		"IBLOCK_TYPE_ID" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("INFOBLOCK_TYPE_PHR"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arIblockType,
			"REFRESH" => "Y"
		),
		"BASKET_PAGE_TEMPLATE" => array(
			"PARENT" => "PARAMS",
			"NAME" => GetMessage("BASKET_LINK_PHR"),
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "/personal/basket.php",
			"COLS" => 25
		),
		"SET_TITLE" => array(),
		"CACHE_TIME" => array(),
		"VARIABLE_ALIASES" => array(
			"IBLOCK_ID" => array(
				"NAME" => GetMessage("CATALOG_ID_VARIABLE_PHR"),
			),
			"SECTION_ID" => array(
				"NAME" => GetMessage("SECTION_ID_VARIABLE_PHR"),
			),
		),
		"SEF_MODE" => array(
			"list" => array(
				"NAME" => GetMessage("CATALOG_LIST_PATH_TEMPLATE_PHR"),
				"DEFAULT" => "index.php",
				"VARIABLES" => array()
			),
			"section1" => array(
				"NAME" => GetMessage("SECTION_LIST_PATH_TEMPLATE_PHR"),
				"DEFAULT" => "#IBLOCK_ID#",
				"VARIABLES" => array("IBLOCK_ID")
			),
			"section2" => array(
				"NAME" => GetMessage("SUB_SECTION_LIST_PATH_TEMPLATE_PHR"),
				"DEFAULT" => "#IBLOCK_ID#/#SECTION_ID#",
				"VARIABLES" => array("IBLOCK_ID", "SECTION_ID")
			),
		),
		"COLOR" => Array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("PARAM_NAME_COLOR_PICKER"),
			"TYPE" => "COLORPICKER",
			"DEFAULT" => 'FFFF00'
		),
	)
);
?>