<?php
/*
 * importX_sedav_edition
 *
 * Copyright 2011-2014 by Mark Hamstra (https://www.markhamstra.com)
 * Development funded by Working Party, a Sydney based digital agency.
 *
 * All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 */
// Last update: 5/5/2011
// Translator: Warsteiner [http://modxcms.com/forums/index.php/topic,63812.msg363007.html#msg363007]
$_lang['importx_sedav_edition'] = 'ImportXSedavEdition';
$_lang['importx_sedav_edition.description'] = 'Импортирование ресурсов из CSV-данных';
$_lang['importx_sedav_edition.desc'] = 'Компонент для создания новых ресурсов на основе данных в формате CSV. Просто выберите родителя (ресурс или контекст) и загрузите CSV-данные. Разделитель по умолчанию - точка с запятой.';
$_lang['importx_sedav_edition.form.basic'] = 'Простой импорт';
$_lang['importx_sedav_edition.startbutton'] = 'Начать импорт';
$_lang['importx_sedav_edition.importsuccess'] = 'Импорт ресурсов прошёл успешно.';
$_lang['importx_sedav_edition.importfailure'] = 'К сожалению, возникла ошиба при импорте.';
$_lang['importx_sedav_edition.tab.input'] = 'Ввод CSV';
$_lang['importx_sedav_edition.tab.input.desc'] = 'Вставьте или загрузите CSV-данные. Строки должны быть разделены новой строкой, а поля - точкой с запятой (;) или разделителем, указанным ниже.';
$_lang['importx_sedav_edition.tab.input.sep'] = 'Если вы используете особый разделитель, укажите его здесь. Оставьте поле пустым, чтобы использовать точку с запятой.';
$_lang['importx_sedav_edition.csv'] = 'Чистый CSV:';
$_lang['importx_sedav_edition.parent'] = 'Родитель:';
$_lang['importx_sedav_edition.csvfile'] = 'Загрузить файл CSV';
$_lang['importx_sedav_edition.separator'] = 'Разделитель';
$_lang['importx_sedav_edition.tab.settings'] = 'Базовые настройки';
$_lang['importx_sedav_edition.tab.settings.desc'] = 'Укажите базовые настройки. Вы можете переопределить их для каждой строки, указав название поля в CSV данных.';
$_lang['importx_sedav_edition.err.noparent'] = 'Укажите ID родителя, в который будет производиться импорт. Укажите 0 для импортирования в корень сайта.';
$_lang['importx_sedav_edition.err.parentnotnumeric'] = 'ID родителя должно быть числом или ключём контекста.';
$_lang['importx_sedav_edition.err.parentlessthanzero'] = 'ID родителя должно быть целым положительным числом.';
$_lang['importx_sedav_edition.err.nocsv'] = 'Пожалуйста, добавьте данные в формате CSV.';
$_lang['importx_sedav_edition.err.fileuploadfailed'] = 'Ошибка чтения загруженного файла.';
$_lang['importx_sedav_edition.err.invalidcsv'] = 'Неправильные данные CSV.';
$_lang['importx_sedav_edition.err.notenoughdata'] = 'Недостаточно приведённых данных. Должна быть как минимум одна строка заголовков и одна строка данных.';
$_lang['importx_sedav_edition.err.elementmismatch'] = 'Количество элементов не совпадает. Пожалуйста, проверьте синтаксис в строке [[+line]].';
$_lang['importx_sedav_edition.err.savefailed'] = 'Произожла необъяснимая ошибка при сохранении ресурса.';
$_lang['importx_sedav_edition.err.invalidheader'] = 'Заголовок содержит неправильные имена полей: [[+fields]].';
$_lang['importx_sedav_edition.err.intexpected'] = '[[+field]] ([[+int]] должно быть целым числом)';
$_lang['importx_sedav_edition.err.tvdoesnotexist'] = '[[+field]] (нет Дополнительных полей (TV) с ID [[+id]])';
$_lang['importx_sedav_edition.log.runningpreimport'] = 'Тестирование данных перед импортом...';
$_lang['importx_sedav_edition.log.fileuploadfound'] = 'Данные из CSV-файла заменят все данные, введённые вручную. Название файла: [[+filename]]';
$_lang['importx_sedav_edition.log.preimportclean'] = 'Ошибок не обнаружено. Готовим данные к импорту...';
$_lang['importx_sedav_edition.log.importvaluesclean'] = 'Для импорта готовы элементы в количестве: [[+count]]. Импортирование...';
$_lang['importx_sedav_edition.log.complete'] = 'Импортирование завершено. Было создано: [[+count]] ресурс(ов).';
$_lang['importx_sedav_edition.lock_parent'] = 'Сохранить Родителя';
?>
