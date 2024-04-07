<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403075513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, rubrique_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT DEFAULT NULL, date_article DATE NOT NULL, INDEX IDX_23A0E66A76ED395 (user_id), INDEX IDX_23A0E663BD38833 (rubrique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainer (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, user_id INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, saison VARCHAR(255) NOT NULL, INDEX IDX_6DE5B5926D861B89 (equipe_id), INDEX IDX_6DE5B592A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, numero INT NOT NULL, poste VARCHAR(255) NOT NULL, numero_licence INT DEFAULT NULL, carton_jaune INT NOT NULL, carton_rouge INT NOT NULL, match_joue INT NOT NULL, nbr_passe INT DEFAULT NULL, nbr_passe_decisif INT DEFAULT NULL, nbr_tir INT DEFAULT NULL, nbr_but INT DEFAULT NULL, arret_gardien INT DEFAULT NULL, but_encaisser INT DEFAULT NULL, penalty_dispute INT DEFAULT NULL, penalty_arrete INT DEFAULT NULL, INDEX IDX_FD71A9C56D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubrique (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_8FA4097CBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E663BD38833 FOREIGN KEY (rubrique_id) REFERENCES rubrique (id)');
        $this->addSql('ALTER TABLE entrainer ADD CONSTRAINT FK_6DE5B5926D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE entrainer ADD CONSTRAINT FK_6DE5B592A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE rubrique ADD CONSTRAINT FK_8FA4097CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE user ADD prenom VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E663BD38833');
        $this->addSql('ALTER TABLE entrainer DROP FOREIGN KEY FK_6DE5B5926D861B89');
        $this->addSql('ALTER TABLE entrainer DROP FOREIGN KEY FK_6DE5B592A76ED395');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE rubrique DROP FOREIGN KEY FK_8FA4097CBCF5E72D');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE entrainer');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE rubrique');
        $this->addSql('ALTER TABLE user DROP prenom, DROP ville');
    }
}
