<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011175318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Populate haddock table';
    }

    public function up(Schema $schema): void
    {
        $insults = file('./raw_insults.txt');

        foreach($insults as $insult) {
            $insult = trim($insult);
            $this->addSql("INSERT INTO haddock(insult, used_count) VALUES ('$insult' ,0);");
        }
    }

    public function down(Schema $schema): void
    {
        foreach(self::$insults as $insult) {
            $this->addSql("DELETE FROM haddock WHERE insult = '$insult';");
        }
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
