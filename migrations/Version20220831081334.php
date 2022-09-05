<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220831081334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE topic ADD theme_id INT DEFAULT NULL, DROP theme_id_id');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1B59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_9D40DE1B59027487 ON topic (theme_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1B59027487');
        $this->addSql('DROP INDEX IDX_9D40DE1B59027487 ON topic');
        $this->addSql('ALTER TABLE topic ADD theme_id_id INT NOT NULL, DROP theme_id');
    }
}
