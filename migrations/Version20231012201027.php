<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012201027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insults must be unique and cannot be null';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E950BC73DAB025A ON haddock (insult)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_E950BC73DAB025A ON haddock');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
