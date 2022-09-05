<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220831114346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, topic_id INT DEFAULT NULL, question VARCHAR(255) NOT NULL, question_image VARCHAR(255) NOT NULL, goodanswer VARCHAR(255) NOT NULL, wronganswer VARCHAR(255) NOT NULL, difficulty VARCHAR(255) NOT NULL, INDEX IDX_7C77973D1F55203D (topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quizz ADD CONSTRAINT FK_7C77973D1F55203D FOREIGN KEY (topic_id) REFERENCES topic (id)');
        $this->addSql('DROP TABLE question');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, question_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, question_image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE quizz DROP FOREIGN KEY FK_7C77973D1F55203D');
        $this->addSql('DROP TABLE quizz');
    }
}
