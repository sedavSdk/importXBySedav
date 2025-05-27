
# ImportX By Sedav

Оригинальный гит репозиторий ImportX: https://github.com/modmore/importX

Добавленный функционал:
-
- Новый встроенный процессор updatenooverride - в отличии от update не изменяет значения полей, не указанных в csv
- Новая настройка "Сохранить родителя" - при импорте csv можно указать, что бы при перезаписи ресурсов у них сохранялся текущий родитель.

Ручная установка:
-
- В пространствах имен создать новое пространство имен 
    1. Название = importx_sedav_edition
    2. Путь к ядру = {core_path}components/importx_sedav_edition/
    3. Путь к активам = {assets_path}components/importx_sedav_edition/

- В системных настройках создать 2 новые настройки: 
    - 1ая
        1. Ключ = importx_sedav_edition.processor 
        2. Пространство имён = importx_sedav_edition (выбрать в выпадающем меню)
        3. Значение - тут выбирается процессор, аналогично с importX
    - 2ая
        1. Ключ = importx_sedav_edition.datatype
        2. Пространство имён = importx_sedav_edition (выбрать в выпадающем меню)
        3. Значение = csv
- В нстройках меню создать новый раздеть 
    1. Родитель = Пакеты (выбрать в выпадающем меню)
    2. Ключ словаря* = ImportX by Sedav
    3. Действие = home
    4. Пространство имён = importx_sedav_edition

    
