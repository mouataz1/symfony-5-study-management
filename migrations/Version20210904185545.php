<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210904185545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chapitre (id INT AUTO_INCREMENT NOT NULL, module_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_8C62B025AFC2B591 (module_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT NOT NULL, name VARCHAR(255) NOT NULL, course_file VARCHAR(255) NOT NULL, resume VARCHAR(255) NOT NULL, INDEX IDX_FDCA8C9C1FBEEF7B (chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, name VARCHAR(255) NOT NULL, date_controle DATE DEFAULT NULL, date_exam DATE DEFAULT NULL, INDEX IDX_C242628B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE td (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT NOT NULL, nom VARCHAR(255) NOT NULL, fd_file VARCHAR(255) DEFAULT NULL, correction VARCHAR(255) DEFAULT NULL, INDEX IDX_40550B4C1FBEEF7B (chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tp (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT NOT NULL, name VARCHAR(255) NOT NULL, tp_file VARCHAR(255) DEFAULT NULL, correction VARCHAR(255) DEFAULT NULL, INDEX IDX_5A8FDF311FBEEF7B (chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B025AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C1FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE td ADD CONSTRAINT FK_40550B4C1FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE tp ADD CONSTRAINT FK_5A8FDF311FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C1FBEEF7B');
        $this->addSql('ALTER TABLE td DROP FOREIGN KEY FK_40550B4C1FBEEF7B');
        $this->addSql('ALTER TABLE tp DROP FOREIGN KEY FK_5A8FDF311FBEEF7B');
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY FK_8C62B025AFC2B591');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628B3E9C81');
        $this->addSql('DROP TABLE chapitre');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE td');
        $this->addSql('DROP TABLE tp');
    }
}
