<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240402171354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe CHANGE logo logo LONGTEXT NOT NULL, CHANGE total_point total_point INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opposition DROP FOREIGN KEY FK_10CBCFC2E7EF10DB');
        $this->addSql('DROP INDEX IDX_10CBCFC2E7EF10DB ON opposition');
        $this->addSql('ALTER TABLE opposition ADD equipe2_id INT NOT NULL, CHANGE date date DATE DEFAULT NULL, CHANGE score_equipe1 score_equipe1 INT DEFAULT NULL, CHANGE score_equipe2 score_equipe2 INT DEFAULT NULL, CHANGE id_equipe1_id equipe1_id INT NOT NULL');
        $this->addSql('ALTER TABLE opposition ADD CONSTRAINT FK_10CBCFC24265900C FOREIGN KEY (equipe1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE opposition ADD CONSTRAINT FK_10CBCFC250D03FE2 FOREIGN KEY (equipe2_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_10CBCFC24265900C ON opposition (equipe1_id)');
        $this->addSql('CREATE INDEX IDX_10CBCFC250D03FE2 ON opposition (equipe2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe CHANGE total_point total_point INT NOT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE opposition DROP FOREIGN KEY FK_10CBCFC24265900C');
        $this->addSql('ALTER TABLE opposition DROP FOREIGN KEY FK_10CBCFC250D03FE2');
        $this->addSql('DROP INDEX IDX_10CBCFC24265900C ON opposition');
        $this->addSql('DROP INDEX IDX_10CBCFC250D03FE2 ON opposition');
        $this->addSql('ALTER TABLE opposition ADD id_equipe1_id INT NOT NULL, DROP equipe1_id, DROP equipe2_id, CHANGE date date DATE NOT NULL, CHANGE score_equipe1 score_equipe1 INT NOT NULL, CHANGE score_equipe2 score_equipe2 INT NOT NULL');
        $this->addSql('ALTER TABLE opposition ADD CONSTRAINT FK_10CBCFC2E7EF10DB FOREIGN KEY (id_equipe1_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_10CBCFC2E7EF10DB ON opposition (id_equipe1_id)');
    }
}
