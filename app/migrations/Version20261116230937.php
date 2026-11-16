<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261116230937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, destination VARCHAR(100) NOT NULL, objectif VARCHAR(255) NOT NULL, duree_jours INT NOT NULL, equipage INT NOT NULL, status VARCHAR(30) NOT NULL, description LONGTEXT NOT NULL, type_mission VARCHAR(50) NOT NULL, date_lancement_prevue DATE NOT NULL, date_creation DATETIME NOT NULL, auteur_id INT NOT NULL, INDEX IDX_9067F23C60BB6FE6 (auteur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C60BB6FE6');
        $this->addSql('DROP TABLE mission');
    }
}
