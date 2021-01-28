<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210128145036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonces (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, kilom�trage INT NOT NULL, chevaux INT NOT NULL, couleur VARCHAR(20) NOT NULL, prix DOUBLE PRECISION NOT NULL, image LONGTEXT DEFAULT NULL, boite VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carburant (id INT AUTO_INCREMENT NOT NULL, annonces_id INT DEFAULT NULL, nom VARCHAR(10) NOT NULL, INDEX IDX_B46A330A4C2885D7 (annonces_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carburant ADD CONSTRAINT FK_B46A330A4C2885D7 FOREIGN KEY (annonces_id) REFERENCES annonces (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carburant DROP FOREIGN KEY FK_B46A330A4C2885D7');
        $this->addSql('DROP TABLE annonces');
        $this->addSql('DROP TABLE carburant');
    }
}
