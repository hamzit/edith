<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171013215941 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE insect (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, Name VARCHAR(255) NOT NULL, Age VARCHAR(255) NOT NULL, Race VARCHAR(255) NOT NULL, Famille VARCHAR(100) NOT NULL, Food VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_9615BDE592FC23A8 (username_canonical), UNIQUE INDEX UNIQ_9615BDE5A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friends (insect_id INT NOT NULL, friend_insect_id INT NOT NULL, INDEX IDX_21EE7069F5DEE3F3 (insect_id), INDEX IDX_21EE70696340AD1B (friend_insect_id), PRIMARY KEY(insect_id, friend_insect_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE7069F5DEE3F3 FOREIGN KEY (insect_id) REFERENCES insect (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE70696340AD1B FOREIGN KEY (friend_insect_id) REFERENCES insect (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE7069F5DEE3F3');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE70696340AD1B');
        $this->addSql('DROP TABLE insect');
        $this->addSql('DROP TABLE friends');
        $this->addSql('DROP TABLE utilisateur');
    }
}
