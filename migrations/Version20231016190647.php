<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231016190647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `ruffian`.`haddock` 
            MODIFY COLUMN `used_count` int NOT NULL AFTER `insult`');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE `ruffian`.`haddock` 
            MODIFY COLUMN `used_count` int NULL AFTER `insult`');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
