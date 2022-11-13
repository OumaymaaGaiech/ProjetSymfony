<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221113111339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, adresse_annonce VARCHAR(255) DEFAULT NULL, prix_annonce DOUBLE PRECISION DEFAULT NULL, region_annonce VARCHAR(255) DEFAULT NULL, municipalite VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, type_opertaion VARCHAR(255) DEFAULT NULL, categorie VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, latitude VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, superficie VARCHAR(255) DEFAULT NULL, archive_annonce INT DEFAULT NULL, INDEX IDX_F65593E5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attachement (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, nom_attachement VARCHAR(255) DEFAULT NULL, src VARCHAR(255) DEFAULT NULL, format VARCHAR(255) DEFAULT NULL, INDEX IDX_901C19618805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_cat VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion (id INT AUTO_INCREMENT NOT NULL, user_s_id INT DEFAULT NULL, user_r_id INT DEFAULT NULL, INDEX IDX_C0B9F90FBB4F8085 (user_s_id), INDEX IDX_C0B9F90F3F3E7E0 (user_r_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, discussion_id INT DEFAULT NULL, user_id INT DEFAULT NULL, message LONGTEXT DEFAULT NULL, date_message DATETIME DEFAULT NULL, INDEX IDX_B6BD307F1ADED311 (discussion_id), INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, categorie_rec_id INT DEFAULT NULL, annonce_rec_id INT DEFAULT NULL, user_rec_s_id INT DEFAULT NULL, user_rec_r_id INT DEFAULT NULL, choice_rec VARCHAR(255) DEFAULT NULL, desc_rec LONGTEXT DEFAULT NULL, status_rec VARCHAR(255) DEFAULT NULL, date_rec DATETIME DEFAULT NULL, INDEX IDX_CE606404904F1BA2 (categorie_rec_id), INDEX IDX_CE60640476CEB285 (annonce_rec_id), INDEX IDX_CE60640466FDF878 (user_rec_s_id), INDEX IDX_CE606404DE419F1D (user_rec_r_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_visite (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, annonce_id INT DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, type_rv VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, INDEX IDX_F86DC520A76ED395 (user_id), INDEX IDX_F86DC5208805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, full_name VARCHAR(255) DEFAULT NULL, genre_user VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, municipalite VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, adresse_agence VARCHAR(255) DEFAULT NULL, jour_travail VARCHAR(255) DEFAULT NULL, heure_travail VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE attachement ADD CONSTRAINT FK_901C19618805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FBB4F8085 FOREIGN KEY (user_s_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90F3F3E7E0 FOREIGN KEY (user_r_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404904F1BA2 FOREIGN KEY (categorie_rec_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640476CEB285 FOREIGN KEY (annonce_rec_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640466FDF878 FOREIGN KEY (user_rec_s_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404DE419F1D FOREIGN KEY (user_rec_r_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation_visite ADD CONSTRAINT FK_F86DC520A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation_visite ADD CONSTRAINT FK_F86DC5208805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('ALTER TABLE attachement DROP FOREIGN KEY FK_901C19618805AB2F');
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90FBB4F8085');
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90F3F3E7E0');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1ADED311');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404904F1BA2');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640476CEB285');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640466FDF878');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404DE419F1D');
        $this->addSql('ALTER TABLE reservation_visite DROP FOREIGN KEY FK_F86DC520A76ED395');
        $this->addSql('ALTER TABLE reservation_visite DROP FOREIGN KEY FK_F86DC5208805AB2F');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE attachement');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservation_visite');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
