composer install --no-scripts --no-interaction
php migrations/initialisationTable.php
php migrations/FillDBZoo.php
exec apache2-foreground