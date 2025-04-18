<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206182333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jures_attributions DROP FOREIGN KEY FK_FCD858186DEBDB31');
        $this->addSql('ALTER TABLE jures_attributions DROP FOREIGN KEY FK_FCD858182048A30E');
        $this->addSql('ALTER TABLE odpf_memoires DROP FOREIGN KEY FK_7F26271E6D861B89');
        $this->addSql('ALTER TABLE orgacia DROP FOREIGN KEY FK_CAEB80DAA76ED395');
        $this->addSql('ALTER TABLE orgacia DROP FOREIGN KEY FK_CAEB80DA463CD7C3');
        $this->addSql('DROP TABLE jures_attributions');
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE odpf_memoires');
        $this->addSql('DROP TABLE orgacia');
        $this->addSql('ALTER TABLE centrescia CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE verou_classement verou_classement TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE coefficients CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE conseilsjury_cia ADD CONSTRAINT FK_294710D0FFAFF81B FOREIGN KEY (jure_id) REFERENCES jures_cia (id)');
        $this->addSql('ALTER TABLE conseilsjury_cia ADD CONSTRAINT FK_294710D06D861B89 FOREIGN KEY (equipe_id) REFERENCES equipesadmin (id)');
        $this->addSql('ALTER TABLE jures DROP A, DROP B, DROP C, DROP D, DROP E, DROP F, DROP G, DROP H, DROP I, DROP J, DROP K, DROP L, DROP M, DROP N, DROP O, DROP P, DROP Q, DROP R, DROP S, DROP T, DROP V, DROP W, DROP X, DROP Y, DROP Z');
        $this->addSql('ALTER TABLE jures_cia CHANGE rapporteur rapporteur JSON DEFAULT NULL, CHANGE lecteur lecteur JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CB21B9A00');
        $this->addSql('ALTER TABLE notes CHANGE repquestions repquestions SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CB21B9A00 FOREIGN KEY (coefficients_id) REFERENCES coefficients (id)');
        $this->addSql('ALTER TABLE odpf_equipes_passees ADD palmares VARCHAR(255) DEFAULT NULL, ADD prix VARCHAR(255) DEFAULT NULL, CHANGE autorisations_photos autorisations_photos TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE recommandations_jury_cn DROP INDEX equipe_id, ADD UNIQUE INDEX UNIQ_43E22A676D861B89 (equipe_id)');
        $this->addSql('ALTER TABLE recommandations_jury_cn CHANGE texte texte LONGTEXT DEFAULT NULL');
        $this->addSql('DROP INDEX id ON uai');
        $this->addSql('ALTER TABLE uai CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jures_attributions (jures_id INT NOT NULL, attributions_id INT NOT NULL, INDEX IDX_FCD858182048A30E (attributions_id), INDEX IDX_FCD858186DEBDB31 (jures_id), PRIMARY KEY(jures_id, attributions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, executed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, texte LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, envoyee TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, send_at DATETIME DEFAULT NULL, destinataires VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE odpf_memoires (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, type INT DEFAULT NULL, nomfichier VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, updated_at DATETIME DEFAULT NULL, INDEX IDX_7F26271E6D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE orgacia (id INT AUTO_INCREMENT NOT NULL, centre_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_CAEB80DA463CD7C3 (centre_id), INDEX IDX_CAEB80DAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE jures_attributions ADD CONSTRAINT FK_FCD858186DEBDB31 FOREIGN KEY (jures_id) REFERENCES jures (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jures_attributions ADD CONSTRAINT FK_FCD858182048A30E FOREIGN KEY (attributions_id) REFERENCES attributions (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odpf_memoires ADD CONSTRAINT FK_7F26271E6D861B89 FOREIGN KEY (equipe_id) REFERENCES odpf_equipes_passees (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orgacia ADD CONSTRAINT FK_CAEB80DAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orgacia ADD CONSTRAINT FK_CAEB80DA463CD7C3 FOREIGN KEY (centre_id) REFERENCES centrescia (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE centrescia CHANGE id id INT NOT NULL, CHANGE verou_classement verou_classement INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coefficients CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE conseilsjury_cia DROP FOREIGN KEY FK_294710D0FFAFF81B');
        $this->addSql('ALTER TABLE conseilsjury_cia DROP FOREIGN KEY FK_294710D06D861B89');
        $this->addSql('ALTER TABLE jures ADD A SMALLINT DEFAULT NULL, ADD B SMALLINT DEFAULT NULL, ADD C SMALLINT DEFAULT NULL, ADD D SMALLINT DEFAULT NULL, ADD E SMALLINT DEFAULT NULL, ADD F SMALLINT DEFAULT NULL, ADD G SMALLINT DEFAULT NULL, ADD H SMALLINT DEFAULT NULL, ADD I SMALLINT DEFAULT NULL, ADD J SMALLINT DEFAULT NULL, ADD K SMALLINT DEFAULT NULL, ADD L SMALLINT DEFAULT NULL, ADD M SMALLINT DEFAULT NULL, ADD N SMALLINT DEFAULT NULL, ADD O SMALLINT DEFAULT NULL, ADD P SMALLINT DEFAULT NULL, ADD Q SMALLINT DEFAULT NULL, ADD R SMALLINT DEFAULT NULL, ADD S SMALLINT DEFAULT NULL, ADD T SMALLINT DEFAULT NULL, ADD V SMALLINT DEFAULT NULL, ADD W SMALLINT DEFAULT NULL, ADD X SMALLINT DEFAULT NULL, ADD Y SMALLINT DEFAULT NULL, ADD Z SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE jures_cia CHANGE rapporteur rapporteur LONGTEXT DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE lecteur lecteur LONGTEXT DEFAULT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CB21B9A00');
        $this->addSql('ALTER TABLE notes CHANGE repquestions repquestions INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CB21B9A00 FOREIGN KEY (coefficients_id) REFERENCES coefficients (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE odpf_equipes_passees DROP palmares, DROP prix, CHANGE autorisations_photos autorisations_photos SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE recommandations_jury_cn DROP INDEX UNIQ_43E22A676D861B89, ADD INDEX equipe_id (equipe_id)');
        $this->addSql('ALTER TABLE recommandations_jury_cn CHANGE texte texte TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE uai CHANGE id id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX id ON uai (id)');
    }
}
