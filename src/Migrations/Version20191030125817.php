<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030125817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, serial_id INT DEFAULT NULL, Name LONGTEXT DEFAULT NULL, Description LONGTEXT DEFAULT NULL, Start_date DATETIME NOT NULL, End_date DATETIME NOT NULL, INDEX IDX_F0E45BA9AF82D095 (serial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id INT DEFAULT NULL, Name LONGTEXT DEFAULT NULL, Duration DOUBLE PRECISION NOT NULL, Producer LONGTEXT DEFAULT NULL, Distributor LONGTEXT DEFAULT NULL, Image_path VARCHAR(255) DEFAULT NULL, INDEX IDX_DDAA1CDA4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serial (id INT AUTO_INCREMENT NOT NULL, Name LONGTEXT DEFAULT NULL, Description LONGTEXT DEFAULT NULL, Created_at DATETIME NOT NULL, Genre LONGTEXT DEFAULT NULL, Image_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9AF82D095 FOREIGN KEY (serial_id) REFERENCES serial (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9AF82D095');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE serial');
    }
}
