<?php
/**
 * Internationalisation file for MappingStatus extension.
 *
 ##################################################################################
 #
 # Copyright 2008 Harry Wood, Jens Frank, Grant Slater, Raymond Spekking
 #                and the autors of betawiki
 #
 # This program is free software; you can redistribute it and/or modify
 # it under the terms of the GNU General Public License as published by
 # the Free Software Foundation; either version 2 of the License, or
 # (at your option) any later version.
 #
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 # GNU General Public License for more details.
 #
 # You should have received a copy of the GNU General Public License
 # along with this program; if not, write to the Free Software
 # Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 #
 * @ingroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'mappingstatus_desc' => "Allows the use of the <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> tag to display an OpenLayers slippy map. Maps are from [http://openstreetmap.org openstreetmap.org]",
	'mappingstatus_latmissing' => "Missing lat value (for the latitude).",
	'mappingstatus_lonmissing' => "Missing lon value (for the longitude).",
	'mappingstatus_zoommissing' => "Missing z value (for the zoom level).",
	'mappingstatus_longdepreciated' => "Please use 'lon' instead of 'long' (parameter was renamed).",
	'mappingstatus_widthnan' => "width (w) value '%1' is not a valid integer",
	'mappingstatus_heightnan' => "height (h) value '%1' is not a valid integer",
	'mappingstatus_zoomnan' => "zoom (z) value '%1' is not a valid integer",
	'mappingstatus_latnan' => "latitude (lat) value '%1' is not a valid number",
	'mappingstatus_lonnan' => "longitude (lon) value '%1' is not a valid number",
	'mappingstatus_widthbig' => "width (w) value cannot be greater than 1000",
	'mappingstatus_widthsmall' => "width (w) value cannot be less than 100",
	'mappingstatus_heightbig' => "height (h) value cannot be greater than 1000",
	'mappingstatus_heightsmall' => "height (h) value cannot be less than 100",
	'mappingstatus_latbig' => "latitude (lat) value cannot be greater than 90",
	'mappingstatus_latsmall' => "latitude (lat) value cannot be less than -90",
	'mappingstatus_lonbig' => "longitude (lon) value cannot be greater than 180",
	'mappingstatus_lonsmall' => "longitude (lon) value cannot be less than -180",
	'mappingstatus_zoomsmall' => "zoom (z) value cannot be less than zero",
	'mappingstatus_zoom18' => "zoom (z) value cannot be greater than 17. Note that this MediaWiki extension hooks into the OpenStreetMap 'osmarender' layer which does not go beyond zoom level 17. The Mapnik layer available on openstreetmap.org, goes up to zoom level 18",
	'mappingstatus_zoombig' => "zoom (z) value cannot be greater than 17.",
	'mappingstatus_invalidlayer' => "Invalid 'layer' value '%1'",
	'mappingstatus_maperror' => "Map error:",
	'mappingstatus_osmlink' => 'http://www.openstreetmap.org/?lat=%1&lon=%2&zoom=%3', # do not translate or duplicate this message to other languages
	'mappingstatus_osmtext' => 'See this map on OpenStreetMap.org',
	'mappingstatus_code'    => 'Wikicode for this map view:',
	'mappingstatus_button_code' => 'Get wikicode',
	'mappingstatus_resetview' => 'Reset view',
	'mappingstatus_license' => 'OpenStreetMap - CC-BY-SA-2.0', # do not translate or duplicate this message to other languages
);

/** Message documentation (Message documentation)
 * @author Purodha
 */
$messages['qqq'] = array(
	'mappingstatus_desc' => 'Short description of the Slippymap extension, shown in [[Special:Version]]. Do not translate or change links.',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'mappingstatus_desc' => 'يسمح باستخدام وسم <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> لعرض خريطة OpenLayers لزقة. الخرائط من [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'قيمة lat مفقودة (للارتفاع).',
	'mappingstatus_lonmissing' => 'قيمة lon مفقودة (لخط الطول).',
	'mappingstatus_zoommissing' => 'قيمة z مفقودة (لمستوى التقريب).',
	'mappingstatus_longdepreciated' => "من فضلك استخدم 'lon' بدلا من 'long' (المحدد تمت إعادة تسميته).",
	'mappingstatus_widthnan' => "قيمة العرض (w) '%1' ليست رقما صحيحا",
	'mappingstatus_heightnan' => "قيمة الارتفاع (h) '%1' ليست رقما صحيحا",
	'mappingstatus_zoomnan' => "قيمة التقريب (z) '%1' ليست رقما صحيحا",
	'mappingstatus_latnan' => "قيمة خط العرض (lat) '%1' ليست رقما صحيحا",
	'mappingstatus_lonnan' => "قيمة خط الطول (lon) '%1' ليست رقما صحيحا",
	'mappingstatus_widthbig' => 'قيمة العرض (w) لا يمكن أن تكون أكبر من 1000',
	'mappingstatus_widthsmall' => 'قيمة العرض (w) لا يمكن أن تكون أصغر من 100',
	'mappingstatus_heightbig' => 'قيمة الارتفاع (h) لا يمكن أن تكون أكبر من 1000',
	'mappingstatus_heightsmall' => 'قيمة الارتفاع (h) لا يمكن أن تكون أقل من 100',
	'mappingstatus_latbig' => 'قيمة دائرة العرض (lat) لا يمكن أن تكون أكبر من 90',
	'mappingstatus_latsmall' => 'قيمة دائرة العرض (lat) لا يمكن أن تكون أقل من -90',
	'mappingstatus_lonbig' => 'قيمة خط الطول (lon) لا يمكن أن تكون أكبر من 180',
	'mappingstatus_lonsmall' => 'قيمة خط الطول (lon) لا يمكن أن تكون أقل من -180',
	'mappingstatus_zoomsmall' => 'قيمة التقريب (z) لا يمكن أن تكون أقل من صفر',
	'mappingstatus_zoom18' => "قيمة التقريب (z) لا يمكن أن تكون أكبر من 17. لاحظ أن امتداد الميدياويكي هذا يخطف إلى طبقة OpenStreetMap 'osmarender' والتي لا تذهب أبعد من مستوى التقريب 17. طبقة Mapnik المتوفرة في openstreetmap.org، تذهب إلى مستوى تقريب 18",
	'mappingstatus_zoombig' => 'قيمة التقريب (z) لا يمكن أن تكون أكبر من 17.',
	'mappingstatus_invalidlayer' => "قيمة 'طبقة' غير صحيحة '%1'",
	'mappingstatus_maperror' => 'خطأ في الخريطة:',
	'mappingstatus_osmtext' => 'انظر هذه الخريطة في OpenStreetMap.org',
	'mappingstatus_code' => 'كود الويكي لعرض الخريطة هذا:',
	'mappingstatus_button_code' => 'الحصول على كود ويكي',
	'mappingstatus_resetview' => 'إعادة ضبط الرؤية',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'mappingstatus_desc' => 'يسمح باستخدام وسم <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> لعرض خريطة OpenLayers لزقة. الخرائط من [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'قيمة lat مفقودة (للارتفاع).',
	'mappingstatus_lonmissing' => 'قيمة lon مفقودة (لخط الطول).',
	'mappingstatus_zoommissing' => 'قيمة z مفقودة (لمستوى التقريب).',
	'mappingstatus_longdepreciated' => "من فضلك استخدم 'lon' بدلا من 'long' (المحدد تمت إعادة تسميته).",
	'mappingstatus_widthnan' => "قيمة العرض (w) '%1' ليست رقما صحيحا",
	'mappingstatus_heightnan' => "قيمة الارتفاع (h) '%1' ليست رقما صحيحا",
	'mappingstatus_zoomnan' => "قيمة التقريب (z) '%1' ليست رقما صحيحا",
	'mappingstatus_latnan' => "قيمة خط العرض (lat) '%1' ليست رقما صحيحا",
	'mappingstatus_lonnan' => "قيمة خط الطول (lon) '%1' ليست رقما صحيحا",
	'mappingstatus_widthbig' => 'قيمة العرض (w) لا يمكن أن تكون أكبر من 1000',
	'mappingstatus_widthsmall' => 'قيمة العرض (w) لا يمكن أن تكون أصغر من 100',
	'mappingstatus_heightbig' => 'قيمة الارتفاع (h) لا يمكن أن تكون أكبر من 1000',
	'mappingstatus_heightsmall' => 'قيمة الارتفاع (h) لا يمكن أن تكون أقل من 100',
	'mappingstatus_latbig' => 'قيمة دائرة العرض (lat) لا يمكن أن تكون أكبر من 90',
	'mappingstatus_latsmall' => 'قيمة دائرة العرض (lat) لا يمكن أن تكون أقل من -90',
	'mappingstatus_lonbig' => 'قيمة خط الطول (lon) لا يمكن أن تكون أكبر من 180',
	'mappingstatus_lonsmall' => 'قيمة خط الطول (lon) لا يمكن أن تكون أقل من -180',
	'mappingstatus_zoomsmall' => 'قيمة التقريب (z) لا يمكن أن تكون أقل من صفر',
	'mappingstatus_zoom18' => "قيمة التقريب (z) لا يمكن أن تكون أكبر من 17. لاحظ أن امتداد الميدياويكى هذا يخطف إلى طبقة OpenStreetMap 'osmarender' والتى لا تذهب أبعد من مستوى التقريب 17. طبقة Mapnik المتوفرة فى openstreetmap.org، تذهب إلى مستوى تقريب 18",
	'mappingstatus_zoombig' => 'قيمة التقريب (z) لا يمكن أن تكون أكبر من 17.',
	'mappingstatus_invalidlayer' => "قيمة 'طبقة' غير صحيحة '%1'",
	'mappingstatus_maperror' => 'خطأ فى الخريطة:',
	'mappingstatus_osmtext' => 'انظر هذه الخريطة فى OpenStreetMap.org',
	'mappingstatus_code' => 'كود الويكى لعرض الخريطة هذا:',
	'mappingstatus_button_code' => 'الحصول على كود ويكي',
	'mappingstatus_resetview' => 'إعادة ضبط الرؤية',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'mappingstatus_desc' => 'Дазваляе карыстацца тэгам <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> для адлюстраваньня хуткай мапы OpenLayer. Выкарыстоўваюцца мапы [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Няма значэньня парамэтру lat (для шыраты).',
	'mappingstatus_lonmissing' => 'Няма значэньня парамэтру lon (для даўгаты).',
	'mappingstatus_zoommissing' => 'Няма значэньня парамэтру z (для маштабу).',
	'mappingstatus_longdepreciated' => "Калі ласка, выкарыстоўвайце 'lon' замест 'long' (парамэтар быў перайменаваны).",
	'mappingstatus_widthnan' => "значэньне шырыні (w) '%1' ня ёсьць цэлы лік",
	'mappingstatus_heightnan' => "значэньне вышыні (h) '%1' ня ёсьць цэлы лік",
	'mappingstatus_zoomnan' => "значэньне маштабу (z) '%1' ня ёсьць цэлы лік",
	'mappingstatus_latnan' => "значэньне шыраты (lat) '%1' ня ёсьць лік",
	'mappingstatus_lonnan' => "значэньне даўгаты (lon) '%1' ня ёсьць лік",
	'mappingstatus_widthbig' => 'значэньне шырыні (w) ня можа быць больш за 1000',
	'mappingstatus_widthsmall' => 'значэньне шырыні (w) ня можа быць менш за 100',
	'mappingstatus_heightbig' => 'значэньне вышыні (h) ня можа быць больш за 1000',
	'mappingstatus_heightsmall' => 'значэньне вышыні (h) ня можа быць менш за 100',
	'mappingstatus_latbig' => 'значэньне шыраты (lat) ня можа быць больш за 90',
	'mappingstatus_latsmall' => 'значэньне шыраты (lat) ня можа быць менш за -90',
	'mappingstatus_lonbig' => 'значэньне даўгаты (lon) ня можа быць больш за 180',
	'mappingstatus_lonsmall' => 'значэньне даўгаты (lon) ня можа быць менш за -180',
	'mappingstatus_zoomsmall' => 'значэньне маштабу (z) ня можа быць менш за нуль',
	'mappingstatus_zoom18' => "значэньне маштабу (z) ня можа быць больш за 17. Заўважце, што  гэта пашырэньне MediaWiki выкарыстоўвае слой OpenStreetMap 'osmarender', які не падтрымлівае маштабы больш за 17. Слой Mapnik, які знаходзіцца на openstreetmap.org, падтрымлівае маштаб 18",
	'mappingstatus_zoombig' => 'значэньне маштабу (z) ня можа быць больш за 17',
	'mappingstatus_invalidlayer' => "Няслушнае значэньне '%1' парамэтру 'layer'",
	'mappingstatus_maperror' => 'Памылка мапы:',
	'mappingstatus_osmtext' => 'Глядзіце гэту мапу на OpenStreetMap.org',
	'mappingstatus_code' => 'Вікікод для прагляду гэтай мапы:',
	'mappingstatus_button_code' => 'Атрымаць вікікод',
	'mappingstatus_resetview' => 'Першапачатковы выгляд',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'mappingstatus_desc' => 'Позволява използването на етикета <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> за показване на OpenLayers slippy карти. Картите са от [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_zoommissing' => 'Липсваща стойност z (за степен на приближаване).',
	'mappingstatus_zoomsmall' => 'стойността за приближаване (z) не може да бъде отрицателно число',
	'mappingstatus_zoombig' => 'стойността за приближаване (z) не може да бъде по-голяма от 17.',
	'mappingstatus_invalidlayer' => "Невалидна стойност на 'слоя' '%1'",
	'mappingstatus_maperror' => 'Грешка в картата:',
	'mappingstatus_osmtext' => 'Преглеждане на картата в OpenStreetMap.org',
	'mappingstatus_code' => 'Уикикод за тази карта:',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Mormegil
 */
$messages['cs'] = array(
	'mappingstatus_desc' => 'Umožňuje použití tagu <code><nowiki>&lt;mappingstatus&gt;</nowiki></code> pro zobrazení posuvné mapy OpenLayers. Mapy pocházejí z [http://openstreetmap.org openstreetmap.org].',
	'mappingstatus_latmissing' => 'Chybí hodnota lat (zeměpisná šířka)',
	'mappingstatus_lonmissing' => 'Chybí hodnota lon (zeměpisná délka)',
	'mappingstatus_zoommissing' => 'Chybí hodnota z (úroveň přiblížení)',
	'mappingstatus_longdepreciated' => 'Prosím, použijte „lon“ namísto „long“ (parametr byl přejmenován).',
	'mappingstatus_widthnan' => 'hodnota šířky (w) „%1“ není platné celé číslo',
	'mappingstatus_heightnan' => 'hodnota výšky (h) „%1“ není platné celé číslo',
	'mappingstatus_zoomnan' => 'hodnota úrovně přiblížení (z) „%1“ není platné celé číslo',
	'mappingstatus_latnan' => 'hodnota zeměpisné šířky (lat) „%1“ není platné číslo',
	'mappingstatus_lonnan' => 'hodnota zeměpisné délky (lon) „%1“ není platné číslo',
	'mappingstatus_widthbig' => 'hodnota šířky (w) nemůže být větší než 1000',
	'mappingstatus_widthsmall' => 'hodnota šířky (w) nemůže být menší než 100',
	'mappingstatus_heightbig' => 'hodnota výšky (h) nemůže být větší než 1000',
	'mappingstatus_heightsmall' => 'hodnota výšky (h) nemůže být menší než 100',
	'mappingstatus_latbig' => 'hodnota zeměpisné šířky (lat) nemůže být větší než 90',
	'mappingstatus_latsmall' => 'hodnota zeměpisné šířky (lat) nemůže být menší než -90',
	'mappingstatus_lonbig' => 'hodnota zeměpisné délky (lon) nemůže být větší než 180',
	'mappingstatus_lonsmall' => 'hodnota zeměpisné délky (lon) nemůže být menší než -180',
	'mappingstatus_zoomsmall' => 'hodnota úrovně přiblížení (z) nemůže být menší než nula',
	'mappingstatus_zoom18' => 'Hodnota úrovně přiblížení (z) nemůže být větší než 17. Uvědomte si, že toto rozšíření MediaWiki používá vrstvu „osmarender“ z OpenStreetMap, která neobsahuje podrobnější přiblížení než 17. Vrstva „Mapnik“ na openstreetmap.org umožňuje priblížení do úrovně 18.',
	'mappingstatus_zoombig' => 'Hodnota úrovně přiblížení (z) nemůže být větší než 17.',
	'mappingstatus_invalidlayer' => 'Neplatná hodnota „layer“ „%1“',
	'mappingstatus_maperror' => 'Chyba mapy:',
	'mappingstatus_osmtext' => 'Zobrazit tuto mapu na OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikód tohoto pohledu na mapu:',
	'mappingstatus_button_code' => 'Zobrazit wikikód',
	'mappingstatus_resetview' => 'Obnovit zobrazení',
);

/** German (Deutsch)
 * @author Raimond Spekking
 * @author Umherirrender
 */
$messages['de'] = array(
	'mappingstatus_desc' => 'Ermöglicht die Nutzung des <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt>-Tags zur Anzeige einer OpenLayer-MappingStatus. Die Karten stammen von [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Es wurde kein Wert für die geografische Breite (lat) angegeben.',
	'mappingstatus_lonmissing' => 'Es wurde kein Wert für die geografische Länge (lon) angegeben.',
	'mappingstatus_zoommissing' => 'Es wurde kein Zoom-Wert (z) angegeben.',
	'mappingstatus_longdepreciated' => 'Bitte benutze „lon“ an Stelle von „long“ (Parameter wurde umbenannt).',
	'mappingstatus_widthnan' => 'Der Wert für die Breite (w) „%1“ ist keine gültige Zahl',
	'mappingstatus_heightnan' => 'Der Wert für die Höhe (h) „%1“ ist keine gültige Zahl',
	'mappingstatus_zoomnan' => 'Der Wert für den Zoom (z) „%1“ ist keine gültige Zahl',
	'mappingstatus_latnan' => 'Der Wert für die geografische Breite (lat) „%1“ ist keine gültige Zahl',
	'mappingstatus_lonnan' => 'Der Wert für die geografische Länge (lon) „%1“ ist keine gültige Zahl',
	'mappingstatus_widthbig' => 'Die Breite (w) darf 1000 nicht überschreiten',
	'mappingstatus_widthsmall' => 'Die Breite (w) darf 100 nicht unterschreiten',
	'mappingstatus_heightbig' => 'Die Höhe (h) darf 1000 nicht überschreiten',
	'mappingstatus_heightsmall' => 'Die Höhe (h) darf 100 nicht unterschreiten',
	'mappingstatus_latbig' => 'Die geografische Breite darf nicht größer als 90 sein',
	'mappingstatus_latsmall' => 'Die geografische Breite darf nicht kleiner als -90 sein',
	'mappingstatus_lonbig' => 'Die geografische Länge darf nicht größer als 180 sein',
	'mappingstatus_lonsmall' => 'Die geografische Länge darf nicht kleiner als -180 sein',
	'mappingstatus_zoomsmall' => 'Der Zoomwert darf nicht negativ sein',
	'mappingstatus_zoom18' => 'Der Zoomwert (z) darf nicht größer als 17 sein. Beachte, dass diese MediaWiki-Erweiterung die OpenStreetMap „Osmarender“-Karte einbindet, die nicht höher als Zoom 17 geht. Die Mapnik-Karte ist auf openstreetmap.org verfügbar und geht bis Zoom 18.',
	'mappingstatus_zoombig' => 'Der Zoomwert (z) darf nicht größer als 17 sein.',
	'mappingstatus_invalidlayer' => 'Ungültiger „layer“-Wert „%1“',
	'mappingstatus_maperror' => 'Kartenfehler:',
	'mappingstatus_osmtext' => 'Diese Karte auf OpenStreetMap.org ansehen',
	'mappingstatus_code' => 'Wikitext für diese Kartenansicht:',
	'mappingstatus_button_code' => 'Zeige Wikicode',
	'mappingstatus_resetview' => 'Zurücksetzen',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'mappingstatus_desc' => 'Zmóžnja wužywanje toflicki <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> za zwobraznjenje pśesuwajobneje kórty OpenLayer. Kórty su z [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Gódnota za šyrinu (lat) felujo.',
	'mappingstatus_lonmissing' => 'Gódnota za dlininu (lon) felujo.',
	'mappingstatus_zoommissing' => 'Gódnota za skalěrowanje (z) felujo.',
	'mappingstatus_longdepreciated' => "Wužywaj pšosym 'lon' město 'long' (parameter jo se pśemjenił)",
	'mappingstatus_widthnan' => "Gódnota šyrokosći (w) '%1' njejo płaśiwa ceła licba",
	'mappingstatus_heightnan' => "Gódnota wusokosći (h) '%1' njejo płaśiwa ceła licba",
	'mappingstatus_zoomnan' => "Gódnota skalowanja (z) '%1' njejo płaśiwa ceła licba",
	'mappingstatus_latnan' => "Gódnota šyriny (lat) '%1' njejo płaśiwa licba",
	'mappingstatus_lonnan' => "Gódnota dlininy (lon) '%1' njejo płaśiwa licba",
	'mappingstatus_widthbig' => 'Gódnota šyrokosći (w) njesmějo wětša ako 1000 byś',
	'mappingstatus_widthsmall' => 'Gódnota šyrokosći njesmějo mjeńša ako 100 byś',
	'mappingstatus_heightbig' => 'Gódnota wusokosći (h) njesmějo wětša ako 1000 byś',
	'mappingstatus_heightsmall' => 'Gódnota wusokosći (h) njesmějo mjeńša ako 100 byś',
	'mappingstatus_latbig' => 'Gódnota dlininy (lat) njesmějo wětša ako 90 byś',
	'mappingstatus_latsmall' => 'Gódnota šyriny (lat) njesmějo mjeńša ako -90 byś',
	'mappingstatus_lonbig' => 'Gódnota dlininy (lon) njesmějo wětša ako 180 byś',
	'mappingstatus_lonsmall' => 'Gódnota dlininy (lon) njesmějo mjeńša ako -180 byś',
	'mappingstatus_zoomsmall' => 'Gódnota skalowanja (z) njesmějo mjeńša ako nul byś',
	'mappingstatus_zoom18' => "Gódnota skalowanja (z) njesmějo wětša ako 17 byś. Glědaj, až toś to rozšyrjenje MediaWiki zapśěgujo warstu OpenStreetMap 'Osmarender', kótaraž njepśesegujo skalowańsku rowninu 17. Warsta Mapnik, kótaraž stoj na openstreetmap.org k dispoziciji, dosega až k rowninje 18.",
	'mappingstatus_zoombig' => 'Gódnota skalowanja (z) njesmějo wětša ako 17 byś.',
	'mappingstatus_invalidlayer' => "Njepłaśiwa gódnota 'warsty' '%1'",
	'mappingstatus_maperror' => 'Kórtowa zmólka:',
	'mappingstatus_osmtext' => 'Glědaj toś tu kórtu na OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikod za toś ten kórtowy naglěd:',
	'mappingstatus_button_code' => 'Wikikod pokazaś',
	'mappingstatus_resetview' => 'Naglěd slědk stajiś',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'mappingstatus_maperror' => 'Mapa eraro:',
	'mappingstatus_osmtext' => 'Vidi ĉi tiun mapon en OpenStreetMap.org',
	'mappingstatus_code' => 'Vikikodo por ĉi tiu mapvido:',
	'mappingstatus_button_code' => 'Akiri vikikodon',
	'mappingstatus_resetview' => 'Restarigi vidon',
);

/** Spanish (Español)
 * @author Crazymadlover
 */
$messages['es'] = array(
	'mappingstatus_maperror' => 'Error en mapa:',
	'mappingstatus_code' => 'Wikicode para esta vista de mapa:',
	'mappingstatus_button_code' => 'Obtener wikicode',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 */
$messages['eu'] = array(
	'mappingstatus_button_code' => 'Wikikodea lortu',
	'mappingstatus_resetview' => 'Bista berrezarri',
);

/** Finnish (Suomi)
 * @author Nike
 * @author Str4nd
 * @author Vililikku
 */
$messages['fi'] = array(
	'mappingstatus_desc' => 'Mahdollistaa <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt>-elementin käytön OpenLayers slippy map -kartan näyttämiseen. Kartat ovat osoitteesta [http://openstreetmap.org openstreetmap.org].',
	'mappingstatus_latmissing' => 'Puuttuva ”lat”-arvo leveysasteille.',
	'mappingstatus_lonmissing' => 'Puuttuva ”lon”-arvo pituusasteille.',
	'mappingstatus_zoommissing' => 'Puuttuva ”z”-arvo zoomaukselle.',
	'mappingstatus_longdepreciated' => 'Käytä ”lon”-arvoa ”long”-arvon sijasta nimenmuutoksen vuoksi.',
	'mappingstatus_widthnan' => 'leveysarvo (w) ”%1” ei ole kelvollinen kokonaisluku',
	'mappingstatus_heightnan' => 'Korkeusarvo (h) ”%1” ei ole kelvollinen kokonaisluku',
	'mappingstatus_zoomnan' => 'zoom-arvo (z) ”%1” ei ole kelvollinen kokonaisluku',
	'mappingstatus_latnan' => 'leveysastearvo (lat) ”%1” ei ole kelvollinen luku',
	'mappingstatus_lonnan' => 'Pituusastearvo ”%1” ei ole kelvollinen luku',
	'mappingstatus_widthbig' => 'leveysarvo (w) ei voi olla yli 1000',
	'mappingstatus_widthsmall' => 'leveysarvo (w) ei voi olla alle 100',
	'mappingstatus_heightbig' => 'korkeusarvo (h) ei voi olla yli 1000',
	'mappingstatus_heightsmall' => 'korkeusarvo (h) ei voi olla alle 100',
	'mappingstatus_latbig' => 'leveysastearvo (lat) ei voi olla yli 90',
	'mappingstatus_latsmall' => 'leveysastearvo (lat) ei voi olla alle -90',
	'mappingstatus_lonbig' => 'pituusastearvo (lon) ei voi olla yli 180',
	'mappingstatus_lonsmall' => 'pituusastearvo (lon) ei voi olla alle -180',
	'mappingstatus_zoomsmall' => 'zoom-arvo (z) ei voi olla alle nollan',
	'mappingstatus_zoom18' => 'Zoomaus (z) -arvo ei voi olla suurempi kuin 17. Tämä MediaWiki-laajennos hakee OpenStreetMapin Osmarender-tason, jota ei voi lähentää tasoa 17 enempää. Mapnik-taso, joka myös on käytettävissä openstreetmap.org:ssa, sisältää myös 18. lähennystason.',
	'mappingstatus_zoombig' => 'zoom-arvo (z) ei voi olla yli 17.',
	'mappingstatus_invalidlayer' => 'Virheellinen ”layer”-arvo ”%1”',
	'mappingstatus_maperror' => 'Karttavirhe:',
	'mappingstatus_osmtext' => 'Katso tämä kartta osoitteessa OpenStreetMap.org.',
	'mappingstatus_code' => 'Wikikoodi tälle karttanäkymälle:',
	'mappingstatus_button_code' => 'Hae wikikoodi',
	'mappingstatus_resetview' => 'Palauta näkymä',
);

/** French (Français)
 * @author Cedric31
 * @author Grondin
 */
$messages['fr'] = array(
	'mappingstatus_desc' => 'Autorise l’utilisation de la balise <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> pour afficher une carte glissante d’OpenLayers. Les cartes proviennent de [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Valeur lat manquante (pour la latitude).',
	'mappingstatus_lonmissing' => 'Valeur lon manquante (pour la longitude).',
	'mappingstatus_zoommissing' => 'Valeur z manquante (pour le niveau du zoom).',
	'mappingstatus_longdepreciated' => 'Veuillez utiliser « lon » au lieu de « long » (le paramètre a été renommé).',
	'mappingstatus_widthnan' => 'La largeur (w) ayant pour valeur « %1 » n’est pas un nombre entier correct.',
	'mappingstatus_heightnan' => 'La hauteur (h) ayant pour valeur « %1 » n’est pas un nombre entier correct.',
	'mappingstatus_zoomnan' => 'Le zoom (z) ayant pour valeur « %1 » n’est pas un nombre entier correct.',
	'mappingstatus_latnan' => 'La latitude (lat) ayant pour valeur « %1 » n’est pas un nombre correct.',
	'mappingstatus_lonnan' => 'La longitude (lon) ayant pour valeur « %1 » n’est pas un nombre correct.',
	'mappingstatus_widthbig' => 'La valeur de la largeur (w) ne peut excéder 1000',
	'mappingstatus_widthsmall' => 'La valeur de la largeur (w) ne peut être inférieure à 100',
	'mappingstatus_heightbig' => 'La valeur de la hauteur (h) ne peut excéder 1000',
	'mappingstatus_heightsmall' => 'La valeur de la hauteur (h) ne peut être inférieure à 100',
	'mappingstatus_latbig' => 'La valeur de la latitude (lat) ne peut excéder 90',
	'mappingstatus_latsmall' => 'La valeur de la latitude (lat) ne peut être inférieure à -90',
	'mappingstatus_lonbig' => 'La valeur de la longitude (lon) ne peut excéder 180',
	'mappingstatus_lonsmall' => 'La valeur de la longitude (lon) ne peut être inférieure à -180',
	'mappingstatus_zoomsmall' => 'La valeur du zoom (z) ne peut être négative',
	'mappingstatus_zoom18' => 'La valeur du zoom (z) ne peut excéder 17. Notez que ce crochet d’extension MediaWiki dans la couche « osmarender » de OpenStreetMap ne peut aller au-delà du niveau 17 du zoop. La couche Mapnik disponible sur openstreetmap.org, ne peut aller au-delà du niveau 18.',
	'mappingstatus_zoombig' => 'La valeur du zoom (z) ne peut excéder 17.',
	'mappingstatus_invalidlayer' => 'Valeur de « %1 » de la « couche » incorrecte',
	'mappingstatus_maperror' => 'Erreur de carte :',
	'mappingstatus_osmtext' => 'Voyez cette carte sur OpenStreetMap.org',
	'mappingstatus_code' => 'Code Wiki pour le visionnement de cette cate :',
	'mappingstatus_button_code' => 'Obtenir le code wiki',
	'mappingstatus_resetview' => 'Réinitialiser le visionnement',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'mappingstatus_desc' => 'Permite o uso da etiqueta <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> para amosar un mapa slippy. Os mapas son de [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Falta o valor lat (para a latitude).',
	'mappingstatus_lonmissing' => 'Falta o valor lan (para a lonxitude).',
	'mappingstatus_zoommissing' => 'Falta o valor z (para o nivel do zoom).',
	'mappingstatus_longdepreciated' => 'Por favor, use "lon" no canto de "long" (o parámetro foi renomeado).',
	'mappingstatus_widthnan' => "o valor '%1' do ancho (w) non é un número enteiro válido",
	'mappingstatus_heightnan' => "o valor '%1' da altura (h) non é un número enteiro válido",
	'mappingstatus_zoomnan' => "o valor '%1' do zoom (z) non é un número enteiro válido",
	'mappingstatus_latnan' => "o valor '%1' da latitude (lat) non é un número enteiro válido",
	'mappingstatus_lonnan' => "o valor '%1' da lonxitude (lon) non é un número enteiro válido",
	'mappingstatus_widthbig' => 'o valor do ancho (w) non pode ser máis de 1000',
	'mappingstatus_widthsmall' => 'o valor do ancho (w) non pode ser menos de 100',
	'mappingstatus_heightbig' => 'o valor da altura (h) non pode ser máis de 1000',
	'mappingstatus_heightsmall' => 'o valor da altura (h) non pode ser menos de 100',
	'mappingstatus_latbig' => 'o valor da latitude (lat) non pode ser máis de 90',
	'mappingstatus_latsmall' => 'o valor da latitude (lat) non pode ser menos de -90',
	'mappingstatus_lonbig' => 'o valor da lonxitude (lon) non pode ser máis de 180',
	'mappingstatus_lonsmall' => 'o valor da lonxitude (lon) non pode ser menos de -180',
	'mappingstatus_zoomsmall' => 'o valor do zoom (z) non pode ser menos de cero',
	'mappingstatus_zoom18' => 'o valor do zoom (z) non pode ser máis de 17. Déase conta de que esta extensión MediaWiki asocia no OpenStreetMap a capa "osmarender", que non vai máis alá do nivel 17 do zoom. A capa Mapnik dispoñible en openstreetmap.org, vai máis aló do nivel 18',
	'mappingstatus_zoombig' => 'o valor do zoom (z) non pode ser máis de 17.',
	'mappingstatus_invalidlayer' => 'Valor \'%1\' da "capa" inválido',
	'mappingstatus_maperror' => 'Erro no mapa:',
	'mappingstatus_osmtext' => 'Vexa este mapa en OpenStreetMap.org',
	'mappingstatus_code' => 'Código wiki para o visionado deste mapa:',
	'mappingstatus_button_code' => 'Obter o código wiki',
	'mappingstatus_resetview' => 'Axustar a vista',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'mappingstatus_desc' => 'Macht s megli s <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt>-Tag z nutze fir zum Aazeige vun ere OpenLayer-MappingStatus. D Charte stamme vu [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'S isch kei Wärt fir di geografisch Breiti (lat) aagee wore.',
	'mappingstatus_lonmissing' => 'S isch kei Wärt fir di geografisch Lengi (lon) aagee wore.',
	'mappingstatus_zoommissing' => 'S isch kei Zoom-Wärt (z) aagee wore.',
	'mappingstatus_longdepreciated' => 'Bitte bruuch „lon“ statt „long“ (Parameter isch umgnännt wore).',
	'mappingstatus_widthnan' => 'Dr Wärt fir d Breiti (w) „%1“ isch kei giltigi Zahl',
	'mappingstatus_heightnan' => 'Dr Wert fir d Hechi (h) „%1“ isch kei giltigi Zahl',
	'mappingstatus_zoomnan' => 'Dr Wert fir dr Zoom (z) „%1“ isch kei giltigi Zahl',
	'mappingstatus_latnan' => 'Dr Wärt fir di geografisch Breiti (lat) „%1“ isch kei giltigi Zahl',
	'mappingstatus_lonnan' => 'Dr Wärt fir di geografisch Lengi (lon) „%1“ isch kei giltigi Zahl',
	'mappingstatus_widthbig' => 'D Breiti (w) derf nit greßer syy wie 1000',
	'mappingstatus_widthsmall' => 'D Breiti (w) derf nit greßer syy wie 100',
	'mappingstatus_heightbig' => 'D Hechi (h) derf nit greßer syy wie 1000',
	'mappingstatus_heightsmall' => 'D Hechi (h) derf nit greßer syy wie 100',
	'mappingstatus_latbig' => 'Di geografisch Breiti derf nit greßer syy wie 90',
	'mappingstatus_latsmall' => 'Di geografisch Breiti derf nit chleiner syy wie -90',
	'mappingstatus_lonbig' => 'Di geografisch Lengi derf nit greßer syy wie 180',
	'mappingstatus_lonsmall' => 'Di geografisch Lengi derf nit chleiner syy wie -180',
	'mappingstatus_zoomsmall' => 'Dr Zoomwärt derf nit negativ syy',
	'mappingstatus_zoom18' => 'Dr Zoomwärt (z) derf nit greßer syy wie 17. Gib acht, ass die MediaWiki-Erwyterig d OpenStreetMap „Osmarender“-Charte yybindet, wu nit hecher goht wie Zoom 17. D Mapnik-Charte isch uf openstreetmap.org verfiegbar un goht bis Zoom 18.',
	'mappingstatus_zoombig' => 'Dr Zoomwärt (z) derf nit greßer syy wie 17.',
	'mappingstatus_invalidlayer' => 'Uugiltige „layer“-Wärt „%1“',
	'mappingstatus_maperror' => 'Chartefähler:',
	'mappingstatus_osmtext' => 'Die Charte uf OpenStreetMap.org bschaue',
	'mappingstatus_code' => 'Wikitäxt fir die Chartenaasicht:',
	'mappingstatus_button_code' => 'Zeig Wikicode',
	'mappingstatus_resetview' => 'Zruggsetze',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'mappingstatus_desc' => 'מתן האפשרות לשימוש בתגית <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> להצגת מפת OpenLayers רדומה. המפות הן מהאתר [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'ערך ה־lat חסר (עבור קו־הרוחב).',
	'mappingstatus_lonmissing' => 'ערך ה־lon חסר(עבור קו־האורך).',
	'mappingstatus_zoommissing' => 'ערך ה־z חסר (לרמת ההגדלה).',
	'mappingstatus_longdepreciated' => "אנא השתמשו ב־'lon' במקום ב־'long' (שם הפרמטר שונה).",
	'mappingstatus_widthnan' => "ערך הרוחב (w) '%1' אינו מספר שלם תקין",
	'mappingstatus_heightnan' => "ערך הגובה (h) '%1' אינו מספר שלם תקין",
	'mappingstatus_zoomnan' => "ערך ההגדלה (z) '%1' אינו מספר שלם תקין",
	'mappingstatus_latnan' => "ערך קו־הרוחב (lat) '%1' אינו מספר תקין",
	'mappingstatus_lonnan' => "ערך קו־האורך (lon) '%1' אינו מספר תקין",
	'mappingstatus_widthbig' => 'ערך הרוחב (w) לא יכול לחרוג מעבר ל־1000.',
	'mappingstatus_widthsmall' => 'ערך הרוחב (w) לא יכול לחרוג אל מתחת ל־100',
	'mappingstatus_heightbig' => 'ערך הגובה (h) לא יכול לחרוג אל מעבר ל־1000',
	'mappingstatus_heightsmall' => 'ערך הגובה (h) לא יכול לחרוג אל מתחת ל־100',
	'mappingstatus_latbig' => 'ערך קו־הרוחב (lat) לא יכול לחרוג מעבר ל־90',
	'mappingstatus_latsmall' => 'ערך קו־הרוחב (lat) לא יכול לחרוג אל מתחת ל־ -90',
	'mappingstatus_lonbig' => 'ערך קו־האורך (lon) לא יכול לחרוג אל מעבר ל־180',
	'mappingstatus_lonsmall' => 'ערך קו־האורך (lon) לא יכול לחרוג אל מתחת ל־ -180',
	'mappingstatus_zoomsmall' => 'ערך ההגדלה (z) לא יכול לחרוג אל מתחת לאפס',
	'mappingstatus_zoom18' => "ערך ההגדלה (z) לא יכול לחרוג אל מעבר ל־17. שימו לב שהרחבת מדיה־ויקי זו מתממשקת אל שכבת ה־'osmarender' של OpenStreetMap שאינה תומכת ברמת הגדלה הגדולה מ־17. שכבת ה־Mapnik הזמינה באתר openstreetmap.org, מגיעה לרמת הגדלה 18.",
	'mappingstatus_zoombig' => 'ערך ההגדלה (z) לא יכול לחרוג אל מעבר ל־17.',
	'mappingstatus_invalidlayer' => "ערך ה־'layer' אינו תקין '%1'",
	'mappingstatus_maperror' => 'שגיאת מפה:',
	'mappingstatus_osmtext' => 'עיינו במפה זו באתר OpenStreetMap.org',
	'mappingstatus_code' => 'קוד הוויקי להצגת מפה זו:',
	'mappingstatus_button_code' => 'איחזור קוד הוויקי',
	'mappingstatus_resetview' => 'איפוס התצוגה',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'mappingstatus_desc' => 'Zmóžnja wužiwanje taflički <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> za zwobraznjenje posuwneje karty OpenLayer. Karty su z [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Hódnota za šěrinu (lat) pobrachuje',
	'mappingstatus_lonmissing' => 'Hódnota za geografisku dołhosć (lon) pobrachuje.',
	'mappingstatus_zoommissing' => 'Hódnota za skalowanje (z) pobrachuje.',
	'mappingstatus_longdepreciated' => "Prošu wužiwaj 'lon' město 'lon' (parameter je so přemjenował)",
	'mappingstatus_widthnan' => "Hódnota šěrokosće (w) '%1' njeje płaćiwa cyła ličba",
	'mappingstatus_heightnan' => "Hódnota wysokosće (h) '%1' njeje płaćiwa cyła ličba",
	'mappingstatus_zoomnan' => "Hódnota za skalowanje (z) '%1' njeje płaćiwa cyła ličba",
	'mappingstatus_latnan' => "Hódnota za šěrinu (lat) '%1' njeje płaćiwa ličba",
	'mappingstatus_lonnan' => "Hódnota za geografisku dołhosć (lon) '%1' njeje płaćiwa ličba",
	'mappingstatus_widthbig' => 'Hódnota šěrokosće (w) njesmě wjetša hač 1000 być',
	'mappingstatus_widthsmall' => 'Hódnota šěrokosće (w) njesmě mjeńša hač 100 być',
	'mappingstatus_heightbig' => 'Hódnota wysokosće (h) njesmě wjetša hač 1000 być',
	'mappingstatus_heightsmall' => 'Hódnota wysokosće (h) njesmě mjeńša hač 100 być',
	'mappingstatus_latbig' => 'Hódnota šěriny (lat) njesmě wjetša hač 90 być',
	'mappingstatus_latsmall' => 'Hódnota šěriny (lat) njesmě mjeńša hač -90 być',
	'mappingstatus_lonbig' => 'Hódnota geografiskeje dołhosće (lon) njesmě wjetša hač 180 być',
	'mappingstatus_lonsmall' => 'Hódnota geografiskeje dołhosće (lon) njesmě mjeńša hač -180 być',
	'mappingstatus_zoomsmall' => 'Hódnota skalowanja (z) njesmě mjeńša hač nul być',
	'mappingstatus_zoom18' => "Hódnota skalowanja (z) njesmě wjetša hač 17 być. Wobkedźbuj, zo tute rozšěrjenje MediaWiki wórštu OpenStreetMap 'Osmarender' zapřijima, kotraž skalowansku runinu 17 njepřesaha. Wóršta Mapnik, kotraž na openstreetmap.org k dispoziciji steji, saha hač k skalowanskej runinje 18.",
	'mappingstatus_zoombig' => 'Hódnota skalowanja (z) njesmě wjetša hač 17 być.',
	'mappingstatus_invalidlayer' => "Njepłaćiwa hódnota 'wóršty' '%1'",
	'mappingstatus_maperror' => 'Kartowy zmylk:',
	'mappingstatus_osmtext' => 'Hlej tutu kartu na OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikod za tutón kartowy napohlad:',
	'mappingstatus_button_code' => 'Wikikod pokazać',
	'mappingstatus_resetview' => 'Napohlad wróćo stajić',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'mappingstatus_desc' => 'Permitte le uso del etiquetta <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> pro monstrar un carta glissante de OpenLayers. Le cartas proveni de [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Valor lat mancante (pro le latitude).',
	'mappingstatus_lonmissing' => 'Valor lon mancante (pro le longitude).',
	'mappingstatus_zoommissing' => 'Valor z mancante (pro le nivello de zoom).',
	'mappingstatus_longdepreciated' => "Per favor usa 'lon' in loco de 'long' (le parametro ha essite renominate).",
	'mappingstatus_widthnan' => "Le valor '%1' del latitude (w) non es un numero integre valide",
	'mappingstatus_heightnan' => "Le valor '%1' del altitude (h) non es un numero integre valide",
	'mappingstatus_zoomnan' => "Le valor '%1' del zoom (z) non es un numero integre valide",
	'mappingstatus_latnan' => "Le valor '%1' del latitude (lat) non es un numero valide",
	'mappingstatus_lonnan' => "Le valor '%1' del longitude (lon) non es un numero valide",
	'mappingstatus_widthbig' => 'Le valor del latitude (w) non pote exceder 1000',
	'mappingstatus_widthsmall' => 'Le valor del latitude (w) non pote esser minus de 100',
	'mappingstatus_heightbig' => 'Le valor del altitude (h) non pote esser plus de 1000',
	'mappingstatus_heightsmall' => 'Le valor del altitude (h) non pote esser minus de 100',
	'mappingstatus_latbig' => 'Le valor del latitude (lat) non pote exceder 90',
	'mappingstatus_latsmall' => 'Le valor del latitude (lat) non pote esser minus de -90',
	'mappingstatus_lonbig' => 'Le valor del longitude (lon) non pote exceder 100',
	'mappingstatus_lonsmall' => 'Le valor del longitude (lon) non pote esser minus de -100',
	'mappingstatus_zoomsmall' => 'Le valor del zoom (z) non pote esser minus de zero',
	'mappingstatus_zoom18' => "Le valor del zoom (z) non pote exceder 17. Nota que iste extension de MediaWiki se installa in le strato 'osmarender' de OpenStreetMap, le qual non excede le nivello de zoom 17. Le strato Mapnik disponibile in openstreetmap.org ha un nivello de zoom maxime de 18.",
	'mappingstatus_zoombig' => 'Le valor del zoom (z) non pote exceder 17.',
	'mappingstatus_invalidlayer' => "Valor de 'strato' invalide '%1'",
	'mappingstatus_maperror' => 'Error de carta:',
	'mappingstatus_osmtext' => 'Vider iste carta in OpenStreetMap.org',
	'mappingstatus_code' => 'Codice Wiki pro iste vista del carta:',
	'mappingstatus_button_code' => 'Obtener codice wiki',
	'mappingstatus_resetview' => 'Reinitialisar vista',
);

/** Italian (Italiano)
 * @author Darth Kule
 */
$messages['it'] = array(
	'mappingstatus_desc' => "Permette l'utilizzo del tag <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> per visualizzare una mappa OpenLayers. Le mappe sono prese da [http://openstreetmap.org openstreetmap.org]",
	'mappingstatus_latmissing' => 'Manca il valore lat (per la latitudine).',
	'mappingstatus_lonmissing' => 'Manca il valore lon (per la longitudine).',
	'mappingstatus_zoommissing' => 'Manca il valore z (per il livello dello zoom).',
	'mappingstatus_longdepreciated' => "Usare 'lon' invece di 'long' (il parametro è stato rinominato).",
	'mappingstatus_widthnan' => "il valore '%1' della larghezza (w) non è un intero valido",
	'mappingstatus_heightnan' => "il valore '%1' dell'altezza (h) non è un intero valido",
	'mappingstatus_zoomnan' => "il valore '%1' dello zoom (z) non è un intero valido",
	'mappingstatus_latnan' => "il valore '%1' della latitudine (lat) non è un numero valido",
	'mappingstatus_lonnan' => "il valore '%1' della longitudine (long) non è un numero valido",
	'mappingstatus_widthbig' => 'il valore della larghezza (w) non può essere maggiore di 1000',
	'mappingstatus_widthsmall' => 'il valore della larghezza (w) non può essere minore di 100',
	'mappingstatus_heightbig' => "il valore dell'altezza (h) non può essere maggiore di 1000",
	'mappingstatus_heightsmall' => "il valore dell'altezza (h) non può essere minore di 100",
	'mappingstatus_latbig' => 'il valore della latitudine (lat) non può essere maggiore di 90',
	'mappingstatus_latsmall' => 'il valore della latitudine (lat) non può essere minore di -90',
	'mappingstatus_lonbig' => 'il valore della longitudine (lon) non può essere maggiore di 180',
	'mappingstatus_lonsmall' => 'il valore della longitudine (lon) non può essere minore di -180',
	'mappingstatus_zoomsmall' => 'il valore dello zoom (z) non può essere minore di zero',
	'mappingstatus_zoom18' => "il valore dello zoom (z) non può essere maggiore di 17. Nota che questa estensione MediaWiki utilizza il layer 'osmarender' di OpenStreetMap che non va oltre il livello 17 di zoom. Il layer Mapnik disponibile su openstreetmap.org arriva fino a un livello 18 di zoom",
	'mappingstatus_zoombig' => 'il valore dello zoom (z) non può essere maggiore di 17.',
	'mappingstatus_invalidlayer' => "Valore '%1' di 'layer' non valido",
	'mappingstatus_maperror' => 'Errore mappa:',
	'mappingstatus_osmtext' => 'Guarda questa mappa su OpenStreetMap.org',
	'mappingstatus_code' => 'Codice wiki per visualizzare questa mappa:',
	'mappingstatus_button_code' => 'Ottieni codice wiki',
	'mappingstatus_resetview' => 'Reimposta visuale',
);

/** Japanese (日本語)
 * @author Fryed-peach
 */
$messages['ja'] = array(
	'mappingstatus_desc' => 'OpenLayers による滑らかな地図を表示するための <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> タグを利用できるようにする。地図は [http://openstreetmap.org openstreetmap.org] から取得される',
	'mappingstatus_latmissing' => '緯度値 lat が指定されていません。',
	'mappingstatus_lonmissing' => '経度値 lon が指定されていません。',
	'mappingstatus_zoommissing' => '拡大度 z が指定されていません。',
	'mappingstatus_longdepreciated' => '"long" ではなく "lon" を用いてください（引数が改名されました）。',
	'mappingstatus_widthnan' => '幅 (w) の値「%1」は有効な整数ではありません',
	'mappingstatus_heightnan' => '高さ (h) の値「%1」は有効な整数ではありません',
	'mappingstatus_zoomnan' => '拡大度 (z) の値「%1」は有効な整数ではありません',
	'mappingstatus_latnan' => '緯度 (lat) の値「%1」は有効な数値ではありません',
	'mappingstatus_lonnan' => '経度 (lon) の値「%1」は有効な数値ではありません',
	'mappingstatus_widthbig' => '幅 (w) の値は1000より大きくはできません',
	'mappingstatus_widthsmall' => '幅 (w) の値は100より小さくはできません',
	'mappingstatus_heightbig' => '高さ (h) の値は1000より大きくはできません',
	'mappingstatus_heightsmall' => '高さ (h) の値は100より小さくはできません',
	'mappingstatus_latbig' => '緯度 (lat) の値は90より大きくはできません',
	'mappingstatus_latsmall' => '緯度 (lat) の値は-90より小さくはできません',
	'mappingstatus_lonbig' => '経度 (lon) の値は180より大きくはできません',
	'mappingstatus_lonsmall' => '経度 (lon) の値は-180より小さくはできません',
	'mappingstatus_zoomsmall' => '拡大度 (z) の値は0より小さくはできません',
	'mappingstatus_zoom18' => '拡大度 (z) の値は17より大きくはできません。なお、この MediaWiki 拡張機能がフックしている、OpenStreetMap の "osmarender" レイヤーは17を超す拡大度を利用できません。openstreetmap.org で利用可能な "Mapnik" レイヤーは18までの拡大度が利用できます。',
	'mappingstatus_zoombig' => '拡大度 (z) の値は17より大きくはできません',
	'mappingstatus_invalidlayer' => '"layer" の値 "%1" は無効',
	'mappingstatus_maperror' => '地図エラー:',
	'mappingstatus_osmtext' => 'この地図を OpenStreetMap.org で見る',
	'mappingstatus_code' => 'この地図表示用のウィキマークアップ:',
	'mappingstatus_button_code' => 'ウィキマークアップを取得',
	'mappingstatus_resetview' => '表示を更新',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Thearith
 */
$messages['km'] = array(
	'mappingstatus_latmissing' => 'ខ្វះ​តម្លៃ​រយៈទទឹង (សម្រាប់​រយៈទទឹង)​។',
	'mappingstatus_lonmissing' => 'ខ្វះ​តម្លៃ​រយៈបណ្ដោយ (សម្រាប់​រយៈបណ្ដោយ)​។',
	'mappingstatus_zoommissing' => 'ខ្វះ​តម្លៃ Z (សម្រាប់​កម្រិត​ពង្រីក)​។',
	'mappingstatus_longdepreciated' => "សូម​ប្រើ 'lon' ជំនួស​ឱ្យ 'long' (ប៉ារ៉ាម៉ែត្រ​ត្រូវ​បាន​ប្ដូរឈ្មោះ)​។",
	'mappingstatus_widthnan' => "តម្លៃ​ទទឹង (w) '%1' មិនមែន​ជា​ចំនួនគត់​ត្រឹមត្រូវ​ទេ",
	'mappingstatus_heightnan' => "តម្លៃ​កម្ពស់ (h) '%1' មិនមែន​ជា​ចំនួនគត់​ត្រឹមត្រូវ​ទេ",
	'mappingstatus_zoomnan' => "តម្លៃ​ពង្រីក (z) '%1' មិនមែន​ជា​ចំនួនគត់​ត្រឹមត្រូវ​ទេ",
	'mappingstatus_latnan' => "តម្លៃ​ទទឹង (lat) '%1' មិនមែន​ជា​ចំនួន​ត្រឹមត្រូវ​ទេ",
	'mappingstatus_lonnan' => "តម្លៃ​បណ្ដោយ (lon) '%1' មិនមែន​ជា​ចំនួន​ត្រឹមត្រូវ​ទេ",
	'mappingstatus_widthbig' => 'តម្លៃ​ទទឹង (w) មិន​អាច​ធំជាង ១០០០ ទេ',
	'mappingstatus_widthsmall' => 'តម្លៃ​ទទឹង (w) មិន​អាច​តូចជាង ១០០ ទេ',
	'mappingstatus_heightbig' => 'តម្លៃ​កម្ពស់ (h) មិន​អាច​ធំជាង ១០០០ ទេ',
	'mappingstatus_heightsmall' => 'តម្លៃ​កម្ពស់ (h) មិន​អាច​តូចជាង ១០០ ទេ',
	'mappingstatus_latbig' => 'តម្លៃ​រយៈទទឹង (lat) មិន​អាច​ធំជាង ៩០ ទេ',
	'mappingstatus_latsmall' => 'តម្លៃ​រយៈទទឹង (lat) មិន​អាច​តូចជាង -៩០ ទេ',
	'mappingstatus_lonbig' => 'តម្លៃ​រយៈបណ្ដោយ (lon) មិន​អាច​ធំជាង ១៨០ ទេ',
	'mappingstatus_lonsmall' => 'តម្លៃ​រយៈបណ្ដោយ (lon) មិន​អាច​តូចជាង -១៨០ ទេ',
	'mappingstatus_zoomsmall' => 'តម្លៃ​ពង្រីក (z) មិន​អាច​តូចជាង​សូន្យ​ទេ',
	'mappingstatus_zoombig' => 'តម្លៃ​ពង្រីក (z) មិន​អាច​ធំជាង ១៧ ទេ​។',
	'mappingstatus_maperror' => 'កំហុស​ផែនទី​៖',
	'mappingstatus_osmtext' => 'មើល​ផែនទី​នេះ នៅលើ OpenStreetMap.org',
	'mappingstatus_code' => 'កូដឹវិគី​សម្រាប់​មើល​ផែនទី​នេះ​៖',
	'mappingstatus_button_code' => 'យក​កូដវិគី',
	'mappingstatus_resetview' => 'កំណត់​ការមើល​ឡើងវិញ',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'mappingstatus_desc' => 'Deit dä Befääl <tt> <nowiki>&lt;mappingstatus&gt;</nowiki> </tt> em Wiki dobei, öm en <i lang="en">OpenLayers slippy map</i> Kaat aanzezeije. De Landkaate-Date kumme dobei fun <i lang="en">[http://openstreetmap.org openstreetmap.org]</i> her.',
	'mappingstatus_latmissing' => "Dä Wäät 'lat' för de Breed om Jlobus es nit aanjejovve.",
	'mappingstatus_lonmissing' => "Dä Wäät 'lon' för de Läng om Jlobus es nit aanjejovve.",
	'mappingstatus_zoommissing' => "Dä Wäät 'z' för dä Zoom es nit aanjejovve.",
	'mappingstatus_longdepreciated' => "Bes esu joot un donn dä Parrameeter 'lon' för de Läng om Jlobus nämme,
un nit mieh 'long' — dä Parrameeter wood enzwesche ömjanannt.",
	'mappingstatus_widthnan' => "„%1“ en kein jöltijje positive janze Zahl för dä Wäät 'w' för de Breed fum Beld.",
	'mappingstatus_heightnan' => "„%1“ en kein jöltijje positive janze Zahl för dä Wäät 'h' för de Hühde fum Beld.",
	'mappingstatus_zoomnan' => "„%1“ en kein jöltijje janze Zahl för dä Wäät 'z' för der Zoom.",
	'mappingstatus_latnan' => "„%1“ en kein jöltijje Zahl för dä Wäät 'lat' för de Brred om Jlobus.",
	'mappingstatus_lonnan' => "„%1“ es kein jöltijje Zahl för dä Wäät 'lon' för de Läng om Jlobus.",
	'mappingstatus_widthbig' => "Dä Wäät 'w' för de Breed fum Beld darf nit övver 1000 jonn.",
	'mappingstatus_widthsmall' => "Dä Wäät 'w' för de Breed fum Beld darf nit unger 100 jonn.",
	'mappingstatus_heightbig' => "Dä Wäät 'h' för de Hühde fum Beld darf nit övver 1000 jonn.",
	'mappingstatus_heightsmall' => "Dä Wäät 'h' för de Hühde fum Beld darf nit unger 100 jonn.",
	'mappingstatus_latbig' => "Dä Wäät 'lat' för de Breed om Jlobus darf nit övver 90 sin.",
	'mappingstatus_latsmall' => "Dä Wäät 'lat' för de Breed om Jlobus darf nit unger -90 sin.",
	'mappingstatus_lonbig' => "Dä Wäät 'lon' för de Läng om Jlobus darf nit övver 180 sin.",
	'mappingstatus_lonsmall' => "Dä Wäät 'lon' för de Läng om Jlobus darf nit unger -180 sin.",
	'mappingstatus_zoomsmall' => "Dä Wäät 'z' för der Zoom darf nit unger Noll sin.",
	'mappingstatus_zoom18' => 'Dä Wäät \'z\' för dä Zoom darf nit övver 17 sin.
Opjepaß: Hee dä Zosatz zor MediaWiki-ßoffwäer deiht de
<i lang="en">OpenStreetMap</i>-Kaate vum Tüp
\'<i lang="en">Osmarender</i>\' enbenge, wo dä Zoom bes 17 jeiht.
De \'<i lang="en">Mapnik</i>\' Kaate sen och op
http://openstreetmap.org/ ze fenge, un dänne iere Zoom jeiht bes 18.',
	'mappingstatus_zoombig' => "Dä Wäät 'z' för dä Zoom darf nit övver 17 sin.",
	'mappingstatus_invalidlayer' => "„%1“ es ene onjöltije Wäät för 'Schesch'.",
	'mappingstatus_maperror' => 'Fähler met dä Kaat:',
	'mappingstatus_osmtext' => 'Donn die Kaat op <i lang="en">OpenStreetMap.org</i> anloore',
	'mappingstatus_code' => 'Dä Wiki-Kood för di Kaate-Aansesh es:',
	'mappingstatus_button_code' => 'Donn dä Wiki-Kood zeije',
	'mappingstatus_resetview' => 'Aansesh zeröcksetze',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'mappingstatus_desc' => "Erméiglecht d'Benotzung vum Tag <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> fir eng ''OpenLayers slippy map'' ze weisen. D'kaarte si vun [http://openstreetmap.org openstreetmap.org]",
	'mappingstatus_longdepreciated' => "Benitzt w.e.g. 'lon' aplaz vun  'long' (de parameter gouf ëmbennnt)",
	'mappingstatus_widthnan' => "Breet (w) de Wert '%1' ass keng gëlteg ganz Zuel",
	'mappingstatus_zoomnan' => "Zoom (z) de Wert '%1' ass keng gëlteg ganz Zuel",
	'mappingstatus_widthbig' => 'Breet (w) de Wert kann net méi grouss si wéi 1000',
	'mappingstatus_widthsmall' => 'Breet (w) de Wert kann net méi kleng si wéi 100',
	'mappingstatus_heightbig' => 'Héicht (h) de Wert kann net méi grouss wéi 1000 sinn',
	'mappingstatus_heightsmall' => 'Héicht (h) de Wert kann net méi kleng wéi 100 sinn',
	'mappingstatus_zoomsmall' => 'Zoom (z) de Wert kann net méi kleng si wéi null',
	'mappingstatus_zoombig' => 'Zoom (z) de Wert kann net méi grouss si wéi 17.',
	'mappingstatus_maperror' => 'Kaartefeeler:',
	'mappingstatus_code' => 'Wikicode fir dës Kaart ze kucken:',
	'mappingstatus_button_code' => 'Wikicode weisen',
	'mappingstatus_resetview' => 'Zrécksetzen',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'mappingstatus_maperror' => 'Ahcuallōtl āmatohcopa',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'mappingstatus_desc' => 'Laat het gebruik van de tag <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> toe om een OpenLayers-kaart weer te geven. Kaarten zijn van [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'De "lat"-waarde ontbreekt (voor de breedte).',
	'mappingstatus_lonmissing' => 'De "lon"-waarde ontbreekt (voor de lengte).',
	'mappingstatus_zoommissing' => 'De "z"-waarde ontbreekt (voor het zoomniveau).',
	'mappingstatus_longdepreciated' => 'Gebruik "lon" in plaats van "long" (parameter is hernoemd).',
	'mappingstatus_widthnan' => "De waarde '%1' voor de breedte (w) is geen geldige integer",
	'mappingstatus_heightnan' => "De waarde '%1' voor de hoogte (h) is geen geldige integer",
	'mappingstatus_zoomnan' => "De waarde '%1' voor de zoom (z) is geen geldige integer",
	'mappingstatus_latnan' => "De waarde '%1' voor de breedte (lat) is geen geldig nummer",
	'mappingstatus_lonnan' => "De waarde '%1' voor de lengte (lon) is geen geldig nummer",
	'mappingstatus_widthbig' => 'De breedte (w) kan niet groter dan 1000 zijn',
	'mappingstatus_widthsmall' => 'De breedte (w) kan niet kleiner dan 100 zijn',
	'mappingstatus_heightbig' => 'De hoogte (h) kan niet groter dan 1000 zijn',
	'mappingstatus_heightsmall' => 'De hoogte (h) kan niet kleiner dan 100 zijn',
	'mappingstatus_latbig' => 'De breedte (lat) kan niet groter dan -90 zijn',
	'mappingstatus_latsmall' => 'De breedte (lat) kan niet kleiner dan -90 zijn',
	'mappingstatus_lonbig' => 'De lengte (lon) kan niet groter dan 180 zijn',
	'mappingstatus_lonsmall' => 'De lengte (lon) kan niet kleiner dan -180 zijn',
	'mappingstatus_zoomsmall' => 'De zoom (z) kan niet minder dan nul zijn',
	'mappingstatus_zoom18' => 'De zoom (z) kan niet groter zijn dan 17. Merk op dat deze MediaWiki-uitbreiding de "Osmarender"-layer van OpenSteetMap gebruikt die niet dieper dan het niveau 17 gaat. de "Mapnik"-layer, beschikbaar op openstreetmap.org, gaat tot niveau 18.',
	'mappingstatus_zoombig' => 'De zoom (z) kan niet groter dan 17 zijn',
	'mappingstatus_invalidlayer' => 'Ongeldige waarde voor \'layer\' "%1"',
	'mappingstatus_maperror' => 'Kaartfout:',
	'mappingstatus_osmtext' => 'Deze kaart op OpenStreetMap.org bekijken',
	'mappingstatus_code' => 'Wikicode voor deze kaart:',
	'mappingstatus_button_code' => 'Wikicode',
	'mappingstatus_resetview' => 'Terug',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'mappingstatus_desc' => 'Tillét bruk av merket <tt>&lt;mappingstatus&gt;</tt> for å syna eit «slippy map» frå OpenLayers. Karti kjem frå [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Manglar «lat»-verdi (for breiddegrad).',
	'mappingstatus_lonmissing' => 'Manglar «lon»-verdi (for lengdegrad).',
	'mappingstatus_zoommissing' => 'Manglar «z»-verdi (for zoom-nivået).',
	'mappingstatus_longdepreciated' => 'Nytt «lon» i staden for «long» (parameteren fekk nytt namn).',
	'mappingstatus_widthnan' => 'breiddeverdien («w») «%1» er ikkje eit gyldig heiltal',
	'mappingstatus_heightnan' => 'høgdeverdien («h») «%1» er ikkje eit gyldig heiltal',
	'mappingstatus_zoomnan' => 'zoomverdien («z») «%1» er ikkje eit gyldig heiltal',
	'mappingstatus_latnan' => 'breiddegradsverdien («lat») «%1» er ikkje eit gyldig tal',
	'mappingstatus_lonnan' => 'lengdegradsverdien («lon») «%1» er ikkje eit gyldig tal',
	'mappingstatus_widthbig' => 'breiddeverdien («w») kan ikkje vera større enn 1000',
	'mappingstatus_widthsmall' => 'breiddeverdien («w») kan ikkje vera mindre enn 100',
	'mappingstatus_heightbig' => 'høgdeverdien («h») kan ikkje vera større enn 1000',
	'mappingstatus_heightsmall' => 'høgdeverdien («h») kan ikkje vera mindre enn 100',
	'mappingstatus_latbig' => 'breiddegraden («lat») kan ikkje vera større enn 90',
	'mappingstatus_latsmall' => 'breiddegraden («lat») kan ikkje vera mindre enn -90',
	'mappingstatus_lonbig' => 'lengdegraden («lon») kan ikkje vera større enn 180',
	'mappingstatus_lonsmall' => 'lengdegraden («lon») kan ikkje vera mindre enn -180',
	'mappingstatus_zoomsmall' => 'zoomverdien («z») kan ikkje vera mindre enn null',
	'mappingstatus_zoom18' => 'zoomverdien («z») kan ikkje vera større enn 17. Merk at denne MediaWiki-utvidingi nyttar OpenStreetMap-laget «osmarender», som ikkje kan zooma meir enn til nivå 17. «Mapnik»-laget på openstreetmap.org går til zoomnivå 18',
	'mappingstatus_zoombig' => 'zoomverdien («z») kan ikkje vera større enn 17.',
	'mappingstatus_invalidlayer' => 'Ugyldig «layer»-verdi «%1»',
	'mappingstatus_maperror' => 'Kartfeil:',
	'mappingstatus_osmtext' => 'Sjå dette kartet på OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikode for denne kartvisingi:',
	'mappingstatus_button_code' => 'Hent wikikode',
	'mappingstatus_resetview' => 'Attendestill vising',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'mappingstatus_desc' => 'Tillater bruk av taggen <tt>&lt;mappingstatus&gt;</tt> for å vise et «slippy map» fra OpenLayers. Kartene kommer fra [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Mangler «lat»-verdi (for breddegraden).',
	'mappingstatus_lonmissing' => 'Mangler «lon»-verdi (for lengdegraden).',
	'mappingstatus_zoommissing' => 'Mangler «z»-verdi (for zoom-nivået).',
	'mappingstatus_longdepreciated' => 'Bruk «lon» i stedet for «long» (parameteret fikk nytt navn).',
	'mappingstatus_widthnan' => 'breddeverdien («w») «%1» er ikke et gyldig heltall',
	'mappingstatus_heightnan' => 'høydeverdien («h») «%1» er ikke et gyldig heltall',
	'mappingstatus_zoomnan' => 'zoomverdien («z») «%1» er ikke et gyldig heltall',
	'mappingstatus_latnan' => 'breddegradsverdien («lat») «%1» er ikke et gyldig tall',
	'mappingstatus_lonnan' => 'lengdegradsverdien («lon») «%1» er ikke et gyldig tall',
	'mappingstatus_widthbig' => 'breddeverdien («w») kan ikke være større enn 1000',
	'mappingstatus_widthsmall' => 'breddeverdien («w») kan ikke være mindre enn 100',
	'mappingstatus_heightbig' => 'høydeverdien («h») kan ikke være større enn 1000',
	'mappingstatus_heightsmall' => 'høydeverdien («h») kan ikke være mindre enn 100',
	'mappingstatus_latbig' => 'breddegradsverdien («lat») kan ikke være større enn 90',
	'mappingstatus_latsmall' => 'breddegradsverdien («lat») kan ikke være mindre enn –90',
	'mappingstatus_lonbig' => 'lengdegradsverdien («lon») kan ikke være større enn 180',
	'mappingstatus_lonsmall' => 'lengdegradsverdien («lon») kan ikke være mindre enn –180',
	'mappingstatus_zoomsmall' => 'zoomverdien («z») kan ikke være mindre enn null',
	'mappingstatus_zoom18' => 'zoomverdien («z») kan ikke være større enn 17. Merk at denne MediaWiki-utvidelsen bruker OpenStreetMap-laget «osmarender», som ikke kan zoome mer enn til nivå 17. «Mapnik»-laget på openstreetmap.org går til zoomnivå 18.',
	'mappingstatus_zoombig' => 'zoomverdien («z») kan ikke være større enn 17.',
	'mappingstatus_invalidlayer' => 'Ugyldig «layer»-verdi «%1»',
	'mappingstatus_maperror' => 'Kartfeil:',
	'mappingstatus_osmtext' => 'Se dette kartet på OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikode for denne kartvisningen:',
	'mappingstatus_button_code' => 'Hent wikikode',
	'mappingstatus_resetview' => 'Tilbakestill visning',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'mappingstatus_desc' => 'Autoriza l’utilizacion de la balisa <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> per afichar una mapa lisanta d’OpenLayers. Las mapas provenon de [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Valor lat mancanta (per la latitud).',
	'mappingstatus_lonmissing' => 'Valor lon mancanta (per la longitud).',
	'mappingstatus_zoommissing' => 'Valor z mancanta (pel nivèl del zoom).',
	'mappingstatus_longdepreciated' => 'Utilizatz « lon » al luòc de « long » (lo paramètre es estat renomenat).',
	'mappingstatus_widthnan' => "La largor (w) qu'a per valor « %1 » es pas un nombre entièr corrèct.",
	'mappingstatus_heightnan' => "La nautor (h) qu'a per valor « %1 » es pas un nombre entièr corrèct.",
	'mappingstatus_zoomnan' => "Lo zoom (z) qu'a per valor « %1 » es pas un nombre entièr corrèct.",
	'mappingstatus_latnan' => "La latitud (lat) qu'a per valor « %1 » es pas un nombre corrèct.",
	'mappingstatus_lonnan' => "La longitud (lon) qu'a per valor « %1 » es pas un nombre corrèct.",
	'mappingstatus_widthbig' => 'La valor de la largor (w) pòt pas excedir 1000',
	'mappingstatus_widthsmall' => 'La valor de la largor (w) pòt pas èsser inferiora a 100',
	'mappingstatus_heightbig' => 'La valor de la nautor (h) pòt pas excedir 1000',
	'mappingstatus_heightsmall' => 'La valor de la nautor (h) pòt pas èsser inferiora a 100',
	'mappingstatus_latbig' => 'La valor de la latitud (lat) pòt pas excedir 90',
	'mappingstatus_latsmall' => 'La valor de la latitud (lat) pòt pas èsser inferiora a -90',
	'mappingstatus_lonbig' => 'La valor de la longitud (lon) pòt pas excedir 180',
	'mappingstatus_lonsmall' => 'La valor de la longitud (lon) pòt pas èsser inferiora a -180',
	'mappingstatus_zoomsmall' => 'La valor del zoom (z) pòt pas èsser negativa',
	'mappingstatus_zoom18' => "La valor del zoom (z) pòt excedir 17. Notatz qu'aqueste croquet d’extension MediaWiki dins lo jaç « osmarender » de OpenStreetMap pòt pas anar de delà del nivèl 17 del zoom. Lo jaç Mapnik disponible sus openstreetmap.org, pòt pas anar de delà del nivèl 18.",
	'mappingstatus_zoombig' => 'La valor del zoom (z) pòt pas excedir 17.',
	'mappingstatus_invalidlayer' => 'Valor de « %1 » del « jaç » incorrècta',
	'mappingstatus_maperror' => 'Error de mapa :',
	'mappingstatus_osmtext' => 'Vejatz aquesta mapa sus OpenStreetMap.org',
	'mappingstatus_code' => "Còde Wiki pel visionament d'aquesta mapa :",
	'mappingstatus_button_code' => 'Obténer lo còde wiki',
	'mappingstatus_resetview' => 'Tornar inicializar lo visionament',
);

/** Polish (Polski)
 * @author Maikking
 */
$messages['pl'] = array(
	'mappingstatus_maperror' => 'Błąd mapy:',
);

/** Portuguese (Português)
 * @author Lijealso
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'mappingstatus_desc' => 'Permite o uso da marca <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> para apresentar um mapa corrediço OpenLayers. Os mapas provêm de [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Faltando o valor lat (para a latitude).',
	'mappingstatus_lonmissing' => 'Faltando o valor lon (para a longitude).',
	'mappingstatus_zoommissing' => 'Falta valor z (para o nível de zoom).',
	'mappingstatus_longdepreciated' => "Por favor, use 'lon' em vez de 'long' (o parâmetro foi renomeado).",
	'mappingstatus_widthnan' => "o valor de largura (w) '%1' não é um inteiro válido",
	'mappingstatus_heightnan' => "o valor de altura (h) '%1' não é um inteiro válido",
	'mappingstatus_zoomnan' => "o valor de zoom (z) '%1' não é um inteiro válido",
	'mappingstatus_latnan' => "o valor de latitude (lat) '%1' não é um inteiro válido",
	'mappingstatus_lonnan' => "o valor de longitude (lon) '%1' não é um inteiro válido",
	'mappingstatus_widthbig' => 'o valor da largura (w) não pode ser maior que 1000',
	'mappingstatus_widthsmall' => 'o valor da largura (w) não pode ser menor que 100',
	'mappingstatus_heightbig' => 'o valor da altura (h) não pode ser maior que 1000',
	'mappingstatus_heightsmall' => 'o valor da altura (h) não pode ser menor que 100',
	'mappingstatus_latbig' => 'o valor da latitude (lat) não pode ser maior que 90',
	'mappingstatus_latsmall' => 'o valor da latitude (lat) não pode ser menor que -90',
	'mappingstatus_lonbig' => 'o valor da longitude (lon) não pode ser maior que 180',
	'mappingstatus_lonsmall' => 'o valor da longitude (lon) não pode ser menor que -180',
	'mappingstatus_zoomsmall' => 'o valor do zoom (z) não pode ser menor que zero',
	'mappingstatus_zoom18' => 'o valor do zoom (z) não pode ser maior de 17. Note que esta extensão MediaWiki liga-se ao visualizador "osmarender" do OpenStreetMap cujo valor de zoom não ultrapassa o nível 17. O visualizador Mapnik disponível no openstreetmap.org, vai até o nivel 18',
	'mappingstatus_zoombig' => 'O valor de zoom (z) não pode ser maior que 17.',
	'mappingstatus_invalidlayer' => "Valor '%1' inválido para 'layer'",
	'mappingstatus_maperror' => 'Erro no mapa:',
	'mappingstatus_osmtext' => 'Veja este mapa em OpenStreetMap.org',
	'mappingstatus_code' => 'Código wiki para esta vista do mapa:',
	'mappingstatus_button_code' => 'Buscar código wiki',
	'mappingstatus_resetview' => 'Repor vista',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'mappingstatus_latmissing' => 'Valoarea lat lipsă (pentru latitudine).',
	'mappingstatus_lonmissing' => 'Valoarea lon lipsă (pentru longitudine).',
);

/** Russian (Русский)
 * @author Ferrer
 */
$messages['ru'] = array(
	'mappingstatus_maperror' => 'Ошибка карты:',
	'mappingstatus_button_code' => 'Получить викикод',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'mappingstatus_desc' => 'Umožňuje použitie značky <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> na zobrazenie posuvnej mapy OpenLayers. Mapy sú z [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Chýba hodnota lat (rovnobežka).',
	'mappingstatus_lonmissing' => 'Chýba hodnota lon (poludník).',
	'mappingstatus_zoommissing' => 'Chýba hodnota z (úroveň priblíženia)',
	'mappingstatus_longdepreciated' => 'Prosím, použite „lon” namiesto „long” (názov parametra sa zmenil).',
	'mappingstatus_widthnan' => 'hodnota šírky (w) „%1” nie je platné celé číslo',
	'mappingstatus_heightnan' => 'hodnota výšky (h) „%1” nie je platné celé číslo',
	'mappingstatus_zoomnan' => 'hodnota úrovne priblíženia (z) „%1” nie je platné celé číslo',
	'mappingstatus_latnan' => 'hodnota zemepisnej šírky (lat) „%1” nie je platné celé číslo',
	'mappingstatus_lonnan' => 'hodnota zemepisnej dĺžky (lon) „%1” nie je platné celé číslo',
	'mappingstatus_widthbig' => 'hodnota šírky (w) nemôže byť väčšia ako 1000',
	'mappingstatus_widthsmall' => 'hodnota šírky (w) nemôže byť menšia ako 100',
	'mappingstatus_heightbig' => 'hodnota výšky (h) nemôže byť väčšia ako 1000',
	'mappingstatus_heightsmall' => 'hodnota výšky (h) nemôže byť menšia ako 100',
	'mappingstatus_latbig' => 'hodnota zemepisnej dĺžky (h) nemôže byť väčšia ako 90',
	'mappingstatus_latsmall' => 'hodnota zemepisnej dĺžky (h) nemôže byť menšia ako -90',
	'mappingstatus_lonbig' => 'hodnota zemepisnej šírky (lon) nemôže byť väčšia ako 180',
	'mappingstatus_lonsmall' => 'hodnota zemepisnej dĺžky (lon) nemôže byť menšia ako -180',
	'mappingstatus_zoomsmall' => 'hodnota úrovne priblíženia (lon) nemôže byť menšia ako nula',
	'mappingstatus_zoom18' => 'hodnota úrovne priblíženia (lon) nemôže byť väčšia ako 17. Toto rozšírenie MediaWiki využíva vrstvu „osmarender” OpenStreetMap, ktorá umožňuje úroveň priblíženia po 17. Vrstva Mapnik na openstreetmap.org umožňuje priblíženie do úrovne 18.',
	'mappingstatus_zoombig' => 'hodnota úrovne priblíženia (lon) nemôže byť väčšia ako 17.',
	'mappingstatus_invalidlayer' => 'Neplatná hodnota „layer” „%1”',
	'mappingstatus_maperror' => 'Chyba mapy:',
	'mappingstatus_osmtext' => 'Pozrite si túto mapu na OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikód tohto pohľadu na mapu:',
	'mappingstatus_button_code' => 'Zobraziť zdrojový kód',
	'mappingstatus_resetview' => 'Obnoviť zobrazenie',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author M.M.S.
 */
$messages['sv'] = array(
	'mappingstatus_desc' => 'Tillåter användning av taggen <tt>&lt;mappingstatus&gt;</tt> för att visa "slippy map" från OpenLayers. Kartorna kommer från [http://openstreetmap.org openstreetmap.org]',
	'mappingstatus_latmissing' => 'Saknat "lat"-värde (för breddgraden).',
	'mappingstatus_lonmissing' => 'Saknat "lon"-värde (för längdgraden).',
	'mappingstatus_zoommissing' => 'Saknat z-värde (för zoom-nivån).',
	'mappingstatus_longdepreciated' => 'Var god använd "lon"  istället för "long" (parametern fick ett nytt namn).',
	'mappingstatus_widthnan' => 'breddvärdet (w) "%1" är inte ett giltigt heltal',
	'mappingstatus_heightnan' => 'höjdvärdet (h) "%1" är inte ett giltigt heltal',
	'mappingstatus_zoomnan' => 'zoomvärdet (z) "%1" är inte ett giltigt heltal',
	'mappingstatus_latnan' => 'breddgradsvärdet (lat) "%1" är inte ett giltigt nummer',
	'mappingstatus_lonnan' => 'längdgradsvärdet (lon) "%1" är inte ett giltigt nummer',
	'mappingstatus_widthbig' => 'breddvärdet (w) kan inte vara större än 1000',
	'mappingstatus_widthsmall' => 'breddvärdet (w) kan inte vara mindre än 100',
	'mappingstatus_heightbig' => 'höjdvärdet (h) kan inte vara större än 1000',
	'mappingstatus_heightsmall' => 'höjdvärdet (h) kan inte vara mindre än 100',
	'mappingstatus_latbig' => 'breddgradsvärdet (lat) kan inte vara större än 90',
	'mappingstatus_latsmall' => 'breddgradsvärdet (lat) kan inte vara mindre än -90',
	'mappingstatus_lonbig' => 'längdgradsvärdet (lon) kan inte vara större än 180',
	'mappingstatus_lonsmall' => 'längdgradsvärdet (lon) kan inte vara mindre än -180',
	'mappingstatus_zoomsmall' => 'zoomvärdet (z) kan inte vara mindre än noll',
	'mappingstatus_zoom18' => "zoomvärdet (z) kan inte vara högre än 17. Observera att detta programtillägg använder OpenStreetMap-lagret 'osmarender', som inte kan zoomas mer än till nivå 17. Mapnik-lagret på openstreetmap.org zoomar till nivå 18",
	'mappingstatus_zoombig' => 'zoomvärdet (z) kan inte vara högre än 17.',
	'mappingstatus_invalidlayer' => "Ogiltigt 'layer'-värde '%1'",
	'mappingstatus_maperror' => 'Kartfel:',
	'mappingstatus_osmtext' => 'Se den här kartan på OpenStreetMap.org',
	'mappingstatus_code' => 'Wikikod för denna kartvisning:',
	'mappingstatus_button_code' => 'Hämta wikikod',
	'mappingstatus_resetview' => 'Återställ visning',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'mappingstatus_maperror' => 'పటపు పొరపాటు:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'mappingstatus_desc' => "Nagpapahintulot sa paggamit ng tatak na <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> upang maipakita/mapalitaw ang isang pampuwesto/pangkinaroroonang (''slippy'') mapa ng OpenLayers.  Nanggaling ang mga mapa mula sa [http://openstreetmap.org openstreetmap.org]",
	'mappingstatus_latmissing' => 'Nawawalang halaga para sa latitud (lat).',
	'mappingstatus_lonmissing' => 'Nawawalang halaga para sa longhitud (lon).',
	'mappingstatus_zoommissing' => "Nawawalang halagang 't' (mula sa 'tutok') para sa antas ng paglapit/pagtutok (''zoom'').",
	'mappingstatus_longdepreciated' => "Pakigamit lamang ang 'lon' sa halip na 'long' (muling pinangalanan ang parametro).",
	'mappingstatus_widthnan' => "ang halaga ng lapad (l) na '%1' ay hindi isang tanggap na buumbilang (''integer'')",
	'mappingstatus_heightnan' => "ang halaga ng taas (t) na '%1' ay hindi isang tanggap na buumbilang (''integer'')",
	'mappingstatus_zoomnan' => "ang halaga ng pagtutok/paglapit ('t' mula sa 'tutok' o ''zoom'') na '%1' ay hindi isang tanggap na buumbilang (''integer'')",
	'mappingstatus_latnan' => "ang halaga ng latitud (lat) na '%1' ay hindi isang tanggap na buumbilang (''integer'')",
	'mappingstatus_lonnan' => "ang halaga ng longhitud (lon) na '%1' ay hindi isang tanggap na buumbilang (''integer'')",
	'mappingstatus_widthbig' => 'hindi maaaring humigit/lumabis kaysa 1000 ang halaga ng lapad (l)',
	'mappingstatus_widthsmall' => 'hindi maaaring bumaba kaysa 1000 ang halaga ng lapad (l)',
	'mappingstatus_heightbig' => 'hindi maaaring humigit/lumabis kaysa 1000 ang halaga ng taas (t)',
	'mappingstatus_heightsmall' => 'hindi maaaring bumaba kaysa 1000 ang halaga ng taas (t)',
	'mappingstatus_latbig' => 'hindi maaaring humigit/lumabis kaysa 90 ang halaga ng latitud (lat)',
	'mappingstatus_latsmall' => 'hindi maaaring bumaba kaysa -90 ang halaga ng latitud (lat)',
	'mappingstatus_lonbig' => 'hindi maaaring humigit/lumabis kaysa 180 ang halaga ng longhitud (lon)',
	'mappingstatus_lonsmall' => 'hindi maaaring bumaba kaysa -180 ang halaga ng longhitud (lon)',
	'mappingstatus_zoomsmall' => "hindi maaaring bumaba kaysa wala/sero ang halaga ng pagtutok/paglapit ('t' mula sa 'tutok') o ''zoom''.",
	'mappingstatus_zoom18' => "hindi maaaring humigit/lumabis kaysa 17 ang halaga ng pagtutok/paglapit ('t' mula sa 'tutok') o ''zoom''.  Tandaan lamang na ang mga karugtong na ito na pang-Mediawiki ay kumakawing/kumakabit patungo sa sapin/patong na 'osmarender' ng OpenStreetMap na hindi lumalagpas mula sa kaantasan ng pagkakatutok na 17.  Ang sapin/patong na Mapnik na makukuha mula sa openstreetmap.org ay umaabot pataas sa kaantasan ng pagkakatutok na 18",
	'mappingstatus_zoombig' => "hindi maaaring humigit/lumabis kaysa 17 ang halaga ng pagtutok/paglapit ('t' mula sa 'tutok') o ''zoom''.",
	'mappingstatus_invalidlayer' => "Hindi tanggap ang halaga ng 'patong' o 'sapin' na '%1'",
	'mappingstatus_maperror' => 'Kamalian sa mapa:',
	'mappingstatus_osmtext' => 'Tingnan ang mapang ito sa OpenStreetMap.org',
	'mappingstatus_code' => 'Kodigo ng wiki ("wiki-kodigo") para sa tanawin ng mapang ito:',
	'mappingstatus_button_code' => 'Kuhanin ang kodigo ng wiki',
	'mappingstatus_resetview' => 'Muling itakda ang tanawin',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'mappingstatus_desc' => 'Thêm thẻ <tt><nowiki>&lt;mappingstatus&gt;</nowiki></tt> để nhúng bản đồ trơn OpenLayers. Các bản đồ do [http://openstreetmap.org openstreetmap.org] cung cấp.',
	'mappingstatus_latmissing' => 'Thiếu giá trị lat (vĩ độ).',
	'mappingstatus_lonmissing' => 'Thiếu giá trị lon (kinh độ).',
	'mappingstatus_zoommissing' => 'Thiếu giá trị z (cấp thu phóng).',
	'mappingstatus_longdepreciated' => 'Xin hãy dùng “lon” thay vì “long” (tham số đã được đổi tên).',
	'mappingstatus_widthnan' => 'giá trị chiều rộng (w), “%1”, không phải là nguyên số hợp lệ',
	'mappingstatus_heightnan' => 'giá trị chiều cao (h), “%1”, không phải là nguyên số hợp lệ',
	'mappingstatus_zoomnan' => 'giá trị cấp thu phóng (z), “%1”, không phải là nguyên số hợp lệ',
	'mappingstatus_latnan' => 'giá trị vĩ độ (lat), “%1”, không phải là số hợp lệ',
	'mappingstatus_lonnan' => 'giá trị kinh độ (lon), “%1”, không phải là số hợp lệ',
	'mappingstatus_widthbig' => 'giá trị chiều rộng (w) tối đa là “1000”',
	'mappingstatus_widthsmall' => 'giá trị chiều rộng (w) tối thiểu là “100”',
	'mappingstatus_heightbig' => 'giá trị chiều cao (h) tối đa là “1000”',
	'mappingstatus_heightsmall' => 'giá trị chiều cao (h) tối thiểu là “100”',
	'mappingstatus_latbig' => 'giá trị vĩ độ (lat) tối đa là “90”',
	'mappingstatus_latsmall' => 'giá trị vĩ độ (lat) tối thiểu là “-90”',
	'mappingstatus_lonbig' => 'giá trị kinh độ (lon) tối đa là “180”',
	'mappingstatus_lonsmall' => 'giá trị kinh độ (lon) tối thiểu là “-180”',
	'mappingstatus_zoomsmall' => 'giá trị cấp thu phóng tối thiểu là “0”',
	'mappingstatus_zoom18' => 'giá trị cấp thu phóng (z) tối đa là 17. Lưu ý rằng phần mở rộng MediaWiki này dựa trên lớp “osmarender” của OpenStreetMap, nó không vẽ rõ hơn cấp 17. Lớp Mapnik tại openstreetmap.org tới được cấp 18.',
	'mappingstatus_zoombig' => 'giá trị cấp thu phóng (z) tối đa là 17.',
	'mappingstatus_invalidlayer' => 'Giá trị “layer” không hợp lệ: “%1”.',
	'mappingstatus_maperror' => 'Lỗi trong bản đồ:',
	'mappingstatus_osmtext' => 'Xem bản đồ này tại OpenStreetMap.org',
	'mappingstatus_code' => 'Mã wiki để nhúng phần bản đồ này:',
	'mappingstatus_button_code' => 'Xem mã wiki',
	'mappingstatus_resetview' => 'Mặc định lại bản đồ',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'mappingstatus_maperror' => 'Mapapöl:',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'mappingstatus_widthbig' => '宽度值（w）不能大于1000',
	'mappingstatus_widthsmall' => '宽度值（w）不能小于100',
	'mappingstatus_heightbig' => '高度值（h）不能大于1000',
	'mappingstatus_heightsmall' => '高度值（h）不能小于100',
	'mappingstatus_latbig' => '纬度值（lat）不能大于90',
	'mappingstatus_latsmall' => '纬度值（lat）不能小于-90',
	'mappingstatus_lonbig' => '经度值（lon）不能大于180',
	'mappingstatus_lonsmall' => '经度值（lon）不能小于-180',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'mappingstatus_widthbig' => '寬度值(w)不能大於1000',
	'mappingstatus_widthsmall' => '寬度值(w)不能小於100',
	'mappingstatus_heightbig' => '高度值(h)不能大於1000',
	'mappingstatus_heightsmall' => '高度值(h)不能少於100',
	'mappingstatus_latbig' => '緯度值(lat)不能大於90',
	'mappingstatus_latsmall' => '緯度值(lat)不能小於-90',
	'mappingstatus_lonbig' => '經度值(lon)不能大於180',
	'mappingstatus_lonsmall' => '經度值(lon)不能小於-180',
);

