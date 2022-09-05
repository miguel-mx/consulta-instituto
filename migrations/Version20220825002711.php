<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825002711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consulta (id INT AUTO_INCREMENT NOT NULL, tareas TINYINT(1) DEFAULT NULL, comentario1 LONGTEXT DEFAULT NULL, documento TINYINT(1) DEFAULT NULL, comentario2 LONGTEXT DEFAULT NULL, academico TINYINT(1) DEFAULT NULL, comentario3 LONGTEXT DEFAULT NULL, comision TINYINT(1) DEFAULT NULL, comentario4 LONGTEXT DEFAULT NULL, fecha DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE consulta');
    }
}
